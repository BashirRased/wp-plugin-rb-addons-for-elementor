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
$rbelad_prefix = $this->get_section_content_prefix( 'wrap_before' );

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Wrap Before', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$rbelad_prefix . '_content_1',
	array(
		'controls' => array(
			// Icon.
			'icon_img'    => array(
				'id'      => $rbelad_prefix . '_card_before_icon_img',
				'label'   => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'default' => 'icon',
			),

			// Icon Image.
			'img'         => array(
				'id'        => $rbelad_prefix . '_card_before_img',
				'label'     => esc_html__( 'Icon Image', 'rb-addons-for-elementor' ),
				'condition' => array(
					$rbelad_prefix . '_card_before_icon_img' => 'image',
				),
			),

			// Icon.
			'icon_simple' => array(
				'id'               => $rbelad_prefix . '_card_before_icon_simple',
				'label'            => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'fa4compatibility' => $rbelad_prefix . '_card_before_icon',

				'default'          => array(
					'value'   => 'far fa-thumbs-up',
					'library' => 'fa-regular',
				),

				'condition'        => array(
					$rbelad_prefix . '_card_before_icon_img' => 'icon',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
