<?php
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
  global $woocommerce;
  function login_mme_customer_handler(){
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
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
        echo $obj->requestTemplate($payment_request);
        die();
      }
      
    }
    
    $payment_request = $obj->MME->requestPayment([], $obj->MME::$CUSTOMER);
    if($payment_request['status'] == "failed"){
      global $message;
      echo $message = $payment_request['message'];
      include_once(plugin_dir_path( __FILE__ ).'../views/mme-main.php');
      die();
    }
    echo $obj->requestTemplate($payment_request);
    die();
  }

  function signup_mme_customer_handler(){
  header('Content-type: application/json');
  $post = $_POST;
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
    echo json_encode(["status"=>"exists", "message" => "account exists"]);
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
    $post = $_POST;
    $obj = new MMEGateway();
    $request = $obj->MME->sendForgotPinEmail(['email' => $post['email']]);
    if($request->IsSent){
      echo json_encode(["status"=>"ok", "customer_id" => $request->CustomerId]);
    }else{
      echo json_encode(["status"=>"error", "message" => $request->UserErrorMessage]);
    }
    die();
  }

  function verify_forgot_pin_handler(){
    header('Content-type: application/json');
    $post = $_POST;
    $obj = new MMEGateway();
    $request = $obj->MME->verifyForgotPasswordCode(['code' => $post['code'], 'customer_id' => $post['customer_id']]);
    if($request->AccessToken){
      echo json_encode(["status"=>"ok", "access_token" => $request->AccessToken]);
    }else{
      echo json_encode(["status"=>"error", "message" => $request->UserErrorMessage]);
    }
    die();
  }

  function change_passcode_handler(){
    header('Content-type: application/json');
    $post = $_POST;
    $obj = new MMEGateway();
    $request = $obj->MME->changePasswordCode($post, $post['access_token']);
    if($request->IsChangePinSuccess){
      echo json_encode(["status"=>"ok"]);
    }else{
      echo json_encode(["status"=>"error", "message" => $request->UserErrorMessage]);
    }
    die();
  }

  function mme_checkout_enqueue_styles() {
    $plugin_url = plugin_dir_url( __DIR__ );

    wp_enqueue_style( 'bootstrap', $plugin_url . 'views/assets/css/bootstrap-mme.min.css' );
    wp_enqueue_style( 'animate', $plugin_url . 'views/assets/css/animate.css');
    wp_enqueue_style( 'global', $plugin_url . 'views/assets/css/global.css');
    wp_enqueue_style( 'custom', $plugin_url . 'views/assets/css/custom.css' );
    
  }

  function mme_cart_items_handler(){
    global $woocommerce;
    $cart_added = $_GET['cart_added'];
    $site_url = site_url();

    $isExpired = $_GET['ut'] < strtotime("now") ? true : false;
    if($isExpired){
      header("Location: {$site_url}"); 
      die();
    }
    if(get_transient($cart_added)){
      header("Location: {$site_url}"); 
      die();
    }
 
    if(isset($_GET['pid'])){
      $pid = explode(',',base64_decode($_GET['pid']));
      $qty = explode(',',base64_decode($_GET['q']));
 
      $woocommerce->cart->empty_cart();
      foreach($pid as $key => $value) { 
        $product_id = trim($value).'-'.$qty[$key].'<br>';
        $qty_prod = trim($qty[$key]);
        $woocommerce->cart->add_to_cart($product_id,$qty_prod);
      }
    }

    $url = wc_get_checkout_url();
    if(isset($_GET['mme_redirect_data'])){
        $get = $_GET;
        $url .= '?mme_redirect_data='.$_GET['mme_redirect_data'].'&cart_added='.$get['cart_added'];
    }
    header("Location: {$url}"); 
    die();
  }

  function mme_checkout_enqueue_script() {
    $plugin_url = plugin_dir_url( __DIR__ );

    wp_enqueue_script( 'jquery', $plugin_url . 'views/assets/js/jquery-min.js' );
    wp_enqueue_script( 'jquery', $plugin_url . 'views/assets/js/proper.js' );
    wp_enqueue_script( 'bootstrap', $plugin_url . 'views/assets/js/bootstrap-mme.min.js' );
  }
  add_action( 'woocommerce_payment_complete', 'my_change_status_function' );

  function my_change_status_function( $order_id ) {
      $order = wc_get_order( $order_id );
      $order->update_status( 'completed' );
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