<?php
/**
 * Button Group widget content controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_button_group_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Select Style.
			'select_option' => array(
				'id'      => $prefix . 'choose_style',
				'options' => array(
					'style-1' => esc_html__( 'Style - 01', 'rb-elementor-addons' ),
					'style-2' => esc_html__( 'Style - 02', 'rb-elementor-addons' ),
				),
				'default' => 'style-1',
			),
		),
	),
);

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'style_2',
	array(
		'controls'    => array(
			'text'        => array(
				'id'      => $prefix . 'btn_text',
				'label'   => esc_html__( 'Button Text', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Button', 'rb-elementor-addons' ),
			),
			'select'      => array(
				'id'      => $prefix . 'link_type',
				'label'   => esc_html__( 'Link Type', 'rb-elementor-addons' ),
				'options' => array(
					'page'   => esc_html__( 'Page Link', 'rb-elementor-addons' ),
					'custom' => esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				),
				'default' => 'custom',
			),
			'page_link'   => array(
				'id'        => $prefix . 'page_link',
				'condition' => array(
					$prefix . 'link_type' => 'page',
				),
			),
			'custom_link' => array(
				'id'        => $prefix . 'custom_link',
				'condition' => array(
					'link_type' => 'custom',
				),
			),
		),
		'id'          => $prefix . 'repeater',
		'label'       => esc_html__( 'Social Icon Item', 'rb-elementor-addons' ),
		'default'     => array(
			array(
				$prefix . 'btn_text' => esc_html__( 'Download CV', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'btn_text' => esc_html__( 'Contact Me', 'rb-elementor-addons' ),
			),
		),
		'title_field' => '{{{ rbelad_button_group_general_content_btn_text }}}',
	),
);

// End Section Tab.
$this->end_controls_section();
