<?php
/**
 * Dual Text widget - Title style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_dual_text_title_';
$cls_1  = '{{WRAPPER}} .rbelad-dual-text-heading';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'style_section',
	array(
		'label' => esc_html__( 'Title', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Text Align.
			'align'                => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_text(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
			'align_separator'      => array(
				'id' => $prefix . 'align_separator',
			),

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
			'typography_separator' => array(
				'name' => $prefix . 'typography_separator',
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
				'color' => array(
					'id'           => $prefix . 'color',
					'default'      => '#000000',
					'select_class' => '{{WRAPPER}} .rbelad-dual-text-heading, {{WRAPPER}} .rbelad-dual-text-link',
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
				'color' => array(
					'id'           => $prefix . 'hover_color',
					'default'      => '#007bff',
					'select_class' => '{{WRAPPER}} .rbelad-dual-text-link:hover, {{WRAPPER}} .rbelad-dual-text-link:focus',
				),
			),
		),
	);

	$this->end_controls_tab();

	$this->end_controls_tabs();

	// End Section Tab.
	$this->end_controls_section();
