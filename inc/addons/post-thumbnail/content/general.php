<?php
/**
 * Post Thumbnail widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_post_thumbnail_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'post-thumbnail' );

// All content add here - Post Thumbnail Type.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'post_thumbnail_type',
				'label'   => esc_html__( 'Thumbnail Type', 'rb-elementor-addons' ),
				'options' => array(
					'default' => esc_html__( 'Default Link', 'rb-elementor-addons' ),
					'custom'  => esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				),
				'default' => 'default',
			),

			// Upload Image.
			'img'           => array(
				'id'        => $prefix . 'custom_img',
				'condition' => array(
					$prefix . 'post_thumbnail_type' => 'custom',
				),
			),

			// Image Size.
			'img_size'      => array(
				'name' => $prefix . 'post_thumbnail_img',
			),
		),
	),
);

// All content add here - Post Thumbnail Link.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'post_thumbnail_link',
				'label'   => esc_html__( 'Thumbnail Link', 'rb-elementor-addons' ),
				'options' => array(
					'none'    => esc_html__( 'None', 'rb-elementor-addons' ),
					'default' => esc_html__( 'Default Link', 'rb-elementor-addons' ),
					'custom'  => esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				),
				'default' => 'default',
			),

			// Custom Link.
			'custom_link'   => array(
				'condition' => array(
					$prefix . 'post_thumbnail_link' => 'custom',
				),
			),
		),
	),
);

// All content add here - Post Thumbnail Caption.
$this->add_style_controls(
	$prefix . 'style_3',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'post_thumbnail_caption',
				'label'   => esc_html__( 'Thumbnail Caption', 'rb-elementor-addons' ),
				'options' => array(
					'none'    => esc_html__( 'None', 'rb-elementor-addons' ),
					'display' => esc_html__( 'Display', 'rb-elementor-addons' ),
					'hover'   => esc_html__( 'Display on hover', 'rb-elementor-addons' ),
				),
				'default' => 'none',
			),

		),
	),
);

// End Section Tab.
$this->end_controls_section();
