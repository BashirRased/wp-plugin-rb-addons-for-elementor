<?php
/**
 * Icon List widget - Separator style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'separator' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-icon-list__separator';
$rbelad_class_2 = '{{WRAPPER}} .rbelad-icon-list__separator-text';
$rbelad_class_3 = '{{WRAPPER}} .rbelad-icon-list__separator-icon';
$rbelad_class_4 = '{{WRAPPER}} .rbelad-icon-list__separator-img';
$rbelad_class_5 = '{{WRAPPER}} .rbelad-icon-list__separator-img img';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Separator', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'display'           => array(
				'id'           => $rbelad_prefix . '_display',
				'default'      => 'inline-block',
				'select_class' => $rbelad_class_1,
			),
			'rbelad_typography' => array(
				'id'           => $rbelad_prefix . '_rbelad_typography',
				'select_class' => $rbelad_class_2,
			),
			'text_color'        => array(
				'id'           => $rbelad_prefix . '_text_color',
				'select_class' => $rbelad_class_2,
			),
			'icon_style'        => array(
				'id'           => $rbelad_prefix . '_icon_style',
				'select_class' => $rbelad_class_3,
			),
			'box_style'         => array(
				'id'           => $rbelad_prefix . '_box_style',
				'select_class' => $rbelad_class_4,
			),
			'height_width'      => array(
				'id'           => $rbelad_prefix . '_height_width',
				'select_class' => $rbelad_class_5,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
