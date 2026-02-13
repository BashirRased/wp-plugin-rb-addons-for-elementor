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
$prefix                   = 'rbelad_dual_text_text_highlight_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_1                  = '{{WRAPPER}} .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1            = '{{WRAPPER}} .rbelad-dual-text-link:hover .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1            = '{{WRAPPER}} .rbelad-dual-text-link:focus .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_class_hover_1       = '{{WRAPPER}} .rbelad-dual-text-link:hover .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_class_focus_1       = '{{WRAPPER}} .rbelad-dual-text-link:focus .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color       = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color_hover = RBELAD_BLACK_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'style_section',
	array(
		'label' => esc_html__( 'Text Highlight', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Link Color.
$this->register_link_style( $prefix, $class_1, $link_class_hover_1, $link_class_focus_1, $link_default_color, $link_default_color_hover );

// Background Color.
$this->register_bg_style( $prefix, $class_1, $class_hover_1, $class_focus_1 );

// Border Style.
$this->register_border_style( $prefix, $class_1, $class_hover_1, $class_focus_1 );

// Spacing Style.
$this->register_spacing_style( $prefix, $class_1 );

// End Section Tab.
$this->end_controls_section();
