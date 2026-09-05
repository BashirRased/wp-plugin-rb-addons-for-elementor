<?php
/**
 * Image widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_content_prefix = $this->get_section_content_prefix( 'general' );
$rbelad_prefix         = $this->get_section_style_prefix( 'caption' );
$rbelad_class_1        = '{{WRAPPER}} .rbelad-image__caption';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label'     => esc_html__( 'Caption', 'rb-addons-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			$rbelad_content_prefix . '_img_caption!' => 'none',
		),
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			// Typography.
			'rbelad_typography' => array(
				'id'           => $rbelad_prefix . '_rbelad_typography',
				'select_class' => $rbelad_class_1,
			),
			// Text Hover Color.
			'text_hover_color'  => array(
				'id'           => $rbelad_prefix . '_text_hover_color',
				'select_class' => $rbelad_class_1,
			),
			// Height Width.
			'height_width'      => array(
				'id'           => $rbelad_prefix . '_height_width',
				'select_class' => $rbelad_class_1,
			),
			// Spacing.
			'spacing'           => array(
				'id'           => $rbelad_prefix . '_spacing',
				'select_class' => $rbelad_class_1,
			),
			// Border.
			'border'            => array(
				'id'           => $rbelad_prefix . '_border',
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
