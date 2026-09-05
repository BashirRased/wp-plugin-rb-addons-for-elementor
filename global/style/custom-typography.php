<?php
/**
 * Custom typography controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use RBELAD_Elementor_Addons\Font_List;

// RB Typography.
$rbelad_base_id   = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'rbelad_typography';
$rbelad_selector  = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';
$rbelad_condition = ! empty( $rbelad_values['condition'] ) ? (array) $rbelad_values['condition'] : array();

// =========================
// TYPOGRAPHY CONDITIONS
// =========================
$rbelad_default_typography_condition = array_merge(
	$rbelad_condition,
	array(
		$rbelad_base_id . '_typography_type' => 'default',
	)
);

$rbelad_custom_typography_condition = array_merge(
	$rbelad_condition,
	array(
		$rbelad_base_id . '_typography_type' => 'custom',
	)
);

// =========================
// RB TYPOGRAPHY HEADING
// =========================
$this->add_control(
	$rbelad_base_id . '_rb_typography_heading',
	array(
		'label'       => ! empty( $rbelad_values['label'] )
			? $rbelad_values['label']
			: esc_html__( 'RB Typography', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

// =========================
// TYPOGRAPHY TYPE
// =========================
$this->add_control(
	$rbelad_base_id . '_typography_type',
	array(
		'label'     => esc_html__( 'Typography Type', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			'default' => esc_html__( 'Default', 'rb-addons-for-elementor' ),
			'custom'  => esc_html__( 'RB Custom', 'rb-addons-for-elementor' ),
		),
		'default'   => ! empty( $rbelad_values['typography_type_default'] )
			? $rbelad_values['typography_type_default']
			: 'default',
		'condition' => $rbelad_condition,
	)
);

// ========================================================
// DEFAULT TYPOGRAPHY
// Elementor Native Typography Control.
// ========================================================
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'      => $rbelad_base_id . '_default_typography',
		'selector'  => $rbelad_selector,
		'condition' => $rbelad_default_typography_condition,
	)
);

// ========================================================
// RB CUSTOM TYPOGRAPHY
// ========================================================

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
		'condition'    => $rbelad_custom_typography_condition,
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
		'default'              => ! empty( $rbelad_values['font_family_default'] )
			? $rbelad_values['font_family_default']
			: 'font_default',
		'condition'            => $rbelad_custom_typography_condition,
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
		'default'    => ! empty( $rbelad_values['font_size_default'] )
			? $rbelad_values['font_size_default']
			: null,
		'condition'  => $rbelad_custom_typography_condition,
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
			''    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
			'300' => esc_html__( '300 (Light)', 'rb-addons-for-elementor' ),
			'400' => esc_html__( '400 (Regular)', 'rb-addons-for-elementor' ),
			'500' => esc_html__( '500 (Medium)', 'rb-addons-for-elementor' ),
			'600' => esc_html__( '600 (Semibold)', 'rb-addons-for-elementor' ),
			'700' => esc_html__( '700 (Bold)', 'rb-addons-for-elementor' ),
		),
		'selectors' => array(
			$rbelad_selector => 'font-weight: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['font_weight_default'] )
			? $rbelad_values['font_weight_default']
			: null,
		'condition' => $rbelad_custom_typography_condition,
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
			''       => esc_html__( 'Default', 'rb-addons-for-elementor' ),
			'normal' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
			'italic' => esc_html__( 'Italic', 'rb-addons-for-elementor' ),
		),
		'selectors' => array(
			$rbelad_selector => 'font-style: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['font_style_default'] )
			? $rbelad_values['font_style_default']
			: null,
		'condition' => $rbelad_custom_typography_condition,
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
			''           => esc_html__( 'Default', 'rb-addons-for-elementor' ),
			'uppercase'  => esc_html__( 'Uppercase', 'rb-addons-for-elementor' ),
			'lowercase'  => esc_html__( 'Lowercase', 'rb-addons-for-elementor' ),
			'capitalize' => esc_html__( 'Capitalize', 'rb-addons-for-elementor' ),
		),
		'selectors' => array(
			$rbelad_selector => 'text-transform: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_transform_default'] )
			? $rbelad_values['text_transform_default']
			: null,
		'condition' => $rbelad_custom_typography_condition,
	)
);

$this->end_popover();

// ========================================================
// TYPOGRAPHY SPACING
// ========================================================
$this->add_control(
	$rbelad_base_id . '_typography_spacing_popover',
	array(
		'label'        => esc_html__( 'Typography Spacing', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'condition'    => $rbelad_custom_typography_condition,
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
		'default'    => ! empty( $rbelad_values['letter_spacing_default'] )
			? $rbelad_values['letter_spacing_default']
			: null,
		'condition'  => $rbelad_custom_typography_condition,
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
		'default'    => ! empty( $rbelad_values['word_spacing_default'] )
			? $rbelad_values['word_spacing_default']
			: null,
		'condition'  => $rbelad_custom_typography_condition,
	)
);

$this->end_popover();

// ========================================================
// TEXT DECORATION
// ========================================================
$this->add_control(
	$rbelad_base_id . '_text_decoration_popover',
	array(
		'label'        => esc_html__( 'Text Decoration', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'condition'    => $rbelad_condition,
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
			''             => esc_html__( 'Default', 'rb-addons-for-elementor' ),
			'underline'    => esc_html__( 'Underline', 'rb-addons-for-elementor' ),
			'overline'     => esc_html__( 'Overline', 'rb-addons-for-elementor' ),
			'line-through' => esc_html__( 'Line Through', 'rb-addons-for-elementor' ),
			'none'         => esc_html__( 'None', 'rb-addons-for-elementor' ),
		),
		'selectors' => array(
			$rbelad_selector => 'text-decoration-line: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_decoration_line_default'] )
			? $rbelad_values['text_decoration_line_default']
			: null,
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
			'solid'  => esc_html__( 'Solid', 'rb-addons-for-elementor' ),
			'double' => esc_html__( 'Double', 'rb-addons-for-elementor' ),
			'dotted' => esc_html__( 'Dotted', 'rb-addons-for-elementor' ),
			'dashed' => esc_html__( 'Dashed', 'rb-addons-for-elementor' ),
			'wavy'   => esc_html__( 'Wavy', 'rb-addons-for-elementor' ),
		),
		'selectors' => array(
			$rbelad_selector => 'text-decoration-style: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_decoration_style_default'] )
			? $rbelad_values['text_decoration_style_default']
			: 'solid',
		'condition' => array(
			$rbelad_base_id . '_text_decoration_line!' => array( '', 'none' ),
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
		'default'   => ! empty( $rbelad_values['text_decoration_color_default'] )
			? $rbelad_values['text_decoration_color_default']
			: null,
		'condition' => array(
			$rbelad_base_id . '_text_decoration_line!' => array( '', 'none' ),
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
			'px'  => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
			'em'  => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.1,
			),
			'rem' => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.1,
			),
		),
		'selectors'  => array(
			$rbelad_selector => 'text-underline-offset: {{SIZE}}{{UNIT}};',
		),
		'default'    => ! empty( $rbelad_values['text_decoration_offset_default'] )
			? $rbelad_values['text_decoration_offset_default']
			: null,
		'condition'  => array(
			$rbelad_base_id . '_text_decoration_line!' => array( '', 'none' ),
		),
	)
);

$this->end_popover();

// ========================================================
// TEXT WRAP
// ========================================================
$this->add_control(
	$rbelad_base_id . '_text_box_popover',
	array(
		'label'        => esc_html__( 'Text Wrap', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

// =========================
// TEXT INDENT
// =========================
$this->add_responsive_control(
	$rbelad_base_id . '_text_indent',
	array(
		'label'      => esc_html__( 'Text Indent', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em', 'rem' ),
		'selectors'  => array(
			$rbelad_selector => 'text-indent: {{SIZE}}{{UNIT}};',
		),
		'default'    => ! empty( $rbelad_values['text_indent_default'] )
			? $rbelad_values['text_indent_default']
			: null,
		'condition'  => $rbelad_condition,
	)
);

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
				'title' => esc_html__( 'Left', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center'  => array(
				'title' => esc_html__( 'Center', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'   => array(
				'title' => esc_html__( 'Right', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
			'justify' => array(
				'title' => esc_html__( 'Justify', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-justify',
			),
		),
		'selectors' => array(
			$rbelad_selector => 'text-align: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['text_align_default'] )
			? $rbelad_values['text_align_default']
			: $rbelad_text_align,
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
			''           => esc_html__( 'Default', 'rb-addons-for-elementor' ),
			'break-word' => esc_html__( 'Break Word', 'rb-addons-for-elementor' ),
		),
		'selectors' => array(
			$rbelad_selector => 'overflow-wrap: {{VALUE}}; word-wrap: {{VALUE}};',
		),
		'default'   => ! empty( $rbelad_values['overflow_wrap_default'] )
			? $rbelad_values['overflow_wrap_default']
			: null,
		'condition' => $rbelad_condition,
	)
);

$this->end_popover();

// ========================================================
// TEXT STROKE
// ========================================================
$this->add_control(
	$rbelad_base_id . '_text_stroke_popover',
	array(
		'label'        => esc_html__( 'Text Stroke', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'condition'    => $rbelad_condition,
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
		'default'    => ! empty( $rbelad_values['stroke_width_default'] )
			? $rbelad_values['stroke_width_default']
			: null,
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
		'default'   => ! empty( $rbelad_values['stroke_color_default'] )
			? $rbelad_values['stroke_color_default']
			: null,
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
		'label_on'     => esc_html__( 'Yes', 'rb-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'selectors'    => array(
			$rbelad_selector => '-webkit-text-fill-color: transparent; color: transparent;',
		),
		'default'      => ! empty( $rbelad_values['text_transparent_default'] )
			? $rbelad_values['text_transparent_default']
			: null,
		'condition'    => array(
			$rbelad_base_id . '_stroke_width!' => '',
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
		'default'   => ! empty( $rbelad_values['text_shadow_default'] )
			? $rbelad_values['text_shadow_default']
			: null,
		'condition' => $rbelad_condition,
	)
);

$this->end_popover();
