<?php
/**
 * Contact Form widget - Input & Textarea style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_contact_form_input_textarea_';
$cls_1  = '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url, {{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea';
$cls_2  = '{{WRAPPER}} .rbelad-contact-form-item > .rbelad-contact-form-item-icon, {{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url, {{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date';
$cls_3  = '{{WRAPPER}} .rbelad-contact-form-item.textarea > .rbelad-contact-form-item-icon, {{WRAPPER}} .wpcf7-textarea';
$cls_4  = '{{WRAPPER}} .wpcf7-text:focus, {{WRAPPER}} .wpcf7-email:focus, {{WRAPPER}} .wpcf7-url:focus, {{WRAPPER}} .wpcf7-number:focus, {{WRAPPER}} .wpcf7-quiz:focus, {{WRAPPER}} .wpcf7-date:focus, {{WRAPPER}} .wpcf7-textarea:focus';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Input & Textarea', 'rb-elementor-addons' ),
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

			// Margin & Padding.
			'margin_bottom'        => array(
				'id'           => $prefix . 'margin',
				'default'      => array(
					'unit' => 'px',
					'size' => 30,
				),
				'select_class' => $cls_1,
			),
			'padding'              => array(
				'id'           => $prefix . 'padding',
				'select_class' => $cls_1,
			),
			'spacing_separator'    => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'               => array(
				'name'           => $prefix . 'border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '1',
							'bottom'   => '1',
							'left'     => '1',
							'isLinked' => false,
						),
					),
					'color'  => array(
						'default' => RBELAD_BLACK_COLOR,
					),
				),
				'select_class'   => $cls_1,
			),
			'border_radius'        => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_1,
			),
			'box_shadow'           => array(
				'name'         => $prefix . 'box_shadow',
				'select_class' => $cls_1,
			),
			'border_separator'     => array(
				'name' => $prefix . 'box_shadow',
			),

			// Width & Height.
			'width'                => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => '%',
					'size' => 100,
				),
				'select_class' => $cls_1,
			),
			'height'               => array(
				'id'           => $prefix . 'input_height',
				'label'        => esc_html__( 'Input Height', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => 50,
				),
				'select_class' => $cls_2,
			),
		),
	),
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Width & Height.
			'height' => array(
				'id'           => $prefix . 'textarea_height',
				'default'      => array(
					'unit' => 'px',
					'size' => 200,
				),
				'label'        => esc_html__( 'Textarea Height', 'rb-elementor-addons' ),
				'select_class' => $cls_3,
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
	$prefix . 'style_3',
	array(
		'controls' => array(
			// Colors.
			'color'    => array(
				'id'           => $prefix . 'color',
				'select_class' => $cls_1,
			),
			'bg_color' => array(
				'id'           => $prefix . 'bg_color',
				'default'      => '#F1F1F1',
				'select_class' => $cls_1,
			),
		),
	),
);

$this->end_controls_tab();

// Focus Tab.
$this->start_controls_tab(
	$prefix . 'focus_tab',
	array(
		'label' => esc_html__( 'Focus', 'rb-elementor-addons' ),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_4',
	array(
		'controls' => array(
			// Colors.
			'color'        => array(
				'id'           => $prefix . 'color_focus',
				'select_class' => $cls_4,
			),
			'bg_color'     => array(
				'id'           => $prefix . 'bg_color_focus',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_4,
			),
			'border_color' => array(
				'id'           => $prefix . 'border_color_focus',
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
