<?php

/**
 * H1-H6 HTML tags
 */
if (!function_exists('rb_heading_tags')) {
	function rb_heading_tags() {
		$heading_tag_list = array (
			'h1' => [
				'title' => esc_html__( 'H1', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__( 'H2', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__( 'H3', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__( 'H4', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__( 'H5', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__( 'H6', 'rb-elementor-addons' ),
				'icon'  => 'eicon-editor-h6',
			],
		);
		return $heading_tag_list;
	}
}

/**
 * Alignment with justify
 */
if (!function_exists( 'rb_align_justify' )) {
	function rb_align_justify() {
		$alignment = array (
			'left' => [
				'title' => esc_html__( 'Left', 'rb-elementor-addons' ),
				'icon' => 'eicon-text-align-left',
			],
			'center' => [
				'title' => esc_html__( 'Center', 'rb-elementor-addons' ),
				'icon' => 'eicon-text-align-center',
			],
			'right' => [
				'title' => esc_html__( 'Right', 'rb-elementor-addons' ),
				'icon' => 'eicon-text-align-right',
			],
			'justify' => [
				'title' => esc_html__( 'Justified', 'rb-elementor-addons' ),
				'icon' => 'eicon-text-align-justify',
			],
		);
		return $alignment;
	}
}

/**
 * Alignment with text
 */
if (!function_exists( 'rb_align_text' )) {
	function rb_align_text() {
		$alignment = array (
			'left' => [
				'title' => esc_html__( 'Left', 'rb-elementor-addons' ),
				'icon' => 'eicon-text-align-left',
			],
			'center' => [
				'title' => esc_html__( 'Center', 'rb-elementor-addons' ),
				'icon' => 'eicon-text-align-center',
			],
			'right' => [
				'title' => esc_html__( 'Right', 'rb-elementor-addons' ),
				'icon' => 'eicon-text-align-right',
			],
		);
		return $alignment;
	}
}

/**
 * Border style
 */
if (!function_exists('rb_border_style')) {
	function rb_border_style() {
		$border_style = array(
			'none' => esc_html__( 'None', 'rb-elementor-addons' ),
			'solid'  => esc_html__( 'Solid', 'rb-elementor-addons' ),
			'dashed' => esc_html__( 'Dashed', 'rb-elementor-addons' ),
			'dotted' => esc_html__( 'Dotted', 'rb-elementor-addons' ),
		);
		return $border_style;
	}
}

/**
 * Flex Direction
 */
if (!function_exists('rb_flex_direction')) {
	function rb_flex_direction() {
		$border_style = array(
			'column'  			=> esc_html__( 'Column', 'rb-elementor-addons' ),
			'column-reverse'  	=> esc_html__( 'Column Reverse', 'rb-elementor-addons' ),
			'row' 				=> esc_html__( 'Row', 'rb-elementor-addons' ),
			'row-reverse' 		=> esc_html__( 'Row Reverse', 'rb-elementor-addons' ),
		);
		return $border_style;
	}
}

/**
 * Transition function
 */
if ( ! function_exists( 'rb_transition_function' ) ) {
	function rb_transition_function() {
		$transition_function = array(
			'' => esc_html__( 'Default', 'rb-elementor-addons' ),
			'ease' => esc_html__( 'Ease', 'rb-elementor-addons' ),
			'ease-in'  => esc_html__( 'Ease In', 'rb-elementor-addons' ),
			'ease-out'  => esc_html__( 'Ease Out', 'rb-elementor-addons' ),
			'ease-in-out'  => esc_html__( 'Ease In Out', 'rb-elementor-addons' ),
			'linear'  => esc_html__( 'Linear', 'rb-elementor-addons' ),
		);
		return $transition_function;
	}
}

/**
 * Transition Property
 */
if ( ! function_exists( 'rb_transition_property' ) ) {
	function rb_transition_property() {
		$transition_property = array(
			'' => esc_html__( 'Default', 'rb-elementor-addons' ),
			'none' => esc_html__( 'None', 'rb-elementor-addons' ),
			'all'  => esc_html__( 'All', 'rb-elementor-addons' ),
			'color'  => esc_html__( 'Color', 'rb-elementor-addons' ),
			'background-color'  => esc_html__( 'Background Color', 'rb-elementor-addons' ),
			'width'  => esc_html__( 'Width', 'rb-elementor-addons' ),
			'transform'  => esc_html__( 'Transform', 'rb-elementor-addons' ),
		);
		return $transition_property;
	}
}

/**
 * Icon Shape Type
 */
if ( ! function_exists( 'rb_icon_shape' ) ) {
	function rb_icon_shape() {
		$icon_shape = array(
			'triangle'  => esc_html__('Triangle', 'rb-elementor-addons'),
			'circle'  => esc_html__('Circle', 'rb-elementor-addons'),
			'square'  => esc_html__('Square', 'rb-elementor-addons'),
		);
		return $icon_shape;
	}
}

/**
 * Slider control range
 */
if ( ! function_exists( 'rb_slider_range' ) ) {
	function rb_slider_range() {
		$range = array(
			'%'  => [
				'min' => 0,
				'max' => 100,
				'step' => 1,
			],
			'px' => [
				'min'  => 0,
				'max'  => 2000,
				'step' => 1,
			],
			'em' => [
				'min'  => 0,
				'max'  => 125,
				'step' => 0.1,
			],
			'rem' => [
				'min'  => 0,
				'max'  => 125,
				'step' => 0.1,
			],
		);
		return $range;
	}
}

/**
 * Social Icon List
 */
if ( ! function_exists( 'rb_social_icon_list' ) ) {
	function rb_social_icon_list() {
		$social_icon_list = array(
			[
				'icon_title' => esc_html__( 'Facebook', 'rb-elementor-addons' ),
				'font_icon' => [
					'value' => 'fab fa-facebook-f', 
					'library' => 'fa-brands',
				],
				'icon_bg_color' => '#3b5998',
			],
			[
				'icon_title' => esc_html__( 'Twitter', 'rb-elementor-addons' ),
				'font_icon' => [
					'value' => 'fab fa-x-twitter', 
					'library' => 'fa-brands',
				],
				'icon_bg_color' => '#1da1f2',
			],
			[
				'icon_title' => esc_html__( 'LinkedIn', 'rb-elementor-addons' ),
				'font_icon' => [
					'value' => 'fab fa-linkedin-in', 
					'library' => 'fa-brands',
				],
				'icon_bg_color' => '#007bb5',
			],
			[
				'icon_title' => esc_html__( 'Pinterest', 'rb-elementor-addons' ),
				'font_icon' => [
					'value' => 'fab fa-pinterest-p', 
					'library' => 'fa-brands',
				],
				'icon_bg_color' => '#bd081c',
			],
			[
				'icon_title' => esc_html__( 'Instagram', 'rb-elementor-addons' ),
				'font_icon' => [
					'value' => 'fab fa-instagram', 
					'library' => 'fa-brands',
				],
				'icon_bg_color' => '#c32aa3',
			],
		);
		return $social_icon_list;
	}
}

/**
 * Render icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
function rb_render_icon( $settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = [] ) {
	return rb_get_icon_html( $settings, $old_icon_id, $new_icon_id, $attributes );
}

/**
 * Get icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
function rb_get_icon_html( $settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = [] ) {
	// Check if its already migrated.
	$migrated = isset( $settings['__fa4_migrated'][ $new_icon_id ] );
	// Check if its a new widget without previously selected icon using the old Icon control.

	$is_new = empty( $settings[ $old_icon_id ] );

	$attributes['aria-hidden'] = 'true';

	if ( rb_is_elementor_version( '>=', '2.6.0' ) && ( $is_new || $migrated ) ) {
		return \Elementor\Icons_Manager::try_get_icon_html( $settings[ $new_icon_id ], $attributes );
	} else {
		if ( empty( $attributes['class'] ) ) {
			$attributes['class'] = $settings[ $old_icon_id ];
		} elseif ( is_array( $attributes['class'] ) ) {
				$attributes['class'][] = $settings[ $old_icon_id ];
		} else {
			$attributes['class'] .= ' ' . $settings[ $old_icon_id ];
		}
		return sprintf( '<i %s></i>', \Elementor\Utils::render_html_attributes( $attributes ) );
	}
}