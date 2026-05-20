<?php
/**
 * Text Editor widget content controls.
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
			// Text Editor.
			'text_editor'   => array(
				'id'      => $prefix . '_text_editor',
				'default' => '<p>' . esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'rb-addons-for-elementor' ) . '</p>',
			),

			// Switch.
			'switch'        => array(
				'id'      => $prefix . '_drop_cap',
				'label'   => esc_html__( 'Drop Cap', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),

			// Select Option.
			'select_option' => array(
				'id'      => $prefix . '_text_columns',
				'label'   => esc_html__( 'Columns', 'rb-addons-for-elementor' ),
				'options' => array(
					''   => esc_html__( 'Default', 'rb-addons-for-elementor' ),
					'1'  => esc_html__( '1', 'rb-addons-for-elementor' ),
					'2'  => esc_html__( '2', 'rb-addons-for-elementor' ),
					'3'  => esc_html__( '3', 'rb-addons-for-elementor' ),
					'4'  => esc_html__( '4', 'rb-addons-for-elementor' ),
					'5'  => esc_html__( '5', 'rb-addons-for-elementor' ),
					'6'  => esc_html__( '6', 'rb-addons-for-elementor' ),
					'7'  => esc_html__( '7', 'rb-addons-for-elementor' ),
					'8'  => esc_html__( '8', 'rb-addons-for-elementor' ),
					'9'  => esc_html__( '9', 'rb-addons-for-elementor' ),
					'10' => esc_html__( '10', 'rb-addons-for-elementor' ),
					'11' => esc_html__( '11', 'rb-addons-for-elementor' ),
					'12' => esc_html__( '12', 'rb-addons-for-elementor' ),
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
