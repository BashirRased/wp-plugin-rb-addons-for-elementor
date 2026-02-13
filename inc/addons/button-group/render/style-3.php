<?php
/**
 * Button Group widget output - Style 03.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $settings;
global $design_choose;
global $link_type;
global $btn_attr;

$rbelad_btn_item_array = array();

foreach ( $settings['rbelad_button_group_general_content_repeater'] as $rbelad_index => $rbelad_item ) {

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
