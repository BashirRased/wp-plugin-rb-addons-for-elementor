<?php
/**
 * Divider widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix = $this->get_section_content_prefix( 'general' );

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$rbelad_prefix . '_content_1',
	array(
		'controls' => array(
			// Choose Elements.
			'icon_img_text' => array(
				'id'      => $rbelad_prefix . '_icon_img_text',
				'label'   => esc_html__( 'Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Click Here', 'rb-addons-for-elementor' ),
			),
		),
	),
);

$this->end_controls_section();
