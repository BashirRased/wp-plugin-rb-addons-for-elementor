<?php
/**
 * Tag Meta widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings       = $this->get_settings_for_display();
$html           = '';
$tags           = '';
$meta_separator = '';

// Icon HTML.
$this->add_render_attribute( 'meta_icon_attr', 'class', 'rbelad-tag-meta-icon' );
$meta_icon_attr = $this->get_render_attribute_string( 'meta_icon_attr' );
$meta_icon_html = '';
if ( 'img' === $settings['rbelad_tag_meta_general_content_tag_icon'] && ! empty( $settings['rbelad_tag_meta_general_content_icon_img']['url'] ) ) {
	$meta_icon_html = '<img src="' . esc_url( $settings['rbelad_tag_meta_general_content_icon_img']['url'] ) . '">';
} elseif ( 'icon' === $settings['rbelad_tag_meta_general_content_tag_icon'] && ! empty( $settings['rbelad_tag_meta_general_content_icon_font'] ) ) {
	$meta_icon_html = rbelad_render_icon( $settings, 'icon', 'rbelad_tag_meta_general_content_icon_font' );
}
$meta_icon = sprintf( '<span %1$s>%2$s</span>', $meta_icon_attr, $meta_icon_html );

// Prefix HTML.
$this->add_render_attribute( 'meta_prefix_attr', 'class', 'rbelad-tag-meta-prefix' );
$meta_prefix_attr = $this->get_render_attribute_string( 'meta_prefix_attr' );
$meta_prefix_html = '';
if ( 'img' === $settings['rbelad_tag_meta_general_content_tag_separtor'] && ! empty( $settings['rbelad_tag_meta_general_content_prefix_img']['url'] ) ) {
	$meta_prefix_html = '<img src="' . esc_url( $settings['rbelad_tag_meta_general_content_prefix_img']['url'] ) . '">';
} elseif ( 'icon' === $settings['rbelad_tag_meta_general_content_tag_separtor'] && ! empty( $settings['rbelad_tag_meta_general_content_prefix_font'] ) ) {
	$meta_prefix_html = rbelad_render_icon( $settings, 'icon', 'rbelad_tag_meta_general_content_prefix_font' );
} elseif ( 'text' === $settings['rbelad_tag_meta_general_content_tag_separtor'] && isset( $settings['rbelad_tag_meta_general_content_prefix_text'] ) ) {
	$meta_prefix_html = esc_html( $settings['rbelad_tag_meta_general_content_prefix_text'] );
}
$meta_prefix = sprintf( '<span %1$s>%2$s</span>', $meta_prefix_attr, $meta_prefix_html );

$tag_item = array();
$tags     = get_the_tags();
if ( ! empty( $tags ) && is_array( $tags ) ) {
	foreach ( $tags as $tag_meta ) {
		// Separator HTML.
		$this->add_render_attribute( 'meta_separator_attr', 'class', 'rbelad-tag-meta-separator' );
		$meta_separator_attr = $this->get_render_attribute_string( 'meta_separator_attr' );
		$meta_separator_html = '';
		if ( 'img' === $settings['rbelad_tag_meta_general_content_tag_separtor'] && ! empty( $settings['rbelad_tag_meta_general_content_separator_img']['url'] ) ) {
			$meta_separator_html = '<img src="' . esc_url( $settings['rbelad_tag_meta_general_content_separator_img']['url'] ) . '">';
		} elseif ( 'icon' === $settings['rbelad_tag_meta_general_content_tag_separtor'] && ! empty( $settings['rbelad_tag_meta_general_content_separator_font'] ) ) {
			$meta_separator_html = rbelad_render_icon( $settings, 'icon', 'rbelad_tag_meta_general_content_separator_font' );
		} elseif ( 'text' === $settings['rbelad_tag_meta_general_content_tag_separtor'] && isset( $settings['rbelad_tag_meta_general_content_separator_text'] ) ) {
			$meta_separator_html = esc_html( $settings['rbelad_tag_meta_general_content_separator_text'] );
		}
		$meta_separator = sprintf( '<span %1$s>%2$s</span>', $meta_separator_attr, $meta_separator_html );

		// Tag Link Class.
		$this->add_render_attribute( 'tag_link_attr', 'href', esc_url( get_tag_link( $tag_meta->term_id ) ) );
		$this->add_render_attribute( 'tag_link_attr', 'target', '_self' );
		$this->add_render_attribute( 'tag_link_attr', 'rel', 'nofollow' );
		$this->add_render_attribute( 'tag_link_attr', 'class', 'rbelad-tag-meta-link' );

		// Tag Text Class.
		$this->add_render_attribute( 'tag_item_attr', 'class', 'rbelad-tag-meta-item' );
		$tag_item_attr = $this->get_render_attribute_string( 'tag_item_attr' );
		$link_attr     = $this->get_render_attribute_string( 'tag_link_attr' );

		$tag_html = esc_html( $tag_meta->name );
		if ( isset( $settings ['rbelad_tag_meta_general_content_tag_link'] ) && 'default' === $settings ['rbelad_tag_meta_general_content_tag_link'] ) {
			$tag_item[] = sprintf( '<a %1$s><span %2$s>%3$s</span></a>', $link_attr, $tag_item_attr, $tag_html );
		} else {
			$tag_item[] = sprintf( '<span %1$s>%2$s</span>', $tag_item_attr, $tag_html );
		}
	}
}

// Tag Wrapper HTML.
$this->add_render_attribute( 'tag_wrap_attr', 'class', 'rbelad-tag-meta' );
$tag_attr  = $this->get_render_attribute_string( 'tag_wrap_attr' );
$tag_items = implode( $meta_separator, $tag_item );
$tag_wrap  = sprintf( '<div %1$s>%2$s</div>', $tag_attr, $tag_items );

// Wrapper HTML.
$this->add_render_attribute( 'meta_attr', 'class', 'rbelad-tag-meta-wrapper' );
$meta_attr = $this->get_render_attribute_string( 'meta_attr' );
$meta_html = sprintf( '%1$s %2$s %3$s', $meta_icon, $meta_prefix, $tag_wrap );
$html      = sprintf( '<div %1$s>%2$s</div>', $meta_attr, $meta_html );
echo wp_kses_post( $html );
