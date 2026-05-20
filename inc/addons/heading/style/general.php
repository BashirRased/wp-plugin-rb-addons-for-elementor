<?php
/**
 * Heading widget - Title style controls.
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

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Title', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Custom Typography.
$this->rbelad_custom_typography(
	'general',
	array(
		'controls' => array(
			array(
				'name'         => 'general_typography',
				'select_class' => '{{WRAPPER}} .rbelad-heading__wrap',
			),
		),
	)
);

// End Section Tab.
$this->end_controls_section();
