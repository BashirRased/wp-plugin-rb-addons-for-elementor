<?php
/**
 * Image widget content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_content_prefix( 'general' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . '_style_1',
	array(
		'controls' => array(
			// Image.
			'img'           => array(
				'id' => $prefix . '_img',
			),

			// Image Size.
			'img_size'      => array(
				'id' => $prefix . '_img_size',
			),

			// Link Type.
			'select_option' => array(
				'id'      => $prefix . '_link_type',
				'options' => array(
					'none'   => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'page'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
					'post'   => esc_html__( 'Post Link', 'rb-addons-for-elementor' ),
					'custom' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
				),
				'default' => 'none',
			),

			// Select Page.
			'page_link'     => array(
				'id'        => $prefix . '_page_link',
				'condition' => array(
					$prefix . '_link_type' => 'page',
				),
			),

			// Select Post.
			'post_link'     => array(
				'id'        => $prefix . '_post_link',
				'condition' => array(
					$prefix . '_link_type' => 'post',
				),
			),

			// Custom Link.
			'custom_link'   => array(
				'id'        => $prefix . '_custom_link',
				'condition' => array(
					$prefix . '_link_type' => 'custom',
				),
			),
		),
	),
);

// All content add here.
$this->add_style_controls(
	$prefix . '_style_2',
	array(
		'controls' => array(
			// Image Caption Type.
			'select_option' => array(
				'id'      => $prefix . '_img_caption',
				'label'   => esc_html__( 'Caption', 'rb-addons-for-elementor' ),
				'options' => array(
					'none'       => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'attachment' => esc_html__( 'Attachment Caption', 'rb-addons-for-elementor' ),
					'custom'     => esc_html__( 'Custom Caption', 'rb-addons-for-elementor' ),
				),
				'default' => 'none',
			),

			// Image Custom Caption.
			'text'          => array(
				'id'          => $prefix . '_img_caption_text',
				'label'       => esc_html__( 'Custom Caption', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your image caption', 'rb-addons-for-elementor' ),
				'condition'   => array(
					$prefix . '_img_caption' => 'custom',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
