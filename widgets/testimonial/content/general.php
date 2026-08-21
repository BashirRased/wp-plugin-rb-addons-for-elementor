<?php
/**
 * Testimonial widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix = $this->get_section_content_prefix( 'general' );

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$rbelad_prefix . '_content_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $rbelad_prefix . '_rating',
				'option'  => array(
					'zero-star'       => esc_html__( '0 Star', 'rb-addons-for-elementor' ),
					'one-star'        => esc_html__( '1 Star', 'rb-addons-for-elementor' ),
					'one-half-star'   => esc_html__( '1.5 Star', 'rb-addons-for-elementor' ),
					'two-star'        => esc_html__( '2 Star', 'rb-addons-for-elementor' ),
					'two-half-star'   => esc_html__( '2.5 Star', 'rb-addons-for-elementor' ),
					'three-star'      => esc_html__( '3 Star', 'rb-addons-for-elementor' ),
					'three-half-star' => esc_html__( '3.5 Star', 'rb-addons-for-elementor' ),
					'four-star'       => esc_html__( '4 Star', 'rb-addons-for-elementor' ),
					'four-half-star'  => esc_html__( '4.5 Star', 'rb-addons-for-elementor' ),
					'five-star'       => esc_html__( '5 Star', 'rb-addons-for-elementor' ),
				),
				'default' => 'five-star',
			),

			// Textarea.
			'textarea'      => array(
				'id'      => $rbelad_prefix . '_testimonial_content',
				'label'   => esc_html__( 'Content', 'rb-addons-for-elementor' ),
				'rows'    => '10',
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'rb-addons-for-elementor' ),
			),

			// Image.
			'img'           => array(
				'id' => $rbelad_prefix . '_testimonial_image',
			),

			// Image Size.
			'img_size'      => array(
				'id' => $rbelad_prefix . '_testimonial_image',
			),

			// Text.
			'text'          => array(
				'id'      => $rbelad_prefix . '_testimonial_name',
				'label'   => esc_html__( 'Name', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'John Doe', 'rb-addons-for-elementor' ),
			),

			// Text.
			'text_2'        => array(
				'id'      => $rbelad_prefix . '_testimonial_job',
				'label'   => esc_html__( 'Title', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Designer', 'rb-addons-for-elementor' ),
			),

			// Custom Link.
			'custom_link'   => array(
				'id'    => $rbelad_prefix . '_testimonial_link',
				'label' => esc_html__( 'Link', 'rb-addons-for-elementor' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
