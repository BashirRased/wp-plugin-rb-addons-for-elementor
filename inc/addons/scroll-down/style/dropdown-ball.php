<?php
/**
 * Scroll Down widget - Dropdown Ball style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'dropdown_ball' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Classes.
$class         = '{{WRAPPER}} .rbelad-scroll-down-widget'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_1       = $class . '::after'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1 = $class . ':hover::after'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1 = $class . ':focus::after'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Background Default Values.
$bg_default_color       = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$bg_default_color_hover = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Item Height & Width Values.
$default_width_size  = 6; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_height_size = 12; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$default_top_unit = 'px'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_top      = 10; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Border Default Values.
$default_border_radius_top    = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_right  = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_bottom = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_left   = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Border Default Hover & Focus Values.
$default_border_radius_top_hover    = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_right_hover  = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_bottom_hover = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_left_hover   = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Dropdown Ball', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
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

// Item Size.
$this->register_item_size_style(
	$prefix,
	$class_1,
	array(
		'size' => $default_width_size,
	),
	array(),
	array(),
	array(
		'size' => $default_height_size,
	),
);

// Border Style.
$this->register_border_style(
	$prefix,
	array(
		'class_1'       => $class_1,
		'class_hover_1' => $class_hover_1,
		'class_focus_1' => $class_focus_1,
	),
	array(
		'radius_top'    => $default_border_radius_top,
		'radius_right'  => $default_border_radius_right,
		'radius_bottom' => $default_border_radius_bottom,
		'radius_left'   => $default_border_radius_left,
	),
	array(
		'radius_top'    => $default_border_radius_top_hover,
		'radius_right'  => $default_border_radius_right_hover,
		'radius_bottom' => $default_border_radius_bottom_hover,
		'radius_left'   => $default_border_radius_left_hover,
	)
);

// Top Style.
$this->register_top_style( $prefix, $class_1, $default_top_unit, $default_top );

// End Section Tab.
$this->end_controls_section();
