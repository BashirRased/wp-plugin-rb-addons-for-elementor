<?php
/**
 * Video widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$rbelad_settings = $this->get_settings_for_display();

if ( empty( $rbelad_settings['video_url'] ) ) {
	return;
}

$rbelad_url = $rbelad_settings['video_url'];

$rbelad_args = array();

if ( 'yes' === $rbelad_settings['autoplay'] ) {
	$rbelad_args[] = 'autoplay=1';
}

if ( 'yes' === $rbelad_settings['loop'] ) {
	$rbelad_args[] = 'loop=1';
}

if ( 'yes' === $rbelad_settings['mute'] ) {
	$rbelad_args[] = 'mute=1';
}

// Convert YouTube URL to embed (simple version).
$rbelad_embed_url = str_replace(
	array( 'watch?v=', 'youtu.be/' ),
	array( 'embed/', 'www.youtube.com/embed/' ),
	$rbelad_url
);

if ( ! empty( $rbelad_args ) ) {
	$rbelad_embed_url .= '?' . implode( '&', $rbelad_args );
}

echo '<div class="rbelad-video-wrapper" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">';
echo '<iframe 
		src="' . esc_url( $rbelad_embed_url ) . '" 
		style="position:absolute;top:0;left:0;width:100%;height:100%;"
		frameborder="0"
		allow="autoplay; encrypted-media"
		allowfullscreen>
	</iframe>';
echo '</div>';
