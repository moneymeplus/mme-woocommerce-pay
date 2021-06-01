<?php
/*
Plugin Name: MoneyMe Payments for WooCommerce
Description: Let your customers pay in installments with up to 60 months interest-free.
version: 1.0.0
Author: MoneyMe
*/
require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'classes/MMEGateway.php';

// Make sure WooCommerce is active
// tv-21
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	return;
}


/**
 * Add the gateway to WC Available Gateways
 * 
 * @since 1.0.0
 * @param array $gateways all available WC gateways
 * @return array $gateways all WC gateways + offline gateway
 */
function wc_mme_add_to_gateways( $gateways ) {
	$gateways[] = 'MMEGateway';
	return $gateways;
}


add_filter( 'woocommerce_payment_gateways', 'wc_mme_add_to_gateways' );

/**
 * Adds plugin page links
 * 
 * @since 1.0.0
 * @param array $links all plugin links
 * @return array $links all plugin links + our custom links (i.e., "Settings")
 */
function wc_offline_gateway_plugin_links( $links ) {

	$plugin_links = array(
		'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout&section=mme_gateway' ) . '">' . __( 'Configure', 'wc-gateway-offline' ) . '</a>'
	);

	return array_merge( $plugin_links, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wc_offline_gateway_plugin_links' );
add_action( 'plugins_loaded', 'wc_mme_gateway_init', 11 );