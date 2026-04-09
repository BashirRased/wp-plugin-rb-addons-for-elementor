<?php
/**
 * Button widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

/**
 * --------------------------------------------------
 * Button link handling
 * --------------------------------------------------
 */
$link_type = $settings['rbelad_button_general_content_link_type'] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

if (
	'custom' === $link_type &&
	! empty( $settings['rbelad_button_general_content_custom_link']['url'] )
) {
	$this->add_link_attributes(
		'rbelad_btn_attr',
		$settings['rbelad_button_general_content_custom_link']
	);
} elseif ( 'page' === $link_type && ! empty( $settings['rbelad_button_general_content_page_link'] ) ) {
	$this->add_render_attribute( 'rbelad_btn_attr', 'href', esc_url( get_permalink( $settings['rbelad_button_general_content_page_link'] ) ) );
	$this->add_render_attribute( 'rbelad_btn_attr', 'target', '_self' );
	$this->add_render_attribute( 'rbelad_btn_attr', 'rel', 'nofollow' );
}

/**
 * --------------------------------------------------
 * Button attribute handling
 * --------------------------------------------------
 */
$this->add_render_attribute(
	'rbelad_btn_attr',
	'class',
	'rbelad-button-widget-item'
);

$btn_attr = $this->get_render_attribute_string( 'rbelad_btn_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

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
