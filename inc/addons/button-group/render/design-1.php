<?php
/**
 * Button Group widget output.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

// HTML Class.
$this->add_render_attribute( 'btn_wrapper', 'class', 'rbelad-button-group' );

// Button Loop.
$btn_item_array = array();
$btn_text       = '';
foreach ( $settings['rbelad_button_group_general_content_repeater'] as $index => $item ) {
	// Create unique render attribute key for each item.
	$item_key = 'btn_item_' . $index;

	// Choose Design.
	if ( 'style-1' === $settings['rbelad_button_group_general_content_choose_style'] ) {
		$this->add_render_attribute( $item_key, 'class', 'style-1' );
	} elseif ( 'style-2' === $settings['rbelad_button_group_general_content_choose_style'] ) {
		$this->add_render_attribute( $item_key, 'class', 'style-2' );
	}

	// Button Text.
	if ( ! empty( $item['rbelad_button_group_general_content_btn_text'] ) ) {
		$btn_text = $item['rbelad_button_group_general_content_btn_text'];
	}

	if ( 'custom' === $item['rbelad_button_group_general_content_link_type'] && ! empty( $item['rbelad_button_group_general_content_custom_link']['url'] ) ) {
		// Add dynamic class per item.
		$this->add_link_attributes( $item_key, $item['rbelad_button_group_general_content_custom_link'] );
		$this->add_render_attribute( $item_key, 'class', 'rbelad-btn-item' );
		$this->add_render_attribute( $item_key, 'class', 'elementor-repeater-item-' . esc_attr( $item['_id'] ) );

		// Get final class attribute for this item.
		$item_attr = $this->get_render_attribute_string( $item_key );

		// Build item HTML.
		$btn_item_array[] = sprintf( '<a %1$s><span>%2$s</span></a>', $item_attr, $btn_text );
	} elseif ( 'page' === $item['rbelad_button_group_general_content_link_type'] ) {
		// Add dynamic class per item.
		$this->add_render_attribute( $item_key, 'href', esc_url( get_permalink( $settings['rbelad_button_group_general_content_page_link'] ) ) );
		$this->add_render_attribute( $item_key, 'target', '_self' );
		$this->add_render_attribute( $item_key, 'rel', 'nofollow' );
		$this->add_render_attribute( $item_key, 'class', 'rbelad-btn-item' );
		$this->add_render_attribute( $item_key, 'class', 'elementor-repeater-item-' . esc_attr( $item['_id'] ) );

		// Get final class attribute for this item.
		$item_attr = $this->get_render_attribute_string( $item_key );

		// Build item HTML.
		$btn_item_array[] = sprintf( '<a %1$s><span>%2$s</span></a>', $item_attr, $btn_text );
	} else {
		// Add dynamic class per item.
		$this->add_render_attribute( $item_key, 'class', 'rbelad-btn-item' );
		$this->add_render_attribute( $item_key, 'class', 'elementor-repeater-item-' . esc_attr( $item['_id'] ) );

		// Get final class attribute for this item.
		$item_attr = $this->get_render_attribute_string( $item_key );

		// Build item HTML.
		$btn_item_array[] = sprintf( '<button %1$s><span>%2$s</span></button>', $item_attr, $btn_text );
	}
}

// HTML.
$html      = '';
$html_attr = $this->get_render_attribute_string( 'btn_wrapper' );
$btn_item  = implode( '', $btn_item_array );
$html      = sprintf( '<div %1$s>%2$s</div>', $html_attr, $btn_item );
echo wp_kses_post( $html );
