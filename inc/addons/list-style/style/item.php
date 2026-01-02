<?php
/**
 * List Style widget - Item style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_lis_style_item_';
$cls_1  = '{{WRAPPER}} .rbelad-list-item';
$cls_2  = '{{WRAPPER}} .rbelad-list-item:not(:last-child)';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_item',
	array(
		'label' => esc_html__( 'List Item', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Padding & Margin.
			'padding' => array(
				'id'           => $prefix . 'padding',
				'default'      => array(
					'top'      => '15',
					'right'    => '0',
					'bottom'   => '15',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_1,
			),

			// Border & Border Radius.
			'border'  => array(
				'name'           => $prefix . 'border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '0',
							'right'    => '0',
							'bottom'   => '1',
							'left'     => '0',
							'isLinked' => false,
						),
					),
					'color'  => array(
						'default' => RBELAD_PRIMARY_COLOR,
					),
				),
				'select_class'   => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
