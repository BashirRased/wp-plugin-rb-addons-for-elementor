<?php
/**
 * List Style widget - Item style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'item' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$class_1       = '{{WRAPPER}} {{CURRENT_ITEM}}.rbelad-list-item'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_2       = '{{WRAPPER}} {{CURRENT_ITEM}}.rbelad-list-item:not(:last-child)'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_2 = '{{WRAPPER}} {{CURRENT_ITEM}}.rbelad-list-item:hover:not(:last-child)'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_2 = '{{WRAPPER}} {{CURRENT_ITEM}}.rbelad-list-item:focus:not(:last-child)'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Border Default Values.
$default_border_type   = 'solid'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_bottom = '1'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_color  = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Border Default Hover & Focus Values.
$default_border_type_hover   = 'solid'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_bottom_hover = '1'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_border_color_hover  = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Padding Values.
$default_padding_top    = '15'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_padding_bottom = '15'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'List Item', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(
		'top'    => $default_padding_top,
		'bottom' => $default_padding_bottom,
	),
	array()
);

// Border Style.
$this->register_border_style(
	$prefix,
	array(
		'class_1'       => $class_2,
		'class_hover_1' => $class_hover_2,
		'class_focus_1' => $class_focus_2,
	),
	array(
		'type'   => $default_border_type,
		'bottom' => $default_border_bottom,
		'color'  => $default_border_color,
	),
	array(
		'type'   => $default_border_type_hover,
		'bottom' => $default_border_bottom_hover,
		'color'  => $default_border_color_hover,
	)
);

// End Section Tab.
$this->end_controls_section();
