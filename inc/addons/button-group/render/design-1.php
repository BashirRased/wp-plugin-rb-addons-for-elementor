<?php
/**
 * Button Group widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$rbelad_btn_item_array = array();

foreach ( $settings['rbelad_button_group_general_content_repeater'] as $rbelad_index => $rbelad_item ) {

	/**
	 * --------------------------------------------------
	 * Button link handling
	 * --------------------------------------------------
	 */
	$link_type = $settings['rbelad_button_group_general_content_link_type'] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	if (
		'custom' === $link_type &&
		! empty( $settings['rbelad_button_group_general_content_custom_link']['url'] )
	) {
		$this->add_link_attributes(
			'rbelad_btn_attr',
			$settings['rbelad_button_group_general_content_custom_link']
		);
	} elseif ( 'page' === $link_type && ! empty( $settings['rbelad_button_group_general_content_page_link'] ) ) {
		$this->add_render_attribute( 'rbelad_btn_attr', 'href', esc_url( get_permalink( $settings['rbelad_button_group_general_content_page_link'] ) ) );
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
	$rbelad_btn_text = ! empty( $rbelad_item['rbelad_button_group_general_content_btn_text'] )
		? $rbelad_item['rbelad_button_group_general_content_btn_text']
		: esc_html__( 'Click Here', 'rb-addons-for-elementor' );

	$rbelad_btn_item_array[] = sprintf(
		'<a %1$s><span>%2$s</span></a>',
		$btn_attr,
		$rbelad_btn_text
	);
}

/**
 * --------------------------------------------------
 * Output
 * --------------------------------------------------
 */
$this->add_render_attribute( 'btn_wrapper', 'class', 'rbelad-button-group-widget-item-wrap' );

$rbelad_html_attr = $this->get_render_attribute_string( 'btn_wrapper' );
$rbelad_btn_item  = implode( '', $rbelad_btn_item_array );

$rbelad_html = sprintf(
	'<div %1$s>%2$s</div>',
	$rbelad_html_attr,
	$rbelad_btn_item
);

echo wp_kses_post( $rbelad_html );
