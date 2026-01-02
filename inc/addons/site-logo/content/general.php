<?php
/**
 * Site Logo widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_site_logo_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'site-logo' );

// All content add here - logo type.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'logo_type',
				'label'   => esc_html__( 'Logo Type', 'rb-elementor-addons' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'rb-elementor-addons' ),
					'custom'  => esc_html__( 'Custom', 'rb-elementor-addons' ),
				),
				'default' => 'default',
			),

			// Upload Image.
			'img'           => array(
				'id'    => $prefix . 'custom_logo',
				'label' => esc_html__( 'Custom Logo', 'rb-elementor-addons' ),
			),

			// Image Size.
			'img_size'      => array(
				'name'      => $prefix . 'site_logo_size',
				'default'   => 'thumbnail',
				'condition' => array(
					$prefix . 'logo_type' => 'custom',
				),
			),
		),
	),
);

// All content add here - link type.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'logo_link',
				'label'   => esc_html__( 'Logo Link', 'rb-elementor-addons' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'rb-elementor-addons' ),
					'custom'  => esc_html__( 'Custom', 'rb-elementor-addons' ),
				),
				'default' => 'default',
			),

			// Custom Link.
			'custom_link'   => array(
				'id'        => $prefix . 'custom_link',
				'condition' => array(
					$prefix . 'logo_link' => 'custom',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
