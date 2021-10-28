<?php
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
  global $woocommerce;
  function login_mme_customer_handler(){
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    if($username == "" || $password == ""){
      header('Content-type: application/json');
      echo json_encode(['error'=> "Please enter valid username and password"]);
      die();
    }
    $obj = new MMEGateway(); 
    if(!$obj->MME::$CUSTOMER){
      $response = $obj->MME->login(['username' => $username, 'password' => $password]);
      if($response->Message){
        header('Content-type: application/json');
        echo json_encode(['error'=> $response->Message]);
        die();
      }
      if($response->error){
        header('Content-type: application/json');
        echo json_encode(['error'=> $response->error]);
        die();
      }
      if($response->UserErrorMessage){
        header('Content-type: application/json');
        echo json_encode(['error'=> $response->UserErrorMessage, 'error_id' => $response->ErrorType, 'testmode' =>$obj->testmode]);
        die();
      }
      if(!$response->AccessToken){
        header('Content-type: application/json');
        echo json_encode(['error'=> $response->Message]);
        die();
      }
      if(!$response->IsEligibleMMEPlusTransaction){
        $payment_request = $obj->MME->requestPayment([], $obj->MME::$CUSTOMER);
        $obj->requestTemplate($payment_request);
        die();
      }
      
    }
    $payment_request = $obj->MME->requestPayment([], $obj->MME::$CUSTOMER);
    if($payment_request['status'] == "failed"){
      global $message;
      $message = $payment_request['message'];
      echo esc_attr($message);
      include_once(plugin_dir_path( __FILE__ ).'../views/mme-main.php');
      die();
    }
    $obj->requestTemplate($payment_request);
    die();
  }

  function signup_mme_customer_handler(){
  header('Content-type: application/json');
  $fields = ['billing_address_1', 'billing_address_2', 'billing_city', 'billing_company', 'billing_country', 'billing_email', 'billing_first_name', 'billing_last_name', 'billing_phone', 'billing_postcode', 'billing_state', 'checkout_url', 'mme_billing_email','mme_billing_first_name', 'mme_billing_last_name', 'mme_billing_phone', 'mme_billing_title'];

  foreach($fields as $k){
      if($k == 'billing_email' || $k == 'mme_billing_email'){
        $post[$k] = sanitize_email($_POST[$k]);
      }else{
        $post[$k] = sanitize_text_field($_POST[$k]);
      }
  }
  if(!is_email($post['mme_billing_email'])){
    echo json_encode(["status"=>"error", "message" => 'Please enter a valid email']);
    die();
  }

  if(strlen($post['mme_billing_phone']) > 10 && !is_numeric($post['mme_billing_phone'])){
    echo json_encode(["status"=>"error", "message" => 'Phone number should be numeric and not more than 10 digits']);
    die();
  }

  if(strlen($post['mme_billing_last_name']) > 1000 || !isset($post['mme_billing_last_name'])){
    echo json_encode(["status"=>"error", "message" => 'Last name is required and not more than 1000 digits']);
    die();
  }

  $obj = new MMEGateway();
  $validate = $obj->MME->checkAccountExists($post);
  //error field/s input

  if($validate->Message){
    echo json_encode(["status"=>"error", "message" => $validate->Message]);
    die();
  }

  if($validate->UserErrorMessage){
    echo json_encode(["status"=>"error", "message" => $validate->UserErrorMessage]);
    die();
  }
  
  //account exits
  if($validate->AccountExists){
    echo json_encode(["status"=>"exists", "message" => "Account exists"]);
    die();
  }
  
  $create = $obj->signup($post);
  if(!$create->SystemErrorMessage){
    echo json_encode(["status"=>"ok", "continueUrl" => $create->ContinueUrl]);
  }else{
    echo json_encode(["status"=>"error", "message" => json_decode($create->SystemErrorMessage)->Message]);
  }
  die();
  }

  function request_forgot_pin_handler(){
    header('Content-type: application/json');
    $obj = new MMEGateway();
    $email = sanitize_text_field($_POST['email']);
    if(!is_email($email)){
      echo json_encode(["status"=>"error", "message" => "Please enter valid email."]);
      die();
    }
    $request = $obj->MME->sendForgotPinEmail(['email' => $email]);
    if($request->IsSent){
      echo json_encode(["status"=>"ok", "customer_id" => $request->CustomerId]);
    }else{
      echo json_encode(["status"=>"error", "message" => $request->UserErrorMessage]);
    }
    die();
  }

  function verify_forgot_pin_handler(){
    header('Content-type: application/json');
    $obj = new MMEGateway();
    $request = $obj->MME->verifyForgotPasswordCode(['code' => sanitize_text_field($_POST['code']), 'customer_id' => sanitize_text_field($_POST['customer_id'])]);
    if($request->AccessToken){
      echo json_encode(["status"=>"ok", "access_token" => $request->AccessToken]);
    }else{
      echo json_encode(["status"=>"error", "message" => $request->UserErrorMessage]);
    }
    die();
  }

  function change_passcode_handler(){
    header('Content-type: application/json');
    $post['access_token'] = sanitize_text_field($_POST['access_token']);
    $post['customer_id'] = sanitize_text_field($_POST['customer_id']);
    $post['new_pin'] = sanitize_text_field($_POST['new_pin']);
    $post['confirm_pin'] = sanitize_text_field($_POST['confirm_pin']);
    
    foreach($post as $key => $value){
      if(!isset($post[$key])){
        echo json_encode(["status"=>"error", "message" => "${key} is required."]);
        die();
      }
    }

    if($post['new_pin'] != $post['confirm_pin']){
        echo json_encode(["status"=>"error", "message" => "New pin and confirm pin does not match"]);
        die();
    }

    $obj = new MMEGateway();
    $request = $obj->MME->changePasswordCode($post, $post['access_token']);
    if($request->IsChangePinSuccess){
      echo json_encode(["status"=>"ok"]);
    }else{
      echo json_encode(["status"=>"error", "message" => $request->UserErrorMessage]);
    }
    die();
  }

  function mme_cart_items_handler(){
    global $woocommerce;
    $cart_added = sanitize_text_field($_GET['cart_added']);
    $ut = sanitize_text_field($_GET['ut']);
    $site_url = site_url();

    $isExpired = $ut < strtotime("now") ? true : false;
    if($isExpired){
      header("Location: {$site_url}"); 
      die();
    }
    if(get_transient($cart_added)){
      header("Location: {$site_url}"); 
      die();
    }
 
    if(isset($_GET['pid'])){
      $pid = explode(',',base64_decode(sanitize_text_field($_GET['pid'])));
      $qty = explode(',',base64_decode(sanitize_text_field($_GET['q'])));
 
      $woocommerce->cart->empty_cart();
      foreach($pid as $key => $value) { 
        $product_id = trim($value).'-'.$qty[$key].'<br>';
        $qty_prod = trim($qty[$key]);
        $woocommerce->cart->add_to_cart($product_id,$qty_prod);
      }
    }

    $url = wc_get_checkout_url();
    if(isset($_GET['mme_redirect_data'])){
        $url .= '?mme_redirect_data='.sanitize_text_field($_GET['mme_redirect_data']).'&cart_added='.sanitize_text_field($_GET['cart_added']);
    }
    header("Location: {$url}"); 
    die();
  }
  function mme_checkout_enqueue_styles() {
    $plugin_url = plugin_dir_url( __DIR__ );
    wp_enqueue_style( 'g-font-lexa', 'https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap' );
    wp_enqueue_style( 'g-font-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap' );
    wp_enqueue_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    
    wp_enqueue_style( 'animate', $plugin_url . 'views/assets/css/animate.css');
    wp_enqueue_style( 'global', $plugin_url . 'views/assets/css/global.css');
    wp_enqueue_style( 'custom', $plugin_url . 'views/assets/css/custom.css' );
    wp_enqueue_style( 'main-style', $plugin_url . 'views/assets/css/styles.css' );
    
  }

  function mme_checkout_enqueue_script() {
    $plugin_url = plugin_dir_url( __DIR__ );
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'proper', $plugin_url . 'views/assets/js/proper.js' );
    //wp_enqueue_script( 'mod-bs-js', $plugin_url . 'views/assets/js/bootstrap.min.js', ['jquery']);
    wp_enqueue_script( 'init-rs-js', $plugin_url . 'views/assets/js/rs-analytics.js', [], '', true );
    wp_enqueue_script( 'rs-tp', 'https://cdn.rudderlabs.com/v1/rudder-analytics.min.js', [], '', true );
    wp_enqueue_script( 'mme-analytics', $plugin_url . 'views/assets/js/mmeAnalytics.js', [], '', true );
    wp_enqueue_script( 'mme-analytics-custom', $plugin_url . 'views/assets/js/mmeAnalyticsCustomDestination.js', [], '', true );
    wp_enqueue_script( 'mme-custom', plugin_dir_url( __FILE__ ). '../views/assets/js/mme.js', '', '', true);
  }
  
  add_action('wp_ajax_login_mme_customer', 'login_mme_customer_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_login_mme_customer', 'login_mme_customer_handler');

  add_action('wp_ajax_signup_mme_customer', 'signup_mme_customer_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_signup_mme_customer', 'signup_mme_customer_handler');

  add_action('wp_ajax_request_forgot_pin', 'request_forgot_pin_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_request_forgot_pin', 'request_forgot_pin_handler');

  add_action('wp_ajax_verify_forgot_pin', 'verify_forgot_pin_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_verify_forgot_pin', 'verify_forgot_pin_handler');

  add_action('wp_ajax_change_passcode', 'change_passcode_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_change_passcode', 'change_passcode_handler');

  add_action('wp_ajax_mme_cart_items', 'mme_cart_items_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_mme_cart_items', 'mme_cart_items_handler');


  add_action( 'wp_enqueue_scripts', 'mme_checkout_enqueue_styles' );
  add_action( 'wp_enqueue_scripts', 'mme_checkout_enqueue_script' );
}
