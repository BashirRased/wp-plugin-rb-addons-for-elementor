<?php
/**
 * Video widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix   = $this->get_section_content_prefix( 'general' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$video_type = $settings[ $prefix . '_select_option' ] ?? 'youtube'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$url        = $settings[ $prefix . '_custom_link' ] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$self_video = $settings[ $prefix . '_video' ]['url'] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$autoplay   = ( 'yes' === $settings[ $prefix . '_autoplay' ] ) ? 1 : 0; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

echo '<div class="rbelad-video-widget">';

if ( 'youtube' === $video_type && ! empty( $url ) ) {

	$video_id = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$parsed   = wp_parse_url( $url ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$query    = $parsed['query'] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	parse_str( $query, $params );
	$video_id = $params['v'] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	if ( $video_id ) {
		echo '<iframe src="https://www.youtube.com/embed/' . esc_attr( $video_id ) . '?autoplay=' . esc_attr( $autoplay ) . '" frameborder="0" allowfullscreen></iframe>';
	}
} elseif ( 'vimeo' === $video_type && ! empty( $url ) ) {

	$parsed     = wp_parse_url( $url ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$video_path = $parsed['path'] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$video_id   = trim( $video_path, '/' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	echo '<iframe src="https://player.vimeo.com/video/' . esc_attr( $video_id ) . '?autoplay=' . esc_attr( $autoplay ) . '" frameborder="0" allowfullscreen></iframe>';

} elseif ( 'self' === $video_type && ! empty( $self_video ) ) {

	echo '<video controls ' . ( $autoplay ? 'autoplay' : '' ) . '>';
	echo '<source src="' . esc_url( $self_video ) . '" type="video/mp4">';
	echo '</video>';
}

echo '</div>';
