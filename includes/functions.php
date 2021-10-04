<?php
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
  global $woocommerce;
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
    wp_enqueue_script( 'init-rs-js', $plugin_url . 'views/assets/js/rs-analytics.js', [], '', true );
    wp_enqueue_script( 'rs-tp', 'https://cdn.rudderlabs.com/v1/rudder-analytics.min.js', [], '', true );
    wp_enqueue_script( 'mme-analytics', $plugin_url . 'views/assets/js/mmeAnalytics.js', [], '', true );
    wp_enqueue_script( 'mme-analytics-custom', $plugin_url . 'views/assets/js/mmeAnalyticsCustomDestination.js', [], '', true );
    wp_enqueue_script( 'mme-custom', plugin_dir_url( __FILE__ ). '../views/assets/js/mme.js', '', '', true);
  }
  function mme_checkout_handler(){
    //63009 = declined
    //63008 = approved
    global $woocommerce;
    $checkout_url = sanitize_text_field($_GET['checkout_url']);
    $order_id = sanitize_text_field($_GET['order_id']);
    if(!$order_id){
        wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
    }
    $obj = new MMEGateway();
    $response = $obj->MME->checkPaymentStatus(["order_id" => $order_id]);
    if($response->Message == "Authorization has been denied for this request."){
        wc_add_notice( __( 'Merchant is unauthorized. If you are the owner or admin of this website, kindly update your MoneyMe+ Woocommerce plugin credentials to fix this issue.', 'gateway' ), 'error' );
        wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
        exit;
    }
    $order = wc_get_order($order_id );
    if ($order->get_status() == "completed") {
      wp_redirect($checkout_url);
      exit;
    }

    /* start checking of stocks vs items ordered */
    $items = $order->get_items();
    $item_err = [];
    foreach ($items as $items_key => $items_value) { 
        $id = $items_value['variation_id'] ? $items_value['variation_id'] : $items_value['product_id'];
        $_product =  wc_get_product($id); 
        if($items_value['qty'] > $_product->stock_quantity){
            $item_err[] = $items_value['name'];
        }
    }
    if(count($item_err)){
        wc_add_notice( __( 'One or more items in the cart requested is no longer available. If your credit limit in MoneyMe+ was deducted, kindly contact MoneyMe on 1300 844 349 to fix this issue. Items: '.implode(',', $item_err), 'gateway' ), 'error' );
        wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
        exit;
    }
    /* end checking of stocks vs items ordered */
    if($response->IsRedrawApproved){
        $woocommerce->cart->empty_cart();
        $order->payment_complete();
        $obj->MME->logOrderAsComplete($order_id);
        // Reduce stock levels
        $order->reduce_order_stock();
        wp_redirect($checkout_url);
        exit;
    }else{
       if($response->StatusId == 63006){
          $order->update_status('cancelled');
          wc_add_notice( __( 'Your Payment is Declined.', 'gateway' ), 'error' );
          wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
          exit;
       }else{
          wc_add_notice( __( 'MoneyMe+ is under maintenance. Contact us on 1300 329 037 for urgent issues.', 'gateway' ), 'error' );
          wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
          exit;
       }
    }
    die();
  }

  add_action('wp_ajax_mme_checkout', 'mme_checkout_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_mme_checkout', 'mme_checkout_handler');

  add_action( 'wp_enqueue_scripts', 'mme_checkout_enqueue_styles' );
  add_action( 'wp_enqueue_scripts', 'mme_checkout_enqueue_script' );
}
