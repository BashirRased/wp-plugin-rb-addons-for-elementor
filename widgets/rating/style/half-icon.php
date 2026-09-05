<?php
/**
 * Rating widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'half_icon' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-rating__icon--half';

/*
 * Start Section Tab - Style.
 */
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Half Icon', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

/*
 * ==========================================================================
 * ICON SIZE.
 * ==========================================================================
 */

$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'icon_style' => array(
				'id'           => $rbelad_prefix . '_icon_style',
				'defaults'     => array(
					'size'        => array(
						'unit' => 'px',
						'size' => 16,
					),
					'color'       => 'var(--rbelad-color-rating)',
					'hover_color' => 'var(--rbelad-color-rating)',
				),
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

/*
 * End Section Tab.
 */
$this->end_controls_section();
