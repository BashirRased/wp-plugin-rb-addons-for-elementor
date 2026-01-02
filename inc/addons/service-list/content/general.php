<?php
/**
 * Service List widget content controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_service_list_general_content_';

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
			// Choose Design.
			'choose_design' => array(
				'id'      => $prefix . 'service_style',
				'options' => array(
					'style-1' => array(
						'title' => esc_attr__( 'Style - 1', 'rb-elementor-addons' ),
						'image' => plugins_url( 'assets/img/service-list/style-1.png', RBELAD_PLUGIN_FILE ),
					),
					'style-2' => array(
						'title' => esc_attr__( 'Style - 2', 'rb-elementor-addons' ),
						'image' => plugins_url( 'assets/img/service-list/style-2.png', RBELAD_PLUGIN_FILE ),
					),
				),
			),

			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'icon_type',
				'label'   => esc_html__( 'Select Icon', 'rb-elementor-addons' ),
				'options' => array(
					'icon' => esc_html__( 'Font Icon', 'rb-elementor-addons' ),
					'img'  => esc_html__( 'Image Icon', 'rb-elementor-addons' ),
				),
				'default' => 'icon',
			),

			// Upload Icon.
			'icon'          => array(
				'id'        => $prefix . 'font_icon',
				'label'     => esc_html__( 'Font Icon', 'rb-elementor-addons' ),
				'default'   => array(
					'value'   => 'fas fa-palette',
					'library' => 'fa-solid',
				),
				'condition' => array(
					$prefix . 'icon_type' => 'icon',
				),
			),

			// Image Icon.
			'img'           => array(
				'id'        => $prefix . 'image_icon',
				'label'     => esc_html__( 'Image Icon', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'icon_type' => 'img',
				),
			),

			// Service Title.
			'text'          => array(
				'id'      => $prefix . 'servie_title',
				'label'   => esc_html__( 'Service Title', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Graphic Design', 'rb-elementor-addons' ),
			),

			// HTML Tag.
			'html_tag'      => array(
				'id'      => $prefix . 'html_tag',
				'default' => 'h4',
			),

			// Service Description.
			'textarea'      => array(
				'id'      => $prefix . 'servie_description',
				'label'   => esc_html__( 'Service Description', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam', 'rb-elementor-addons' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
