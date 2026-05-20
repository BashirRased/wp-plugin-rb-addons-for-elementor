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
$prefix = $this->get_section_content_prefix( 'image_overlay' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Image Overlay', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Switch.
			'switch'   => array(
				'id'    => $prefix . '_show_image_overlay',
				'label' => esc_html__( 'Image Overlay', 'rb-addons-for-elementor' ),
			),

			// Image.
			'img'      => array(
				'id'        => $prefix . '_image_overlay',
				'label'     => esc_html__( 'Image Overlay', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_show_image_overlay' => 'yes',
				),
			),

			// Image.
			'img_size' => array(
				'name'      => $prefix . '_image_overlay',
				'label'     => esc_html__( 'Image Overlay', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_show_image_overlay' => 'yes',
				),
			),

			// Switch.
			'switch_2' => array(
				'id'        => $prefix . '_show_play_icon',
				'label'     => esc_html__( 'Play Icon', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_show_image_overlay'  => 'yes',
					$prefix . '_image_overlay[url]!' => '',
				),
			),

			// Icon.
			'icon'     => array(
				'id'               => $prefix . '_play_icon',
				'label'            => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'fa4compatibility' => 'icon',
				'skin'             => 'inline',
				'label_block'      => false,
				'skin_settings'    => array(
					'inline' => array(
						'none' => array(
							'label' => 'Default',
							'icon'  => 'eicon-play',
						),
						'icon' => array(
							'icon' => 'eicon-star',
						),
					),
				),
				'recommended'      => array(
					'fa-regular' => array(
						'play-circle',
					),
					'fa-solid'   => array(
						'play',
						'play-circle',
					),
				),
				'condition'        => array(
					$prefix . '_show_image_overlay' => 'yes',
					$prefix . '_show_play_icon!'    => '',
				),
			),

			// Switch.
			'switch_3' => array(
				'id'        => $prefix . '_lightbox',
				'label'     => esc_html__( 'Lightbox', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_show_image_overlay'  => 'yes',
					$prefix . '_image_overlay[url]!' => '',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
