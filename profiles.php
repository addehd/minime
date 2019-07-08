<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$current_user = wp_get_current_user();	

$filename = 'wp-content/themes/minime/profiles/' . $current_user->ID;

if (file_exists($filename)) {
    include "profiles/". $current_user->ID . "/profile-page.php"; 
} else {
    include "profiles/coming-soon.php";
}
?>

<p><?php
	printf(
		__( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a> and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
?></p>