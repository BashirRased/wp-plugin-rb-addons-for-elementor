<?php
/**
 * Basic Gallery widget content controls.
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
			// Gallery.
			'gallery'         => array(
				'id' => $rbelad_prefix . '_gallery',
			),

			// Image Size.
			'img_size'        => array(
				'id' => $rbelad_prefix . '_img_size',
			),

			// Image Caption.
			'select_option'   => array(
				'id'      => $rbelad_prefix . '_img_caption',
				'label'   => esc_html__( 'Image Caption', 'rb-addons-for-elementor' ),
				'options' => array(
					'none'       => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'attachment' => esc_html__( 'Attachment Caption', 'rb-addons-for-elementor' ),
				),
				'default' => 'none',
			),

			// Image Sortable.
			'select_option_2' => array(
				'id'      => $rbelad_prefix . '_img_sortable',
				'label'   => esc_html__( 'Order By', 'rb-addons-for-elementor' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'rb-addons-for-elementor' ),
					'random'  => esc_html__( 'Random', 'rb-addons-for-elementor' ),
				),
				'default' => 'default',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
