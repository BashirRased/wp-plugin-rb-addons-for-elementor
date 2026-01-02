<?php
/**
 * Site Title widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_site_title_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'site-title' );

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'link_type',
				'label'   => esc_html__( 'Link Type', 'rb-elementor-addons' ),
				'options' => array(
					'none'   => esc_html__( 'None', 'rb-elementor-addons' ),
					'home'   => esc_html__( 'Home Link', 'rb-elementor-addons' ),
					'page'   => esc_html__( 'Page Link', 'rb-elementor-addons' ),
					'custom' => esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				),
				'default' => 'home',
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

			// HTML Tag.
			'heading_tag'      => array(
				'id'      => $prefix . 'heading_tag',
				'default' => 'h1',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
