<?php
/**
 * Typography Trait
 *
 * Handles custom typography controls for Elementor widgets.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use RBELAD_Elementor_Addons\Font_List;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Typography Trait
 *
 * Handles custom typography controls for Elementor widgets.
 */
trait RBELAD_Custom_Typography_Trait {
	/**
	 * Add custom typography controls.
	 *
	 * @param string $prefix The prefix of the controls.
	 * @param array  $args   The element selector, controls list and more.
	 */
	protected function rbelad_custom_typography( string $prefix, array $args ) {

		/**
		 * Custom Fonts Controls
		 *
		 * @var \Elementor\Widget_Base $this.
		 */
		$controls = $args['controls'] ?? array();

		if ( ! is_array( $controls ) || empty( $controls ) ) {
			return;
		}

		if ( ! empty( $controls ) && is_array( $controls ) ) {
			foreach ( $controls as $key => $values ) {
				// RB Typography.
				$rbelad_selector  = ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}';
				$rbelad_name      = ! empty( $values['name'] ) ? $values['name'] : 'rb_typography';
				$rbelad_condition = ! empty( $values['condition'] ) ? $values['condition'] : array();

				// RB Typography Heading.
				$this->add_control(
					! empty( $values['id'] ) ? $values['id'] : '_rb_typography_heading',
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'RB Typography', 'rb-addons-for-elementor' ),
						'label_block' => true,
						'type'        => Controls_Manager::HEADING,
						'ai'          => false,
						'classes'     => 'rbelad-editor-heading-control',
					)
				);

				// =========================
				// FONT FAMILY
				// =========================
				$this->add_control(
					$rbelad_name . '_font_family',
					array(
						'label'                => esc_html__( 'Font Family', 'rb-addons-for-elementor' ),
						'type'                 => Controls_Manager::SELECT2,
						'multiple' => false,
						'options'              => Font_List::grouped_options(),
						'selectors_dictionary' => Font_List::css_map(),
						'selectors'            => array(
							$rbelad_selector => 'font-family: {{VALUE}};',
						),
						'default'              => ! empty( $values['font_family_default'] ) ? $values['font_family_default'] : 'font_default',
						'condition'            => $rbelad_condition,
					)
				);

