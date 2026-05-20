<?php
/**
 * Post Excerpt widget content controls.
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
			'number' => array(
				'id'          => $prefix . '_excerpt_length',
				'label'       => esc_html__( 'Excerpt Length', 'rb-addons-for-elementor' ),
				'description' => esc_html__( 'Leave it blank to hide it.', 'rb-addons-for-elementor' ),
				'min'         => 0,
				'default'     => 15,
			),

			// Text.
			'text'   => array(
				'id'          => $prefix . '_read_more',
				'label'       => esc_html__( 'Read More', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Read More Text', 'rb-addons-for-elementor' ),
				'description' => esc_html__( 'Leave it blank to hide it.', 'rb-addons-for-elementor' ),
				'default'     => esc_html__( 'Continue Reading »', 'rb-addons-for-elementor' ),
			),

			// Switch.
			'switch' => array(
				'id'    => $prefix . '_read_more_new_tab',
				'label' => esc_html__( 'Open in new window', 'rb-addons-for-elementor' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
