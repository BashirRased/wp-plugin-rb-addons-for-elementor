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
$rbelad_prefix  = $this->get_section_style_prefix( 'img' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-card__img-wrap';
$rbelad_class_2 = '{{WRAPPER}} .rbelad-card__img-wrap img';

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Image Box', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'height_width' => array(
				'id'           => $rbelad_prefix . '_height_width',
				'select_class' => $rbelad_class_2,
			),
			'box_style'    => array(
				'id'           => $rbelad_prefix . '_box_style',
				'select_class' => $rbelad_class_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
