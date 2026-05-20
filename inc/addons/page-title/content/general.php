<?php
/**
 * Page Title widget content controls.
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
			// Heading Tag.
			'heading_tag'   => array(
				'id'      => $prefix . '_page_title_tag',
				'label'   => esc_html__( 'Title HTML Tag', 'rb-addons-for-elementor' ),
				'default' => 'h2',
			),

			// Switch.
			'switch'        => array(
				'id'      => $prefix . '_enable_link',
				'label'   => esc_html__( 'Enable Link', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),

			// Select Option.
			'select_option' => array(
				'id'        => $prefix . '_link_type',
				'label'     => esc_html__( 'Link Type', 'rb-addons-for-elementor' ),
				'default'   => 'dynamic',
				'options'   => array(
					'dynamic' => esc_html__( 'Dynamic', 'rb-addons-for-elementor' ),
					'custom'  => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
				),
				'condition' => array(
					$prefix . '_enable_link' => 'yes',
				),
			),

			// Switch.
			'switch_2'      => array(
				'id'        => $prefix . '_dynamic_link_external',
				'label'     => esc_html__( 'Open in new window', 'rb-addons-for-elementor' ),
				'default'   => 'no',
				'condition' => array(
					$prefix . '_enable_link' => 'yes',
					$prefix . '_link_type'   => 'dynamic',
				),
			),

			// Switch.
			'switch_3'      => array(
				'id'        => $prefix . '_dynamic_link_nofollow',
				'label'     => esc_html__( 'Add nofollow', 'rb-addons-for-elementor' ),
				'default'   => 'no',
				'condition' => array(
					$prefix . '_enable_link' => 'yes',
					$prefix . '_link_type'   => 'dynamic',
				),
			),

			// Custom Link.
			'custom_link'   => array(
				'id'        => $prefix . '_custom_link',
				'condition' => array(
					$prefix . '_enable_link' => 'yes',
					$prefix . '_link_type'   => 'custom',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
