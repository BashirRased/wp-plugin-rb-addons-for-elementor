<?php
/**
 * Post Comments widget content controls.
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
				'id'      => $prefix . '_source_type',
				'label'   => esc_html__( 'Source', 'rb-addons-for-elementor' ),
				'options' => array(
					'current_post' => esc_html__( 'Current Post', 'rb-addons-for-elementor' ),
					'custom'       => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
				),
				'default' => 'current_post',
			),

			// Multi Select.
			'multi_select'  => array(
				'id'             => $prefix . '_source_custom',
				'label'          => esc_html__( 'Search & Select', 'rb-addons-for-elementor' ),
				'multiple'       => false,
				'placeholder'    => esc_html__( 'Search Post', 'rb-addons-for-elementor' ),
				'dynamic_params' => array(
					'object_type' => 'post',
					'post_type'   => 'any',
				),
				'select2options' => array(
					'minimumInputLength' => 2,
				),
				'label_block'    => true,
				'condition'      => array(
					$prefix . '_source_type' => 'custom',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
