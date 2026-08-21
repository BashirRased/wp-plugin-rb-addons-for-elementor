<?php
/**
 * Rating Star widget content controls.
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
			// Number.
			'number' => array(
				'id'      => $rbelad_prefix . '_rating_value',
				'label'   => esc_html__( 'Rating', 'rb-addons-for-elementor' ),
				'min'     => 0,
				'step'    => 0.5,
				'max'     => 5,
				'default' => '5',
			),

			// Icon.
			'icon'   => array(
				'id'                     => $rbelad_prefix . '_rating_icon',
				'label'                  => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'skin'                   => 'inline',
				'label_block'            => false,
				'skin_settings'          => array(
					'inline' => array(
						'icon' => array(
							'icon' => 'eicon-star',
						),
					),
				),
				'default'                => array(
					'value'   => 'eicon-star',
					'library' => 'eicons',
				),
				'exclude_inline_options' => array( 'none' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
