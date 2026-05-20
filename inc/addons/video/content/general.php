<?php
/**
 * Video widget - general content controls.
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
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . '_video_type',
				'options' => array(
					'youtube'     => esc_html__( 'YouTube', 'rb-addons-for-elementor' ),
					'vimeo'       => esc_html__( 'Vimeo', 'rb-addons-for-elementor' ),
					'dailymotion' => esc_html__( 'Dailymotion', 'rb-addons-for-elementor' ),
					'videopress'  => esc_html__( 'VideoPress', 'rb-addons-for-elementor' ),
					'hosted'      => esc_html__( 'Self Hosted', 'rb-addons-for-elementor' ),
				),
				'default' => 'youtube',
			),

			// Custom Link.
			'custom_link'   => array(
				'id'          => $prefix . '_youtube_url',
				'label'       => esc_html__( 'YouTube Link', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your URL', 'rb-addons-for-elementor' ) . ' (YouTube)',
				'default'     => array(
					'url' => esc_url( 'https://www.youtube.com/watch?v=XHOmBV4js_E' ),
				),
				'condition'   => array(
					$prefix . '_video_type' => 'youtube',
				),
			),

			// Custom Link.
			'custom_link_2' => array(
				'id'          => $prefix . '_vimeo_url',
				'label'       => esc_html__( 'Vimeo Link', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your URL', 'rb-addons-for-elementor' ) . ' (Vimeo)',
				'default'     => array(
					'url' => esc_url( 'https://vimeo.com/235215203' ),
				),
				'condition'   => array(
					$prefix . '_video_type' => 'vimeo',
				),
			),

			// Custom Link.
			'custom_link_3' => array(
				'id'          => $prefix . '_dailymotion_url',
				'label'       => esc_html__( 'Dailymotion Link', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your URL', 'rb-addons-for-elementor' ) . ' (Dailymotion)',
				'default'     => array(
					'url' => esc_url( 'https://www.dailymotion.com/video/x6tqhqb' ),
				),
				'condition'   => array(
					$prefix . '_video_type' => 'dailymotion',
				),
			),

			// Switch.
			'switch'        => array(
				'id'        => $prefix . '_insert_url',
				'label'     => esc_html__( 'External URL', 'rb-addons-for-elementor' ),
				'default'   => 'no',
				'condition' => array(
					$prefix . '_video_type' => array( 'videopress', 'hosted' ),
				),
			),

			// Video Upload.
			'video'         => array(
				'id'        => $prefix . '_hosted_url',
				'condition' => array(
					$prefix . '_video_type' => array( 'videopress', 'hosted' ),
					$prefix . '_insert_url' => 'yes',
				),
			),

			// Custom Link.
			'custom_link_4' => array(
				'id'        => $prefix . '_hoster_url',
				'label'     => esc_html__( 'Hoster URL', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_video_type' => 'hosted',
					$prefix . '_insert_url' => 'yes',
				),
			),

			// Custom Link.
			'custom_link_5' => array(
				'id'          => $prefix . '_videopress_url',
				'label'       => esc_html__( 'VideoPress Link', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'VideoPress URL', 'rb-addons-for-elementor' ),
				'default'     => array(
					'url' => esc_url( 'https://videopress.com/v/ZCAOzTNk' ),
				),
				'condition'   => array(
					$prefix . '_video_type' => 'videopress',
					$prefix . '_insert_url' => 'yes',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
