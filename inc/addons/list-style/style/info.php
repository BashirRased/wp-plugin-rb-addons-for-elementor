<?php
/**
 * List Style widget - Info style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix          = 'rbelad_lis_style_info_';
$description_cls = '{{WRAPPER}} .rbelad-list-item-info';
$cls_1           = '{{WRAPPER}} .rbelad-list-item-info';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_info',
	array(
		'label' => esc_html__( 'Info', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Margin & Padding.
			'margin' => array(
				'id'           => $prefix . 'info_margin',
				'default'      => array(
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '10',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
