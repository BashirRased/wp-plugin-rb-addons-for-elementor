<?php
/**
 * Section Header widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Utils;
$settings       = $this->get_settings_for_display();
$general_prefix = $this->get_section_prefix( 'content_section_general_' );

// Subtitle.
$subtitle_html = '';
$this->add_render_attribute( 'subtitle_attr', 'class', 'rbelad-section-subtitle' );
$subtitle_attr = $this->get_render_attribute_string( 'subtitle_attr' );
if ( 'yes' === $settings['rbelad_section_header_subtitle_content_switch'] && ! empty( $settings['rbelad_section_header_subtitle_content_text'] ) ) {
	$subtitle_text = $settings['rbelad_section_header_subtitle_content_text'];
	$subtitle_html = sprintf( '<span %1$s>%2$s</span>', $subtitle_attr, $subtitle_text );
}

// Title Before.
$title_before_html = '';
$this->add_render_attribute( 'title_before_attr', 'class', 'rbelad-section-title-before' );
$title_before_attr = $this->get_render_attribute_string( 'title_before_attr' );
if ( 'yes' === $settings['rbelad_section_header_title_before_content_switch'] ) {
	$title_before_html = sprintf( '<span %1$s></span>', $title_before_attr );
}

// Title Highlight.
$this->add_render_attribute( 'title_highlight_attr', 'class', 'rbelad-section-title-highlight' );
$title_highlight_attr = $this->get_render_attribute_string( 'title_highlight_attr' );

// Title Text Repeater.
$title_item_array = array();
foreach ( $settings['rbelad_section_header_title_content_list'] as $item ) {
	if ( isset( $item['rbelad_section_header_title_content_text'] ) && ! empty( $item['rbelad_section_header_title_content_text'] ) ) {
		$title_text = $item['rbelad_section_header_title_content_text'];
		if ( isset( $item['rbelad_section_header_title_content_show'] ) && 'yes' === $item['rbelad_section_header_title_content_show'] ) {
			$title_item_array[] = sprintf( '<span %1$s>%2$s</span>', $title_highlight_attr, $title_text );
		} else {
			$title_item_array[] = sprintf( '%1$s', $title_text );
		}
	}
}

// Title Separator.
$title_separator_html = '';
$icon_type_class      = 'triangle';
if ( 'circle' === $settings['rbelad_section_header_title_separator_content_icon_shape'] ) {
	$icon_type_class = 'circle';
} elseif ( 'square' === $settings['rbelad_section_header_title_separator_content_icon_shape'] ) {
	$icon_type_class = 'square';
}
$this->add_render_attribute( 'title_separator_attr', 'class', 'rbelad-section-title-separator' );
$this->add_render_attribute( 'title_separator_attr', 'class', $icon_type_class );
$title_separator_attr = $this->get_render_attribute_string( 'title_separator_attr' );
if ( 'yes' === $settings['rbelad_section_header_title_separator_content_switch'] ) {
	$title_separator_html = sprintf( '<span %1$s></span>', $title_separator_attr );
}

// Title Wrapper.
$title_html = '';
$this->add_render_attribute( 'title_wrapper_attr', 'class', 'rbelad-section-title-wrapper' );
$title_wrapper_attr = $this->get_render_attribute_string( 'title_wrapper_attr' );
$html_tag           = Utils::validate_html_tag( $settings['rbelad_section_header_title_content_heading_tag'] );
$this->add_render_attribute( 'title_attr', 'class', 'rbelad-section-title' );
$title_attr = $this->get_render_attribute_string( 'title_attr' );
$title_item = implode( ' ', $title_item_array );
if ( 'style-1' === $settings[ $general_prefix . 'style' ] ) {
	$title_html = sprintf( '<div %1$s><%2$s %3$s>%4$s %5$s %6$s</%2$s></div>', $title_wrapper_attr, $html_tag, $title_attr, $title_before_html, $title_item, $title_separator_html );
} elseif ( 'style-2' === $settings[ $general_prefix . 'style' ] ) {
	$title_html = sprintf( '<div %1$s><%2$s %3$s>%4$s</%2$s></div>', $title_wrapper_attr, $html_tag, $title_attr, $title_item );
}

// Description.
$description_html = '';
$this->add_render_attribute( 'description_attr', 'class', 'rbelad-section-description' );
$description_attr = $this->get_render_attribute_string( 'description_attr' );
if ( 'yes' === $settings['rbelad_section_header_description_content_switch'] && ! empty( $settings['rbelad_section_header_description_content_text'] ) ) {
	$description_text = $settings['rbelad_section_header_description_content_text'];
	$description_html = sprintf( '<p %1$s>%2$s</p>', $description_attr, $description_text );
}

// Wrapper HTML.
$html = '';
$this->add_render_attribute( 'wrapper_attr', 'class', 'rbelad-section-header' );
if ( 'style-1' === $settings[ $general_prefix . 'style' ] ) {
	$this->add_render_attribute( 'wrapper_attr', 'class', 'style-1' );
} elseif ( 'style-2' === $settings[ $general_prefix . 'style' ] ) {
	$this->add_render_attribute( 'wrapper_attr', 'class', 'style-2' );
}
$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' );
if ( 'style-1' === $settings[ $general_prefix . 'style' ] ) {
	$html = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $wrapper_attr, $subtitle_html, $title_html, $description_html );
} elseif ( 'style-2' === $settings[ $general_prefix . 'style' ] ) {
	$html = sprintf( '<div %1$s>%2$s %3$s %4$s %5$s %6$s</div>', $wrapper_attr, $subtitle_html, $title_html, $description_html, $title_before_html, $title_separator_html );
}
echo wp_kses_post( $html );
