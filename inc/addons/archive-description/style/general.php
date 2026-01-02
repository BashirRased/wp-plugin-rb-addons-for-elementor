<?php
/**
 * Archive Description widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$section_prefix = $this->get_section_prefix( 'style_section_' );
$prefix         = $section_prefix . 'general';
$class_1        = '{{WRAPPER}} .rbelad-archive-description-widget';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Color Style.
$this->register_color_style( $prefix, $class_1 );

// Alignment Style.
$this->register_text_alignment_style( $prefix, $class_1 );

// End Section Tab.
$this->end_controls_section();
