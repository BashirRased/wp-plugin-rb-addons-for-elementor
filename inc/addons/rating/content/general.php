<?php
/**
 * Rating Star widget content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_rating_skill_general_content_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here - Rating.
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Number.
			'number' => array(
				'id'      => $prefix . '_rating_value',
				'label'   => esc_html__( 'Rating', 'rb-addons-for-elementor' ),
				'min' => 0,
				'step' => 0.5,
				'max' => 5,
				'default' => '5',
			),

			// Icon.
			'icon' => array(
				'id'      => $prefix . '_rating_icon',
				'label'   => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'skin' => 'inline',
				'label_block' => false,
				'skin_settings' => [
					'inline' => [
						'icon' => [
							'icon' => 'eicon-star',
						],
					],
				],
				'default' => [
					'value' => 'eicon-star',
					'library' => 'eicons',
				],
				'exclude_inline_options' => [ 'none' ],
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
