<?php
/**
 * Archive Title widget content controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_archive_title_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'general_content',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	'archive_title_general_content',
	array(
		'controls' => array(
			// Link Type.
			'select_option' => array(
				'id'      => $prefix . 'link_type',
				'options' => array(
					'none'    => esc_html__( 'None', 'rb-elementor-addons' ),
					'default' => esc_html__( 'Default Link', 'rb-elementor-addons' ),
					'custom'  => esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				),
				'default' => 'default',
			),

			// Custom Link.
			'custom_link'   => array(
				'id'        => $prefix . 'custom_link',
				'condition' => array(
					'link_type' => 'custom',
				),
			),

			// HTML Tag.
			'html_tag'      => array(
				'id'      => $prefix . 'html_tag',
				'default' => 'h2',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
