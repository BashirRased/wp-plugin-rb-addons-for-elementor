<?php
use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'general_content',
	[
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All content add here
$this->add_style_controls(
	'resume_item_general_content',
	[
		'controls' => [
			'text' 						=> [
				'id' 					=> 'resume_label',
				'label' 				=> esc_html__( 'Resume Label', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'January 2019 - April 2019', 'rb-elementor-addons' ),
			],
			'text_2' 					=> [
				'id' 					=> 'resume_title',
				'label' 				=> esc_html__( 'Resume Title', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Advanced WordPress Development', 'rb-elementor-addons' ),
			],
			'text_3' 					=> [
				'id' 					=> 'resume_subtitle',
				'label' 				=> esc_html__( 'Resume Subtitle', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Soft-tech IT Institute', 'rb-elementor-addons' ),
			],
			'textarea' 					=> [
				'id' 					=> 'resume_description',
				'label' 				=> esc_html__( 'Resume Description', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam', 'rb-elementor-addons' ),
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();