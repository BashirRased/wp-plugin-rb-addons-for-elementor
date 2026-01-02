<?php
/**
 * Section Header widget - Title::Separator style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_title_separator_';
$cls_1  = '{{WRAPPER}} .rbelad-section-title-separator';
$cls_2  = '{{WRAPPER}} .style-2 .rbelad-section-title-separator::before';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Title Separator', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_section_header_title_separator_content_switch' => 'yes',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Width & Height.
			'icon_img_size' => array(
				'id'           => $prefix . 'icon_img_size',
				'label'        => esc_html__( 'Icon Size', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_1,
			),
			'bottom'        => array(
				'id'           => $prefix . 'bottom',
				'label'        => esc_html__( 'Icon Bottom', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => -24,
				),
				'select_class' => $cls_1,
			),

			// Colors.
			'bg_color'      => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_1,
			),

			// Border.
			'border'        => array(
				'name'           => $prefix . 'border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '3',
							'right'    => '3',
							'bottom'   => '3',
							'left'     => '3',
							'isLinked' => true,
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
