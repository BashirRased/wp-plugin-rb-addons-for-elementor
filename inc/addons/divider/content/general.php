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
				'id'      => $prefix . '_separator_type',
				'options' => array(
					'solid'       => esc_html__( 'Solid', 'rb-addons-for-elementor' ),
					'double' => esc_html__( 'Double', 'rb-addons-for-elementor' ),
					'dotted'  => esc_html__( 'Dotted', 'rb-addons-for-elementor' ),
					'dashed'      => esc_html__( 'Dashed', 'rb-addons-for-elementor' ),
				),
				'default' => 'solid',
			),

			// Icon.
			'choose'   => array(
				'id'        => $prefix . '_separator_with',
				'options' => [
					'line' => [
						'title' => esc_html__( 'None', 'elementor' ),
						'icon' => 'eicon-ban',
					],
					'line_text' => [
						'title' => esc_html__( 'Text', 'elementor' ),
						'icon' => 'eicon-t-letter-bold',
					],
					'line_icon' => [
						'title' => esc_html__( 'Icon', 'elementor' ),
						'icon' => 'eicon-star',
					],
				],
			),

			// Text.
			'text'   => array(
				'id'        => $prefix . '_text',
				'label'     => esc_html__( 'Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Divider', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . '_separator_with' => 'line_text',
				),
			),

			// HTML Tag.
			'html_tag'   => array(
				'id'        => $prefix . '_html_tag',
				'default' => 'span',
				'condition' => array(
					$prefix . '_separator_with' => 'line_text',
				),
			),

			// Icon.
			'icon'        => array(
				'id'        => $prefix . '_icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => array(
					$prefix . '_separator_with' => 'line_icon',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
