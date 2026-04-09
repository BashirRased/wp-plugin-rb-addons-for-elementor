<?php
/**
 * Social Icon widget style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelpro_social_icon_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_1  = '{{WRAPPER}} .rbelad-social-icon-menu'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_2  = '{{WRAPPER}} .rbelad-social-icon-item'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_3  = '{{WRAPPER}} .rbelad-social-icon-item-child i'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_4  = '{{WRAPPER}} .rbelad-social-icon-item-child svg, {{WRAPPER}} .rbelad-social-icon-item-child img'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_5  = '{{WRAPPER}} .style-2 .rbelad-social-icon-item-child'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_6  = '{{WRAPPER}} .style-1 .rbelad-social-icon-item-child, {{WRAPPER}} .style-2 .rbelad-social-icon-item .rbelad-social-icon-item-child'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_general',
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
			// Text Align.
			'align'                  => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
			'align_separator'        => array(
				'id' => $prefix . 'align_separator',
			),

			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => 'px',
					'size' => 40,
				),
				'select_class' => $cls_2,
				'condition'    => array(
					'rbelpro_social_icon_general_content_choose_design!' => 'styte-1',
				),
			),
			'height'                 => array(
				'id'           => $prefix . 'height',
				'default'      => array(
					'unit' => 'px',
					'size' => 40,
				),
				'select_class' => $cls_2,
				'condition'    => array(
					'rbelpro_social_icon_general_content_choose_design!' => 'styte-1',
				),
			),
			'line_height'            => array(
				'id'           => $prefix . 'line_height',
				'default'      => array(
					'unit' => 'px',
					'size' => 30,
				),
				'select_class' => $cls_2,
				'condition'    => array(
					'rbelpro_social_icon_general_content_choose_design!' => 'styte-1',
				),
			),
			'icon_size'              => array(
				'id'             => $prefix . 'icon_size',
				'default'        => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class'   => $cls_3,
				'select_class_2' => $cls_4,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'id'             => $prefix . 'border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '1',
							'bottom'   => '1',
							'left'     => '1',
							'isLinked' => true,
						),
					),
					'color'  => array(
						'default' => '#007bff',
					),
				),
				'select_class'   => $cls_5,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_5,
				'condition'    => array(
					'rbelpro_social_icon_general_content_choose_design!' => 'styte-1',
				),
			),
			'border_separator'       => array(),

			// Margin & Padding.
			'margin'                 => array(
				'id'           => $prefix . 'margin',
				'default'      => array(
					'top'      => '25',
					'right'    => '16',
					'bottom'   => '25',
					'left'     => '16',
					'unit'     => 'px',
					'isLinked' => true,
				),
				'select_class' => $cls_2,
				'condition'    => array(
					'rbelpro_social_icon_general_content_choose_design!' => 'styte-1',
				),
			),
			'spacing_separator'      => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Transition.
			'transition_property'    => array(
				'id'           => $prefix . 'transition_property',
				'default'      => 'all',
				'select_class' => $cls_6,
			),
			'transition_duration'    => array(
				'id'           => $prefix . 'transition_duration',
				'default'      => array(
					'unit' => 's',
					'size' => 0.5,
				),
				'select_class' => $cls_6,
			),
			'timing_function'        => array(
				'id'           => $prefix . 'timing_function',
				'default'      => 'ease-in-out',
				'select_class' => $cls_6,
			),
			'transition_delay'       => array(
				'id'           => $prefix . 'transition_delay',
				'select_class' => $cls_6,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
