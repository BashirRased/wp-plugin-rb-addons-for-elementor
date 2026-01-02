<?php
/**
 * Archive Description widget style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_archive_description_';
$cls_1  = '{{WRAPPER}} .rbelad-archive-description';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'general_style',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	'archive_description_general_style',
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
				'global'       => array( 'default' => Global_Typography::TYPOGRAPHY_TEXT ),
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

			// Colors.
			'color'                => array(
				'id'           => $prefix . 'color',
				'default'      => '#777',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
