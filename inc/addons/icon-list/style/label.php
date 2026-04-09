<?php
/**
 * List Style widget - Label style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'label' );

$class_1       = '{{WRAPPER}} .rbelad-list-item-label'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_color = RBELAD_PRIMARY_COLOR; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Item Height & Width Values.
$default_min_width_size = 150; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Label', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Typography Style.
$this->register_text_style( $prefix, $class_1 );

// Color Style.
$this->register_color_style( $prefix, $class_1, $default_color );

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(),
	array()
);

// Item Size.
$this->register_item_size_style(
	$prefix,
	$class_1,
	array(),
	array(
		'size' => $default_min_width_size,
	),
	array(),
	array(),
);

// End Section Tab.
$this->end_controls_section();
