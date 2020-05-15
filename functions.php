<?php 

function scripts() {
  // wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', NULL, 1.0, true);

  // wp_localize_script('main_js', 'wpdata', array(
  //   'nonce'=> wp_create_nonce('wp_rest')
  // ));

  wp_enqueue_script('app_js', get_template_directory_uri() . '/js/app.js', NULL, 1.0, true);  

  wp_enqueue_script('post_js', get_template_directory_uri() . '/js/post.js', NULL, 1.0, true);

  wp_localize_script('post_js', 'wpdata', array(
    'nonce'=> wp_create_nonce('wp_rest')
  ));

}
//add_action('wp_enqueue_scripts', 'scripts');

function headinfo() {
  echo '<link rel="stylesheet" href="/wp-content/themes/minime/style.css">'; 
}

add_action('wp_head', 'headinfo');


// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

 /**
 Remove all possible fields
 **/
function wc_remove_checkout_fields( $fields ) {

    // Billing fields
    unset( $fields['billing']['billing_company'] );
	  unset( $fields['billing']['billing_country'] );
    //unset( $fields['billing']['billing_email'] );
    //unset( $fields['billing']['billing_phone'] );
    unset( $fields['billing']['billing_state'] );
    //unset( $fields['billing']['billing_first_name'] );
    unset( $fields['billing']['billing_last_name'] );
    //unset( $fields['billing']['billing_address_1'] );
    unset( $fields['billing']['billing_address_2'] );
    unset( $fields['billing']['billing_city'] );
    //unset( $fields['billing']['billing_postcode'] );

    // Shipping fields
    unset( $fields['shipping']['shipping_company'] );
    unset( $fields['shipping']['shipping_phone'] );
    unset( $fields['shipping']['shipping_state'] );
    unset( $fields['shipping']['shipping_first_name'] );
    unset( $fields['shipping']['shipping_last_name'] );
    unset( $fields['shipping']['shipping_address_1'] );
    unset( $fields['shipping']['shipping_address_2'] );
    unset( $fields['shipping']['shipping_city'] );
    unset( $fields['shipping']['shipping_postcode'] );

    // Order fields
    unset( $fields['order']['order_comments'] );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_theme_support( 'post-thumbnails' );

function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

function wp_nav_menu_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'wp_nav_menu_attributes_filter', 100, 1);

function clean_header () {

    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
    remove_action('wp_head', 'wp_generator'); // remove wordpress version

    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 ); // remove shortlink

    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  // remove emojis
    remove_action( 'wp_print_styles', 'print_emoji_styles' );   // remove emojis

    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // remove the / and previous post links

    remove_action('wp_head', 'feed_links', 2); // remove rss feed links
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); // remove the REST API link
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // remove oEmbed discovery links
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 ); // remove the REST API link from HTTP Headers

    remove_action( 'wp_head', 'wp_oembed_add_host_js' ); // remove oEmbed-specific javascript from front-end / back-end

    remove_action('rest_api_init', 'wp_oembed_register_route'); // remove the oEmbed REST API route
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10); // don't filter oEmbed results

    remove_action('wp_head', 'wp_resource_hints', 2);
}

add_action('after_setup_theme', 'clean_header');