<?php
/**
 * All style controls
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

switch ( $key ) {
	// All Color Controls.
	case 'color':
	case 'bg_color':
	case 'border_color':
	case 'fill':
	case 'fill_color':
	case 'border_right_color':
		// Map to friendly labels.
		$label_map = array(
			'color'              => esc_html__( 'Color', 'rb-addons-for-elementor' ),
			'bg_color'           => esc_html__( 'Background Color', 'rb-addons-for-elementor' ),
			'border_color'       => esc_html__( 'Border Color', 'rb-addons-for-elementor' ),
			'fill'               => esc_html__( 'Fill Color', 'rb-addons-for-elementor' ),
			'fill_color'         => esc_html__( 'Color', 'rb-addons-for-elementor' ),
			'border_right_color' => esc_html__( 'Border Right Color', 'rb-addons-for-elementor' ),
		); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		$label_text = $label_map[ $key ] ?? esc_html__( 'Color', 'rb-addons-for-elementor' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		// Identify CSS selectors.
		if ( 'fill_color' === $key ) {
			$rbelad_selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}'     => 'color: {{VALUE}};',
				! empty( $values['select_class_2'] ) ? $values['select_class_2'] : '{{WRAPPER}}' => 'fill: {{VALUE}};',
			); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		} else {
			$css_property = match ( $key ) {
				'color'              => 'color',
				'bg_color'           => 'background-color',
				'border_color'       => 'border-color',
				'fill'               => 'fill',
				'border_right_color' => 'border-right-color',
				default              => 'color',
			}; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

			$rbelad_selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $css_property . ': {{VALUE}};',
			); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		}

		// Build control arguments.
		$control_args = array(
			'label'     => ! empty( $values['label'] ) ? $values['label'] : $label_text,
			'type'      => Controls_Manager::COLOR,
			'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			'selectors' => $rbelad_selectors,
			'default'   => ! empty( $values['default'] ) ? $values['default'] : '',
		); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			$control_args
		);
		break;

	// All Slider Controls (normal, transition, icon).
	case 'order':
	case 'transition_duration':
	case 'transition_delay':
	case 'icon_size':
	case 'icon_img_size':
	case 'icon_img_size_2':
		// Common vars.
		$css_property  = str_replace( '_', '-', $key ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$is_unitless   = in_array( $key, array( 'order', 'z_index', 'flex_grow', 'flex_shrink' ), true ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$is_transition = in_array( $key, array( 'transition_duration', 'transition_delay' ), true ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$is_icon       = ( 'icon_size' === $key ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$is_icon_img   = ( 'icon_img_size' === $key ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$is_icon_img_2 = ( 'icon_img_size_2' === $key ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		// Default units & range.
		if ( $is_transition ) {
			$size_units = array( 's', 'ms' );
			$range      = array(
				's'  => array(
					'min'  => 0,
					'max'  => 1,
					'step' => 0.1,
				),
				'ms' => array(
					'min'  => 0,
					'max'  => 1,
					'step' => 0.1,
				),
			);
		} elseif ( $is_icon || $is_icon_img || $is_icon_img_2 ) {
			$size_units = array( 'px', '%', 'em', 'rem', 'custom' );
			$range      = ! empty( $values['range'] ) ? $values['range'] : rbelad_slider_range();
		} else {
			$size_units = $is_unitless ? array( '' ) : ( ! empty( $values['size_units'] ) ? $values['size_units'] : array( 'px', '%', 'em', 'rem' ) );
			$range      = ! empty( $values['range'] ) ? $values['range'] : rbelad_slider_range();
		}

		// Build selectors.
		if ( $is_icon ) {
			$rbelad_selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}'     => 'font-size: {{SIZE}}{{UNIT}};',
				! empty( $values['select_class_2'] ) ? $values['select_class_2'] : '{{WRAPPER}}' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			);
		} elseif ( $is_icon_img || $is_icon_img_2 ) {
			$rbelad_selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
			);
		} else {
			$rbelad_selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' =>
				$css_property . ': {{SIZE}}' . ( $is_unitless ? '' : '{{UNIT}}' ) . ';',
			);
		}

		// Add control.
		$this->add_responsive_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			array(
				'label'      => ! empty( $values['label'] ) ? $values['label'] : esc_html( ucwords( str_replace( '_', ' ', $key ) ) ), // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
				'type'       => Controls_Manager::SLIDER,
				'size_units' => $size_units,
				'range'      => $range,
				'default'    => ! empty( $values['default'] ) ? $values['default'] : array(),
				'condition'  => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selectors'  => $rbelad_selectors,
			)
		);
		break;

	// Display Layout (separate choose control).
	case 'display_layout':
		$control_args = array(
			'label'                => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Display Layout', 'rb-addons-for-elementor' ),
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => array(
				'inline' => array(
					'title' => esc_html__( 'Inline', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-ellipsis-h',
				),
				'block'  => array(
					'title' => esc_html__( 'Block', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-editor-list-ul',
				),
			),
			'default'              => ! empty( $values['default'] ) ? $values['default'] : '',
			'condition'            => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			'selectors_dictionary' => array(
				'inline' => 'display: inline-block;',
				'block'  => 'display: block;',
			),
			'selectors'            => array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => '{{VALUE}};',
			),
			'responsive'           => true,
		);

		$this->add_responsive_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			$control_args
		);
		break;

	// All Select-Type Controls (custom, pages, timing, border-style, HTML tags).
	case 'page_link':
	case 'post_link':
	case 'timing_function':
	case 'border_style_right':
		$is_timing = ( 'timing_function' === $key );
		$is_border = ( 'border_style_right' === $key );

		// Label mapping.
		$label_map  = array(
			'timing_function'    => esc_html__( 'Timing Function', 'rb-addons-for-elementor' ),
			'border_style_right' => esc_html__( 'Border Style Right', 'rb-addons-for-elementor' ),
		);
		$label_text = $label_map[ $key ] ?? esc_html__( 'Select Option', 'rb-addons-for-elementor' );

		// Decide options.
		if ( ! empty( $values['options'] ) ) {
			$options = $values['options'];
		} elseif ( $is_timing ) {
			$options = rbelad_transition_function();
		} else {
			$options = array();
		}

		// Build base arguments.
		$control_args = array(
			'label'       => ! empty( $values['label'] ) ? $values['label'] : $label_text,
			'type'        => Controls_Manager::SELECT,
			'label_block' => ! empty( $values['label_block'] ) ? $values['label_block'] : true,
			'options'     => $options,
			'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
			'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
		);

		// Set selectors only for specific keys.
		if ( $is_timing ) {
			$control_args['selectors'] = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => 'animation-timing-function: {{VALUE}};',
			);
		} elseif ( $is_border ) {
			$control_args['selectors'] = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => 'border-right-style: {{VALUE}};',
			);
		}

		// Add control (responsive for timing, normal for others).
		if ( $is_timing ) {
			$this->add_responsive_control(
				! empty( $values['id'] ) ? $values['id'] : $key,
				$control_args
			);
		} else {
			$this->add_control(
				! empty( $values['id'] ) ? $values['id'] : $key,
				$control_args
			);
		}
		break;

	// Transition Property.
	case 'transition_property':
		$this->add_responsive_control(
			! empty( $values['id'] ) ? $values['id'] : 'transition_property',
			array(
				'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Transition Property', 'rb-addons-for-elementor' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'size'        => 5,
				'options'     => rbelad_transition_property(),
				'default'     => ! empty( $values['default'] ) ? $values['default'] : array(),
				'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selectors'   => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => 'transition-property: {{VALUE}};',
				),
			)
		);
		break;

	// Transform Controls.
	case 'transform_controls':
		$id_prefix   = ! empty( $values['id'] ) ? $values['id'] : $key; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$flip_x      = '-webkit-transform: scaleX(-1); -ms-transform: scaleX(-1); transform: scaleX(-1);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$flip_y      = '-webkit-transform: scaleY(-1); -ms-transform: scaleY(-1); transform: scaleY(-1);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$skew_y      = '-webkit-transform: skewY({{SIZE}}deg); -ms-transform: skewY({{SIZE}}deg); transform: skewY({{SIZE}}deg);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$skew_x      = '-webkit-transform: skewX({{SIZE}}deg); -ms-transform: skewX({{SIZE}}deg); transform: skewX({{SIZE}}deg);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$scale_x     = '-webkit-transform: scaleX({{SIZE}}); -ms-transform: scaleX({{SIZE}}); transform: scaleX({{SIZE}});'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$scale_y     = '-webkit-transform: scaleY({{SIZE}}); -ms-transform: scaleY({{SIZE}}); transform: scaleY({{SIZE}});'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$scale_xy    = '-webkit-transform: scale({{SIZE}}); -ms-transform: scale({{SIZE}}); transform: scale({{SIZE}});'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$translate_x = '-webkit-transform: translateX({{SIZE}}{{UNIT}}); -ms-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$translate_y = '-webkit-transform: translateY({{SIZE}}{{UNIT}}); -ms-transform: translateY({{SIZE}}{{UNIT}}); transform: translateY({{SIZE}}{{UNIT}});'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$perspective = '-webkit-transform: perspective({{SIZE}}px); transform: perspective({{SIZE}}px);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$rotate_x    = '-webkit-transform: rotateX({{SIZE}}deg); -ms-transform: rotateX({{SIZE}}deg); transform: rotateX({{SIZE}}deg);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$rotate_y    = '-webkit-transform: rotateY({{SIZE}}deg); -ms-transform: rotateY({{SIZE}}deg); transform: rotateY({{SIZE}}deg);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$rotate_z    = '-webkit-transform: rotateZ({{SIZE}}deg); -ms-transform: rotateZ({{SIZE}}deg); transform: rotateZ({{SIZE}}deg);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$rotate_3d   = '-webkit-transform: rotateX(1deg) perspective(20px); -ms-transform: rotateX(1deg) perspective(20px); transform: rotateX(1deg) perspective(20px);'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		/** -------------------------
		 *  ROTATE POPOVER
		 * ------------------------- */
		$this->add_control(
			$id_prefix . '_rotate_popover_tab',
			array(
				'label' => esc_html__( 'Rotate', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_responsive_control(
			$id_prefix . '_transform_rotateZ_effect_tab',
			array(
				'label'     => esc_html__( 'Rotate', 'rb-addons-for-elementor' ) . ' (deg)',
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -360,
						'max' => 360,
					),
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $rotate_z,
				),
				'condition' => array(
					$id_prefix . '_rotate_popover_tab!' => '',
				),
			)
		);

		$this->add_control(
			$id_prefix . '_transform_rotate_3d_tab',
			array(
				'label'     => esc_html__( '3D Rotate', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'rb-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'rb-addons-for-elementor' ),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $rotate_3d,
				),
				'condition' => array(
					$id_prefix . '_rotate_popover_tab!' => '',
				),
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_rotateX_effect_tab',
			array(
				'label'     => esc_html__( 'Rotate X', 'rb-addons-for-elementor' ) . ' (deg)',
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -360,
						'max' => 360,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_rotate_3d_tab!' => '',
					$id_prefix . '_rotate_popover_tab!' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $rotate_x,
				),
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_rotateY_effect_tab',
			array(
				'label'     => esc_html__( 'Rotate Y', 'rb-addons-for-elementor' ) . ' (deg)',
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -360,
						'max' => 360,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_rotate_3d_tab!' => '',
					$id_prefix . '_rotate_popover_tab!' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $rotate_y,
				),
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_perspective_effect_tab',
			array(
				'label'     => esc_html__( 'Perspective', 'rb-addons-for-elementor' ) . ' (px)',
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array( 'max' => 1000 ),
				),
				'condition' => array(
					$id_prefix . '_rotate_popover_tab!' => '',
					$id_prefix . '_transform_rotate_3d_tab!' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $perspective,
				),
			)
		);

		$this->end_popover();

		/** -------------------------
		 *  TRANSLATE POPOVER
		 * ------------------------- */
		$this->add_control(
			$id_prefix . '_transform_translate_popover_tab',
			array(
				'label' => esc_html__( 'Offset', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_responsive_control(
			$id_prefix . '_transform_translateX_effect_tab',
			array(
				'label'      => esc_html__( 'Offset X', 'rb-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'vw', 'custom' ),
				'range'      => array(
					'%'  => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'condition'  => array(
					$id_prefix . '_transform_translate_popover_tab!' => '',
				),
				'selectors'  => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $translate_x,
				),
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_translateY_effect_tab',
			array(
				'label'      => esc_html__( 'Offset Y', 'rb-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'vh', 'custom' ),
				'range'      => array(
					'%'  => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'condition'  => array(
					$id_prefix . '_transform_translate_popover_tab!' => '',
				),
				'selectors'  => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $translate_y,
				),
			)
		);

		$this->end_popover();

		/** -------------------------
		 *  SCALE POPOVER
		 * ------------------------- */
		$this->add_control(
			$id_prefix . '_transform_scale_popover_tab',
			array(
				'label' => esc_html__( 'Scale', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_control(
			$id_prefix . '_transform_keep_proportions_tab',
			array(
				'label'   => esc_html__( 'Keep Proportions', 'rb-addons-for-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_scale_effect_tab',
			array(
				'label'     => esc_html__( 'Scale', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'max'  => 2,
						'step' => 0.1,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_scale_popover_tab!'    => '',
					$id_prefix . '_transform_keep_proportions_tab!' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $scale_xy,
				),
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_scaleX_effect_tab',
			array(
				'label'     => esc_html__( 'Scale X', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'max'  => 2,
						'step' => 0.1,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_scale_popover_tab!'   => '',
					$id_prefix . '_transform_keep_proportions_tab' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $scale_x,
				),
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_scaleY_effect_tab',
			array(
				'label'     => esc_html__( 'Scale Y', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'max'  => 2,
						'step' => 0.1,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_scale_popover_tab!'   => '',
					$id_prefix . '_transform_keep_proportions_tab' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $scale_y,
				),
			)
		);

		$this->end_popover();

		/** -------------------------
		 *  SKEW POPOVER
		 * ------------------------- */
		$this->add_control(
			$id_prefix . '_transform_skew_popover_tab',
			array(
				'label' => esc_html__( 'Skew', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_responsive_control(
			$id_prefix . '_transform_skewX_effect_tab',
			array(
				'label'     => esc_html__( 'Skew X', 'rb-addons-for-elementor' ) . ' (deg)',
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -360,
						'max' => 360,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_skew_popover_tab!' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $skew_x,
				),
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_skewY_effect_tab',
			array(
				'label'     => esc_html__( 'Skew Y', 'rb-addons-for-elementor' ) . ' (deg)',
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => -360,
						'max' => 360,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_skew_popover_tab!' => '',
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $skew_y,
				),
			)
		);

		$this->end_popover();

		/** -------------------------
		 *  FLIP CONTROLS
		 * ------------------------- */
		$this->add_control(
			$id_prefix . '_transform_flipX_effect_tab',
			array(
				'label'     => esc_html__( 'Flip Horizontal', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'transform' => array(
						'title' => esc_html__( 'Flip Horizontal', 'rb-addons-for-elementor' ),
						'icon'  => 'eicon-flip eicon-tilted',
					),
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $flip_x,
				),
			)
		);

		$this->add_control(
			$id_prefix . '_transform_flipY_effect_tab',
			array(
				'label'     => esc_html__( 'Flip Vertical', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'transform' => array(
						'title' => esc_html__( 'Flip Vertical', 'rb-addons-for-elementor' ),
						'icon'  => 'eicon-flip',
					),
				),
				'selectors' => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $flip_y,
				),
			)
		);
		break;
}
