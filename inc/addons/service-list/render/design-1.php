<?php
/**
 * Service List widget output.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Utils;
$settings = $this->get_settings_for_display();

// Empty Variables.
$html       = '';
$item       = '';
$item_hover = '';

// Icon HTML.
$this->add_render_attribute( 'service_icon', 'class', 'rbelad-service-icon' );
$icon_attr = $this->get_render_attribute_string( 'service_icon' );
$icon_html = '';
if ( 'img' === $settings['rbelad_service_list_general_content_icon_type'] && ! empty( $settings['rbelad_service_list_general_content_image_icon']['url'] ) ) {
	$icon_html = '<img src="' . esc_url( $settings['rbelad_service_list_general_content_image_icon']['url'] ) . '">';
} elseif ( 'icon' === $settings['rbelad_service_list_general_content_icon_type'] && ! empty( $settings['rbelad_service_list_general_content_font_icon'] ) ) {
	$icon_html = rbelad_render_icon( $settings, 'icon', 'rbelad_service_list_general_content_font_icon' );
}
$icon = sprintf( '<div %1$s>%2$s</div>', $icon_attr, $icon_html );

// Title HTML.
$service_title_attr = '';
$service_title_html = '';
$html_tag           = Utils::validate_html_tag( $settings['rbelad_service_list_general_content_html_tag'] );
if ( isset( $settings ['rbelad_service_list_general_content_servie_title'] ) ) {
	$this->add_render_attribute( 'service_title', 'class', 'rbelad-service-title' );
	$service_title_attr = $this->get_render_attribute_string( 'service_title' );
	$service_title_html = $settings ['rbelad_service_list_general_content_servie_title'];
}
$service_title = sprintf( '<%1$s %2$s>%3$s</%1$s>', $html_tag, $service_title_attr, $service_title_html );

// Description HTML.
$description_attr = '';
$description_html = '';
if ( isset( $settings ['rbelad_service_list_general_content_servie_description'] ) ) {
	$this->add_render_attribute( 'service_description', 'class', 'rbelad-service-description' );
	$description_attr = $this->get_render_attribute_string( 'service_description' );
	$description_html = $settings ['rbelad_service_list_general_content_servie_description'];
}
$description = sprintf( '<p %1$s>%2$s</p>', $description_attr, $description_html );

if ( 'style-1' === $settings['rbelad_service_list_general_content_service_style'] ) :
	// Item Wrap Class.
	$this->add_render_attribute( 'service_item_wrap', 'class', 'rbelad-service-item-wrap' );
	$this->add_render_attribute( 'service_item_wrap', 'class', 'style-1' );
	$wrap_attr = $this->get_render_attribute_string( 'service_item_wrap' );

	// Service Item.
	$this->add_render_attribute( 'service_item', 'class', 'rbelad-service-item' );
	$item_attr = $this->get_render_attribute_string( 'service_item' );
	$item      = sprintf( '<div %1$s>%2$s %3$s</div>', $item_attr, $icon, $service_title );

	// Service Item Hover.
	$this->add_render_attribute( 'service_item_hover', 'class', 'rbelad-service-item-hover' );
	$item_hover_attr = $this->get_render_attribute_string( 'service_item_hover' );
	$item_hover      = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $item_hover_attr, $icon, $service_title, $description );

elseif ( 'style-2' === $settings['rbelad_service_list_general_content_service_style'] ) :
	// Item Wrap Class.
	$this->add_render_attribute( 'service_item_wrap', 'class', 'rbelad-service-item-wrap' );
	$this->add_render_attribute( 'service_item_wrap', 'class', 'style-2' );
	$wrap_attr = $this->get_render_attribute_string( 'service_item_wrap' );

	// Service Item.
	$this->add_render_attribute( 'service_item', 'class', 'rbelad-service-item' );
	$item_attr = $this->get_render_attribute_string( 'service_item' );
	$item      = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $item_attr, $icon, $service_title, $description );

	// Service Item Hover.
	$this->add_render_attribute( 'service_item_hover', 'class', 'rbelad-service-item-hover' );
	$item_hover_attr = $this->get_render_attribute_string( 'service_item_hover' );
	$item_hover      = sprintf( '<div %1$s></div>', $item_hover_attr );
endif;

// Wrapper HTML.
$html = sprintf( '<div %1$s>%2$s %3$s</div>', $wrap_attr, $item, $item_hover );

/** WP kses allowed tags */
$allowed_tags = wp_kses_allowed_html( 'post' );

// Allow SVG + Font Awesome attributes.
$allowed_tags['svg']  = array(
	'class'       => true,
	'aria-hidden' => true,
	'role'        => true,
	'xmlns'       => true,
	'width'       => true,
	'height'      => true,
	'viewbox'     => true, // note: lowercase here.
	'fill'        => true,
);
$allowed_tags['path'] = array(
	'd'    => true,
	'fill' => true,
);

// Echo with custom allowed tags.
echo wp_kses( $html, $allowed_tags );