				// =========================
				// FONT SIZE
				// =========================
				$this->add_responsive_control(
					$rbelad_name . '_font_size',
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
						'default'    => ! empty( $values['font_size_default'] ) ? $values['font_size_default'] : null,
						'condition'  => $rbelad_condition,
					)
				);

				// =========================
				// FONT WEIGHT
				// =========================
				$this->add_control(
					$rbelad_name . '_font_weight',
					array(
						'label'     => esc_html__( 'Font Weight', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::SELECT,
						'options'   => array(
							''    => 'Default',
							'100' => '100 (Thin)',
							'200' => '200 (Extra Light)',
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
						'default'   => ! empty( $values['font_weight_default'] ) ? $values['font_weight_default'] : null,
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// FONT STYLE
				// =========================
				$this->add_control(
					$rbelad_name . '_font_style',
					array(
						'label'     => esc_html__( 'Font Style', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::SELECT,
						'options'   => array(
							''        => 'Default',
							'normal'  => 'Normal',
							'italic'  => 'Italic',
							'oblique' => 'Oblique',
						),
						'selectors' => array(
							$rbelad_selector => 'font-style: {{VALUE}};',
						),
						'default'   => ! empty( $values['font_style_default'] ) ? $values['font_style_default'] : null,
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// TEXT TRANSFORM
				// =========================
				$this->add_control(
					$rbelad_name . '_text_transform',
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
						'default'   => ! empty( $values['text_transform_default'] ) ? $values['text_transform_default'] : null,
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// LETTER SPACING
				// =========================
				$this->add_responsive_control(
					$rbelad_name . '_letter_spacing',
					array(
						'label'      => esc_html__( 'Letter Spacing', 'rb-addons-for-elementor' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => array( 'px', 'em' ),
						'selectors'  => array(
							$rbelad_selector => 'letter-spacing: {{SIZE}}{{UNIT}};',
						),
						'default'    => ! empty( $values['letter_spacing_default'] ) ? $values['letter_spacing_default'] : null,
						'condition'  => $rbelad_condition,
					)
				);

				// =========================
				// WORD SPACING
				// =========================
				$this->add_responsive_control(
					$rbelad_name . '_word_spacing',
					array(
						'label'      => esc_html__( 'Word Spacing', 'rb-addons-for-elementor' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => array( 'px', 'em' ),
						'selectors'  => array(
							$rbelad_selector => 'word-spacing: {{SIZE}}{{UNIT}};',
						),
						'default'    => ! empty( $values['word_spacing_default'] ) ? $values['word_spacing_default'] : null,
						'condition'  => $rbelad_condition,
					)
				);

				// =========================
				// TEXT DECORATION LINE
				// =========================
				$this->add_control(
					$rbelad_name . '_text_decoration_line',
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
						'default'   => ! empty( $values['text_decoration_line_default'] ) ? $values['text_decoration_line_default'] : null,
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// TEXT DECORATION STYLE
				// =========================
				$this->add_control(
					$rbelad_name . '_text_decoration_style',
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
						'default'   => ! empty( $values['text_decoration_style_default'] )
							? $values['text_decoration_style_default']
							: 'solid',
						'condition' => array_merge(
							(array) $rbelad_condition,
							array(
								$rbelad_name . '_text_decoration_line!' => array( '', 'none' ),
							)
						),
					)
				);

				// =========================
				// TEXT DECORATION COLOR
				// =========================
				$this->add_control(
					$rbelad_name . '_text_decoration_color',
					array(
						'label'     => esc_html__( 'Decoration Color', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => array(
							$rbelad_selector => 'text-decoration-color: {{VALUE}};',
						),
						'default'   => ! empty( $values['text_decoration_color_default'] ) ? $values['text_decoration_color_default'] : null,
						'condition' => array_merge(
							(array) $rbelad_condition,
							array(
								$rbelad_name . '_text_decoration_line!' => array( '', 'none' ),
							)
						),
					)
				);

				// =========================
				// TEXT DECORATION OFFSET
				// =========================
				$this->add_responsive_control(
					$rbelad_name . '_text_decoration_offset',
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
						'default'    => ! empty( $values['text_decoration_offset_default'] ) ? $values['text_decoration_offset_default'] : null,
						'condition'  => array_merge(
							(array) $rbelad_condition,
							array(
								$rbelad_name . '_text_decoration_line' => 'underline',
							)
						),
					)
				);

				// =========================
				// TEXT ALIGNMENT
				// =========================
				$this->add_responsive_control(
					$rbelad_name . '_align',
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
						'default'   => ! empty( $values['text_align_default'] ) ? $values['text_align_default'] : rbelad_default_text_align(),
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// TEXT STROKE WIDTH
				// =========================
				$this->add_responsive_control(
					$rbelad_name . '_stroke_width',
					array(
						'label'      => esc_html__( 'Text Stroke Width', 'rb-addons-for-elementor' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => array( 'px' ),
						'selectors'  => array(
							$rbelad_selector => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
						),
						'default'    => ! empty( $values['stroke_width_default'] ) ? $values['stroke_width_default'] : null,
						'condition'  => $rbelad_condition,
					)
				);

				// =========================
				// TEXT STROKE COLOR
				// =========================
				$this->add_control(
					$rbelad_name . '_stroke_color',
					array(
						'label'     => esc_html__( 'Stroke Color', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => array(
							$rbelad_selector => '-webkit-text-stroke-color: {{VALUE}};',
						),
						'default'   => ! empty( $values['stroke_color_default'] ) ? $values['stroke_color_default'] : null,
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// TEXT TRANSPARENT FILL
				// =========================
				$this->add_control(
					$rbelad_name . '_text_transparent',
					array(
						'label'        => esc_html__( 'Transparent Fill', 'rb-addons-for-elementor' ),
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => 'Yes',
						'label_off'    => 'No',
						'return_value' => 'yes',
						'selectors'    => array(
							$rbelad_selector => '-webkit-text-fill-color: transparent; color: transparent;',
						),
						'default'      => ! empty( $values['text_transparent_default'] ) ? $values['text_transparent_default'] : null,
						'condition'    => array_merge(
							(array) $rbelad_condition,
							array(
								$rbelad_name . '_stroke_width!' => '',
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
						'name'      => $rbelad_name . '_text_shadow',
						'selector'  => $rbelad_selector,
						'default'   => ! empty( $values['text_shadow_default'] ) ? $values['text_shadow_default'] : null,
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// OVERFLOW WRAP
				// =========================
				$this->add_control(
					$rbelad_name . '_overflow_wrap',
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
						'default'   => ! empty( $values['overflow_wrap_default'] ) ? $values['overflow_wrap_default'] : null,
						'condition' => $rbelad_condition,
					)
				);

				// =========================
				// TEXT INDENT
				// =========================
				$this->add_responsive_control(
					$rbelad_name . '_text_indent',
					array(
						'label'     => esc_html__( 'Text Indent', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::SLIDER,
						'selectors' => array(
							$rbelad_selector => 'text-indent: {{SIZE}}{{UNIT}};',
						),
						'default'   => ! empty( $values['text_indent_default'] ) ? $values['text_indent_default'] : null,
						'condition' => $rbelad_condition,
					)
				);
			}
		}
	}
}
