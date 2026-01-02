<?php
/**
 * Post Thumbnail widget - General style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_post_thumbnail_general_';
$cls_1  = '{{WRAPPER}} .rbelad-post-thumbnail';
$cls_2  = '{{WRAPPER}} .rbelad-post-thumbnail-wrapper';

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
			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'width',
				'select_class' => $cls_1,
			),
			'max_width'              => array(
				'id'           => $prefix . 'max_width',
				'select_class' => $cls_1,
			),
			'height'                 => array(
				'id'           => $prefix . 'height',
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Text Align.
			'align'                  => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
