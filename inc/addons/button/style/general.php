<?php
/**
 * Button widget - General style controls.
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
$class_1       = '{{WRAPPER}} .rbelad-button-widget-item'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1 = '{{WRAPPER}} .rbelad-button-widget-item:hover'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1 = '{{WRAPPER}} .rbelad-button-widget-item:focus'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Link Color Values.
$link_default_color       = RBELAD_BLACK_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color_hover = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Padding Values.
$default_padding_top    = '15'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_padding_right  = '15'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_padding_bottom = '15'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_padding_left   = '15'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'general',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Text Style.
$this->register_text_style( $prefix, $class_1 );

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(
		'top'    => $default_padding_top,
		'right'  => $default_padding_right,
		'bottom' => $default_padding_bottom,
		'left'   => $default_padding_left,
	),
	array()
);

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

// Transition Style.
$this->register_transition_style(
	$prefix,
	array(
		'class_1'       => $class_1,
		'class_hover_1' => $class_hover_1,
		'class_focus_1' => $class_focus_1,
	),
);

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

// Background Style.
$this->register_bg_style(
	$prefix,
	array(
		'class_1'       => $class_1,
		'class_hover_1' => $class_hover_1,
		'class_focus_1' => $class_focus_1,
	),
	array()
);

// End Section Tab.
$this->end_controls_section();
