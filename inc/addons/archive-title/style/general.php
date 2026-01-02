<?php
/**
 * Archive Title widget style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_archive_title_';
$cls_1  = '{{WRAPPER}} .rbelad-archive-title';
$cls_2  = '{{WRAPPER}} .rbelad-archive-title, {{WRAPPER}} .rbelad-archive-title a';
$cls_3  = '{{WRAPPER}} .rbelad-archive-title:hover, {{WRAPPER}} .rbelad-archive-title:hover a';

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
	'archive_title_general_style',
	array(
		'controls' => array(
			// Text Align.
			'align'           => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_text(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
			'align_separator' => array(
				'id' => $prefix . 'align_separator',
			),

			// Typography.
			'typography'      => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => Global_Typography::TYPOGRAPHY_PRIMARY ),
				'select_class' => $cls_1,
			),
			'text_stroke'     => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'     => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_1,
			),
		),
	),
);

// Tabs.
$this->start_controls_tabs( 'tabs' );

// Normal Tab.
$this->start_controls_tab(
	'normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
	)
);

$this->add_style_controls(
	'archive_title_general',
	array(
		'controls' => array(
			// Colors.
			'color' => array(
				'id'           => $prefix . 'color',
				'default'      => '#000',
				'select_class' => $cls_2,
			),
		),
	),
);

$this->end_controls_tab();

// Hover Tab.
$this->start_controls_tab(
	'hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
	)
);

$this->add_style_controls(
	'archive_title_general_hover',
	array(
		'controls' => array(
			// Colors.
			'color' => array(
				'id'           => $prefix . 'hover_color',
				'default'      => '#007bff',
				'select_class' => $cls_3,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
