<?php
/**
 * Scroll Down widget - General style controls.
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

// Classes.
$class         = '{{WRAPPER}} .rbelad-scroll-down-widget'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_1       = $class; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1 = $class . ':hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1 = $class . ':focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Item Height & Width Values.
$default_width_size  = 30; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_height_size = 50; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Border Default Values.
$default_border_type          = 'solid'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_top           = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_right         = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_bottom        = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_left          = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_color         = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_top    = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_right  = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_bottom = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_left   = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Border Default Hover & Focus Values.
$default_border_type_hover          = 'solid'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_top_hover           = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_right_hover         = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_bottom_hover        = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_left_hover          = '2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_color_hover         = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_top_hover    = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_right_hover  = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_bottom_hover = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_radius_left_hover   = '50'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

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
		'type'          => $default_border_type,
		'top'           => $default_border_top,
		'right'         => $default_border_right,
		'bottom'        => $default_border_bottom,
		'left'          => $default_border_left,
		'color'         => $default_border_color,
		'radius_top'    => $default_border_radius_top,
		'radius_right'  => $default_border_radius_right,
		'radius_bottom' => $default_border_radius_bottom,
		'radius_left'   => $default_border_radius_left,
	),
	array(
		'type'          => $default_border_type_hover,
		'top'           => $default_border_top_hover,
		'right'         => $default_border_right_hover,
		'bottom'        => $default_border_bottom_hover,
		'left'          => $default_border_left_hover,
		'color'         => $default_border_color_hover,
		'radius_top'    => $default_border_radius_top_hover,
		'radius_right'  => $default_border_radius_right_hover,
		'radius_bottom' => $default_border_radius_bottom_hover,
		'radius_left'   => $default_border_radius_left_hover,
	)
);

// End Section Tab.
$this->end_controls_section();
