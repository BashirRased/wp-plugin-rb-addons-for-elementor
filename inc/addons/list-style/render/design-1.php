<?php
/**
 * List Style widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

// Wrapper HTML.
$html = '';
$this->add_render_attribute( 'wrapper_attr', 'class', 'rbelad-list-style' );
$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' );

$list_item_array = array();
foreach ( $settings['rbelad_list_style_general_content_list_style_repeater'] as $index => $item ) {
	// Reset variables on each loop.
	$icon_html      = '';
	$label_html     = '';
	$separator_html = '';
	$info_html      = '';

	// Create unique render attribute key for each item.
	$item_key = 'list_item_' . $index;

	// Add dynamic class per item.
	$this->add_render_attribute( $item_key, 'class', 'rbelad-list-item' );
	$this->add_render_attribute( $item_key, 'class', 'elementor-repeater-item-' . esc_attr( $item['_id'] ) );
	$item_attr = $this->get_render_attribute_string( $item_key );

	// Icon HTML.
	$this->add_render_attribute( 'item_icon_attr' . $index, 'class', 'rbelad-list-item-icon' );
	$item_icon_attr = $this->get_render_attribute_string( 'item_icon_attr' . $index );

	if ( 'yes' === $item['rbelad_list_style_general_content_icon_switch'] ) {
		if ( 'icon' === $item['rbelad_list_style_general_content_icon_type'] && ! empty( $item['rbelad_list_style_general_content_font_icon'] ) ) {
			$item_icon = rbelad_render_icon( $item, 'icon', 'rbelad_list_style_general_content_font_icon' );
			$icon_html = sprintf( '<span %1$s>%2$s</span>', $item_icon_attr, $item_icon );
		} elseif ( 'image' === $item['rbelad_list_style_general_content_icon_type'] && ! empty( $item['rbelad_list_style_general_content_icon_image']['url'] ) ) {
			$item_icon = '<img src="' . esc_url( $item['rbelad_list_style_general_content_icon_image']['url'] ) . '">';
			$icon_html = sprintf( '<span %1$s>%2$s</span>', $item_icon_attr, $item_icon );
		}
	}

	// Label HTML.
	$this->add_render_attribute( 'item_label_attr' . $index, 'class', 'rbelad-list-item-label' );
	$item_label_attr = $this->get_render_attribute_string( 'item_label_attr' . $index );
	if ( ! empty( $item['rbelad_list_style_general_content_label_text'] ) ) {
		$label_html = sprintf( '<span %1$s>%2$s</span>', $item_label_attr, $item['rbelad_list_style_general_content_label_text'] );
	}

	// Separator HTML.
	$this->add_render_attribute( 'item_separator_attr' . $index, 'class', 'rbelad-list-item-separator' );
	$item_separator_attr = $this->get_render_attribute_string( 'item_separator_attr' . $index );
	if ( 'text' === $item['rbelad_list_style_general_content_separator_type'] && ! empty( $item['rbelad_list_style_general_content_separator_text'] ) ) {
		$separator_html = sprintf( '<span %1$s>%2$s</span>', $item_separator_attr, $item['rbelad_list_style_general_content_separator_text'] );
	} elseif ( 'icon' === $item['rbelad_list_style_general_content_separator_type'] && ! empty( $item['rbelad_list_style_general_content_separator_font_icon'] ) ) {
		$separator_icon = rbelad_render_icon( $item, 'icon', 'separator_font_icon' );
		$separator_html = sprintf( '<span %1$s>%2$s</span>', $item_separator_attr, $separator_icon );
	} elseif ( 'image' === $item['rbelad_list_style_general_content_separator_type'] && ! empty( $item['rbelad_list_style_general_content_separator_icon_image']['url'] ) ) {
		$separator_icon = '<img src="' . esc_url( $item['rbelad_list_style_general_content_separator_icon_image']['url'] ) . '">';
		$separator_html = sprintf( '<span %1$s>%2$s</span>', $item_separator_attr, $separator_icon );
	}

	// Info HTML.
	$this->add_render_attribute( 'item_info_attr' . $index, 'class', 'rbelad-list-item-info' );
	$item_info_attr = $this->get_render_attribute_string( 'item_info_attr' . $index );
	if ( ! empty( $item['rbelad_list_style_general_content_info_text'] ) ) {
		$info_html = sprintf( '<span %1$s>%2$s</span>', $item_info_attr, $item['rbelad_list_style_general_content_info_text'] );
	}

	$list_item_array[] = sprintf(
		'<li %1$s>%2$s %3$s %4$s %5$s</li>',
		$item_attr,
		$icon_html,
		$label_html,
		$separator_html,
		$info_html
	);
}

$item_html = implode( '', $list_item_array );
$html      = sprintf( '<ul %1$s>%2$s</ul>', $wrapper_attr, $item_html );

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
