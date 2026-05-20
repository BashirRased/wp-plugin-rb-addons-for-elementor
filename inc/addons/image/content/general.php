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
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Image.
			'img'             => array(
				'id' => $prefix . '_img',
			),

			// Image Size.
			'img_size'        => array(
				'name' => $prefix . '_img',
			),

			// Select Option.
			'select_option'   => array(
				'id'        => $prefix . '_caption_source',
				'label'     => esc_html__( 'Caption', 'rb-addons-for-elementor' ),
				'options'   => array(
					'none'       => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'attachment' => esc_html__( 'Attachment Caption', 'rb-addons-for-elementor' ),
					'custom'     => esc_html__( 'Custom Caption', 'rb-addons-for-elementor' ),
				),
				'default'   => 'none',
				'condition' => array(
					$prefix . '_img!' => '',
				),
			),

			// Text.
			'text'            => array(
				'id'          => $prefix . '_custom_caption',
				'label'       => esc_html__( 'Custom Caption', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your image caption', 'elementor' ),
				'condition'   => array(
					$prefix . '_img!'           => '',
					$prefix . '_caption_source' => 'custom',
				),
			),

			// Select Option.
			'select_option_2' => array(
				'id'        => $prefix . '_select_link',
				'label'     => esc_html__( 'Link', 'rb-addons-for-elementor' ),
				'options'   => array(
					'none'   => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'file'   => esc_html__( 'Media File', 'rb-addons-for-elementor' ),
					'custom' => esc_html__( 'Custom URL', 'rb-addons-for-elementor' ),
				),
				'default'   => 'none',
				'condition' => array(
					$prefix . '_img!' => '',
				),
			),

			// Custom Link.
			'custom_link'     => array(
				'id'        => $prefix . '_custom_caption',
				'label'     => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_img!'           => '',
					$prefix . '_caption_source' => 'custom',
				),
			),

			// Select Option.
			'select_option_3' => array(
				'id'          => $prefix . '_open_lightbox',
				'label'       => esc_html__( 'Lightbox', 'rb-addons-for-elementor' ),
				'description' => sprintf(
					/* translators: 1: Link open tag, 2: Link close tag. */
					esc_html__( 'Manage your site’s lightbox settings in the %1$sLightbox panel%2$s.', 'rb-addons-for-elementor' ),
					'<a href="javascript: $e.run( \'panel/global/open\' ).then( () => $e.route( \'panel/global/settings-lightbox\' ) )">',
					'</a>'
				),
				'default'     => 'default',
				'options'     => array(
					'default' => esc_html__( 'Default', 'rb-addons-for-elementor' ),
					'yes'     => esc_html__( 'Yes', 'rb-addons-for-elementor' ),
					'no'      => esc_html__( 'No', 'rb-addons-for-elementor' ),
				),
				'condition'   => array(
					$prefix . '_img!'        => '',
					$prefix . '_select_link' => 'file',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
