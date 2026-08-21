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
$rbelad_prefix  = $this->get_section_style_prefix( 'item' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-button-group__item';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Item', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'column'            => array(
				'id'           => $rbelad_prefix . '_column',
				'select_class' => $rbelad_class_1,
			),
			'rbelad_typography' => array(
				'id'           => $rbelad_prefix . '_rbelad_typography',
				'select_class' => $rbelad_class_1,
			),
			'text_alignment'    => array(
				'id'           => $rbelad_prefix . '_text_alignment',
				'select_class' => $rbelad_class_1,
			),
			'text_hover_color'  => array(
				'id'           => $rbelad_prefix . '_text_hover_color',
				'select_class' => $rbelad_class_1,
				'defaults'     => array(
					'normal' => array(
						'color_type' => 'color',
						'text_color' => 'var(--rbelad-color-black)',
					),
					'hover'  => array(
						'color_type' => 'color',
						'text_color' => 'var(--rbelad-color-white)',
					),
				),
			),
			'box_style'         => array(
				'id'           => $rbelad_prefix . '_box_style',
				'select_class' => $rbelad_class_1,

				'defaults'     => array(
					'background_hover_color' => 'var(--rbelad-color-primary)',
					'border_normal_border'   => 'solid',
					'border_normal_width'    => array(
						'top'      => 1,
						'right'    => 1,
						'bottom'   => 1,
						'left'     => 1,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'border_normal_color'    => 'var(--rbelad-color-primary)',
					'border_normal_radius'   => array(
						'top'      => 30,
						'right'    => 30,
						'bottom'   => 30,
						'left'     => 30,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'border_hover_border'    => 'solid',
					'border_hover_width'     => array(
						'top'      => 1,
						'right'    => 1,
						'bottom'   => 1,
						'left'     => 1,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'border_hover_color'     => 'var(--rbelad-color-primary)',
					'border_hover_radius'    => array(
						'top'      => 30,
						'right'    => 30,
						'bottom'   => 30,
						'left'     => 30,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'border_transition'      => array(
						'size' => 0.3,
						'unit' => 's',
					),
					'padding'                => array(
						'top'      => 6,
						'right'    => 25,
						'bottom'   => 6,
						'left'     => 25,
						'unit'     => 'px',
						'isLinked' => true,
					),
				),
			),
		),
	),
);

$this->end_controls_section();
