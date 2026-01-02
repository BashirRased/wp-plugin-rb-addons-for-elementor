<?php
/**
 * Post Thumbnail widget - Caption style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_post_thumbnail_caption_';
$cls_1  = '{{WRAPPER}} .rbelad-post-caption';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Caption', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_post_thumbnail_general_content_post_thumbnail_caption!' => 'none',
		),
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
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
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
				'select_class' => $cls_1,
			),
			'align_separator'      => array(
				'id' => $prefix . 'align_separator',
			),

			// Colors.
			'color'                => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_1,
			),
			'bg_color'             => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_1,
			),
			'color_separator'      => array(
				'id' => $prefix . 'color_separator',
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

			// Margin & Padding.
			'margin'               => array(
				'id'           => $prefix . 'margin',
				'select_class' => $cls_1,
			),
			'padding'              => array(
				'id'           => $prefix . 'padding',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
