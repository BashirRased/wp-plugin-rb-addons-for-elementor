<?php
/**
 * Dual Text widget - Text Highlight style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'text_highlight' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Classes List.
$class_1       = '{{WRAPPER}} .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_hover_1 = '{{WRAPPER}} .rbelad-dual-text-link:hover .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_focus_1 = '{{WRAPPER}} .rbelad-dual-text-link:focus .rbelad-dual-text-item-highlight'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Link Color Values.
$link_default_color       = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$link_default_color_hover = RBELAD_BLACK_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Text Highlight', 'rb-addons-for-elementor' ),
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
