<?php
/**
 * Scroll Down widget - Wrap style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'wrap' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$class_1 = '{{WRAPPER}} .rbelad-scroll-down-widget-container'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Wrap', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Item Alignment Style.
$this->register_item_alignment_style( $prefix, $class_1 );

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(),
	array()
);

// End Section Tab.
$this->end_controls_section();
