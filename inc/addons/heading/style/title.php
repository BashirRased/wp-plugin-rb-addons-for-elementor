<?php
/**
 * Dual Text widget - Title style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'title' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Classes List.
$class_1         = '{{WRAPPER}} .rbelad-dual-text-heading, {{WRAPPER}} .rbelad-dual-text-heading a'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1   = '{{WRAPPER}} .rbelad-dual-text-link:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1   = '{{WRAPPER}} .rbelad-dual-text-link:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_item_text = '{{WRAPPER}} .rbelad-dual-text-item-text'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Link Color Values.
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

// Text Alignment Style.
$this->register_text_alignment_style( $prefix, $class_1 );

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Link Style.
$this->register_link_style(
	$prefix,
	array(
		'class_1'       => $class_1,
		'class_hover_1' => $class_hover_1,
		'class_focus_1' => $class_focus_1,
	),
	array(
		'link_color'       => $link_default_color,
		'link_color_hover' => $link_default_color_hover,
	)
);

// Transition Style.
$this->register_transition_style(
	$prefix,
	array(
		'class_1'       => $class_1,
		'class_hover_1' => $class_hover_1,
		'class_focus_1' => $class_focus_1,
	),
);

// End Section Tab.
$this->end_controls_section();
