<?php
use Elementor\Group_Control_Image_Size;

$post = get_post();
$html = '';
$post_thumbnail = '';
$post_caption = '';

// Exit early if there's no valid post object
if ( ! $post ) {
	return;
}

// Exit if post has password
if ( post_password_required( $post->ID ) ) {
    echo wp_kses_post( get_the_password_form( $post->ID ) );
    return;
}


$settings = $this->get_settings_for_display();

// HTML Class
$this->add_render_attribute( 'wrapper', 'class', 'rb-post-thumbnail-wrapper' );
$wrapper_attr = $this->get_render_attribute_string( 'wrapper' );

// Thumbnail Class
$this->add_render_attribute( 'thumbnail', 'class', 'rb-post-thumbnail' );
$thumbnail_attr = $this->get_render_attribute_string( 'thumbnail' );

// Caption Class
$wp_caption = '';
$caption_attr = '';

if ( isset( $settings['post_thumbnail_caption'] ) ) {
	if ( 'display' === $settings['post_thumbnail_caption'] ) {
		$this->add_render_attribute( 'caption', 'class', 'rb-post-caption display' );
	} elseif ( 'hover' === $settings['post_thumbnail_caption'] ) {
		$this->add_render_attribute( 'caption', 'class', 'rb-post-caption hover' );
	} else {
		$this->add_render_attribute( 'caption', 'class', 'rb-post-caption' );
	}
	$caption_attr = $this->get_render_attribute_string( 'caption' );
}

// Thumbnail Rendering
if ( isset( $settings['post_thumbnail_type'] ) && 'default' === $settings['post_thumbnail_type'] && has_post_thumbnail() ) {
	$wp_caption = get_the_post_thumbnail_caption();

	$size = isset( $settings['post_thumbnail_img_size'] ) ? $settings['post_thumbnail_img_size'] : 'full';
	$post_thumbnail = get_the_post_thumbnail( $post->ID, $size, array(
		'class' => 'rb-post-thumbnail',
	) );

} elseif ( isset( $settings['post_thumbnail_type'] ) && 'custom' === $settings['post_thumbnail_type'] ) {

	$this->add_render_attribute( 'custom_img', 'class', 'rb-post-thumbnail' );

	if ( ! empty( $settings['custom_img']['id'] ) ) {
		$wp_caption = wp_get_attachment_caption( $settings['custom_img']['id'] );
	}

	$post_thumbnail = Group_Control_Image_Size::get_attachment_image_html( $settings, 'post_thumbnail_img', 'custom_img' );
}

// Build caption HTML
if ( ! empty( $wp_caption ) && isset( $settings['post_thumbnail_caption'] ) && 'none' !== $settings['post_thumbnail_caption'] ) {
	$post_caption = sprintf( '<figcaption %1$s>%2$s</figcaption>', $caption_attr, esc_html( $wp_caption ) );
}

// Final HTML
$html = sprintf( '<div %1$s><figure %2$s>%3$s %4$s</figure></div>', $wrapper_attr, $thumbnail_attr, $post_thumbnail, $post_caption );
echo wp_kses_post($html);
