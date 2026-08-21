<?php
/**
 * Icon List widget - Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'icon' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-icon-list__icon';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'icon_style' => array(
				'id'           => $rbelad_prefix . '_icon_style',
				'select_class' => $rbelad_class_1,
			),
			'box_style'  => array(
				'id'           => $rbelad_prefix . '_box_style',
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
