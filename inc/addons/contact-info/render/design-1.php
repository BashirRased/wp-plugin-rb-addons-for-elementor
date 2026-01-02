<?php
/**
 * Contact Info widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

$html            = '';
$item_html_array = array();
foreach ( $settings['rbelad_contact_info_general_content_contact_info_repeater'] as $index => $item ) {
	// Reset variables each loop.
	$icon       = '';
	$info_title = '';
	$text       = '';

	// Create unique render attribute key for each item.
	$item_key       = 'item_attr_' . $index;
	$icon_key       = 'icon_attr_' . $index;
	$info_title_key = 'title_attr_' . $index;
	$text_key       = 'text_attr_' . $index;

	// Add dynamic classes.
	$this->add_render_attribute(
		$item_key,
		'class',
		array(
			'rbelad-contact-info-item',
			'elementor-repeater-item-' . esc_attr( $item['_id'] ),
		)
	);
	$this->add_render_attribute( $icon_key, 'class', 'rbelad-contact-info-icon' );
	$this->add_render_attribute( $info_title_key, 'class', 'rbelad-contact-info-title' );
	$this->add_render_attribute( $text_key, 'class', 'rbelad-contact-info-text' );

	$item_attr = $this->get_render_attribute_string( $item_key );

	// Icon HTML.
	if ( 'yes' === $item['rbelad_contact_info_general_content_show_icon'] && 'image' === $item['rbelad_contact_info_general_content_icon_type'] && isset( $item['rbelad_contact_info_general_content_icon_image']['url'] ) && ! empty( $item['rbelad_contact_info_general_content_icon_image']['url'] ) ) {
		$icon_attr = $this->get_render_attribute_string( $icon_key );
		$icon_html = '<img src="' . esc_url( $item['rbelad_contact_info_general_content_icon_image']['url'] ) . '">';
		$icon      = sprintf( '<span %1$s>%2$s</span>', $icon_attr, $icon_html );
	} elseif ( 'yes' === $item['rbelad_contact_info_general_content_show_icon'] && 'icon' === $item['rbelad_contact_info_general_content_icon_type'] && isset( $item['rbelad_contact_info_general_content_font_icon'] ) && ! empty( $item['rbelad_contact_info_general_content_font_icon'] ) ) {
		$icon_attr = $this->get_render_attribute_string( $icon_key );
		$icon_html = rbelad_render_icon( $item, 'icon', 'rbelad_contact_info_general_content_font_icon' );
		$icon      = sprintf( '<span %1$s>%2$s</span>', $icon_attr, $icon_html );
	}

	// Title HTML.
	if ( ! empty( $item['rbelad_contact_info_general_content_info_title'] ) ) {
		$info_title_attr = $this->get_render_attribute_string( $info_title_key );
		$info_title      = sprintf( '<h5 %1$s>%2$s</h5>', $info_title_attr, esc_html( $item['rbelad_contact_info_general_content_info_title'] ) );
	}

	// Info Text HTML.
	if ( ! empty( $item['rbelad_contact_info_general_content_info_text'] ) ) {
		$text_attr = $this->get_render_attribute_string( $text_key );
		$text      = sprintf( '<p %1$s>%2$s</p>', $text_attr, rbelad_kses_basic( $item['rbelad_contact_info_general_content_info_text'] ) );
	}

	$item_html_array[] = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $item_attr, $icon, $info_title, $text );
}
$item_html = implode( '', $item_html_array );

// Wrap HTML.
$this->add_render_attribute( 'wrap_attr', 'class', 'rbelad-contact-info' );
$wrap_attr = $this->get_render_attribute_string( 'wrap_attr' );
$html      = sprintf( '<div %1$s>%2$s</div>', $wrap_attr, $item_html );

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
