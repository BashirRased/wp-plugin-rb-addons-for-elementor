<?php
/**
 * Divider widget style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_divider_general_';
$cls_1  = '{{WRAPPER}} .rbelad-divider';
$cls_2  = '{{WRAPPER}} .rbelad-divider-container';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
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
			// Border & Border Radius.
			'border'                 => array(
				'id'             => $prefix . 'border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '0',
							'bottom'   => '0',
							'left'     => '0',
							'isLinked' => false,
						),
					),
					'color'  => array(
						'default' => '#007bff',
					),
				),
				'select_class'   => $cls_1,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_1,
			),
			'border_separator'       => array(
				'id' => $prefix . 'border_separator',
			),

			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => '%',
					'size' => 100,
				),
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Text Align.
			'justify_align'          => array(
				'id'           => $prefix . 'justify_align',
				'options'      => rbelad_align_text(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
