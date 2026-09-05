<?php
/**
 * Basic Gallery widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'image' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-gallery__image';
$rbelad_class_2 = '{{WRAPPER}} .rbelad-gallery__item';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			// Height Width.
			'height_width' => array(
				'id'           => $rbelad_prefix . '_height_width',
				'select_class' => $rbelad_class_1,
			),
			// Spacing.
			'spacing'      => array(
				'id'           => $rbelad_prefix . '_spacing',
				'select_class' => $rbelad_class_2,
			),
			// Border.
			'border'       => array(
				'id'           => $rbelad_prefix . '_border',
				'select_class' => $rbelad_class_2,
			),
			// Column.
			'column'       => array(
				'id'           => $rbelad_prefix . '_column',
				'select_class' => $rbelad_class_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
