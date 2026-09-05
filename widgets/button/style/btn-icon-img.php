<?php
/**
 * Button widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'btn_icon_img' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-button__link .rbelad-button__image';
$rbelad_class_2 = '{{WRAPPER}} .rbelad-button__link .rbelad-button__image img';
$rbelad_class_3 = '{{WRAPPER}} .rbelad-button__link:hover .rbelad-button__image, {{WRAPPER}} .rbelad-button__link:focus .rbelad-button__image';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Button Icon Image', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'height_width' => array(
				'id'                => $rbelad_prefix . '_height_width',
				'select_class'      => $rbelad_class_2,
				'width_default'     => array(
					'unit' => 'px',
					'size' => 14,
				),
				'max_width_default' => array(
					'unit' => '%',
					'size' => 100,
				),
				'height_default'    => array(
					'unit' => 'px',
					'size' => 14,
				),
			),
			'box_style'    => array(
				'id'                 => $rbelad_prefix . '_box_style',
				'defaults'           => array(
					'background_normal_color' => 'var(--rbelad-color-primary)',
					'background_hover_color'  => 'var(--rbelad-color-white)',
					'border_normal_radius'    => array(
						'top'      => 50,
						'right'    => 50,
						'bottom'   => 50,
						'left'     => 50,
						'unit'     => '%',
						'isLinked' => true,
					),
					'padding'                 => array(
						'top'      => 5,
						'right'    => 5,
						'bottom'   => 5,
						'left'     => 5,
						'unit'     => 'px',
						'isLinked' => true,
					),
				),
				'select_class'       => $rbelad_class_1,
				'select_class_hover' => $rbelad_class_3,
			),
		),
	),
);

$this->end_controls_section();
