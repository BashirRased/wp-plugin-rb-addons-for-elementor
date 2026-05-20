<?php
/**
 * Author Box widget content controls.
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
			// Switch.
			'switch'        => array(
				'id'      => $prefix . '_author_name',
				'label'   => esc_html__( 'Show Author Name', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),

			// Heading Tag.
			'heading_tag'   => array(
				'id'        => $prefix . '_name_tag',
				'label'     => esc_html__( 'Author Name Tag', 'rb-addons-for-elementor' ),
				'default'   => 'h4',
				'condition' => array(
					$prefix . '_author_name' => 'yes',
				),
			),

			// Switch.
			'switch_2'      => array(
				'id'      => $prefix . '_avatar',
				'label'   => esc_html__( 'Show Avatar', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),

			// Switch.
			'switch_3'      => array(
				'id'    => $prefix . '_short_bio',
				'label' => esc_html__( 'Show Short Bio', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_4'      => array(
				'id'    => $prefix . '_archive_btn',
				'label' => esc_html__( 'Show Archive Button', 'rb-addons-for-elementor' ),
			),

			// Select Option.
			'select_option' => array(
				'id'          => $prefix . '_author_link',
				'label'       => esc_html__( 'Link', 'rb-addons-for-elementor' ),
				'options'     => array(
					''              => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'website'       => esc_html__( 'Website', 'rb-addons-for-elementor' ),
					'admin_archive' => esc_html__( 'Admin Posts', 'rb-addons-for-elementor' ),
				),
				'description' => esc_html__( 'Link for the Author Name and Image', 'rb-addons-for-elementor' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
