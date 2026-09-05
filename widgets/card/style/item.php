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
$rbelad_prefix  = $this->get_section_style_prefix( 'item' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-card__item';

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
			'column'    => array(
				'id'           => $rbelad_prefix . '_column',
				'default'      => '2',
				'select_class' => $rbelad_class_1,
			),
			'flex'      => array(
				'id'           => $rbelad_prefix . '_flex',
				'defaults'     => array(
					'flex_direction' => 'column',
				),
				'select_class' => $rbelad_class_1,
			),
			'box_style' => array(
				'id'           => $rbelad_prefix . '_box_style',
				'defaults'     => array(
					'margin' => array(
						'top'      => 0,
						'right'    => -8,
						'bottom'   => 0,
						'left'     => -8,
						'unit'     => 'px',
						'isLinked' => true,
					),
				),
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

$this->end_controls_section();
