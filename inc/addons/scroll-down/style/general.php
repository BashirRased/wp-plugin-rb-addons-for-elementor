<?php
/**
 * Scroll Down widget - General style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_scroll_down_general_';
$cls_1  = '{{WRAPPER}} .rbelad-scroll-down';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => 'px',
					'size' => 30,
				),
				'select_class' => $cls_1,
			),
			'height'                 => array(
				'id'           => $prefix . 'height',
				'default'      => array(
					'unit' => 'px',
					'size' => 50,
				),
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'id'             => $prefix . 'border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '2',
							'right'    => '2',
							'bottom'   => '2',
							'left'     => '2',
							'isLinked' => true,
						),
					),
					'color'  => array(
						'default' => RBELAD_PRIMARY_COLOR,
					),
				),
				'select_class'   => $cls_1,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'default'      => array(
					'top'      => 50,
					'right'    => 50,
					'bottom'   => 50,
					'left'     => 50,
					'unit'     => 'px',
					'isLinked' => true,
				),
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
