<?php
/**
 * List Style widget - Wrapper style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_lis_style_wrap_';
$cls_1  = '{{WRAPPER}} .rbelad-list-style';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_wrapper',
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
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
