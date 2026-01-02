<?php
/**
 * Dual Text widget - Text Highlight style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix             = 'rbelad_dual_text_text_highlight_';
$class_1            = '{{WRAPPER}} .rbelad-dual-text-item-highlight';
$class_hover_1      = '{{WRAPPER}} .rbelad-dual-text-link:hover .rbelad-dual-text-item-highlight';
$class_focus_1      = '{{WRAPPER}} .rbelad-dual-text-link:focus .rbelad-dual-text-item-highlight';
$link_class_hover_1 = '{{WRAPPER}} .rbelad-dual-text-link:hover .rbelad-dual-text-item-highlight';
$link_class_focus_1 = '{{WRAPPER}} .rbelad-dual-text-link:focus .rbelad-dual-text-item-highlight';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'style_section',
	array(
		'label' => esc_html__( 'Text Highlight', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Display Style.
$this->register_display_style( $prefix, $class_1 );

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Link Color.
$this->register_link_style( $prefix, $class_1, $link_class_hover_1, $link_class_focus_1 );

// Background Color.
$this->register_bg_style( $prefix, $class_1, $class_hover_1, $class_focus_1 );

// Border Style.
$this->register_border_style( $prefix, $class_1, $class_hover_1, $class_focus_1 );

// Spacing Style.
$this->register_spacing_style( $prefix, $class_1 );

// Transform Style.
$this->register_transform_style( $prefix, $class_1, $class_hover_1, $class_focus_1 );

// End Section Tab.
$this->end_controls_section();
