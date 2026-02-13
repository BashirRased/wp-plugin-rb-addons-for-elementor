<?php
/**
 * Button widget - General style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$section_prefix           = $this->get_section_prefix( 'style_section_' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix                   = $section_prefix . 'general'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_1                  = '{{WRAPPER}} .rbelad-button-widget-item'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1            = '{{WRAPPER}} .rbelad-button-widget-item:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1            = '{{WRAPPER}} .rbelad-button-widget-item:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_class_hover_1       = '{{WRAPPER}} .rbelad-button-widget-item:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_class_focus_1       = '{{WRAPPER}} .rbelad-button-widget-item:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color       = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color_hover = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'general',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Text Style.
$this->register_text_style( $prefix, $class_1 ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Spacing Style.
$this->register_spacing_style( $prefix, $class_1 ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Border Style.
$this->register_border_style( $prefix, $class_1, $class_hover_1, $class_focus_1 ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Transition Style.
$this->register_transition_style( $prefix, $class_1, $class_hover_1, $class_focus_1 ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Link Style.
$this->register_link_style( $prefix, $class_1, $link_class_hover_1, $link_class_focus_1, $link_default_color, $link_default_color_hover ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Background Style.
$this->register_bg_style( $prefix, $class_1, $class_hover_1, $class_focus_1 ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// End Section Tab.
$this->end_controls_section();
