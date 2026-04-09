<?php
/**
 * List Style widget - Icon style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'icon' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Classes List.
$class_1       = '{{WRAPPER}} .rbelad-list-item-icon i'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1 = '{{WRAPPER}} .rbelad-list-item-icon:hover i'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1 = '{{WRAPPER}} .rbelad-list-item-icon:focus i'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_2       = '{{WRAPPER}} .rbelad-list-item-icon svg'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_2 = '{{WRAPPER}} .rbelad-list-item-icon:hover svg'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_2 = '{{WRAPPER}} .rbelad-list-item-icon:focus svg'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_3       = '{{WRAPPER}} .rbelad-list-item-icon'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_3 = '{{WRAPPER}} .rbelad-list-item-icon:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_3 = '{{WRAPPER}} .rbelad-list-item-icon:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_4       = '{{WRAPPER}} .rbelad-list-item-icon img'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$default_fill_color       = RBELAD_WHITE_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_fill_color_hover = RBELAD_WHITE_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$bg_default_color         = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$bg_default_color_hover   = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Margin Values.
$default_margin_right = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Item Height & Width Values.
$default_width_size  = 40; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_height_size = 40; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$default_img_size       = 20; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_img_size_unit  = 'px'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_font_size_unit = 'px'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_font_size      = 20; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
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

// Border Style.
$this->register_border_style(
	$prefix,
	array(
		'class_1'       => $class_3,
		'class_hover_1' => $class_hover_3,
		'class_focus_1' => $class_focus_3,
	),
	array(),
	array()
);

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(),
	array(
		'right' => $default_margin_right,
	)
);

// Icon Style.
$this->register_icon_style( $prefix, $class_1, $class_2, $class_hover_1, $class_focus_1, $class_hover_2, $class_focus_2, $default_fill_color, $default_fill_color_hover );

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

// Image Size.
$this->register_img_size_style( $prefix, $class_4, $default_img_size_unit, $default_img_size );

// Icon Size Style.
$this->register_icon_size_style( $prefix, $class_1, $class_2, $default_font_size_unit, $default_font_size );

// End Section Tab.
$this->end_controls_section();
