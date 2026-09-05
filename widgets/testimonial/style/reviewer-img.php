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
$rbelad_prefix  = $this->get_section_style_prefix( 'review_img' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-testimonial__reviewer-img img';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Reviewer Image', 'rb-addons-for-elementor' ),
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
				'select_class'      => $rbelad_class_1,
				'width_default'     => array(
					'unit' => 'px',
					'size' => 70,
				),
				'max_width_default' => array(
					'unit' => '%',
					'size' => 100,
				),
				'height_default'    => array(
					'unit' => 'px',
					'size' => 70,
				),
			),
			'box_style_2'  => array(
				'id'           => $rbelad_prefix . '_box_style',
				'defaults'     => array(
					'border_normal_radius' => array(
						'top'      => 50,
						'right'    => 50,
						'bottom'   => 50,
						'left'     => 50,
						'unit'     => '%',
						'isLinked' => true,
					),
				),
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

$this->end_controls_section();
