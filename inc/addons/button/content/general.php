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
$prefix = 'rbelad_button_general_content_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Styles.
$choose_design_options = $this->get_choose_design_options( 'button' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Choose Design.
			'choose_design' => array(
				'id'      => $prefix . 'choose_design',
				'options' => $choose_design_options, // dynamically generated.
				'default' => array_key_first( $choose_design_options ), // first style as default.
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
				'label'   => esc_html__( 'Button Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Button', 'rb-addons-for-elementor' ),
			),

			// Link Type.
			'select_option' => array(
				'id'      => $prefix . 'link_type',
				'options' => array(
					'page'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
					'custom' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
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
