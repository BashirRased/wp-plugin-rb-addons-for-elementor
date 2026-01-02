<?php
/**
 * Resume List widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

// Resume Label.
$label = '';
if ( isset( $settings ['rbelad_resume_list_general_content_resume_label'] ) && ! empty( $settings ['rbelad_resume_list_general_content_resume_label'] ) ) {
	$this->add_render_attribute( 'resume_label_attr', 'class', 'resume-list-label' );
	$label_attr = $this->get_render_attribute_string( 'resume_label_attr' );
	$label_html = $settings ['rbelad_resume_list_general_content_resume_label'];
	$label      = sprintf( '<span %1$s>%2$s</span>', $label_attr, $label_html );
}

// Resume Title.
$resume_title = '';
if ( isset( $settings ['rbelad_resume_list_general_content_resume_title'] ) && ! empty( $settings ['rbelad_resume_list_general_content_resume_title'] ) ) {
	$this->add_render_attribute( 'resume_title_attr', 'class', 'resume-list-title' );
	$resume_title_attr = $this->get_render_attribute_string( 'resume_title_attr' );
	$resume_title_html = $settings ['rbelad_resume_list_general_content_resume_title'];
	$resume_title      = sprintf( '<h4 %1$s>%2$s</h4>', $resume_title_attr, $resume_title_html );
}

// Resume Subtitle.
$subtitle = '';
if ( isset( $settings ['rbelad_resume_list_general_content_resume_subtitle'] ) && ! empty( $settings ['rbelad_resume_list_general_content_resume_subtitle'] ) ) {
	$this->add_render_attribute( 'resume_subtitle_attr', 'class', 'resume-list-subtitle' );
	$subtitle_attr = $this->get_render_attribute_string( 'resume_subtitle_attr' );
	$subtitle_html = $settings ['rbelad_resume_list_general_content_resume_subtitle'];
	$subtitle      = sprintf( '<h6 %1$s>%2$s</h6>', $subtitle_attr, $subtitle_html );
}

// Resume Description.
$description = '';
if ( isset( $settings ['rbelad_resume_list_general_content_resume_description'] ) && ! empty( $settings ['rbelad_resume_list_general_content_resume_description'] ) ) {
	$this->add_render_attribute( 'resume_description_attr', 'class', 'resume-list-description' );
	$description_attr = $this->get_render_attribute_string( 'resume_description_attr' );
	$description_html = $settings ['rbelad_resume_list_general_content_resume_description'];
	$description      = sprintf( '<p %1$s>%2$s</p>', $description_attr, $description_html );
}

// Wrapper HTML.
$html = '';
$this->add_render_attribute( 'resume_item_attr', 'class', 'resume-list-item' );
$item_attr = $this->get_render_attribute_string( 'resume_item_attr' );
$html      = sprintf( '<div %1$s>%2$s %3$s %4$s %5$s</div>', $item_attr, $label, $resume_title, $subtitle, $description );
echo wp_kses_post( $html );
