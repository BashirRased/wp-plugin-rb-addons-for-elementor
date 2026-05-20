<?php
/**
 * Heading widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $this->get_settings_for_display(); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals

$prefix = $this->get_section_content_prefix( 'general' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals

if ( empty( $settings[ $prefix . '_heading' ] ) ) {
	return;
}

$this->add_render_attribute( 'heading', 'class', 'rbelad-heading__wrap' );

if ( ! empty( $settings[ $prefix . '_link' ]['url'] ) ) {
	$this->add_link_attributes( 'link', $settings[ $prefix . '_link' ] );
}

$rbelad_tag = ! empty( $settings[ $prefix . '_html_tag' ] )
	? tag_escape( $settings[ $prefix . '_html_tag' ] )
	: 'h2';

echo '<' . esc_html( $rbelad_tag ) . ' ' . $this->get_render_attribute_string( 'heading' ) . '>';

if ( ! empty( $settings[ $prefix . '_link' ]['url'] ) ) {
	echo '<a ' . $this->get_render_attribute_string( 'link' ) . '>';
}

echo wp_kses_post( $settings[ $prefix . '_heading' ] );

if ( ! empty( $settings[ $prefix . '_link' ]['url'] ) ) {
	echo '</a>';
}

echo '</' . esc_html( $rbelad_tag ) . '>';
