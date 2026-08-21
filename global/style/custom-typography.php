<?php
/**
 * Custom typography controls
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Font_List;
use Elementor\Group_Control_Text_Shadow;

// RB Typography.
$rbelad_base_id   = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'rbelad_typography';
$rbelad_selector  = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';
$rbelad_condition = ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array();

// =========================
// RB TYPOGRAPHY
// =========================
$this->add_control(
	$rbelad_base_id . '_rb_typography_heading',
	array(
		'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'RB Typography', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

// =========================
// TYPOGRAPHY POPOVER
// =========================
$this->add_control(
	$rbelad_base_id . '_typography_popover',
	array(
		'label'        => esc_html__( 'Typography', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
	)
);

$this->start_popover();

// =========================
// FONT FAMILY
// =========================
$this->add_control(
	$rbelad_base_id . '_font_family',
	array(
		'label'                => esc_html__( 'Font Family', 'rb-addons-for-elementor' ),
		'type'                 => Controls_Manager::SELECT,
		'groups'               => Font_List::groups(),
		'selectors_dictionary' => Font_List::css_map(),
		'selectors'            => array(
			$rbelad_selector => 'font-family: {{VALUE}};',
		),
		'default'              => ! empty( $rbelad_values['font_family_default'] ) ? $rbelad_values['font_family_default'] : 'font_default',
		'condition'            => $rbelad_condition,
	)
);

// =========================
// FONT SIZE
// =========================
$this->add_responsive_control(
	$rbelad_base_id . '_font_size',
	array(
		'label'      => esc_html__( 'Font Size', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em', 'rem' ),
		'range'      => array(
			'px'  => array(
				'min'  => 8,
				'max'  => 700,
				'step' => 1,
			),
			'em'  => array(
				'min'  => 0.5,
				'max'  => 100,
				'step' => 0.1,
			),
			'rem' => array(
				'min'  => 0.5,
				'max'  => 100,
				'step' => 0.1,
			),
		),
		'selectors'  => array(
			$rbelad_selector => 'font-size: {{SIZE}}{{UNIT}};',
		),
		'default'    => ! empty( $rbelad_values['font_size_default'] ) ? $rbelad_values['font_size_default'] : null,
		'condition'  => $rbelad_condition,
	)
);

// =========================
// FONT WEIGHT
// =========================
$this->add_control(
	$rbelad_base_id . '_font_weight',
	array(
		'label'     => esc_html__( 'Font Weight', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			''    => 'Default',
			'300' => '300 (Light)',
			'400' => '400 (Normal)',
			'500' => '500 (Medium)',
			'600' => '600 (Semi Bold)',
			'700' => '700 (Bold)',
			'800' => '800 (Extra Bold)',
			'900' => '900 (Black)',
		),
		'selectors' => array(
			$rbelad_selector => 'font-weight: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['font_weight_default'] ) ? $rbelad_values['font_weight_default'] : null,
		'condition' => $rbelad_condition,
	)
);

// =========================
// FONT STYLE
// =========================
$this->add_control(
	$rbelad_base_id . '_font_style',
	array(
		'label'     => esc_html__( 'Font Style', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			''       => 'Default',
			'normal' => 'Normal',
			'italic' => 'Italic',
		),
		'selectors' => array(
			$rbelad_selector => 'font-style: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['font_style_default'] ) ? $rbelad_values['font_style_default'] : null,
		'condition' => $rbelad_condition,
	)
);

// =========================
// TEXT TRANSFORM
// =========================
$this->add_control(
	$rbelad_base_id . '_text_transform',
	array(
		'label'     => esc_html__( 'Text Transform', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			''           => 'Default',
			'uppercase'  => 'Uppercase',
			'lowercase'  => 'Lowercase',
			'capitalize' => 'Capitalize',
		),
		'selectors' => array(
			$rbelad_selector => 'text-transform: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_transform_default'] ) ? $rbelad_values['text_transform_default'] : null,
		'condition' => $rbelad_condition,
	)
);

$this->end_popover();

// ==============================
// TYPOGRAPHY SPACING POPOVER
// ==============================
$this->add_control(
	$rbelad_base_id . '_typography_spacing_popover',
	array(
		'label'        => esc_html__( 'Typography Spacing', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
	)
);

$this->start_popover();

// =========================
// LETTER SPACING
// =========================
$this->add_responsive_control(
	$rbelad_base_id . '_letter_spacing',
	array(
		'label'      => esc_html__( 'Letter Spacing', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'selectors'  => array(
			$rbelad_selector => 'letter-spacing: {{SIZE}}{{UNIT}};',
		),
		'default'    => ! empty( $rbelad_values['letter_spacing_default'] ) ? $rbelad_values['letter_spacing_default'] : null,
		'condition'  => $rbelad_condition,
	)
);

// =========================
// WORD SPACING
// =========================
$this->add_responsive_control(
	$rbelad_base_id . '_word_spacing',
	array(
		'label'      => esc_html__( 'Word Spacing', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'selectors'  => array(
			$rbelad_selector => 'word-spacing: {{SIZE}}{{UNIT}};',
		),
		'default'    => ! empty( $rbelad_values['word_spacing_default'] ) ? $rbelad_values['word_spacing_default'] : null,
		'condition'  => $rbelad_condition,
	)
);

// =========================
// TEXT INDENT
// =========================
$this->add_responsive_control(
	$rbelad_base_id . '_text_indent',
	array(
		'label'     => esc_html__( 'Text Indent', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'selectors' => array(
			$rbelad_selector => 'text-indent: {{SIZE}}{{UNIT}};',
		),
		'default'   => ! empty( $rbelad_values['text_indent_default'] ) ? $rbelad_values['text_indent_default'] : null,
		'condition' => $rbelad_condition,
	)
);

$this->end_popover();

// ==============================
// TEXT DECORATION POPOVER
// ==============================
$this->add_control(
	$rbelad_base_id . '_text_decoration_popover',
	array(
		'label'        => esc_html__( 'Text Decoration', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
	)
);

$this->start_popover();

// =========================
// TEXT DECORATION LINE
// =========================
$this->add_control(
	$rbelad_base_id . '_text_decoration_line',
	array(
		'label'     => esc_html__( 'Text Decoration Line', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			''             => 'Default',
			'underline'    => 'Underline',
			'overline'     => 'Overline',
			'line-through' => 'Line Through',
			'none'         => 'None',
		),
		'selectors' => array(
			$rbelad_selector => 'text-decoration-line: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_decoration_line_default'] ) ? $rbelad_values['text_decoration_line_default'] : null,
		'condition' => $rbelad_condition,
	)
);

// =========================
// TEXT DECORATION STYLE
// =========================
$this->add_control(
	$rbelad_base_id . '_text_decoration_style',
	array(
		'label'     => esc_html__( 'Decoration Style', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			'solid'  => 'Solid',
			'double' => 'Double',
			'dotted' => 'Dotted',
			'dashed' => 'Dashed',
			'wavy'   => 'Wavy',
		),
		'selectors' => array(
			$rbelad_selector => 'text-decoration-style: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_decoration_style_default'] )
			? $rbelad_values['text_decoration_style_default']
			: 'solid',
		'condition' => array_merge(
			(array) $rbelad_condition,
			array(
				$rbelad_base_id . '_text_decoration_line!' => array( '', 'none' ),
			)
		),
	)
);

// =========================
// TEXT DECORATION COLOR
// =========================
$this->add_control(
	$rbelad_base_id . '_text_decoration_color',
	array(
		'label'     => esc_html__( 'Decoration Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			$rbelad_selector => 'text-decoration-color: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_decoration_color_default'] ) ? $rbelad_values['text_decoration_color_default'] : null,
		'condition' => array_merge(
			(array) $rbelad_condition,
			array(
				$rbelad_base_id . '_text_decoration_line!' => array( '', 'none' ),
			)
		),
	)
);

// =========================
// TEXT DECORATION OFFSET
// =========================
$this->add_responsive_control(
	$rbelad_base_id . '_text_decoration_offset',
	array(
		'label'      => esc_html__( 'Offset', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em', 'rem' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 20,
			),
		),
		'selectors'  => array(
			$rbelad_selector => 'text-underline-offset: {{SIZE}}{{UNIT}};',
		),
		'default'    => ! empty( $rbelad_values['text_decoration_offset_default'] ) ? $rbelad_values['text_decoration_offset_default'] : null,
		'condition'  => array_merge(
			(array) $rbelad_condition,
			array(
				$rbelad_base_id . '_text_decoration_line!' => array( '', 'none' ),
			)
		),
	)
);

$this->end_popover();

// ==============================
// TEXT BOX POPOVER
// ==============================
$this->add_control(
	$rbelad_base_id . '_text_box_popover',
	array(
		'label'        => esc_html__( 'Text Wrap', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
	)
);

$this->start_popover();

// =========================
// TEXT ALIGNMENT
// =========================
$rbelad_text_align = is_rtl() ? 'right' : 'left';
$this->add_responsive_control(
	$rbelad_base_id . '_align',
	array(
		'label'     => esc_html__( 'Text Alignment', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'left'    => array(
				'title' => 'Left',
				'icon'  => 'eicon-text-align-left',
			),
			'center'  => array(
				'title' => 'Center',
				'icon'  => 'eicon-text-align-center',
			),
			'right'   => array(
				'title' => 'Right',
				'icon'  => 'eicon-text-align-right',
			),
			'justify' => array(
				'title' => 'Justify',
				'icon'  => 'eicon-text-align-justify',
			),
		),
		'selectors' => array(
			$rbelad_selector => 'text-align: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_align_default'] ) ? $rbelad_values['text_align_default'] : $rbelad_text_align,
		'condition' => $rbelad_condition,
	)
);

// =========================
// OVERFLOW WRAP
// =========================
$this->add_control(
	$rbelad_base_id . '_overflow_wrap',
	array(
		'label'     => esc_html__( 'Overflow Wrap', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			''           => 'Default',
			'break-word' => 'Break Word',
		),
		'selectors' => array(
			$rbelad_selector => 'overflow-wrap: {{VALUE}}; word-wrap: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['overflow_wrap_default'] ) ? $rbelad_values['overflow_wrap_default'] : null,
		'condition' => $rbelad_condition,
	)
);

$this->end_popover();

// ==============================
// TEXT STROKE POPOVER
// ==============================
$this->add_control(
	$rbelad_base_id . '_text_stroke_popover',
	array(
		'label'        => esc_html__( 'Text Stroke', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
	)
);

$this->start_popover();

// =========================
// TEXT STROKE WIDTH
// =========================
$this->add_responsive_control(
	$rbelad_base_id . '_stroke_width',
	array(
		'label'      => esc_html__( 'Text Stroke Width', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'selectors'  => array(
			$rbelad_selector => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
		),
		'default'    => ! empty( $rbelad_values['stroke_width_default'] ) ? $rbelad_values['stroke_width_default'] : null,
		'condition'  => $rbelad_condition,
	)
);

// =========================
// TEXT STROKE COLOR
// =========================
$this->add_control(
	$rbelad_base_id . '_stroke_color',
	array(
		'label'     => esc_html__( 'Stroke Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			$rbelad_selector => '-webkit-text-stroke-color: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['stroke_color_default'] ) ? $rbelad_values['stroke_color_default'] : null,
		'condition' => $rbelad_condition,
	)
);

// =========================
// TEXT TRANSPARENT FILL
// =========================
$this->add_control(
	$rbelad_base_id . '_text_transparent',
	array(
		'label'        => esc_html__( 'Transparent Fill', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => 'Yes',
		'label_off'    => 'No',
		'return_value' => 'yes',
		'selectors'    => array(
			$rbelad_selector => '-webkit-text-fill-color: transparent; color: transparent;',
		),
		'default'      => ! empty( $rbelad_values['text_transparent_default'] ) ? $rbelad_values['text_transparent_default'] : null,
		'condition'    => array_merge(
			(array) $rbelad_condition,
			array(
				$rbelad_base_id . '_stroke_width!' => '',
			)
		),
	)
);

// =========================
// TEXT SHADOW
// =========================
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'      => $rbelad_base_id . '_text_shadow',
		'selector'  => $rbelad_selector,
		'default'   => ! empty( $rbelad_values['text_shadow_default'] ) ? $rbelad_values['text_shadow_default'] : null,
		'condition' => $rbelad_condition,
	)
);

$this->end_popover();
