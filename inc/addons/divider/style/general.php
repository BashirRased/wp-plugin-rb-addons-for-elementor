<?php
/**
 * Divider widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$section_prefix = $this->get_section_prefix( 'style_section_' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix         = $section_prefix . 'general'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_1          = '{{WRAPPER}} .rbelad-divider-widget'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_2          = '{{WRAPPER}} .rbelad-divider-widget-container'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'general',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Border & Border Radius.
			'border'                 => array(
				'id'             => $prefix . 'border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '0',
							'bottom'   => '0',
							'left'     => '0',
							'isLinked' => false,
						),
					),
					'color'  => array(
						'default' => RBELAD_PRIMARY_COLOR,
					),
				),
				'select_class'   => $cls_1,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_1,
			),
			'border_separator'       => array(
				'id' => $prefix . 'border_separator',
			),

			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => '%',
					'size' => 100,
				),
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Text Align.
			'item_align'             => array(
				'id'           => $prefix . 'item_align',
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
