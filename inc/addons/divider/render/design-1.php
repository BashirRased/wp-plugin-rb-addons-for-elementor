<?php
/**
 * Divider widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$html = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$this->add_render_attribute( 'divider_attr', 'class', 'rbelad-divider-widget-container' );
$divider_attr = $this->get_render_attribute_string( 'divider_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$this->add_render_attribute( 'divider_span_attr', 'class', 'rbelad-divider-widget' );
$divider_span_attr = $this->get_render_attribute_string( 'divider_span_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$html              = sprintf( '<div %1$s><span %2$s></span></div>', $divider_attr, $divider_span_attr ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
echo wp_kses_post( $html );
