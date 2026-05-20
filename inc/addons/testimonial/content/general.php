<?php
/**
 * Testimonial widget content controls.
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
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Textarea.
			'textarea'   => array(
				'id'      => $prefix . '_testimonial_content',
				'label' => esc_html__( 'Content', 'rb-addons-for-elementor' ),
				'rows' => '10',
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'rb-addons-for-elementor' ),
			),

			// Image.
			'img'   => array(
				'id'      => $prefix . '_testimonial_image',
			),

			// Image Size.
			'img_size'   => array(
				'id'      => $prefix . '_testimonial_image',
			),

			// Text.
			'text'   => array(
				'id'      => $prefix . '_testimonial_name',
				'label' => esc_html__( 'Name', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'John Doe', 'rb-addons-for-elementor' ),
			),

			// Text.
			'text_2'   => array(
				'id'      => $prefix . '_testimonial_job',
				'label' => esc_html__( 'Title', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Designer', 'rb-addons-for-elementor' ),
			),

			// Custom Link.
			'custom_link'   => array(
				'id'      => $prefix . '_testimonial_link',
				'label' => esc_html__( 'Link', 'rb-addons-for-elementor' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
