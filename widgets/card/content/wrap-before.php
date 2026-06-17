<?php
/**
 * Card widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_content_prefix( 'wrap_before' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Wrap Before', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			'icon_img_text' => array(
				'id' => $prefix . '_icon_img_text',
			),
			'icon'          => array(
				'id'        => $prefix . '_icon_simple',
				'condition' => array(
					$prefix . '_icon_img_text' => 'icon',
				),
			),
			'img'           => array(
				'id'        => $prefix . '_image',
				'condition' => array(
					$prefix . '_icon_img_text' => 'image',
				),
			),
			'text'          => array(
				'id'        => $prefix . '_text',
				'condition' => array(
					$prefix . '_icon_img_text' => 'text',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
