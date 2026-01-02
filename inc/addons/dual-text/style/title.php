<?php
/**
 * Dual Text widget - Title style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix             = 'rbelad_dual_text_title_';
$class_1            = '{{WRAPPER}} .rbelad-dual-text-heading';
$class_hover_1      = '{{WRAPPER}} .rbelad-dual-text-link:hover';
$class_focus_1      = '{{WRAPPER}} .rbelad-dual-text-link:focus';
$link_class_hover_1 = '{{WRAPPER}} .rbelad-dual-text-link:hover';
$link_class_focus_1 = '{{WRAPPER}} .rbelad-dual-text-link:focus';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'style_section',
	array(
		'label' => esc_html__( 'Title', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Link Style.
$this->register_link_style( $prefix, $class_1, $link_class_hover_1, $link_class_focus_1 );

// Transition Style.
$this->register_transition_style( $prefix, $class_1, $class_hover_1, $class_focus_1 );

// Text Alignment Style.
$this->register_text_alignment_style( $prefix, $class_1 );

// End Section Tab.
$this->end_controls_section();
