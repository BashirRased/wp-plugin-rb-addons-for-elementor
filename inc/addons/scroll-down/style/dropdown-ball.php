<?php
/**
 * Scroll Down widget - Dropdown Ball style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_scroll_down_dropdown_ball_';
$cls_1  = '{{WRAPPER}} .rbelad-scroll-down::after';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'Dropdown Ball', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'bg_color'               => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_1,
			),

			// Width & Height.
			'top'                    => array(
				'id'           => $prefix . 'top',
				'default'      => array(
					'unit' => 'px',
					'size' => 10,
				),
				'select_class' => $cls_1,
			),
			'width'                  => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => 'px',
					'size' => 6,
				),
				'select_class' => $cls_1,
			),
			'height'                 => array(
				'id'           => $prefix . 'height',
				'default'      => array(
					'unit' => 'px',
					'size' => 12,
				),
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Border & Border Radius.
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'default'      => array(
					'top'      => 10,
					'right'    => 10,
					'bottom'   => 10,
					'left'     => 10,
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
