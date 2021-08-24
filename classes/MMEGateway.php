<?php
require_once('MMECustomer.php');
function moneyme_gateway_init() {

	class MMEGateway extends WC_Payment_Gateway {

		/**
		 * Constructor for the gateway.
		 */
		public $MME;
		public function __construct() {
	  
			$this->id                 = 'mme_gateway';
			$this->icon               = apply_filters('woocommerce_mme_icon', '');
			$this->has_fields         = true;
			$this->method_title       = __( 'MoneyMe Payments for WooCommerce', 'wc-gateway-mme' );
			$this->method_description = __( 'Allows MoneyMe payments.', 'wc-gateway-mme' );
		  
			// Load the settings.
			$this->init_form_fields();
			$this->init_settings();
			// Define user set variables
			$this->title        = 'Pay with Moneyme+'; //$this->get_option( 'title' );
			$this->description  = $this->get_option( 'description' );
			$this->instructions = $this->get_option( 'instructions', $this->description );

			$this->testmode = 'yes' === $this->get_option( 'testmode' );
			$this->password = $this->testmode ? $this->get_option( 'test_password' ) : $this->get_option( 'password' );
			$this->username = $this->testmode ? $this->get_option( 'test_username' ) : $this->get_option( 'username' );
			$this->supports = array(
				'products',
				//'refunds'
			);
			$this->mme_sess_key = md5(base64_encode($this->username.":".$this->password));
			// Actions
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
			add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_page' ) );
		  
			// Customer Emails
			add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
			$config = [
				'mme_username' => $this->username,
				'mme_password' => $this->password
			];
			$this->MME = new MMECustomer($config); 	
			if(!$this->testmode){
				$this->MME::$SERVICE_URL = "https://horizonapi.moneyme.com.au/Mobile";
			}
		}
	
	
		/**
		 * Initialize Gateway Settings Form Fields
		 */
		public function init_form_fields() {
			$this->form_fields = apply_filters( 'wc_mme_form_fields', array(
		  
				'enabled' => array(
					'title'   => __( 'Enable/Disable', 'wc-gateway-mme' ),
					'type'    => 'checkbox',
					'label'   => __( 'Enable MoneyMe Payment', 'wc-gateway-mme' ),
					'default' => true
				),
				
				
				'description' => array(
					'title'       => __( 'Payment Method Info', 'wc-gateway-mme' ),
					'type'        => 'textarea',
					'description' => __( 'Shown to customer at checkout.', 'wc-gateway-mme' ),
					'default'     => __( 'Use your MoneyMe+ account for purchases up to $50,000 with 24 interest-free.', 'wc-gateway-mme' ),
					'desc_tip'    => true,
				),
				'testmode' => array(
					'title'       => 'Test mode',
					'label'       => 'Enable Test Mode',
					'type'        => 'checkbox',
					'description' => 'Enable with test credentials to process test transactions.',
					'default'     => true,
					'desc_tip'    => true,
				),
				'test_username' => array(
					'title'       => 'Test MoneyMe Username',
					'type'        => 'text',
					'default'	  => '',
				),
				'test_password' => array(
					'title'       => 'Test MoneyMe Password',
					'type'        => 'password',
					'default'	  => '',
				),
				'username' => array(
					'title'       => 'Live MoneyMe Username',
					'type'        => 'text',
				),
				'password' => array(
					'title'       => 'Live MoneyMe Password',
					'type'        => 'password',
				),
				'instructions' => array(
					'title'       => __( 'Confirmation Instructions', 'wc-gateway-mme' ),
					'type'        => 'textarea',
					'description' => __( 'Shown to customer at purchase completion on order confirmation page.', 'wc-gateway-mme' ),
					'default'     => 'Congratulations on your purchase with MoneyMe+. Check your email for more information about your MoneyMe+ account.',
					'desc_tip'    => true,
				),
			) );
			if(isset($_GET['cart_added'])){
				echo wp_kses('<input type="hidden" id="mme-cart-added-temp" value="'.esc_attr($_GET['cart_added']).'" />', ['input' => ['type' => 'hidden', 'value' => esc_attr($_GET['cart_added']), 'id' => 'mme-cart-added-temp']]);
			}
		}
		
		public function payment_fields(){
			global $woocommerce, $img, $js, $css, $site_ep, $description;
			$img = plugins_url( '../views/assets/images' , __FILE__ );
			$js = plugins_url( '../views/assets/js' , __FILE__ );
			$css = plugins_url( '../views/assets/css' , __FILE__ );
			$site_ep = site_url('wp-admin/admin-ajax.php');
			
            $order_id = $woocommerce->session->order_awaiting_payment;
			$order = wc_get_order( $order_id );
			if ( $description = $this->get_description() ) {
                //echo wpautop( wptexturize( $description ) );
			}
			$description = $this->description;
			include_once(plugin_dir_path( __FILE__ ).'../views/mme-main.php');
		}
		

		public function validate_fields(){
			global $woocommerce;
			$customer = get_transient('customer');
			if($woocommerce->cart->total < 1000){
				wc_add_notice('Total checkout amount is not valid for MoneyMe+ payment. MoneyMe+ accept checkout worth greater or equal to $1000', 'error' );
				return false;
			}

			if(!isset($_POST['_mme_token'])){
				wc_add_notice(  'Please continue by logging in your MoneyMe+ account on the modal.', 'error' );
				return false;
			}
			return true;
		}
		
	
		/**
		 * Output for the order received page.
		 */
		public function thankyou_page() {
			if ( $this->instructions ) {
				echo wpautop( wptexturize( $this->instructions ) );
			}
		}

	
		/**
		 * Add content to the WC emails.
		 *
		 * @access public
		 * @param WC_Order $order
		 * @param bool $sent_to_admin
		 * @param bool $plain_text
		 */
		public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
		
			if ( $this->instructions && ! $sent_to_admin && $this->id === $order->payment_method && $order->has_status( 'on-hold' ) ) {
				echo wpautop( wptexturize( $this->instructions ) ) . PHP_EOL;
			}
		}

		/**
		 * Signup request to MME Endpoint
		 *
		 * @access public
		 * @param array $post
		 */
		public function signup( $post ) {
			header('Content-type: application/json');
			global $woocommerce;
			$items = $woocommerce->cart->get_cart();
			$cartItems = [];
			foreach($items as $item => $values) { 
				$_product =  wc_get_product( $values['data']->get_id()); 
				$price =  $values['data']->get_price();
				$variation = count($values['variation'])>0 ? " - ".implode(", ",$values['variation']) : "";
				$full_title = $_product->get_title().$variation;
				$cartItems[] = $values['quantity'].'x '.$full_title.'. Total Order Amount: $'.number_format(($price * $values['quantity']), 2, '.', ',');
				$pid[] = $values['data']->get_id();
                $qty[] = $values['quantity'];
			}
			$signed_post = $post;
			$signed_post['billing_phone'] = $signed_post['mme_billing_phone'];
			$signed_post['billing_email'] = $signed_post['mme_billing_email'];
			$signed_data = base64_encode(json_encode($signed_post));
			$cart_added = strtotime("now");
			$checkout_url_params = [
				'action' => 'mme_cart_items',
				'pid' => base64_encode(implode(",",$pid)),
				'cart_added' => $cart_added,
				'q' => base64_encode(implode(",",$qty)),
				'ut' => strtotime("+28 days"),
				'mme_redirect_data' => $signed_data
			];
			$checkout_url = site_url() . '/wp-admin/admin-ajax.php?'.http_build_query($checkout_url_params);
			$checkout_url = urldecode($checkout_url);
			$post["CheckoutDescription"] = implode(", ", $cartItems);
			$post["CheckoutAmount"] = $woocommerce->cart->total;
			$post['checkout_url'] = $checkout_url;
			$create = $this->MME->createAccount($post);
			return $create;
		}
		/**
		 * Process the payment and return the result
		 *
		 * @param int $order_id
		 * @return array
		 */
		public function process_payment( $order_id ) {
			$order = wc_get_order( $order_id );
			global $woocommerce;
			$items = $woocommerce->cart->get_cart();
			$cartItems = [];
			foreach($items as $item => $values) { 
				$_product =  wc_get_product( $values['data']->get_id()); 
				$price =  $values['data']->get_price();
				$variation = count($values['variation'])>0 ? " - ".implode(", ",$values['variation']) : "";
				$full_title = $_product->get_title().$variation;
				$cartItems[] = $values['quantity'].'x '.$full_title.'. Total Order Amount: $'.number_format(($price * $values['quantity']), 2, '.', ',');
				$pid[] = $values['data']->get_id();
                $qty[] = $values['quantity'];
				
			}
			$fields = ['billing_first_name', 'billing_last_name', 'billing_company', 'billing_country', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'billing_phone', 'billing_email', 'mme_checkout_url'];
			foreach($fields as $key){
				if(isset($_POST[$key])){
					if($key == 'billing_email'){
						$signed_post[$key] = sanitize_email($_POST[$key]);
					}else{
						$signed_post[$key] = sanitize_text_field($_POST[$key]);
					}
					
				}
			}
			$remove = array('order_comments', 'woocommerce-process-checkout-nonce', '_wp_http_referer', 'payment_method');
			$signed_data = base64_encode(json_encode($signed_post));
			$checkout_url_params = [
				'action' => 'mme_cart_items',
				'pid' => base64_encode(implode(",",$pid)),
				'q' => base64_encode(implode(",",$qty)),
				'mme_redirect_data' => $signed_data
			];

			$checkout_url = site_url() . '/wp-admin/admin-ajax.php?'.http_build_query($checkout_url_params);
			$checkout_url = urldecode($checkout_url);
			// Format Description: qty - title - id - price as requested by shaun
			$items = implode(", ", $cartItems);
			$customer = (object) ['AccessToken' => sanitize_text_field($_POST['_mme_token']), 'ApplicationId' => sanitize_text_field($_POST['_mme_application_id']), 'MerchantId' => sanitize_text_field($_POST['_mme_merchant_id']), 'CheckoutDescription' => $items, 'CheckoutUrl' => $checkout_url];
			$response = $this->MME->processPayment(['amount' => $order->total], $customer);
			
			if(!$response->IsMMEPlusTransactionCreated){
				if($response->Message){
					wc_add_notice( $response->Message, 'error' );
					return false;
				}
				$error = (object) json_decode($response->SystemErrorMessage);
				wc_add_notice( $error->Message, 'error' );
				return false;
			}
			//expire transient in 28 days
			if($_POST['mme_cart_added']){
				set_transient($_POST['mme_cart_added'], 1, 86400 * 28);
			}
			
			$order->payment_complete();
			
			// Reduce stock levels
			$order->reduce_order_stock();
			
			// Remove cart
			WC()->cart->empty_cart();
			
			// Return thankyou redirect
			return array(
				'result' 	=> 'success',
				'redirect'	=> $this->get_return_url( $order )
			);
		}

		public function requestTemplate($payment_request){
			global $customer;
			global $eligible;
			global $payment;
			global $img;
			global $woocommerce;

			$customer = $this->MME::$CUSTOMER;
			$eligible = $customer->Eligibility;
			$payment = $payment_request;
			$img = plugins_url( '../views/assets/images' , __FILE__ );
			include_once(plugin_dir_path( __FILE__ ).'../views/mme-account.php');
		}

		public function process_refund( $order_id, $amount = null, $reason = '' ) {
			// Do your refund here. Refund $amount for the order with ID $order_id
			//return new WP_Error( 'broke', __( "I've fallen and can't get up", "my_textdomain" ) );
			return true;
		}
	
  } // end \WC_Gateway_Offline class
}
