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
$prefix = $this->get_section_style_prefix( 'caption' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Classes List.
$class_1       = '{{WRAPPER}} .rbelad-image-widget-caption'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1 = '{{WRAPPER}} .rbelad-image-widget:hover .rbelad-image-widget-caption'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1 = '{{WRAPPER}} .rbelad-image-widget:focus .rbelad-image-widget-caption'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Link Color Values.
$link_default_color       = RBELAD_BLACK_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color_hover = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Caption', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

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

// Item Size.
$this->register_item_size_style(
	$prefix,
	$class_1,
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
		'class_1'       => $class_1,
		'class_hover_1' => $class_hover_1,
		'class_focus_1' => $class_focus_1,
	),
	array(),
	array()
);

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(),
	array()
);

// End Section Tab.
$this->end_controls_section();
