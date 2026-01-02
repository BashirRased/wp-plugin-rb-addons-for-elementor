<?php
/**
 * Author Meta widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_author_meta_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'author-meta' );

// All content add here - Icon.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Upload Icon.
			'icon' => array(
				'id'    => $prefix . 'icon_font',
				'label' => esc_html__( 'Font Icon', 'rb-elementor-addons' ),
			),
		),
	),
);

// All content add here - Prefix.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'author_prefix_separtor',
				'label'   => esc_html__( 'Author Prefix', 'rb-elementor-addons' ),
				'options' => array(
					'none' => esc_html__( 'None', 'rb-elementor-addons' ),
					'text' => esc_html__( 'Text', 'rb-elementor-addons' ),
					'icon' => esc_html__( 'Icon', 'rb-elementor-addons' ),
					'img'  => esc_html__( 'Image', 'rb-elementor-addons' ),
				),
				'default' => 'none',
			),

			// Text.
			'text'          => array(
				'id'        => $prefix . 'prefix_text',
				'label'     => esc_html__( 'Prefix Text', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'author_prefix_separtor' => 'text',
				),
			),

			// Upload Icon.
			'icon'          => array(
				'id'        => $prefix . 'prefix_font',
				'condition' => array(
					$prefix . 'author_prefix_separtor' => 'icon',
				),
			),

			// Upload Image.
			'img'           => array(
				'id'        => $prefix . 'prefix_img',
				'label'     => esc_html__( 'Image Icon', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'author_prefix_separtor' => 'img',
				),
			),
		),
	),
);

// All content add here - Link.
$this->add_style_controls(
	$prefix . 'style_3',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'author_link',
				'label'   => esc_html__( 'Author Link', 'rb-elementor-addons' ),
				'options' => array(
					'none'    => esc_html__( 'None', 'rb-elementor-addons' ),
					'default' => esc_html__( 'default', 'rb-elementor-addons' ),
				),
				'default' => 'default',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
