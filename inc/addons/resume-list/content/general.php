<?php
/**
 * Resume List widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_resume_list_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'resume-list' );

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			'text'     => array(
				'id'      => $prefix . 'resume_label',
				'label'   => esc_html__( 'Resume Label', 'rb-elementor-addons' ),
				'default' => esc_html__( 'January 2019 - April 2019', 'rb-elementor-addons' ),
			),
			'text_2'   => array(
				'id'      => $prefix . 'resume_title',
				'label'   => esc_html__( 'Resume Title', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Advanced WordPress Development', 'rb-elementor-addons' ),
			),
			'text_3'   => array(
				'id'      => $prefix . 'resume_subtitle',
				'label'   => esc_html__( 'Resume Subtitle', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Soft-tech IT Institute', 'rb-elementor-addons' ),
			),
			'textarea' => array(
				'id'      => $prefix . 'resume_description',
				'label'   => esc_html__( 'Resume Description', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam', 'rb-elementor-addons' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
