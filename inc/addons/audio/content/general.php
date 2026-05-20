<?php
/**
 * Audio widget content controls.
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
			// Custom Link.
			'custom_link' => array(
				'id'      => $prefix . '_link',
				'default' => array(
					'url' => esc_url( 'https://soundcloud.com/shchxango/john-coltrane-1963-my-favorite' ),
				),
			),

			// Switch.
			'switch'      => array(
				'id'      => $prefix . '_visual_player',
				'label'   => esc_html__( 'Visual Player', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),

			// Switch.
			'switch_2'    => array(
				'id'      => $prefix . '_autoplay',
				'label'   => esc_html__( 'Autoplay', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),

			// Switch.
			'switch_3'    => array(
				'id'    => $prefix . '_buying_btn',
				'label' => esc_html__( 'Buy Button', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_4'    => array(
				'id'    => $prefix . '_like_btn',
				'label' => esc_html__( 'Like Button', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_5'    => array(
				'id'    => $prefix . '_download_btn',
				'label' => esc_html__( 'Download Button', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_6'    => array(
				'id'    => $prefix . '_artwork',
				'label' => esc_html__( 'Artwork', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_7'    => array(
				'id'    => $prefix . '_share_btn',
				'label' => esc_html__( 'Share Button', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_8'    => array(
				'id'    => $prefix . '_comments',
				'label' => esc_html__( 'Comments', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_9'    => array(
				'id'    => $prefix . '_play_counts',
				'label' => esc_html__( 'Play Counts', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_10'   => array(
				'id'    => $prefix . '_username',
				'label' => esc_html__( 'Username', 'rb-addons-for-elementor' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
