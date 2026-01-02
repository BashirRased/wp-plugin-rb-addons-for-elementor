<?php
/**
 * Archive Description widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $this->get_settings_for_display();

/**
 * Add wrapper class
 */
$this->add_render_attribute(
	'title',
	'class',
	'rbelad-archive-description-widget rbelad-mb-0'
);

$html_attr = $this->get_render_attribute_string( 'title' );

/**
 * Get fallback text (add this control in widget settings)
 */
$fallback_text = ! empty( $settings['fallback_text'] )
	? $settings['fallback_text']
	: esc_html__( 'Archive description will appear here.', 'rb-elementor-addons' );

$html_text = '';

/**
 * If archive page → try real archive description
 */
if ( is_archive() ) {
	$html_text = get_the_archive_description();

	// Remove wrapping <p> added by WP.
	$html_text = preg_replace( '#^<p>(.*?)</p>$#is', '$1', trim( $html_text ) );

	// If archive description is empty → fallback.
	if ( empty( $html_text ) ) {
		$html_text = $fallback_text;
	}
}

/**
 * Non-archive page → always fallback text
 */
if ( ! is_archive() ) {
	$html_text = $fallback_text;
}

/**
 * Elementor editor preview
 */
if ( rbelad_elementor()->editor->is_edit_mode() ) {
	$html_text = esc_html__(
		'Archive description preview. Real description will appear on archive pages.',
		'rb-elementor-addons'
	);
}

/**
 * Output
 */
if ( ! empty( $html_text ) ) {
	printf(
		'<p %1$s>%2$s</p>',
		wp_kses_post( $html_attr ),
		wp_kses_post( $html_text )
	);
}
