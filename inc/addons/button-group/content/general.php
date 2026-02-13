<?php
/**
 * Button Group widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_button_group_general_content_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Styles.
$choose_design_options = $this->get_choose_design_options( 'button-group' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

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

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'style_2',
	array(
		'controls'    => array(
			'text'        => array(
				'id'      => $prefix . 'btn_text',
				'label'   => esc_html__( 'Button Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Button', 'rb-addons-for-elementor' ),
			),
			'select'      => array(
				'id'      => $prefix . 'link_type',
				'label'   => esc_html__( 'Link Type', 'rb-addons-for-elementor' ),
				'options' => array(
					'none'   => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'page'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
					'custom' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
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
					$prefix . 'link_type' => 'custom',
				),
			),
		),
		'id'          => $prefix . 'repeater',
		'label'       => esc_html__( 'Social Icon Item', 'rb-addons-for-elementor' ),
		'default'     => array(
			array(
				$prefix . 'btn_text' => esc_html__( 'Download CV', 'rb-addons-for-elementor' ),
			),
			array(
				$prefix . 'btn_text' => esc_html__( 'Contact Me', 'rb-addons-for-elementor' ),
			),
		),
		'title_field' => '{{{ rbelad_button_group_general_content_btn_text }}}',
	),
);

// End Section Tab.
$this->end_controls_section();
