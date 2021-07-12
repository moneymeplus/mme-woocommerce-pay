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


function wc_mme_add_to_gateways( $gateways ) {
	$gateways[] = 'MMEGateway';
	return $gateways;
}


add_filter( 'woocommerce_payment_gateways', 'wc_mme_add_to_gateways' );
add_action( 'plugins_loaded', 'wc_mme_gateway_init', 11 );