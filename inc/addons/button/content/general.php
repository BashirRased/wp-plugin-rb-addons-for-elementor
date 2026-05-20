<?php
/**
 * Button widget content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
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

// All content add here.
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Link Type.
			'select_option' => array(
				'id'      => $prefix . '_btn_type',
				'default' => '',
				'options' => array(
					''        => esc_html__( 'Default', 'rb-addons-for-elementor' ),
					'info'    => esc_html__( 'Info', 'rb-addons-for-elementor' ),
					'success' => esc_html__( 'Success', 'rb-addons-for-elementor' ),
					'warning' => esc_html__( 'Warning', 'rb-addons-for-elementor' ),
					'danger'  => esc_html__( 'Danger', 'rb-addons-for-elementor' ),
				),
			),

			// Text.
			'text'          => array(
				'id'          => $prefix . 'btn_text',
				'label'       => esc_html__( 'Button Text', 'rb-addons-for-elementor' ),
				'default'     => esc_html__( 'Click here', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Click here', 'rb-addons-for-elementor' ),
			),

			// Icon.
			'icon'          => array(
				'id'               => $prefix . 'btn_icon',
				'label'            => esc_html__( 'Button Icon', 'rb-addons-for-elementor' ),
				'fa4compatibility' => 'icon',
				'skin'             => 'inline',
			),
		),
	),
);

$this->rbelad_select_link_type(
	$prefix . 'style_2',
	array(
		'controls' => array(
			array(
				'name'    => $prefix . '_link_type',
				'label'   => esc_html__( 'Button Link Type', 'rb-addons-for-elementor' ),
				'default' => 'custom_link',
			),
		),
	)
);

// End Section Tab.
$this->end_controls_section();
