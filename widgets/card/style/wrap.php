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

$this->add_responsive_control(
	$rbelad_prefix . '_columns',
	array(
		'label'                => esc_html__( 'Columns', 'rb-addons-for-elementor' ),
		'type'                 => Controls_Manager::SELECT,
		'default'              => '2',
		'options'              => array(
			'1' => '1 Column',
			'2' => '2 Columns',
			'3' => '3 Columns',
			'4' => '4 Columns',
			'5' => '5 Columns',
			'6' => '6 Columns',
		),
		'selectors_dictionary' => array(
			'1' => '100%',
			'2' => '50%',
			'3' => '33.333%',
			'4' => '25%',
			'5' => '20%',
			'6' => '16.667%',
		),
		'selectors'            => array(
			'{{WRAPPER}} .rbelad-card__item' => 'flex: 0 0 auto; width: {{VALUE}};',
		),
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'flex'         => array(
				'id'           => $rbelad_prefix . '_flex',
				'select_class' => $rbelad_class_1,
			),
			'height_width' => array(
				'id'           => $rbelad_prefix . '_height_width',
				'select_class' => $rbelad_class_1,
			),
			'box_style'    => array(
				'id'           => $rbelad_prefix . '_box_style',
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
