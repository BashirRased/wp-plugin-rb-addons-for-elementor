<?php
/**
 * Contact Form widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! rbelad_is_cf7_activated() ) {
	rbelad_show_plugin_missing_alert( 'Contact Forms 7' );
	return;
}
$settings = $this->get_settings_for_display();

// Remove Contact Form 7 Extra <p> tag.
add_filter( 'wpcf7_autop_or_not', '__return_false' );

if ( ! empty( $settings['rbelad_contact_form_general_content_form_id'] ) ) {
	echo do_shortcode( '[contact-form-7 id="' . esc_attr( $settings['rbelad_contact_form_general_content_form_id'] ) . '" ]' );
}
