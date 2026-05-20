<?php
/**
 * Icon widget content controls.
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
			// Icon.
			'icon'    => array(
				'id'          => $prefix . '_selected_icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			),

			// Icon.
			'select_option'    => array(
				'id'          => $prefix . '_view',
				'label' => esc_html__( 'View', 'rb-addons-for-elementor' ),
				'options' => [
					'default' => esc_html__( 'Default', 'rb-addons-for-elementor' ),
					'stacked' => esc_html__( 'Stacked', 'rb-addons-for-elementor' ),
					'framed' => esc_html__( 'Framed', 'rb-addons-for-elementor' ),
				],
				'default' => 'default',
			),

			// Icon.
			'select_option_2'    => array(
				'id'          => $prefix . '_shape',
				'label' => esc_html__( 'Shape', 'rb-addons-for-elementor' ),
				'options' => [
					'square' => esc_html__( 'Square', 'rb-addons-for-elementor' ),
					'rounded' => esc_html__( 'Rounded', 'rb-addons-for-elementor' ),
					'circle' => esc_html__( 'Circle', 'rb-addons-for-elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					$prefix . '_view!' => 'default',
				],
			),
		),
	),
);

$this->rbelad_select_link_type(
	$prefix . 'style_2',
	array(
		'controls' => array(
			array(
				'name'    => $prefix . '_link_type',
				'label'   => esc_html__( 'Link Type', 'rb-addons-for-elementor' ),
				'default' => 'custom_link',
			),
		),
	)
);

// End Section Tab.
$this->end_controls_section();
