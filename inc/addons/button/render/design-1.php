<?php
/**
 * Button widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

// Choose Design.
if ( 'style-1' === $settings['rbelad_button_general_content_choose_style'] ) {
	$this->add_render_attribute( 'rbelad_btn_attr', 'class', 'style-1' );
} elseif ( 'style-2' === $settings['rbelad_button_general_content_choose_style'] ) {
	$this->add_render_attribute( 'rbelad_btn_attr', 'class', 'style-2' );
}

if ( 'custom' === $settings['rbelad_button_general_content_link_type'] && ! empty( $settings['rbelad_button_general_content_custom_link']['url'] ) ) {
	// Button Custom Link.
	$this->add_link_attributes( 'rbelad_btn_attr', $settings['rbelad_button_general_content_custom_link'] );
	$this->add_render_attribute( 'rbelad_btn_attr', 'class', 'rbelad-btn-item' );
	$btn_attr = $this->get_render_attribute_string( 'rbelad_btn_attr' );
} elseif ( 'page' === $settings['rbelad_button_general_content_link_type'] ) {
	// Button Page Link.
	$this->add_render_attribute( 'rbelad_btn_attr', 'href', esc_url( get_permalink( $settings['rbelad_button_general_content_page_link'] ) ) );
	$this->add_render_attribute( 'rbelad_btn_attr', 'target', '_self' );
	$this->add_render_attribute( 'rbelad_btn_attr', 'rel', 'nofollow' );
	$this->add_render_attribute( 'rbelad_btn_attr', 'class', 'rbelad-btn-item' );
	$btn_attr = $this->get_render_attribute_string( 'rbelad_btn_attr' );
} else {
	// Button Without Link.
	$this->add_render_attribute( 'rbelad_btn_attr', 'class', 'rbelad-btn-item' );
	$btn_attr = $this->get_render_attribute_string( 'rbelad_btn_attr' );
}

// Button Text.
$btn_text = '';
if ( ! empty( $settings['rbelad_button_general_content_btn_text'] ) ) {
	$btn_text = $settings['rbelad_button_general_content_btn_text'];
}

// Button HTML.
$btn_item = sprintf( '<button %1$s><span>%2$s</span></button>', $btn_attr, $btn_text );

// Button Wrap.
$html = '';
$this->add_render_attribute( 'btn_wrapper', 'class', 'rbelad-btn-item-wrap' );
$html_attr = $this->get_render_attribute_string( 'btn_wrapper' );
$html      = sprintf( '<div %1$s>%2$s</div>', $html_attr, $btn_item );
echo wp_kses_post( $html );
