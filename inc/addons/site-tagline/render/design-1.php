<?php
/**
 * Site Tagline widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

// HTML Class.
$this->add_render_attribute( 'title', 'class', 'rbelad-site-tagline' );
$html_attr = $this->get_render_attribute_string( 'title' );

// HTML.
$html      = '';
$html_text = get_bloginfo( 'description' );
$html      = sprintf( '<p %1$s>%2$s</p>', $html_attr, $html_text );
echo wp_kses_post( $html );
