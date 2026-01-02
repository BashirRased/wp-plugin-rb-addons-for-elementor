<?php
/**
 * Archive Title widget output.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Utils;
$settings = $this->get_settings_for_display();

// HTML Class.
$this->add_render_attribute( 'title', 'class', 'rbelad-archive-title' );
$html_attr = $this->get_render_attribute_string( 'title' );

// HTML Text.
$html      = '';
$html_tag  = Utils::validate_html_tag( $settings['rbelad_archive_title_html_tag'] );
$html_text = get_the_archive_title();

if ( 'default' === $settings['rbelad_archive_title_link_type'] ) {
	// Default Link.
	$this->add_render_attribute( 'title_link', 'href', esc_url( get_the_permalink() ) );
	$this->add_render_attribute( 'title_link', 'target', '_self' );
	$this->add_render_attribute( 'title_link', 'rel', 'nofollow' );
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html      = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
} elseif ( 'custom' === $settings['rbelad_archive_title_link_type'] && ! empty( $settings['rbelad_archive_title_custom_link']['url'] ) ) {
	// Custom Link.
	$this->add_link_attributes( 'title_link', $settings['rbelad_archive_title_custom_link'] );
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html      = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
} else {
	// Disable Link.
	$html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $html_tag, $html_attr, $html_text );
}

echo wp_kses_post( $html );
