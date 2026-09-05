<?php
/**
 * Testimonial widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'name' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-testimonial__reviewer-name';
$rbelad_class_2 = '{{WRAPPER}} .rbelad-testimonial__reviewer-name a';
$rbelad_class_3 = '{{WRAPPER}} .rbelad-testimonial__reviewer-name:hover a, {{WRAPPER}} .rbelad-testimonial__reviewer-name:focus a';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Name', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'rbelad_typography' => array(
				'id'           => $rbelad_prefix . '_rbelad_typography',
				'select_class' => $rbelad_class_1,
			),
			'text_hover_color'  => array(
				'id'                 => $rbelad_prefix . '_text_hover_color',
				'defaults'           => array(
					'normal' => array(
						'color_type' => 'color',
						'text_color' => 'var(--rbelad-color-black)',
					),
					'hover'  => array(
						'color_type' => 'color',
						'text_color' => 'var(--rbelad-color-primary)',
					),
				),
				'select_class'       => $rbelad_class_2,
				'select_class_hover' => $rbelad_class_3,
			),
			'box_style'         => array(
				'id'           => $rbelad_prefix . '_box_style',
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
