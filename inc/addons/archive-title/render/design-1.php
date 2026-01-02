<?php
/**
 * Archive Title widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings       = $this->get_settings_for_display();
$section_prefix = $this->get_section_prefix( 'content_section_general_' );

$this->add_render_attribute( 'title', 'class', 'rbelad-archive-title-widget rbelad-mb-0' );
$html_tag    = \Elementor\Utils::validate_html_tag( $settings[ $section_prefix . 'heading_tag' ] );
$html_text   = get_the_archive_title();
$default_url = get_the_permalink();
$html        = $this->render_link_type( $section_prefix, $html_text, $html_tag, 'title', $default_url );
echo wp_kses_post( $html );
