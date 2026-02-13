<?php
/**
 * Button widget output - Style 01.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $settings; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
global $design_choose; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
global $link_type; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
global $btn_attr; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

/**
 * --------------------------------------------------
 * Button text
 * --------------------------------------------------
 */
$btn_text = ! empty( $settings['rbelad_button_general_content_btn_text'] )
	? $settings['rbelad_button_general_content_btn_text']
	: esc_html__( 'Click Here', 'rb-addons-for-elementor' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

/**
 * --------------------------------------------------
 * Output
 * --------------------------------------------------
 */
$this->add_render_attribute( 'btn_wrapper', 'class', 'rbelad-button-widget-item-wrap' );
$html_attr = $this->get_render_attribute_string( 'btn_wrapper' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

printf(
	'<div %1$s><a %2$s><span>%3$s</span></a></div>',
	wp_kses_post( $html_attr ),
	wp_kses_post( $btn_attr ),
	esc_html( $btn_text )
);
