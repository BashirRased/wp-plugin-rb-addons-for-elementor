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
$rbelad_prefix = $this->get_section_content_prefix( 'wrap_after' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Wrap After', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$rbelad_prefix . '_content_1',
	array(
		'controls' => array(
			'icon_img_text' => array(
				'id' => $rbelad_prefix . '_icon_img_text',
			),
			'icon'          => array(
				'id'        => $rbelad_prefix . '_icon_simple',
				'condition' => array(
					$rbelad_prefix . '_icon_img_text' => 'icon',
				),
			),
			'img'           => array(
				'id'        => $rbelad_prefix . '_image',
				'condition' => array(
					$rbelad_prefix . '_icon_img_text' => 'image',
				),
			),
			'text'          => array(
				'id'        => $rbelad_prefix . '_text',
				'condition' => array(
					$rbelad_prefix . '_icon_img_text' => 'text',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
