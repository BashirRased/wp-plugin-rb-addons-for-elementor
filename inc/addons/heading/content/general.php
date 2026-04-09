<?php
/**
 * Dual Text widget content controls.
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

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . '_repeater',
	array(
		'controls'    => array(
			'switch'   => array(
				'id'      => $prefix . '_title_highlight',
				'label'   => esc_html__( 'Text Highlight', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),
			'textarea' => array(
				'id'    => $prefix . '_title_text',
				'label' => esc_html__( 'Text', 'rb-addons-for-elementor' ),
			),
		),
		'id'          => $prefix . '_title_repeater',
		'label'       => esc_html__( 'Dual Text Item', 'rb-addons-for-elementor' ),
		'default'     => array(
			array(
				$prefix . '_title_highlight' => 'no',
				$prefix . '_title_text'      => esc_html__( 'Hi! I\'m ', 'rb-addons-for-elementor' ),
			),
			array(
				$prefix . '_title_highlight' => 'yes',
				$prefix . '_title_text'      => esc_html__( 'Bashir Rased', 'rb-addons-for-elementor' ),
			),
			array(
				$prefix . '_title_highlight' => 'no',
				$prefix . '_title_text'      => esc_html__( '. Welcome, to my portfolio website.', 'rb-addons-for-elementor' ),
			),
		),
		'title_field' => '{{{ ' . $prefix . '_title_text }}}',
	),
);

// All content add here.
$this->add_style_controls(
	$prefix . '_style_1',
	array(
		'controls' => array(
			// HTML Tag.
			'html_tag'    => array(
				'id'      => $prefix . '_html_tag',
				'default' => 'h4',
			),

			// Custom Link.
			'custom_link' => array(
				'id' => $prefix . '_link',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
