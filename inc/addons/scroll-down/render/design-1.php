<?php
/**
 * Scroll Down widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Wrapper HTML.
$html         = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

if ( 'custom' === $settings['rbelad_scroll_down_general_content_link_type'] && ! empty( $settings['rbelad_scroll_down_general_content_custom_link']['url'] ) ) {
	// Button Custom Link.
	$this->add_link_attributes( 'wrapper_attr', $settings['rbelad_scroll_down_general_content_custom_link'] );
	$this->add_render_attribute( 'wrapper_attr', 'class', 'rbelad-scroll-down-widget' );
	$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
} elseif ( 'page' === $settings['rbelad_scroll_down_general_content_link_type'] ) {
	// Button Page Link.
	$this->add_render_attribute( 'wrapper_attr', 'href', esc_url( get_permalink( $settings['rbelad_scroll_down_general_content_page_link'] ) ) );
	$this->add_render_attribute( 'wrapper_attr', 'target', '_self' );
	$this->add_render_attribute( 'wrapper_attr', 'rel', 'nofollow' );
	$this->add_render_attribute( 'wrapper_attr', 'class', 'rbelad-scroll-down-widget' );
	$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
}

$html = sprintf( '<a %1$s></a>', $wrapper_attr ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
echo wp_kses_post( $html );
