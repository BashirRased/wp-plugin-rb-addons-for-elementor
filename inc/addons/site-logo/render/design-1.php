<?php
use Elementor\Group_Control_Image_Size;

$settings   = $this->get_settings_for_display();
$html_attr  = '';
$logo_html  = '';

// Default Link
if ( isset( $settings['logo_link'] ) && 'default' === $settings['logo_link'] ) {
	$this->add_render_attribute( 'logo_attr', 'href', esc_url( home_url( '/' ) ) );
	$this->add_render_attribute( 'logo_attr', 'target', '_self' );
	$this->add_render_attribute( 'logo_attr', 'rel', 'nofollow' );
	$html_attr = $this->get_render_attribute_string( 'logo_attr' );
}

// Custom Link
elseif ( isset( $settings['logo_link'], $settings['custom_link']['url'] ) && 'custom' === $settings['logo_link'] && ! empty( $settings['custom_link']['url'] ) ) {
	$this->add_link_attributes( 'logo_attr', $settings['custom_link'] );
	$html_attr = $this->get_render_attribute_string( 'logo_attr' );
}

// Default Logo (Theme Logo)
if ( isset( $settings['logo_type'] ) && 'default' === $settings['logo_type'] && has_custom_logo() ) {
	$logo_html = get_custom_logo(); // Already safe markup from WordPress core
}

// Custom Logo (Uploaded image)
elseif ( isset( $settings['logo_type'] ) && 'custom' === $settings['logo_type'] ) {
	$logo_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'site_logo_size', 'custom_logo' );
}

// Final Output
if ( ! empty( $logo_html ) ) {
	// The attributes string is generated via Elementor methods and is safe.
	// The logo HTML is passed through wp_kses_post to allow only safe HTML.
	printf(
		'<a %1$s>%2$s</a>',
		esc_attr( $html_attr ),      // Escape all HTML attributes
		wp_kses_post( $logo_html )   // Allow safe HTML in logo markup
	);
}
