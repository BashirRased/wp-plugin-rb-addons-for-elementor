<?php
/**
 * Button Group widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'general' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-button-group__wrap';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'flex' => array(
				'id'           => $rbelad_prefix . '_flex',
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

$this->end_controls_section();
