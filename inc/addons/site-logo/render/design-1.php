<?php
/**
 * Site Logo widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Group_Control_Image_Size;

$settings  = $this->get_settings_for_display();
$html_attr = '';
$logo_html = '';

if ( isset( $settings['rbelad_site_logo_general_content_logo_link'] ) && 'default' === $settings['rbelad_site_logo_general_content_logo_link'] ) {
	// Default Link.
	$this->add_render_attribute( 'logo_attr', 'href', esc_url( home_url( '/' ) ) );
	$this->add_render_attribute( 'logo_attr', 'target', '_self' );
	$this->add_render_attribute( 'logo_attr', 'rel', 'nofollow' );
	$html_attr = $this->get_render_attribute_string( 'logo_attr' );
} elseif ( isset( $settings['rbelad_site_logo_general_content_logo_link'], $settings['rbelad_site_logo_general_content_custom_link']['url'] ) && 'custom' === $settings['rbelad_site_logo_general_content_logo_link'] && ! empty( $settings['rbelad_site_logo_general_content_custom_link']['url'] ) ) {
	// Custom Link.
	$this->add_link_attributes( 'logo_attr', $settings['rbelad_site_logo_general_content_custom_link'] );
	$html_attr = $this->get_render_attribute_string( 'logo_attr' );
}


if ( isset( $settings['rbelad_site_logo_general_content_logo_type'] ) && 'default' === $settings['rbelad_site_logo_general_content_logo_type'] && has_custom_logo() ) {
	// Default Logo (Theme Logo).
	$logo_html = get_custom_logo(); // Already safe markup from WordPress core.
} elseif ( isset( $settings['rbelad_site_logo_general_content_logo_type'] ) && 'custom' === $settings['rbelad_site_logo_general_content_logo_type'] ) {
	// Custom Logo (Uploaded image).
	$logo_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'rbelad_site_logo_general_content_site_logo_size', 'rbelad_site_logo_general_content_custom_logo' );
}

// Final Output.
if ( ! empty( $logo_html ) ) {
	// The attributes string is generated via Elementor methods and is safe.
	// The logo HTML is passed through wp_kses_post to allow only safe HTML.
	printf(
		'<a %1$s>%2$s</a>',
		esc_attr( $html_attr ),      // Escape all HTML attributes.
		wp_kses_post( $logo_html )   // Allow safe HTML in logo markup.
	);
}
