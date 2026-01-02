<?php
/**
 * Dual Text widget content controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_dual_text_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'repeater',
	array(
		'controls'    => array(
			'switch' => array(
				'id'      => $prefix . 'title_highlight',
				'label'   => esc_html__( 'Title Text Highlight', 'rb-elementor-addons' ),
				'default' => 'no',
			),
			'text'   => array(
				'id'    => $prefix . 'title_text',
				'label' => esc_html__( 'Title Text', 'rb-elementor-addons' ),
			),
		),
		'id'          => $prefix . 'title_repeater',
		'label'       => esc_html__( 'Dual Text Item', 'rb-elementor-addons' ),
		'default'     => array(
			array(
				$prefix . 'title_highlight' => 'no',
				$prefix . 'title_text'      => esc_html__( 'Hi! I\'m ', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'title_highlight' => 'yes',
				$prefix . 'title_text'      => esc_html__( 'Bashir Rased', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'title_highlight' => 'no',
				$prefix . 'title_text'      => esc_html__( '. Welcome, to my portfolio website.', 'rb-elementor-addons' ),
			),
		),
		'title_field' => '{{{ rbelad_dual_text_general_content_title_text }}}',
	),
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// HTML Tag.
			'html_tag'    => array(
				'id'      => $prefix . 'html_tag',
				'default' => 'h4',
			),

			// Custom Link.
			'custom_link' => array(
				'id' => $prefix . 'link',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
