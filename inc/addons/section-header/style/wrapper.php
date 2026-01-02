<?php
/**
 * Section Header widget - Wrapper style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_wrapper';
$cls_1  = '{{WRAPPER}} .rbelad-section-header';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Wrapper', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Text Align.
			'align' => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_justify(),
				'default'      => 'center',
				'select_class' => '{{WRAPPER}} .rbelad-section-header',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
