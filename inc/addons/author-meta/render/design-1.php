<?php
/**
 * Author Meta widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings    = $this->get_settings_for_display();
$html        = '';
$author_icon = 'rbelad_author_meta_general_content_icon_font';

// Icon HTML.
$this->add_render_attribute( 'meta_icon_attr', 'class', 'rbelad-author-meta-widget-icon' );
$meta_icon_attr = $this->get_render_attribute_string( 'meta_icon_attr' );
$meta_icon_html = '';
if ( ! empty( $settings[ $author_icon ] ) ) {
	$meta_icon_html = rbelad_render_icon( $settings, 'icon', $author_icon );
}
$meta_icon = sprintf( '<span %1$s>%2$s</span>', $meta_icon_attr, $meta_icon_html );

// Prefix HTML.
$this->add_render_attribute( 'meta_prefix_attr', 'class', 'rbelad-author-meta-widget-prefix' );
$meta_prefix_attr = $this->get_render_attribute_string( 'meta_prefix_attr' );
$meta_prefix_html = '';
if ( 'img' === $settings['rbelad_author_meta_general_content_author_prefix_separtor'] && ! empty( $settings['rbelad_author_meta_general_content_prefix_img']['url'] ) ) {
	$meta_prefix_html = '<img src="' . esc_url( $settings['rbelad_author_meta_general_content_prefix_img']['url'] ) . '">';
} elseif ( 'icon' === $settings['rbelad_author_meta_general_content_author_prefix_separtor'] && ! empty( $settings['rbelad_author_meta_general_content_prefix_font'] ) ) {
	$meta_prefix_html = rbelad_render_icon( $settings, 'icon', 'rbelad_author_meta_general_content_prefix_font' );
} elseif ( 'text' === $settings['rbelad_author_meta_general_content_author_prefix_separtor'] && isset( $settings['rbelad_author_meta_general_content_prefix_text'] ) ) {
	$meta_prefix_html = esc_html( $settings['rbelad_author_meta_general_content_prefix_text'] );
}
$meta_prefix = sprintf( '<span %1$s>%2$s</span>', $meta_prefix_attr, $meta_prefix_html );

// Author HTML.
$this->add_render_attribute( 'author_attr', 'class', 'rbelad-author-meta-widget' );
$author_attr = $this->get_render_attribute_string( 'author_attr' );
$author_id   = get_the_author_meta( 'ID' );
$author_html = get_the_author_meta( 'display_name', $author_id );
$meta_text   = sprintf( '<span %1$s>%2$s</span>', $author_attr, $author_html );
if ( isset( $settings ['rbelad_author_meta_general_content_author_link'] ) && 'default' === $settings ['rbelad_author_meta_general_content_author_link'] ) {
	// Author Link Class.
	$this->add_render_attribute( 'author_link_attr', 'href', esc_url( get_author_posts_url( $author_id ) ) );
	$this->add_render_attribute( 'author_link_attr', 'target', '_self' );
	$this->add_render_attribute( 'author_link_attr', 'rel', 'nofollow' );
	$this->add_render_attribute( 'author_link_attr', 'class', 'rbelad-author-meta-widget-link' );
	$link_attr = $this->get_render_attribute_string( 'author_link_attr' );
	$meta_text = sprintf( '<a %1$s><span %2$s>%3$s</span></a>', $link_attr, $author_attr, $author_html );
}

// Wrapper HTML.
$this->add_render_attribute( 'meta_attr', 'class', 'rbelad-author-meta-widget-wrapper' );
$meta_attr = $this->get_render_attribute_string( 'meta_attr' );
$meta_html = sprintf( '%1$s %2$s %3$s', $meta_icon, $meta_prefix, $meta_text );
$html      = sprintf( '<div %1$s>%2$s</div>', $meta_attr, $meta_html );
echo wp_kses_post( $html );
