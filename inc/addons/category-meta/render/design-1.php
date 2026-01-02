<?php
/**
 * Category Meta widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings       = $this->get_settings_for_display();
$html           = '';
$categories     = '';
$meta_separator = '';

// Icon HTML.
$this->add_render_attribute( 'meta_icon_attr', 'class', 'rbelad-category-meta-icon' );
$meta_icon_attr = $this->get_render_attribute_string( 'meta_icon_attr' );
$meta_icon_html = '';
if ( 'img' === $settings['rbelad_category_meta_general_content_category_icon'] && ! empty( $settings['rbelad_category_meta_general_content_icon_img']['url'] ) ) {
	$meta_icon_html = '<img src="' . esc_url( $settings['rbelad_category_meta_general_content_icon_img']['url'] ) . '">';
} elseif ( 'icon' === $settings['rbelad_category_meta_general_content_category_icon'] && ! empty( $settings['rbelad_category_meta_general_content_icon_font'] ) ) {
	$meta_icon_html = rbelad_render_icon( $settings, 'icon', 'rbelad_category_meta_general_content_icon_font' );
}
$meta_icon = sprintf( '<span %1$s>%2$s</span>', $meta_icon_attr, $meta_icon_html );

// Prefix HTML.
$this->add_render_attribute( 'meta_prefix_attr', 'class', 'rbelad-category-meta-prefix' );
$meta_prefix_attr = $this->get_render_attribute_string( 'meta_prefix_attr' );
$meta_prefix_html = '';
if ( 'img' === $settings['rbelad_category_meta_general_content_category_separtor'] && ! empty( $settings['rbelad_category_meta_general_content_prefix_img']['url'] ) ) {
	$meta_prefix_html = '<img src="' . esc_url( $settings['rbelad_category_meta_general_content_prefix_img']['url'] ) . '">';
} elseif ( 'icon' === $settings['rbelad_category_meta_general_content_category_separtor'] && ! empty( $settings['rbelad_category_meta_general_content_prefix_font'] ) ) {
	$meta_prefix_html = rbelad_render_icon( $settings, 'icon', 'rbelad_category_meta_general_content_prefix_font' );
} elseif ( 'text' === $settings['rbelad_category_meta_general_content_category_separtor'] && isset( $settings['rbelad_category_meta_general_content_prefix_text'] ) ) {
	$meta_prefix_html = esc_html( $settings['rbelad_category_meta_general_content_prefix_text'] );
}
$meta_prefix = sprintf( '<span %1$s>%2$s</span>', $meta_prefix_attr, $meta_prefix_html );

$category_item = array();
$categories    = get_the_category();
if ( ! empty( $categories ) && is_array( $categories ) ) {
	foreach ( $categories as $category ) {
		// Separator HTML.
		$this->add_render_attribute( 'meta_separator_attr', 'class', 'rbelad-category-meta-separator' );
		$meta_separator_attr = $this->get_render_attribute_string( 'meta_separator_attr' );
		$meta_separator_html = '';
		if ( 'img' === $settings['rbelad_category_meta_general_content_category_separtor'] && ! empty( $settings['rbelad_category_meta_general_content_separator_img']['url'] ) ) {
			$meta_separator_html = '<img src="' . esc_url( $settings['rbelad_category_meta_general_content_separator_img']['url'] ) . '">';
		} elseif ( 'icon' === $settings['rbelad_category_meta_general_content_category_separtor'] && ! empty( $settings['rbelad_category_meta_general_content_separator_font'] ) ) {
			$meta_separator_html = rbelad_render_icon( $settings, 'icon', 'rbelad_category_meta_general_content_separator_font' );
		} elseif ( 'text' === $settings['rbelad_category_meta_general_content_category_separtor'] && isset( $settings['rbelad_category_meta_general_content_separator_text'] ) ) {
			$meta_separator_html = esc_html( $settings['rbelad_category_meta_general_content_separator_text'] );
		}
		$meta_separator = sprintf( '<span %1$s>%2$s</span>', $meta_separator_attr, $meta_separator_html );

		// Category Link Class.
		$this->add_render_attribute( 'category_link_attr', 'href', esc_url( get_category_link( $category->term_id ) ) );
		$this->add_render_attribute( 'category_link_attr', 'target', '_self' );
		$this->add_render_attribute( 'category_link_attr', 'rel', 'nofollow' );
		$this->add_render_attribute( 'category_link_attr', 'class', 'rbelad-category-meta-link' );

		// Category Text Class.
		$this->add_render_attribute( 'category_item_attr', 'class', 'rbelad-category-meta-item' );
		$category_item_attr = $this->get_render_attribute_string( 'category_item_attr' );
		$link_attr          = $this->get_render_attribute_string( 'category_link_attr' );

		$category_html = esc_html( $category->name );
		if ( isset( $settings ['rbelad_category_meta_general_content_category_link'] ) && 'default' === $settings ['rbelad_category_meta_general_content_category_link'] ) {
			$category_item[] = sprintf( '<a %1$s><span %2$s>%3$s</span></a>', $link_attr, $category_item_attr, $category_html );
		} else {
			$category_item[] = sprintf( '<span %1$s>%2$s</span>', $category_item_attr, $category_html );
		}
	}
}

// Category Wrapper HTML.
$this->add_render_attribute( 'category_wrap_attr', 'class', 'rbelad-category-meta' );
$category_attr  = $this->get_render_attribute_string( 'category_wrap_attr' );
$category_items = implode( $meta_separator, $category_item );
$category_wrap  = sprintf( '<div %1$s>%2$s</div>', $category_attr, $category_items );

// Wrapper HTML.
$this->add_render_attribute( 'meta_attr', 'class', 'rbelad-category-meta-wrapper' );
$meta_attr = $this->get_render_attribute_string( 'meta_attr' );
$meta_html = sprintf( '%1$s %2$s %3$s', $meta_icon, $meta_prefix, $category_wrap );
$html      = sprintf( '<div %1$s>%2$s</div>', $meta_attr, $meta_html );
echo wp_kses_post( $html );
