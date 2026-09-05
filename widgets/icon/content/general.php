<?php
/**
 * Button widget content controls.
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
			// Icon.
			'icon_simple'      => array(
				'id'               => $rbelad_prefix . '_icon_simple',
				'label'            => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'fa4compatibility' => $rbelad_prefix . '_icon',
				'default'          => array(
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				),
			),
			'select_link_type' => array(
				'id' => $rbelad_prefix . '_select_link_type',
			),
		),
	),
);

$this->end_controls_section();
