<?php
/**
 * Admin Home Page Template
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$home_img = RBELAD_ASSETS . 'img/home-image.png';

echo '<div class="wrap">
	<h2>Welcome to RB Addons Dashboard</h2>
	<img src="' . esc_url( $home_img ) . '" alt="' . esc_attr__( 'Dashboard Image', 'rb-elementor-addons' ) . '" class="rbelad-dashboard-img">
</div>';
