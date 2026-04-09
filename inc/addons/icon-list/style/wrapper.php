<?php
/**
 * List Style widget - Wrapper style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'wrapper' );

$class_1 = '{{WRAPPER}} .rbelad-list-style-widget'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Wrapper', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Text Aligment.
$this->register_text_alignment_style( $prefix, $class_1 );

// End Section Tab.
$this->end_controls_section();
