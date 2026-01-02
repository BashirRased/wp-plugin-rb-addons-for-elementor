<?php
/**
 * Rating Skill widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_rating_skill_general_';
$cls_1  = '{{WRAPPER}} .rbelad-rating-skill i';
$cls_2  = '{{WRAPPER}} .rbelad-rating-skill';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			'color'         => array(
				'default'      => '#FF9C00',
				'select_class' => $cls_1,
			),
			'font_size'     => array(
				'default'      => array(
					'unit' => 'px',
					'size' => 16,
				),
				'select_class' => $cls_1,
			),
			'gap'           => array(
				'default'      => array(
					'unit' => 'px',
					'size' => 3,
				),
				'select_class' => $cls_2,
			),
			'item_align' => array(
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
