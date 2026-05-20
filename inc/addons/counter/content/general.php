<?php
/**
 * Counter widget content controls.
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
			// Number.
			'number'        => array(
				'id'      => $prefix . '_starting_number',
				'label'   => esc_html__( 'Starting Number', 'rb-addons-for-elementor' ),
				'default' => 0,
			),
			
			// Number.
			'number-2'        => array(
				'id'      => $prefix . '_ending_number',
				'label'   => esc_html__( 'Ending Number', 'rb-addons-for-elementor' ),
				'default' => 100,
			),
			
			// Text.
			'text'        => array(
				'id'      => $prefix . '_prefix',
				'label'   => esc_html__( 'Number Prefix', 'rb-addons-for-elementor' ),
			),
			
			// Text.
			'text-2'        => array(
				'id'      => $prefix . '_suffix',
				'label'   => esc_html__( 'Number Suffix', 'rb-addons-for-elementor' ),
			),
			
			// Number.
			'number-3'        => array(
				'id'      => $prefix . '_duration',
				'label'   => esc_html__( 'Animation Duration', 'rb-addons-for-elementor' ) . ' (ms)',
				'default' => 2000,
				'min' => 100,
				'step' => 100,
			),

			// Switch.
			'switch'      => array(
				'id'      => $prefix . '_thousand_separator',
				'label'   => esc_html__( 'Thousand Separator', 'rb-addons-for-elementor' ),
			),

			// Select Option.
			'select_option' => array(
				'id'          => $prefix . '_thousand_separator_char',
				'label'       => esc_html__( 'Separator', 'rb-addons-for-elementor' ),
				'options' => [
					'' => esc_html__( 'Default', 'rb-addons-for-elementor' ),
					'.' => esc_html__( 'Dot', 'rb-addons-for-elementor' ),
					' ' => esc_html__( 'Space', 'rb-addons-for-elementor' ),
					'_' => esc_html__( 'Underline', 'rb-addons-for-elementor' ),
					"'" => esc_html__( 'Apostrophe', 'rb-addons-for-elementor' ),
				],
				'condition' => [
					$prefix . '_thousand_separator' => 'yes',
				],
			),
			
			// Text.
			'text-3'        => array(
				'id'      => $prefix . '_title',
				'label'   => esc_html__( 'Title', 'rb-addons-for-elementor' ),
			),

			// HTML Tag.
			'html_tag'   => array(
				'id'        => $prefix . '_title_tag',
				'label'     => esc_html__( 'Title HTML Tag', 'rb-addons-for-elementor' ),
				'default'   => 'div',
				'condition' => array(
					$prefix . '_title!' => '',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
