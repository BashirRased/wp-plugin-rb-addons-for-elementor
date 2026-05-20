<?php
/**
 * Alert widget content controls.
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
				'id'      => $prefix . '_type',
				'label'   => esc_html__( 'Type', 'rb-addons-for-elementor' ),
				'options' => array(
					'info'    => esc_html__( 'Info', 'rb-addons-for-elementor' ),
					'success' => esc_html__( 'Success', 'rb-addons-for-elementor' ),
					'warning' => esc_html__( 'Warning', 'rb-addons-for-elementor' ),
					'danger'  => esc_html__( 'Danger', 'rb-addons-for-elementor' ),
				),
				'default' => 'info',
			),

			// Text.
			'text'          => array(
				'id'          => $prefix . '_title',
				'label'       => esc_html__( 'Title', 'rb-addons-for-elementor' ),
				'default'     => esc_html__( 'This is an Alert', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your title', 'rb-addons-for-elementor' ),
			),

			// Textarea.
			'textarea'      => array(
				'id'          => $prefix . '_content',
				'label'       => esc_html__( 'Content', 'rb-addons-for-elementor' ),
				'default'     => esc_html__( 'I am a description. Click the edit button to change this text.', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your description', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch'        => array(
				'id'    => $prefix . '_show_dismiss',
				'label' => esc_html__( 'Dismiss Icon', 'rb-addons-for-elementor' ),
			),

			// Icon.
			'icon'          => array(
				'id'               => $prefix . '_dismiss_icon',
				'label'            => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'label_block'      => false,
				'fa4compatibility' => 'icon',
				'skin'             => 'inline',
				'skin_settings'    => array(
					'inline' => array(
						'none' => array(
							'label' => 'Default',
							'icon'  => 'eicon-close',
						),
						'icon' => array(
							'icon' => 'eicon-star',
						),
					),
				),
				'recommended'      => array(
					'fa-regular' => array(
						'times-circle',
					),
					'fa-solid'   => array(
						'times',
						'times-circle',
					),
				),
				'condition'        => array(
					$prefix . '_show_dismiss' => 'yes',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
