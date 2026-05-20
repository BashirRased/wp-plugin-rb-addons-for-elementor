<?php
/**
 * Video widget - settings content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix         = $this->get_section_content_prefix( 'settings' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix_general = $this->get_section_content_prefix( 'general' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Settings', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Number.
			'number'          => array(
				'id'          => $prefix . '_start',
				'label'       => esc_html__( 'Start Time', 'rb-addons-for-elementor' ),
				'description' => esc_html__( 'Specify a start time (in seconds)', 'rb-addons-for-elementor' ),
			),

			// Number.
			'number_2'        => array(
				'id'          => $prefix . '_end',
				'label'       => esc_html__( 'End Time', 'rb-addons-for-elementor' ),
				'description' => esc_html__( 'Specify a end time (in seconds)', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch'          => array(
				'id'    => $prefix . '_autoplay',
				'label' => esc_html__( 'Autoplay', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_2'        => array(
				'id'        => $prefix . '_play_on_mobile',
				'label'     => esc_html__( 'Play On Mobile', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_autoplay' => 'yes',
				),
			),

			// Switch.
			'switch_3'        => array(
				'id'    => $prefix . '_mute',
				'label' => esc_html__( 'Mute', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch_4'        => array(
				'id'        => $prefix . '_loop',
				'label'     => esc_html__( 'Loop', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type!' => 'dailymotion',
				),
			),

			// Switch.
			'switch_5'        => array(
				'id'        => $prefix . '_controls',
				'label'     => esc_html__( 'Player Controls', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type!' => 'vimeo',
				),
			),

			// Switch.
			'switch_6'        => array(
				'id'        => $prefix . '_showinfo',
				'label'     => esc_html__( 'Video Info', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'dailymotion',
				),
			),

			// Switch.
			'switch_7'        => array(
				'id'        => $prefix . '_cc_load_policy',
				'label'     => esc_html__( 'Captions', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => array( 'youtube' ),
					$prefix . '_controls'           => 'yes',
				),
			),

			// Switch.
			'switch_8'        => array(
				'id'        => $prefix . '_logo',
				'label'     => esc_html__( 'Logo', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'dailymotion',
				),
			),

			// Switch.
			'switch_9'        => array(
				'id'          => $prefix . '_yt_privacy',
				'label'       => esc_html__( 'Privacy Mode', 'rb-addons-for-elementor' ),
				'description' => esc_html__( 'When you turn on privacy mode, YouTube/Vimeo won\'t store information about visitors on your website unless they play the video.', 'rb-addons-for-elementor' ),
				'condition'   => array(
					$prefix_general . '_video_type' => array( 'youtube', 'vimeo' ),
				),
			),

			// Switch.
			'switch_10'       => array(
				'id'        => $prefix . '_lazy_load',
				'label'     => esc_html__( 'Lazy Load', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'hosted',
				),
			),

			// Select Option.
			'select_option'   => array(
				'id'        => $prefix . '_rel',
				'label'     => esc_html__( 'Suggested Videos', 'rb-addons-for-elementor' ),
				'options'   => array(
					''    => esc_html__( 'Current Video Channel', 'elementor' ),
					'yes' => esc_html__( 'Any Video', 'elementor' ),
				),
				'condition' => array(
					$prefix_general . '_video_type' => 'youtube',
				),
			),

			// Switch.
			'switch_11'       => array(
				'id'        => $prefix . '_vimeo_title',
				'label'     => esc_html__( 'Intro Title', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'vimeo',
				),
			),

			// Switch.
			'switch_12'       => array(
				'id'        => $prefix . '_vimeo_portrait',
				'label'     => esc_html__( 'Intro Portrait', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'vimeo',
				),
			),

			// Switch.
			'switch_13'       => array(
				'id'        => $prefix . '_vimeo_byline',
				'label'     => esc_html__( 'Intro Byline', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'vimeo',
				),
			),

			// Switch.
			'switch_14'       => array(
				'id'        => $prefix . '_download_button',
				'label'     => esc_html__( 'Download Button', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'hosted',
				),
			),

			// Select Option.
			'select_option_2' => array(
				'id'          => $prefix . '_preload',
				'label'       => esc_html__( 'Preload', 'rb-addons-for-elementor' ),
				'options'     => array(
					'metadata' => esc_html__( 'Metadata', 'rb-addons-for-elementor' ),
					'auto'     => esc_html__( 'Auto', 'rb-addons-for-elementor' ),
					'none'     => esc_html__( 'None', 'rb-addons-for-elementor' ),
				),
				'description' => sprintf(
					'%1$s <a target="_blank" href="https://go.elementor.com/preload-video/">%2$s</a>',
					esc_html__( 'Preload attribute lets you specify how the video should be loaded when the page loads.', 'rb-addons-for-elementor' ),
					esc_html__( 'Learn more', 'rb-addons-for-elementor' ),
				),
				'default'     => 'metadata',
				'condition'   => array(
					$prefix_general . '_video_type' => 'hosted',
					$prefix . '_autoplay'           => '',
				),
			),

			// Switch.
			'img'             => array(
				'id'        => $prefix . '_poster',
				'label'     => esc_html__( 'Poster', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix_general . '_video_type' => 'hosted',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
