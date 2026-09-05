<?php
/**
 * Divider widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix = $this->get_section_content_prefix( 'general' );

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$rbelad_prefix . '_content_1',
	array(
		'controls' => array(
			// Choose Elements.
			'icon_img_text' => array(
				'id'      => $rbelad_prefix . '_icon_img_text',
				'default' => 'text',
			),

			// Icon Image.
			'img'           => array(
				'id'        => $rbelad_prefix . '_img',
				'label'     => esc_html__( 'Separator Image', 'rb-addons-for-elementor' ),
				'condition' => array(
					$rbelad_prefix . '_icon_img_text' => 'image',
				),
			),

			// Icon Icon.
			'icon_simple'   => array(
				'id'        => $rbelad_prefix . '_icon_simple',
				'label'     => esc_html__( 'Separator Icon', 'rb-addons-for-elementor' ),
				'default'   => array(
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				),
				'condition' => array(
					$rbelad_prefix . '_icon_img_text' => 'icon',
				),
			),

			// Icon Text.
			'text'          => array(
				'id'        => $rbelad_prefix . '_text',
				'label'     => esc_html__( 'Separator Text', 'rb-addons-for-elementor' ),
				'default'   => esc_html__( 'Divider', 'rb-addons-for-elementor' ),
				'condition' => array(
					$rbelad_prefix . '_icon_img_text' => 'text',
				),
			),
		),
	),
);

$this->end_controls_section();
