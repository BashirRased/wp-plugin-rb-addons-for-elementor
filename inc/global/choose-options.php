<?php
/**
 * Common control options for RB Addons for Elementor.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * H1-H6 HTML tags.
 */
if ( ! function_exists( 'rbelad_heading_tags' ) ) {
	/**
	 * Returns available heading tags (H1–H6).
	 *
	 * @return array<string, array{title: string, icon: string}> List of heading tags with titles and icons.
	 */
	function rbelad_heading_tags() {
		$heading_tag_list = array(
			'h1' => array(
				'title' => esc_html__( 'H1', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h1',
			),
			'h2' => array(
				'title' => esc_html__( 'H2', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h2',
			),
			'h3' => array(
				'title' => esc_html__( 'H3', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h3',
			),
			'h4' => array(
				'title' => esc_html__( 'H4', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h4',
			),
			'h5' => array(
				'title' => esc_html__( 'H5', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h5',
			),
			'h6' => array(
				'title' => esc_html__( 'H6', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h6',
			),
		);
		return $heading_tag_list;
	}
}

/**
 * Alignment with justify.
 */
if ( ! function_exists( 'rbelad_align_justify' ) ) {
	/**
	 * Returns alignment options including justify.
	 *
	 * @return array<string, array{title: string, icon: string}> Alignment choices.
	 */
	function rbelad_align_justify() {
		$alignment = array(
			'left'    => array(
				'title' => esc_html__( 'Left', 'rb-elementor-addons' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center'  => array(
				'title' => esc_html__( 'Center', 'rb-elementor-addons' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'   => array(
				'title' => esc_html__( 'Right', 'rb-elementor-addons' ),
				'icon'  => 'eicon-text-align-right',
			),
			'justify' => array(
				'title' => esc_html__( 'Justified', 'rb-elementor-addons' ),
				'icon'  => 'eicon-text-align-justify',
			),
		);
		return $alignment;
	}
}

/**
 * Border style.
 */
if ( ! function_exists( 'rbelad_border_style' ) ) {
	/**
	 * Returns border styles.
	 *
	 * @return array<string, string> Border style options.
	 */
	function rbelad_border_style() {
		$border_style = array(
			'none'   => esc_html__( 'None', 'rb-elementor-addons' ),
			'solid'  => esc_html__( 'Solid', 'rb-elementor-addons' ),
			'dashed' => esc_html__( 'Dashed', 'rb-elementor-addons' ),
			'dotted' => esc_html__( 'Dotted', 'rb-elementor-addons' ),
		);
		return $border_style;
	}
}

/**
 * Flex Direction.
 */
if ( ! function_exists( 'rbelad_flex_direction' ) ) {
	/**
	 * Returns flex-direction styles.
	 *
	 * @return array<string, string> Flex Direction style options.
	 */
	function rbelad_flex_direction() {
		$border_style = array(
			'column'         => esc_html__( 'Column', 'rb-elementor-addons' ),
			'column-reverse' => esc_html__( 'Column Reverse', 'rb-elementor-addons' ),
			'row'            => esc_html__( 'Row', 'rb-elementor-addons' ),
			'row-reverse'    => esc_html__( 'Row Reverse', 'rb-elementor-addons' ),
		);
		return $border_style;
	}
}

/**
 * Transition function.
 */
if ( ! function_exists( 'rbelad_transition_function' ) ) {
	/**
	 * Returns transition_function styles.
	 *
	 * @return array<string, string> Transition Function style options.
	 */
	function rbelad_transition_function() {
		$transition_function = array(
			''            => esc_html__( 'Default', 'rb-elementor-addons' ),
			'ease'        => esc_html__( 'Ease', 'rb-elementor-addons' ),
			'ease-in'     => esc_html__( 'Ease In', 'rb-elementor-addons' ),
			'ease-out'    => esc_html__( 'Ease Out', 'rb-elementor-addons' ),
			'ease-in-out' => esc_html__( 'Ease In Out', 'rb-elementor-addons' ),
			'linear'      => esc_html__( 'Linear', 'rb-elementor-addons' ),
		);
		return $transition_function;
	}
}

/**
 * Transition Property.
 */
if ( ! function_exists( 'rbelad_transition_property' ) ) {
	/**
	 * Returns transition_property styles.
	 *
	 * @return array<string, string> Transition Property style options.
	 */
	function rbelad_transition_property() {
		$transition_property = array(
			''                 => esc_html__( 'Default', 'rb-elementor-addons' ),
			'none'             => esc_html__( 'None', 'rb-elementor-addons' ),
			'all'              => esc_html__( 'All', 'rb-elementor-addons' ),
			'color'            => esc_html__( 'Color', 'rb-elementor-addons' ),
			'background-color' => esc_html__( 'Background Color', 'rb-elementor-addons' ),
			'width'            => esc_html__( 'Width', 'rb-elementor-addons' ),
			'transform'        => esc_html__( 'Transform', 'rb-elementor-addons' ),
		);
		return $transition_property;
	}
}

/**
 * Icon Shape Type.
 */
if ( ! function_exists( 'rbelad_icon_shape' ) ) {
	/**
	 * Returns icon shape types.
	 *
	 * @return array<string, string> Icon Shape Type options.
	 */
	function rbelad_icon_shape() {
		$icon_shape = array(
			'triangle' => esc_html__( 'Triangle', 'rb-elementor-addons' ),
			'circle'   => esc_html__( 'Circle', 'rb-elementor-addons' ),
			'square'   => esc_html__( 'Square', 'rb-elementor-addons' ),
		);
		return $icon_shape;
	}
}

/**
 * Slider control range.
 */
if ( ! function_exists( 'rbelad_slider_range' ) ) {
	/**
	 * Get default slider range options.
	 *
	 * Provides available units (%, px, em, rem) and their
	 * respective min, max, and step values for Elementor controls.
	 *
	 * @return array<string, array{min:int|float, max:int|float, step:int|float}>
	 * Slider range definitions keyed by unit type.
	 */
	function rbelad_slider_range() {
		$range = array(
			'%'   => array(
				'min'  => -100,
				'max'  => 100,
				'step' => 1,
			),
			'px'  => array(
				'min'  => -2000,
				'max'  => 2000,
				'step' => 1,
			),
			'em'  => array(
				'min'  => -125,
				'max'  => 125,
				'step' => 0.1,
			),
			'rem' => array(
				'min'  => -125,
				'max'  => 125,
				'step' => 0.1,
			),
		);
		return $range;
	}
}

/**
 * Social Icon List.
 */
if ( ! function_exists( 'rbelad_social_icon_list' ) ) {
	/**
	 * Returns a list of default social icons for Elementor controls.
	 *
	 * Each item contains:
	 * - 'icon_title' : The display name of the social network.
	 * - 'font_icon'  : Array with 'value' (icon class) and 'library' (icon library).
	 *
	 * @return array<int, array{icon_title: string, font_icon: array{value: string, library: string}}>
	 * List of social icons.
	 */
	function rbelad_social_icon_list() {
		$social_icon_list = array(
			array(
				'rbelpro_social_icon_general_content_icon_title' => esc_html__( 'Facebook', 'rb-elementor-addons' ),
				'rbelpro_social_icon_general_content_font_icon'  => array(
					'value'   => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				),
			),
			array(
				'rbelpro_social_icon_general_content_icon_title' => esc_html__( 'Twitter', 'rb-elementor-addons' ),
				'rbelpro_social_icon_general_content_font_icon'  => array(
					'value'   => 'fab fa-x-twitter',
					'library' => 'fa-brands',
				),
			),
			array(
				'rbelpro_social_icon_general_content_icon_title' => esc_html__( 'LinkedIn', 'rb-elementor-addons' ),
				'rbelpro_social_icon_general_content_font_icon'  => array(
					'value'   => 'fab fa-linkedin-in',
					'library' => 'fa-brands',
				),
			),
			array(
				'rbelpro_social_icon_general_content_icon_title' => esc_html__( 'Pinterest', 'rb-elementor-addons' ),
				'rbelpro_social_icon_general_content_font_icon'  => array(
					'value'   => 'fab fa-pinterest-p',
					'library' => 'fa-brands',
				),
			),
			array(
				'rbelpro_social_icon_general_content_icon_title' => esc_html__( 'Instagram', 'rb-elementor-addons' ),
				'rbelpro_social_icon_general_content_font_icon'  => array(
					'value'   => 'fab fa-instagram',
					'library' => 'fa-brands',
				),
			),
		);
		return $social_icon_list;
	}
}
