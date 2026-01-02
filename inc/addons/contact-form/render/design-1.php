<?php
if ( ! rb_is_cf7_activated() ) {
	rb_show_plugin_missing_alert( 'Contact Forms 7' );
	return;
}
$settings = $this->get_settings_for_display();

// Remove Contact Form 7 Extra <p> tag
add_filter( 'wpcf7_autop_or_not', '__return_false' );

if ( ! empty( $settings['form_id'] ) ) {
	echo do_shortcode( '[contact-form-7 id="' . esc_attr( $settings['form_id'] ) . '" ]' );
}