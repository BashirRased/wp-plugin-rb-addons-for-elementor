<?php
/**
 * Post Thumbnail widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Group_Control_Image_Size;

// Get post object safely without overriding global $post.
$custom_post = get_post( get_the_ID() );

$html           = '';
$post_thumbnail = '';
$post_caption   = '';

// Exit early if there's no valid post object.
if ( ! $custom_post instanceof \WP_Post ) {
	return;
}

// Exit if post has password.
if ( post_password_required( $custom_post->ID ) ) {
	echo wp_kses_post( get_the_password_form( $custom_post->ID ) );
	return;
}

$settings = $this->get_settings_for_display();

// HTML Class.
$this->add_render_attribute( 'wrapper', 'class', 'rbelad-post-thumbnail-wrapper' );
$wrapper_attr = $this->get_render_attribute_string( 'wrapper' );

// Thumbnail Class.
$this->add_render_attribute( 'thumbnail', 'class', 'rbelad-post-thumbnail' );
$thumbnail_attr = $this->get_render_attribute_string( 'thumbnail' );

// Caption Class.
$wp_caption   = '';
$caption_attr = '';

if ( isset( $settings['rbelad_post_thumbnail_general_content_post_thumbnail_caption'] ) ) {
	if ( 'display' === $settings['rbelad_post_thumbnail_general_content_post_thumbnail_caption'] ) {
		$this->add_render_attribute( 'caption', 'class', 'rbelad-post-caption display' );
	} elseif ( 'hover' === $settings['rbelad_post_thumbnail_general_content_post_thumbnail_caption'] ) {
		$this->add_render_attribute( 'caption', 'class', 'rbelad-post-caption hover' );
	} else {
		$this->add_render_attribute( 'caption', 'class', 'rbelad-post-caption' );
	}
	$caption_attr = $this->get_render_attribute_string( 'caption' );
}

// Thumbnail Rendering.
if ( isset( $settings['rbelad_post_thumbnail_general_content_post_thumbnail_type'] ) && 'default' === $settings['rbelad_post_thumbnail_general_content_post_thumbnail_type'] && has_post_thumbnail( $custom_post->ID ) ) {
	$wp_caption = get_the_post_thumbnail_caption( $custom_post->ID );

	$size           = ! empty( $settings['rbelad_post_thumbnail_general_content_post_thumbnail_img_size'] ) ? $settings['rbelad_post_thumbnail_general_content_post_thumbnail_img_size'] : 'full';
	$post_thumbnail = get_the_post_thumbnail(
		$custom_post->ID,
		$size,
		array(
			'class' => 'rbelad-post-thumbnail',
		)
	);

} elseif ( isset( $settings['rbelad_post_thumbnail_general_content_post_thumbnail_type'] ) && 'custom' === $settings['rbelad_post_thumbnail_general_content_post_thumbnail_type'] ) {

	$this->add_render_attribute( 'rbelad_post_thumbnail_general_content_custom_img', 'class', 'rbelad-post-thumbnail' );

	if ( ! empty( $settings['rbelad_post_thumbnail_general_content_custom_img']['id'] ) ) {
		$wp_caption = wp_get_attachment_caption( $settings['rbelad_post_thumbnail_general_content_custom_img']['id'] );
	}

	$post_thumbnail = Group_Control_Image_Size::get_attachment_image_html( $settings, 'rbelad_post_thumbnail_general_content_post_thumbnail_img', 'rbelad_post_thumbnail_general_content_custom_img' );
}

// Build caption HTML.
if ( ! empty( $wp_caption ) && isset( $settings['rbelad_post_thumbnail_general_content_post_thumbnail_caption'] ) && 'none' !== $settings['rbelad_post_thumbnail_general_content_post_thumbnail_caption'] ) {
	$post_caption = sprintf( '<figcaption %1$s>%2$s</figcaption>', $caption_attr, esc_html( $wp_caption ) );
}

// Final HTML.
$html = sprintf( '<div %1$s><figure %2$s>%3$s %4$s</figure></div>', $wrapper_attr, $thumbnail_attr, $post_thumbnail, $post_caption );
echo wp_kses_post( $html );
