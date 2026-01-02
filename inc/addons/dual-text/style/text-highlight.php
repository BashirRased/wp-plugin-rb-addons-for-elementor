<?php
/**
 * Dual Text widget - Text Highlight style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_dual_text_text_highlight_';
$cls_1  = '{{WRAPPER}} .rbelad-dual-text-item-highlight';
$cls_2  = '{{WRAPPER}} .rbelad-dual-text-link:hover .rbelad-dual-text-item-highlight, {{WRAPPER}} .rbelad-dual-text-link:focus .rbelad-dual-text-item-highlight';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'style_section',
	array(
		'label' => esc_html__( 'Text Highlight', 'rb-elementor-addons' ),
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
				'global'       => array( 'default' => Global_Typography::TYPOGRAPHY_PRIMARY ),
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
			'box_shadow'           => array(
				'name'         => $prefix . 'box_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Border & Border Radius.
			'border'               => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_1,
			),
			'border_radius'        => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_1,
			),
			'border_separator'     => array(
				'id' => $prefix . 'border_separator',
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
			// Colors.
			'color'    => array(
				'id'           => $prefix . 'color',
				'default'      => '#007bff',
				'select_class' => $cls_1,
			),
			'bg_color' => array(
				'id'           => $prefix . 'bg_color',
				'select_class' => $cls_1,
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
			// Colors.
			'color'        => array(
				'id'           => $prefix . 'hover_color',
				'default'      => '#000',
				'select_class' => $cls_2,
			),
			'bg_color'     => array(
				'id'           => $prefix . 'hover_bg_color',
				'select_class' => $cls_2,
			),
			'border_color' => array(
				'id'           => $prefix . 'hover_border_color',
				'select_class' => $cls_2,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
