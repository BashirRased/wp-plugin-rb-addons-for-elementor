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
$section_prefix           = $this->get_section_prefix( 'style_section_' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix                   = $section_prefix . 'title'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_item_text          = '{{WRAPPER}} .rbelad-dual-text-item-text'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_1                  = '{{WRAPPER}} .rbelad-dual-text-heading, {{WRAPPER}} .rbelad-dual-text-heading a'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1            = '{{WRAPPER}} .rbelad-dual-text-link:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1            = '{{WRAPPER}} .rbelad-dual-text-link:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_class_hover_1       = '{{WRAPPER}} .rbelad-dual-text-link:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_class_focus_1       = '{{WRAPPER}} .rbelad-dual-text-link:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color       = RBELAD_BLACK_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color_hover = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Title', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Display Style.
$this->register_display_style( $prefix, $class_item_text );

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Link Style.
$this->register_link_style( $prefix, $class_1, $link_class_hover_1, $link_class_focus_1, $link_default_color, $link_default_color_hover );

// Transition Style.
$this->register_transition_style( $prefix, $class_1, $class_hover_1, $class_focus_1 );

// Text Alignment Style.
$this->register_text_alignment_style( $prefix, $class_1 );

// End Section Tab.
$this->end_controls_section();
