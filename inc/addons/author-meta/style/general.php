<?php
/**
 * Author Meta widget - General style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_author_meta_';
$cls_1  = '{{WRAPPER}} .rbelad-author-meta-widget';
$cls_2  = '{{WRAPPER}} .rbelad-author-meta-widget-wrapper';
$cls_3  = '{{WRAPPER}} .rbelad-author-meta-widget-link, {{WRAPPER}} .rbelad-author-meta-widget';
$cls_4  = '{{WRAPPER}} .rbelad-author-meta-widget-link:hover, {{WRAPPER}} .rbelad-author-meta-widget-link:focus, {{WRAPPER}} .rbelad-author-meta-widget:hover, {{WRAPPER}} .rbelad-author-meta-widget:focus';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'general_style',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Typography.
			'typography'           => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => RBELAD_PRIMARY_TEXT ),
				'select_class' => $cls_1,
			),
			'text_stroke'          => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'          => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Text Align.
			'align'                => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_2,
			),
		),
	),
);

// Tabs.
$this->start_controls_tabs( $prefix . 'tabs' );

// Normal Tab.
$this->start_controls_tab(
	$prefix . 'normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			'color' => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_BLACK_COLOR,
				'select_class' => $cls_3,
			),
		),
	),
);

$this->end_controls_tab();

// Hover Tab.
$this->start_controls_tab(
	$prefix . 'hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_3',
	array(
		'controls' => array(
			'color' => array(
				'id'           => $prefix . 'color_hover',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_4,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
