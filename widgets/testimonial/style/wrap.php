<?php
/**
 * Image widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'wrap' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-testimonial__wrap';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Wrap', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'box_style'      => array(
				'id'           => $rbelad_prefix . '_box_style',
				'defaults'     => array(
					'background_normal_color' => 'var(--rbelad-color-white)',
					'border_normal_border'    => 'solid',
					'border_normal_width'     => array(
						'top'      => 0,
						'right'    => 0,
						'bottom'   => 5,
						'left'     => 0,
						'unit'     => 'px',
						'isLinked' => false,
					),
					'border_normal_color'     => 'var(--rbelad-color-primary)',
					'border_normal_radius'    => array(
						'top'      => 20,
						'right'    => 20,
						'bottom'   => 20,
						'left'     => 20,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'padding'                 => array(
						'top'      => 40,
						'right'    => 60,
						'bottom'   => 40,
						'left'     => 60,
						'unit'     => 'px',
						'isLinked' => false,
					),
					'margin'                  => array(
						'top'      => 0,
						'right'    => 0,
						'bottom'   => 30,
						'left'     => 0,
						'unit'     => 'px',
						'isLinked' => false,
					),
					'transition'              => array(
						'size' => 0.8,
						'unit' => 's',
					),
					'box_shadow_normal_type'  => 'rb-custom',
					'box_shadow_normal'       => '-10px 0px 60px 0px rgba(0, 0, 0, 0.07)',
				),
				'select_class' => $rbelad_class_1,
			),
			'text_alignment' => array(
				'id'           => $rbelad_prefix . '_text_alignment',
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
