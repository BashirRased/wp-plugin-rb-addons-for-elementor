<?php
/**
 * Button widget content controls.
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
			// Text.
			'text'             => array(
				'id'      => $rbelad_prefix . '_btn_text',
				'label'   => esc_html__( 'Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Click Here', 'rb-addons-for-elementor' ),
			),

			// Button Link.
			'select_link_type' => array(
				'id' => $rbelad_prefix . '_btn_select_link_type',
			),

			// Icon.
			'icon_img'         => array(
				'id'      => $rbelad_prefix . '_btn_icon_img',
				'label'   => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'default' => 'icon',
			),

			// Icon Image.
			'img'              => array(
				'id'        => $rbelad_prefix . '_btn_img',
				'label'     => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'condition' => array(
					$rbelad_prefix . '_btn_icon_img' => 'image',
				),
			),

			// Icon Icon.
			'icon_simple'      => array(
				'id'        => $rbelad_prefix . '_btn_icon_simple',
				'label'     => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'condition' => array(
					$rbelad_prefix . '_btn_icon_img' => 'icon',
				),
			),
		),
	),
);

$this->end_controls_section();
