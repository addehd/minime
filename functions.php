<?php 

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}

function wp_nav_menu_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'wp_nav_menu_attributes_filter', 100, 1);


/**
  * Edit my account menu order
  */

function my_account_menu_order() {
	$menuOrder = array(
		// 'orders'             => __( 'Your Orders', 'woocommerce' ),
		'profile'             => __( 'Din Grafiska Profil', 'woocommerce' ),
		// 'downloads'          => __( 'Download', 'woocommerce' ),
		// 'edit-address'       => __( 'Addresses', 'woocommerce' ),
		'edit-account'    	=> __( 'Account Details', 'woocommerce' ),
		'customer-logout'    => __( 'Logout', 'woocommerce' )
	// 'dashboard'          => __( 'Dashboard', 'woocommerce' )
	);
	return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


/**
* Register new endpoints to use inside My Account page.
*/

add_action( 'init', 'my_account_new_endpoints' );
function my_account_new_endpoints() {
	add_rewrite_endpoint( 'profile', EP_ROOT | EP_PAGES );
}

/**
* Get new endpoint content
*/

// profile
add_action( 'woocommerce_account_profile_endpoint', 'profile_endpoint_content' );
function profile_endpoint_content() {
   get_template_part('profiles');
}