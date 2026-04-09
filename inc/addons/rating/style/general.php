<?php
/**
 * Rating Star widget style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix                  = 'rbelad_rating_skill_general_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_1                 = '{{WRAPPER}} .rbelad-rating-star-widget'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_2                 = '{{WRAPPER}} .rbelad-rating-star-widget i'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_3                 = '{{WRAPPER}} .rbelad-rating-star-widget svg'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_color           = '#FF9C00'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_column_gap_unit = 'px'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_column_gap      = 3; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_row_gap_unit    = 'px'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_row_gap         = 3; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_font_size_unit  = 'px'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$default_font_size       = 16; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Color.
$this->register_color_style( $prefix, $class_1, $default_color );

// Gap Style.
$this->register_gap_style(
	$prefix,
	$class_1,
	array(
		'column_gap_unit' => $default_column_gap_unit,
		'column_gap'      => $default_column_gap,
		'row_gap_unit'    => $default_row_gap_unit,
		'row_gap'         => $default_row_gap,
	),
);

// Icon Size Style.
$this->register_icon_size_style( $prefix, $class_2, $class_3, $default_font_size_unit, $default_font_size );

// Item Alignment.
$this->register_item_alignment_style( $prefix, $class_1 );

// End Section Tab.
$this->end_controls_section();
