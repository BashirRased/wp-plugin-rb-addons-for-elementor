<?php
/**
 * List Style widget - Info style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'info' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$class_1 = '{{WRAPPER}} .rbelad-list-item-info'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Margin Values.
$default_margin_left = '10'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Info', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(),
	array(
		'left' => $default_margin_left,
	)
);

// End Section Tab.
$this->end_controls_section();
