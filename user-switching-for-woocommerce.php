<?php
/**
 * Plugin Name: User Switching for WooCommerce
 * Description: Extends User Switching to load WooCommerce switched user cart contents.
 *
 * Version: 1.0
 *
 * Author: Plugin Territory
 * Author URI: https://pluginterritory.com/
 *
 * WC requires at least: 3.0
 * WC tested up to: 4.2
 *
 * Copyright: 2020 Plugin Territory
 * License: GNU General Public License v2.0 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 */

// Get our actions hooked
add_action( 'plugins_loaded', 'pt_wcus_init' );

function pt_wcus_init() {

	add_action( 'switch_to_user',   'pt_wcus_load_user_cart', 10 , 1 );
	add_action( 'switch_back_user', 'pt_wcus_load_user_cart', 10 , 1 );

}

// maybe load user cart
function pt_wcus_load_user_cart( $user_id ) {

	$user = get_userdata( $user_id );

	if ( ! $user ) {
	
		return;
	
	}

	// clear current cart
	wc_empty_cart();

	// load user cart
	wc_load_persistent_cart( '', $user );

}
