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
$this->add_style_controls(
	$prefix . '_style_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . '_select_option',
				'options' => array(
					'youtube'     => esc_html__( 'YouTube', 'rb-addons-for-elementor' ),
					'vimeo'       => esc_html__( 'Vimeo', 'rb-addons-for-elementor' ),
					'dailymotion' => esc_html__( 'Dailymotion', 'rb-addons-for-elementor' ),
					'videopress'  => esc_html__( 'VideoPress', 'rb-addons-for-elementor' ),
					'hosted'      => esc_html__( 'Self Hosted', 'rb-addons-for-elementor' ),
				),
				'default' => 'youtube',
			),

			// Switch.
			'switch'        => array(
				'id'        => $prefix . '_switch',
				'label'     => esc_html__( 'External URL', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_select_option' => array( 'videopress', 'hosted' ),
				),
			),

			// Custom Link.
			'custom_link'   => array(
				'id'        => $prefix . '_custom_link',
				'condition' => array(
					$prefix . '_select_option' => array( 'youtube', 'vimeo', 'dailymotion' ),
					$prefix . '_switch'        => 'yes',
				),
			),

			// Video Upload.
			'video'         => array(
				'id'        => $prefix . '_video',
				'condition' => array(
					$prefix . '_select_option' => array( 'videopress', 'hosted' ),
					$prefix . '_switch!'       => 'yes',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
