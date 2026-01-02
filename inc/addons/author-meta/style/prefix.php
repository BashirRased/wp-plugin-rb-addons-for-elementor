<?php
/**
 * Author Meta widget - Prefix style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_author_meta_prefix_';
$cls_1  = '{{WRAPPER}} .rbelad-author-meta-widget';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'prefix_style',
	array(
		'label'     => esc_html__( 'Prefix', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_author_meta_general_content_author_prefix_separtor!' => 'none',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Typography.
			'typography'             => array(
				'id'           => $prefix . 'prefix_typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => '{{WRAPPER}} .rbelad-author-meta-widget-prefix',
				'condition'    => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => 'text',
				),
			),
			'text_stroke'            => array(
				'id'           => $prefix . 'prefix_text_stroke',
				'select_class' => '{{WRAPPER}} .rbelad-author-meta-widget-prefix',
				'condition'    => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => 'text',
				),
			),
			'text_shadow'            => array(
				'id'           => $prefix . 'prefix_text_shadow',
				'select_class' => '{{WRAPPER}} .rbelad-author-meta-widget-prefix',
				'condition'    => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => 'text',
				),
			),
			'typography_separator'   => array(
				'condition' => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => 'text',
				),
			),

			// Colors.
			'color'                  => array(
				'id'           => $prefix . 'prefix_color',
				'default'      => RBELAD_TEXT_COLOR,
				'select_class' => '{{WRAPPER}} .rbelad-author-meta-widget-prefix',
				'condition'    => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => array( 'icon', 'text' ),
				),
			),
			'color_separator'        => array(
				'id'        => $prefix . 'color_separator',
				'condition' => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => array( 'icon', 'text' ),
				),
			),

			// Width & Height.
			'icon_img_size'          => array(
				'id'           => $prefix . 'prefix_img_size',
				'select_class' => '{{WRAPPER}} .rbelad-author-meta-widget-prefix img',
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'condition'    => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => 'img',
				),
			),
			'icon_size'              => array(
				'id'             => $prefix . 'prefix_font_size',
				'select_class'   => '{{WRAPPER}} .rbelad-author-meta-widget-prefix i',
				'select_class_2' => '{{WRAPPER}} .rbelad-author-meta-widget-prefix svg',
				'default'        => array(
					'unit' => 'px',
					'size' => 20,
				),
				'condition'      => array(
					'rbelad_author_meta_general_content_author_prefix_separtor' => 'icon',
				),
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Margin & Padding.
			'margin'                 => array(
				'id'           => $prefix . 'prefix_margin',
				'default'      => array(
					'top'      => '0',
					'right'    => '10',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => '{{WRAPPER}} .rbelad-author-meta-widget-prefix',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
