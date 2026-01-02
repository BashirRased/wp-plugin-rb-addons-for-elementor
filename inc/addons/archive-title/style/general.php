<?php
/**
 * Archive Title widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$section_prefix     = $this->get_section_prefix( 'style_section_' );
$prefix             = $section_prefix . 'general';
$class_1            = '{{WRAPPER}} .rbelad-archive-title-widget, {{WRAPPER}} .rbelad-archive-title-widget a';
$link_class_hover_1 = '{{WRAPPER}} .rbelad-archive-title-widget:hover a';
$link_class_focus_1 = '{{WRAPPER}} .rbelad-archive-title-widget:focus a';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Alignment Style.
$this->register_text_alignment_style( $prefix, $class_1 );

// Link Style.
$this->register_link_style( $prefix, $class_1, $link_class_hover_1, $link_class_focus_1 );

// End Section Tab.
$this->end_controls_section();
