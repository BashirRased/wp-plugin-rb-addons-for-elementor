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
$rbelad_prefix  = $this->get_section_style_prefix( 'wrap' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-card__wrap';

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
			'flex'         => array(
				'id'           => $rbelad_prefix . '_flex',
				'defaults'     => array(
					'display'         => 'flex',
					'flex_direction'  => 'row',
					'justify_content' => 'flex-start',
					'align_items'     => 'stretch',
					'row_gap'         => array(
						'size' => '16',
						'unit' => 'px',
					),
					'column_gap'      => array(
						'size' => '16',
						'unit' => 'px',
					),
					'flex_wrap'       => 'wrap',
				),
				'select_class' => $rbelad_class_1,
			),
			'height_width' => array(
				'id'           => $rbelad_prefix . '_height_width',
				'select_class' => $rbelad_class_1,
			),
			'box_style'    => array(
				'id'           => $rbelad_prefix . '_box_style',
				'defaults'     => array(
					'border_normal_radius'   => array(
						'top'      => 12,
						'right'    => 12,
						'bottom'   => 12,
						'left'     => 12,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'padding'                => array(
						'top'      => 32,
						'right'    => 32,
						'bottom'   => 32,
						'left'     => 32,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'box_shadow_normal_type' => 'rb-custom',
					'box_shadow_normal'      => '3px 3px 10px rgba(0, 0, 0, 0.2)',
				),
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
