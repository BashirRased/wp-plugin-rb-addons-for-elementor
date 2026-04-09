<?php
/**
 * List Style widget - Separator style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'separator' );

$cls_1   = '{{WRAPPER}} .rbelad-list-item-separator'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_2   = '{{WRAPPER}} .rbelad-list-item-separator svg'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_3   = '{{WRAPPER}} .rbelad-list-item-separator img'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$cls_4   = '{{WRAPPER}} .rbelad-list-item-separator i'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$class_1 = '{{WRAPPER}} .rbelad-list-item-separator'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Separator', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// Typography Style.
$this->register_text_style( $prefix, $class_1 );

// Spacing Style.
$this->register_spacing_style(
	$prefix,
	$class_1,
	array(),
	array()
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'fill_color'      => array(
				'id'             => $prefix . 'separator_color',
				'default'        => RBELAD_PRIMARY_COLOR,
				'select_class'   => $cls_1,
				'select_class_2' => $cls_2,
			),
			'color_separator' => array(
				'id' => $prefix . 'color_separator',
			),

			// Font Size.
			'icon_img_size'   => array(
				'id'           => $prefix . 'separator_img_size',
				'label'        => esc_html__( 'Image Icon Size', 'rb-addons-for-elementor' ),
				'select_class' => $cls_3,
			),
			'icon_size'       => array(
				'id'             => $prefix . 'separator_font_size',
				'label'          => esc_html__( 'Font Icon Size', 'rb-addons-for-elementor' ),
				'select_class'   => $cls_4,
				'select_class_2' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
