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
$prefix = 'rbelad_button_general_content_';
use RBELAD_Elementor_Addons\Utilities;

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'button' );

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

// All content add here.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Text.
			'text'          => array(
				'id'      => $prefix . 'btn_text',
				'label'   => esc_html__( 'Button Text', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Button', 'rb-elementor-addons' ),
			),

			// Link Type.
			'select_option' => array(
				'id'      => $prefix . 'link_type',
				'options' => array(
					'page'   => esc_html__( 'Page Link', 'rb-elementor-addons' ),
					'custom' => esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				),
				'default' => 'custom',
			),

			// Select Page.
			'page_link'     => array(
				'id'        => $prefix . 'page_link',
				'condition' => array(
					$prefix . 'link_type' => 'page',
				),
			),

			// Custom Link.
			'custom_link'   => array(
				'id'        => $prefix . 'custom_link',
				'condition' => array(
					$prefix . 'link_type' => 'custom',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
