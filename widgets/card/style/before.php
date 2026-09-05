<?php
/**
 * Card widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'before' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-card__before-wrap';

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Before Wrap', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'flex'         => array(
				'id'           => $rbelad_prefix . '_flex',
				'defaults'     => array(
					'flex_direction'  => 'row',
					'justify_content' => 'center',
					'align_items'     => 'center',
				),
				'select_class' => $rbelad_class_1,
			),
			'position'     => array(
				'id'           => $rbelad_prefix . '_position',
				'defaults'     => array(
					'position' => 'absolute',
					'left'     => array(
						'size' => -60,
						'unit' => 'px',
					),
					'top'      => array(
						'size' => 50,
						'unit' => '%',
					),
				),
				'select_class' => $rbelad_class_1,
			),
			'height_width' => array(
				'id'                => $rbelad_prefix . '_height_width',
				'width_default'     => array(
					'unit' => 'px',
					'size' => 120,
				),
				'max_width_default' => array(
					'unit' => '%',
					'size' => 100,
				),
				'height_default'    => array(
					'unit' => 'px',
					'size' => 120,
				),
				'select_class'      => $rbelad_class_1,
			),
			'box_style'    => array(
				'id'           => $rbelad_prefix . '_box_style',
				'defaults'     => array(
					'background_normal_color' => 'var(--rbelad-color-white)',
					'border_normal_radius'    => array(
						'top'      => 60,
						'right'    => 60,
						'bottom'   => 60,
						'left'     => 60,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'margin'                  => array(
						'top'      => -60,
						'right'    => 0,
						'bottom'   => 0,
						'left'     => 0,
						'unit'     => 'px',
						'isLinked' => false,
					),
					'box_shadow_normal_type'  => 'rb-custom',
					'box_shadow_normal'       => '3px 3px 10px rgba(0, 0, 0, 0.2)',
				),
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
