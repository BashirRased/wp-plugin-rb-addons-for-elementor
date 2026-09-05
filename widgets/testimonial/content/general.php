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
			// Rating Icon.
			'rating_icon'      => array(
				'id' => $rbelad_prefix . '_testimonial_rating',
			),

			// Textarea.
			'textarea'         => array(
				'id'      => $rbelad_prefix . '_testimonial_content',
				'label'   => esc_html__( 'Content', 'rb-addons-for-elementor' ),
				'rows'    => '10',
				'default' => esc_html__( "Listened carefully to Lisa's needs and translated them into a stunning is a website. The design is modern and to calming, with beautiful imagery that captures the essence of Blooming", 'rb-addons-for-elementor' ),
			),

			// Image.
			'img'              => array(
				'id' => $rbelad_prefix . '_testimonial_reviewer_img',
			),

			// Image.
			'img_size'         => array(
				'name' => $rbelad_prefix . '_testimonial_reviewer_img_size',
			),

			// Text.
			'text'             => array(
				'id'      => $rbelad_prefix . '_testimonial_name',
				'label'   => esc_html__( 'Name', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'John Doe', 'rb-addons-for-elementor' ),
			),

			// HTML Tag.
			'html_tag'         => array(
				'id'      => $rbelad_prefix . '_html_tag',
				'default' => 'h2',
			),

			// Custom Link.
			'select_link_type' => array(
				'id' => $rbelad_prefix . '_testimonial_select_link_type',
			),

			// Text.
			'text_2'           => array(
				'id'      => $rbelad_prefix . '_testimonial_job',
				'label'   => esc_html__( 'Designer', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Designer', 'rb-addons-for-elementor' ),
			),

			// Icon.
			'icon_img'         => array(
				'id'      => $rbelad_prefix . '_testimonial_quote_icon_img',
				'label'   => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'default' => 'icon',
			),

			// Icon Image.
			'img_2'            => array(
				'id'        => $rbelad_prefix . '_testimonial_quote_img',
				'label'     => esc_html__( 'Quotation Icon Image', 'rb-addons-for-elementor' ),
				'condition' => array(
					$rbelad_prefix . '_testimonial_quote_icon_img' => 'image',
				),
			),

			// Testimonial Quotation Icon.
			'icon_4'           => array(
				'id'                     => $rbelad_prefix . '_testimonial_quote_icon',
				'label'                  => esc_html__( 'Quotation Icon', 'rb-addons-for-elementor' ),
				'skin'                   => 'inline',
				'label_block'            => false,
				'skin_settings'          => array(
					'inline' => array(
						'icon' => array(
							'icon' => 'fas fa-quote-left',
						),
					),
				),
				'recommended'            => array(
					'fa-solid'   => array(
						'quote-left',
						'quote-right',
						'comment',
						'comments',
						'quote-left-alt',
						'quote-right-alt',
					),
					'fa-regular' => array(
						'comment',
						'comments',
					),
				),
				'default'                => array(
					'value'   => 'fas fa-quote-left',
					'library' => 'fa-solid',
				),
				'exclude_inline_options' => array( 'none' ),
				'condition'              => array(
					$rbelad_prefix . '_testimonial_quote_icon_img' => 'icon',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
