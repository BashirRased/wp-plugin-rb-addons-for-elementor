<?php
/**
 * Button Group widget - Button::Before style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_button_group_button_before_';
$cls_1  = '{{WRAPPER}} .rbelad-btn-item::before';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Button Before', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'bg_color'            => array(
				'id'           => $prefix . 'bg_color',
				'default'      => '#000000',
				'select_class' => $cls_1,
			),
			'color_separator'     => array(
				'id' => $prefix . 'color_separator',
			),

			// Transition.
			'transition_property' => array(
				'id'           => $prefix . 'transition_property',
				'default'      => 'all',
				'select_class' => $cls_1,
			),
			'transition_duration' => array(
				'id'           => $prefix . 'transition_duration',
				'default'      => array(
					'unit' => 's',
					'size' => 0.5,
				),
				'select_class' => $cls_1,
			),
			'timing_function'     => array(
				'id'           => $prefix . 'timing_function',
				'default'      => 'ease-in-out',
				'select_class' => $cls_1,
			),
			'transition_delay'    => array(
				'id'           => $prefix . 'transition_delay',
				'default'      => array(
					'unit' => 's',
					'size' => 0,
				),
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
