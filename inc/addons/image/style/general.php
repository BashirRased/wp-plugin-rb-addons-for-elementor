<?php
/**
 * Image widget - General style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'general' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Classes List.
$class_1       = '{{WRAPPER}} .rbelad-image-widget'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_2       = '{{WRAPPER}} .rbelad-image-widget-img'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_2 = '{{WRAPPER}} .rbelad-image-widget:hover .rbelad-image-widget-img'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_2 = '{{WRAPPER}} .rbelad-image-widget:focus .rbelad-image-widget-img'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Item Size.
$this->register_item_size_style(
	$prefix,
	$class_2,
	array(),
	array(),
	array(),
	array(),
);

// Text Alignment Style.
$this->register_text_alignment_style( $prefix, $class_1 );

// Border Style.
$this->register_border_style(
	$prefix,
	array(
		'class_1'       => $class_2,
		'class_hover_1' => $class_hover_2,
		'class_focus_1' => $class_focus_2,
	),
	array(),
	array()
);

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_2,
	array(),
	array()
);

// End Section Tab.
$this->end_controls_section();
