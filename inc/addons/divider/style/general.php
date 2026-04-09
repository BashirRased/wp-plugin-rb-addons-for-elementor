<?php
/**
 * Divider widget style controls.
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

$class_1                = '{{WRAPPER}} .rbelad-divider-widget'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1          = '{{WRAPPER}} .rbelad-divider-widget:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1          = '{{WRAPPER}} .rbelad-divider-widget:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_2                = '{{WRAPPER}} .rbelad-divider-widget-container'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$bg_default_color       = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$bg_default_color_hover = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Item Height & Width Values.
$default_width_size  = 100; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_width_unit  = '%'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_height_size = 1; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

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
	$class_1,
	array(
		'unit' => $default_width_unit,
		'size' => $default_width_size,
	),
	array(),
	array(),
	array(
		'size' => $default_height_size,
	),
);

// Background Style.
$this->register_bg_style(
	$prefix,
	array(
		'class_1'       => $class_1,
		'class_hover_1' => $class_hover_1,
		'class_focus_1' => $class_focus_1,
	),
	array(
		'bg_color'       => $bg_default_color,
		'bg_color_hover' => $bg_default_color_hover,
	)
);

// Item Alignment.
$this->register_item_alignment_style( $prefix, $class_2 );

// End Section Tab.
$this->end_controls_section();
