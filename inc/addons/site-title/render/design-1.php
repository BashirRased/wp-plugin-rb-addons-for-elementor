<?php
/**
 * Site Title widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Utils;
$settings = $this->get_settings_for_display();

// HTML Class.
$this->add_render_attribute( 'title', 'class', 'rbelad-site-title' );
$html_attr = $this->get_render_attribute_string( 'title' );

// HTML Text.
$html      = '';
$html_tag  = Utils::validate_html_tag( $settings['rbelad_site_title_general_content_heading_tag'] );
$html_text = get_bloginfo( 'name' );

if ( 'home' === $settings['rbelad_site_title_general_content_link_type'] ) {
	// Home Page Link.
	$this->add_render_attribute( 'title_link', 'href', esc_url( get_home_url() ) );
	$this->add_render_attribute( 'title_link', 'target', '_self' );
	$this->add_render_attribute( 'title_link', 'rel', 'nofollow' );
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html      = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
} elseif ( 'page' === $settings['rbelad_site_title_general_content_link_type'] ) {
	// General Page Link.
	$this->add_render_attribute( 'title_link', 'href', esc_url( get_permalink( $settings['rbelad_site_title_general_content_page_link'] ) ) );
	$this->add_render_attribute( 'title_link', 'target', '_self' );
	$this->add_render_attribute( 'title_link', 'rel', 'nofollow' );
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html      = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
} elseif ( 'custom' === $settings['rbelad_site_title_general_content_link_type'] && ! empty( $settings['rbelad_site_title_general_content_custom_link']['url'] ) ) {
	// Custom Link.
	$this->add_link_attributes( 'title_link', $settings['rbelad_site_title_general_content_custom_link'] );
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html      = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
} else {
	// Disable Link.
	$html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $html_tag, $html_attr, $html_text );
}

echo wp_kses_post( $html );
