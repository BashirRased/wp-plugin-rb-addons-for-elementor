<?php
/**
 * Extend Elementor Typography controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

use Elementor\Controls_Manager;

use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

/**
 * Extended Typography Group Control.
 *
 * Adds additional typography options for Elementor such as:
 * - Text Decoration Style
 * - Text Decoration Thickness
 * - Text Decoration Color
 * - Underline Offset
 *
 * Extends the default Elementor Group_Control_Typography
 * to provide more CSS text-decoration controls.
 */
class Group_Control_Typography_Extended extends Group_Control_Typography {
	/**
	 * Get control type.
	 *
	 * @return string
	 */
	public static function get_type() {
		return 'typography';
	}

	/**
	 * Initialize typography fields.
	 *
	 * @return array
	 */
	protected function init_fields() {
		$fields = parent::init_fields();

		// Decoration Style.
		$decoration_style_data = array(
			'label'          => esc_html__( 'Decoration Style', 'rb-addons-for-elementor' ),
			'type'           => Controls_Manager::SELECT,
			'default'        => 'solid',
			'options'        => array(
				'solid'  => esc_html__( 'Solid', 'rb-addons-for-elementor' ),
				'double' => esc_html__( 'Double', 'rb-addons-for-elementor' ),
				'dotted' => esc_html__( 'Dotted', 'rb-addons-for-elementor' ),
				'dashed' => esc_html__( 'Dashed', 'rb-addons-for-elementor' ),
				'wavy'   => esc_html__( 'Wavy', 'rb-addons-for-elementor' ),
			),
			'selector_value' => 'text-decoration-style: {{VALUE}};',
			'condition'      => array(
				'text_decoration' => array( 'underline', 'overline', 'line-through' ),
			),
		);

		// Decoration Thickness.
		$decoration_thickness_data = array(
			'label'          => esc_html__( 'Decoration Thickness', 'rb-addons-for-elementor' ),
			'type'           => Controls_Manager::SLIDER,
			'size_units'     => array( 'px', 'em' ),
			'range'          => array(
				'px' => array(
					'min' => 0,
					'max' => 10,
				),
				'em' => array(
					'min'  => 0,
					'max'  => 1,
					'step' => 0.01,
				),
			),
			'selector_value' => 'text-decoration-thickness: {{SIZE}}{{UNIT}};',
			'condition'      => array(
				'text_decoration' => array( 'underline', 'overline', 'line-through' ),
			),
		);

		// Decoration Color.
		$decoration_color_data = array(
			'label'          => esc_html__( 'Decoration Color', 'rb-addons-for-elementor' ),
			'type'           => Controls_Manager::COLOR,
			'selector_value' => 'text-decoration-color: {{VALUE}};',
			'condition'      => array(
				'text_decoration' => array( 'underline', 'overline', 'line-through' ),
			),
		);

		// Underline Offset.
		$underline_offset_data = array(
			'label'          => esc_html__( 'Underline Offset', 'rb-addons-for-elementor' ),
			'type'           => Controls_Manager::SLIDER,
			'size_units'     => array( 'px', 'em' ),
			'selector_value' => 'text-underline-offset: {{SIZE}}{{UNIT}};',
			'condition'      => array(
				'text_decoration' => array( 'underline' ),
			),
		);

		// Word Break.
		$word_break_data = array(
			'label'          => esc_html__( 'Word Break', 'rb-addons-for-elementor' ),
			'type'           => Controls_Manager::SELECT,
			'default'        => 'normal',
			'options'        => array(
				'normal'     => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
				'break-all'  => esc_html__( 'Break All', 'rb-addons-for-elementor' ),
				'keep-all'   => esc_html__( 'Keep All', 'rb-addons-for-elementor' ),
				'break-word' => esc_html__( 'Break Word', 'rb-addons-for-elementor' ),
			),
			'selector_value' => 'word-break: {{VALUE}};',
		);

		// Insert after 'text_decoration' in one line.
		array_splice(
			$fields,
			array_search( 'text_decoration', array_keys( $fields ), true ) + 1,
			0,
			array(
				'text_decoration_style'     => $decoration_style_data,
				'text_decoration_thickness' => $decoration_thickness_data,
				'text_decoration_color'     => $decoration_color_data,
				'text_underline_offset'     => $underline_offset_data,
				'word-break'                => $word_break_data,
			)
		);

		return $fields;
	}
}
