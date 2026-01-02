<?php
/**
 * All style controls
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;

switch ( $key ) {
	// Typography.
	case 'typography':
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => ! empty( $values['name'] ) ? $values['name'] : 'global_typography',
				'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Typography', 'rb-elementor-addons' ),
				$control_args['default'] = ! empty( $values['default'] ) ? $values['default'] : '',
				'global'    => ! empty( $values['global'] ) ? $values['global'] : array(),
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selector'  => ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			)
		);
		break;

	// Text Stroke.
	case 'text_stroke':
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			array(
				'name'      => ! empty( $values['name'] ) ? $values['name'] : 'text_stroke',
				'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text Stroke', 'rb-elementor-addons' ),
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selector'  => ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			)
		);
		break;

	// Text Shadow.
	case 'text_shadow':
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'      => ! empty( $values['name'] ) ? $values['name'] : 'text_shadow',
				'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text Shadow', 'rb-elementor-addons' ),
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selector'  => ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			)
		);
		break;

	// Border.
	case 'border':
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'           => ! empty( $values['name'] ) ? $values['name'] : 'border',
				'fields_options' => ! empty( $values['fields_options'] ) ? $values['fields_options'] : array(),
				'condition'      => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selector'       => ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			)
		);
		break;

	// Box Shadow.
	case 'box_shadow':
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => ! empty( $values['name'] ) ? $values['name'] : 'box_shadow',
				'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Box Shadow', 'rb-elementor-addons' ),
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selector'  => ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			)
		);
		break;

	// Image Size.
	case 'img_size':
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => ! empty( $values['name'] ) ? $values['name'] : 'img_size',
				'default'   => ! empty( $values['default'] ) ? $values['default'] : 'thumbnail',
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// Text.
	case 'text':
	case 'text_2':
	case 'text_3':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			array(
				'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text', 'rb-elementor-addons' ),
				'type'      => Controls_Manager::TEXT,
				'ai'        => false,
				'default'   => ! empty( $values['default'] ) ? $values['default'] : '',
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// Textarea.
	case 'textarea':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'textarea',
			array(
				'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Textarea', 'rb-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'ai'          => false,
				'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
				'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// Heading.
	case 'heading':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'heading',
			array(
				'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Heading', 'rb-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::HEADING,
				'ai'          => false,
				'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
				'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'classes'     => 'rbelad-editor-heading-control',
			)
		);
		break;

	// Switcher.
	case 'switch':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'switch',
			array(
				'label'        => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Switcher', 'rb-elementor-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'rb-elementor-addons' ),
				'label_off'    => esc_html__( 'Hide', 'rb-elementor-addons' ),
				'return_value' => 'yes',
				'default'      => ! empty( $values['default'] ) ? $values['default'] : 'yes',
				'condition'    => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// Custom Link.
	case 'custom_link':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'custom_link',
			array(
				'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				'type'      => Controls_Manager::URL,
				'ai'        => false,
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// Upload Image.
	case 'img':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'img',
			array(
				'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Upload Image', 'rb-elementor-addons' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'options'     => ! empty( $values['options'] ) ? $values['options'] : array(),
				'default'     => array( 'url' => Utils::get_placeholder_image_src() ),
				'ai'          => false,
				'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// Upload Icon.
	case 'icon':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'icon',
			array(
				'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Icon', 'rb-elementor-addons' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'skin'        => 'inline',
				'options'     => ! empty( $values['options'] ) ? $values['options'] : array(),
				'default'     => ! empty( $values['default'] ) ? $values['default'] : array(),
				'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// All Color Controls.
	case 'color':
	case 'bg_color':
	case 'border_color':
	case 'fill':
	case 'fill_color':
	case 'border_right_color':
		// Map to friendly labels.
		$label_map = array(
			'color'              => esc_html__( 'Color', 'rb-elementor-addons' ),
			'bg_color'           => esc_html__( 'Background Color', 'rb-elementor-addons' ),
			'border_color'       => esc_html__( 'Border Color', 'rb-elementor-addons' ),
			'fill'               => esc_html__( 'Fill Color', 'rb-elementor-addons' ),
			'fill_color'         => esc_html__( 'Color', 'rb-elementor-addons' ),
			'border_right_color' => esc_html__( 'Border Right Color', 'rb-elementor-addons' ),
		);

		$label_text = $label_map[ $key ] ?? esc_html__( 'Color', 'rb-elementor-addons' );

		// Identify CSS selectors.
		if ( 'fill_color' === $key ) {
			$selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}'     => 'color: {{VALUE}};',
				! empty( $values['select_class_2'] ) ? $values['select_class_2'] : '{{WRAPPER}}' => 'fill: {{VALUE}};',
			);
		} else {
			$css_property = match ( $key ) {
				'color'                 => 'color',
				'bg_color'              => 'background-color',
				'border_color'          => 'border-color',
				'fill'                  => 'fill',
				'border_right_color'    => 'border-right-color',
				default                 => 'color',
			};

			$selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $css_property . ': {{VALUE}};',
			);
		}

		// Build control arguments.
		$control_args = array(
			'label'     => ! empty( $values['label'] ) ? $values['label'] : $label_text,
			'type'      => Controls_Manager::COLOR,
			'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			'selectors' => $selectors,
			'default'   => ! empty( $values['default'] ) ? $values['default'] : '',
		);

		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			$control_args
		);
		break;

	// All Slider Controls (normal, transition, icon).
	case 'width':
	case 'min_width':
	case 'max_width':
	case 'height':
	case 'min_height':
	case 'max_height':
	case 'line_height':
	case 'margin_top':
	case 'margin_right':
	case 'margin_bottom':
	case 'margin_left':
	case 'padding_top':
	case 'padding_right':
	case 'padding_bottom':
	case 'padding_left':
	case 'top':
	case 'bottom':
	case 'left':
	case 'right':
	case 'gap':
	case 'column_gap':
	case 'row_gap':
	case 'font_size':
	case 'order':
	case 'transition_duration':
	case 'transition_delay':
	case 'icon_size':
	case 'icon_img_size':
	case 'icon_img_size_2':
	case 'border_right_width':
		// Common vars.
		$css_property  = str_replace( '_', '-', $key );
		$is_unitless   = in_array( $key, array( 'order', 'z_index', 'flex_grow', 'flex_shrink' ), true );
		$is_transition = in_array( $key, array( 'transition_duration', 'transition_delay' ), true );
		$is_icon       = ( 'icon_size' === $key );
		$is_icon_img   = ( 'icon_img_size' === $key );
		$is_icon_img_2 = ( 'icon_img_size_2' === $key );

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
			$selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => 'font-size: {{SIZE}}{{UNIT}};',
				! empty( $values['select_class_2'] ) ? $values['select_class_2'] : '{{WRAPPER}}' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			);
		} elseif ( $is_icon_img || $is_icon_img_2 ) {
			$selectors = array(
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
			);
		} else {
			$selectors = array(
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
				'selectors'  => $selectors,
			)
		);
		break;

	// All Choose Controls.
	case 'link_type':
	case 'heading_tag':
	case 'align':
	case 'item_align':
	case 'multi_align':
		// -------------------------------------------------
		// Detect type
		// -------------------------------------------------
		$is_link_type   = ( 'link_type' === $key );
		$is_heading_tag = ( 'heading_tag' === $key );
		$is_align       = ( 'align' === $key );
		$is_justify     = ( 'item_align' === $key );
		$is_multi       = ( 'multi_align' === $key );

		// -------------------------------------------------
		// Decide control method
		// -------------------------------------------------
		$method = ( $is_heading_tag || $is_link_type )
			? 'add_control'
			: 'add_responsive_control';

		// -------------------------------------------------
		// Build options
		// -------------------------------------------------
		if ( $is_link_type ) {

			$options = array(
				'none'    => array(
					'title' => esc_html__( 'None', 'rb-elementor-addons' ),
					'icon'  => 'eicon-ban',
				),
				'default' => array(
					'title' => esc_html__( 'Default', 'rb-elementor-addons' ),
					'icon'  => 'eicon-link',
				),
				'page'    => array(
					'title' => esc_html__( 'Page', 'rb-elementor-addons' ),
					'icon'  => 'eicon-post-list',
				),
				'custom'  => array(
					'title' => esc_html__( 'Custom', 'rb-elementor-addons' ),
					'icon'  => 'eicon-editor-external-link',
				),
			);

		} elseif ( $is_heading_tag ) {

			$options = rbelad_heading_tags();

		} else {

			$options = ! empty( $values['options'] ) ? $values['options'] : array();
		}

		// -------------------------------------------------
		// Label
		// -------------------------------------------------
		if ( ! empty( $values['label'] ) ) {
			$label_text = $values['label'];
		} elseif ( $is_link_type ) {
			$label_text = esc_html__( 'Link Type', 'rb-elementor-addons' );
		} elseif ( $is_heading_tag ) {
			$label_text = esc_html__( 'HTML Tag', 'rb-elementor-addons' );
		} else {
			$label_text = esc_html__( 'Alignment', 'rb-elementor-addons' );
		}

		// -------------------------------------------------
		// Selectors (alignment only)
		// -------------------------------------------------
		$selectors = array();

		if ( ! $is_link_type && ( $is_align || $is_justify ) ) {

			$css_property = $is_align ? 'text-align' : 'justify-content';

			$selectors = array(
				! empty( $values['select_class'] )
					? $values['select_class']
					: '{{WRAPPER}}' => $css_property . ': {{VALUE}};',
			);

		} elseif ( ! $is_link_type && $is_multi ) {

			$selectors = array(
				! empty( $values['select_class'] )
					? $values['select_class']
					: '{{WRAPPER}}' => 'text-align: {{VALUE}};',
				! empty( $values['select_class_2'] )
					? $values['select_class_2']
					: '{{WRAPPER}}' => 'justify-content: {{VALUE}};',
			);
		}

		// -------------------------------------------------
		// Control arguments
		// -------------------------------------------------
		$control_args = array(
			'label'     => $label_text,
			'type'      => Controls_Manager::CHOOSE,
			'options'   => $options,
			'default'   => ! empty( $values['default'] )
				? $values['default']
				: ( $is_heading_tag ? 'h2' : ( $is_link_type ? 'none' : '' ) ),
			'condition' => ! empty( $values['condition'] )
				? $values['condition']
				: array(),
		);

		if ( ! empty( $selectors ) ) {
			$control_args['selectors'] = $selectors;
		}

		if ( $is_link_type ) {
			$control_args['toggle'] = false;
		}

		// -------------------------------------------------
		// Add control
		// -------------------------------------------------
		if ( 'add_control' === $method ) {

			$this->add_control(
				! empty( $values['id'] ) ? $values['id'] : $key,
				$control_args
			);

		} else {

			$this->add_responsive_control(
				! empty( $values['id'] ) ? $values['id'] : $key,
				$control_args
			);
		}

		break;


	// Flex Direction (separate choose control).
	case 'flex_direction':
		$end   = is_rtl() ? 'left' : 'right';
		$start = is_rtl() ? 'right' : 'left';

		$control_args = array(
			'label'                => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Flex Direction', 'rb-elementor-addons' ),
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => array(
				'row'            => array(
					'title' => esc_html__( 'Row - horizontal', 'elementor' ),
					'icon'  => 'eicon-arrow-' . $end,
				),
				'column'         => array(
					'title' => esc_html__( 'Column - vertical', 'elementor' ),
					'icon'  => 'eicon-arrow-down',
				),
				'row-reverse'    => array(
					'title' => esc_html__( 'Row - reversed', 'elementor' ),
					'icon'  => 'eicon-arrow-' . $start,
				),
				'column-reverse' => array(
					'title' => esc_html__( 'Column - reversed', 'elementor' ),
					'icon'  => 'eicon-arrow-up',
				),
			),
			'default'              => ! empty( $values['default'] ) ? $values['default'] : '',
			'condition'            => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			'selectors_dictionary' => array(
				'row'            => 'flex-direction: row;',
				'column'         => 'flex-direction: column;',
				'row-reverse'    => 'flex-direction: row-reverse;',
				'column-reverse' => 'flex-direction: column-reverse;',
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


	// Display Layout (separate choose control).
	case 'display_layout':
		$control_args = array(
			'label'                => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Display Layout', 'rb-elementor-addons' ),
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => array(
				'inline' => array(
					'title' => esc_html__( 'Inline', 'rb-elementor-addons' ),
					'icon'  => 'eicon-ellipsis-h',
				),
				'block'  => array(
					'title' => esc_html__( 'Block', 'rb-elementor-addons' ),
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

	// Choose Design.
	case 'choose_design':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'choose_design',
			array(
				'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Choose Design', 'rb-elementor-addons' ),
				'type'        => Controls_Manager::VISUAL_CHOICE,
				'label_block' => true,
				'options'     => ! empty( $values['options'] ) ? $values['options'] : array(),
				'default'     => ! empty( $values['default'] ) ? $values['default'] : 'style-1',
				'columns'     => ! empty( $values['columns'] ) ? $values['columns'] : 1,
				'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selectors'   => ! empty( $values['selectors'] ) ? $values['selectors'] : array(),
			)
		);
		break;

	// Dimensions Controls.
	case 'margin':
	case 'padding':
	case 'border_radius':
		$css_property = str_replace( '_', '-', $key );
		$this->add_responsive_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			array(
				'label'      => ! empty( $values['label'] ) ? $values['label'] : esc_html( ucwords( str_replace( '_', ' ', $key ) ) ), // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem' ),
				'default'    => ! empty( $values['default'] ) ? $values['default'] : array(),
				'condition'  => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selectors'  => array(
					! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $css_property . ': {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		break;

	// Divider Controls.
	case 'align_separator':
	case 'typography_separator':
	case 'color_separator':
	case 'width_height_separator':
	case 'flex_separator':
	case 'border_separator':
	case 'spacing_separator':
	case 'transition_separator':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			array(
				'type'      => Controls_Manager::DIVIDER,
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
			)
		);
		break;

	// All Select-Type Controls (custom, pages, timing, border-style, HTML tags).
	case 'select_option':
	case 'page_link':
	case 'timing_function':
	case 'border_style_right':
	case 'html_tag': // <-- New case
		$is_timing = ( 'timing_function' === $key );
		$is_page   = ( 'page_link' === $key );
		$is_border = ( 'border_style_right' === $key );
		$is_html   = ( 'html_tag' === $key ); // <-- New flag

		// Label mapping.
		$label_map  = array(
			'select_option'      => esc_html__( 'Select Option', 'rb-elementor-addons' ),
			'page_link'          => esc_html__( 'Select Page', 'rb-elementor-addons' ),
			'timing_function'    => esc_html__( 'Timing Function', 'rb-elementor-addons' ),
			'border_style_right' => esc_html__( 'Border Style Right', 'rb-elementor-addons' ),
			'html_tag'           => esc_html__( 'HTML Tag', 'rb-elementor-addons' ), // <-- New label
		);
		$label_text = $label_map[ $key ] ?? esc_html__( 'Select Option', 'rb-elementor-addons' );

		// Decide options.
		if ( ! empty( $values['options'] ) ) {
			$options = $values['options'];
		} elseif ( $is_page ) {
			$options = rbelad_get_all_type_post_links();
		} elseif ( $is_timing ) {
			$options = rbelad_transition_function();
		} elseif ( $is_html ) {
			$options = array(
				'h1'   => 'H1',
				'h2'   => 'H2',
				'h3'   => 'H3',
				'h4'   => 'H4',
				'h5'   => 'H5',
				'h6'   => 'H6',
				'div'  => 'div',
				'span' => 'span',
				'p'    => 'p',
			);
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
				'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Transition Property', 'rb-elementor-addons' ),
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

	// Max Items.
	case 'number':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'number',
			array(
				'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Number', 'rb-elementor-addons' ),
				'type'      => ! empty( $values['type'] ) ? $values['type'] : Controls_Manager::NUMBER,
				'default'   => ! empty( $values['default'] ) ? $values['default'] : 5,
				'min'       => ! empty( $values['min'] ) ? $values['min'] : 1,
				'max'       => ! empty( $values['max'] ) ? $values['max'] : 20,
				'step'      => ! empty( $values['step'] ) ? $values['step'] : 1,
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
				'selectors' => ! empty( $values['selectors'] ) ? $values['selectors'] : array(),
			)
		);
		break;

	// Transform Controls.
	case 'transform_controls':
		$id_prefix   = ! empty( $values['id'] ) ? $values['id'] : $key;
		$flip_x      = '-webkit-transform: scaleX(-1); -ms-transform: scaleX(-1); transform: scaleX(-1);';
		$flip_y      = '-webkit-transform: scaleY(-1); -ms-transform: scaleY(-1); transform: scaleY(-1);';
		$skew_y      = '-webkit-transform: skewY({{SIZE}}deg); -ms-transform: skewY({{SIZE}}deg); transform: skewY({{SIZE}}deg);';
		$skew_x      = '-webkit-transform: skewX({{SIZE}}deg); -ms-transform: skewX({{SIZE}}deg); transform: skewX({{SIZE}}deg);';
		$scale_x     = '-webkit-transform: scaleX({{SIZE}}); -ms-transform: scaleX({{SIZE}}); transform: scaleX({{SIZE}});';
		$scale_y     = '-webkit-transform: scaleY({{SIZE}}); -ms-transform: scaleY({{SIZE}}); transform: scaleY({{SIZE}});';
		$scale_xy    = '-webkit-transform: scale({{SIZE}}); -ms-transform: scale({{SIZE}}); transform: scale({{SIZE}});';
		$translate_x = '-webkit-transform: translateX({{SIZE}}{{UNIT}}); -ms-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});';
		$translate_y = '-webkit-transform: translateY({{SIZE}}{{UNIT}}); -ms-transform: translateY({{SIZE}}{{UNIT}}); transform: translateY({{SIZE}}{{UNIT}});';
		$perspective = '-webkit-transform: perspective({{SIZE}}px); transform: perspective({{SIZE}}px);';
		$rotate_x    = '-webkit-transform: rotateX({{SIZE}}deg); -ms-transform: rotateX({{SIZE}}deg); transform: rotateX({{SIZE}}deg);';
		$rotate_y    = '-webkit-transform: rotateY({{SIZE}}deg); -ms-transform: rotateY({{SIZE}}deg); transform: rotateY({{SIZE}}deg);';
		$rotate_z    = '-webkit-transform: rotateZ({{SIZE}}deg); -ms-transform: rotateZ({{SIZE}}deg); transform: rotateZ({{SIZE}}deg);';
		$rotate_3d   = '-webkit-transform: rotateX(1deg) perspective(20px); -ms-transform: rotateX(1deg) perspective(20px); transform: rotateX(1deg) perspective(20px);';

		/** -------------------------
		 *  ROTATE POPOVER
		 * ------------------------- */
		$this->add_control(
			$id_prefix . '_rotate_popover_tab',
			array(
				'label' => esc_html__( 'Rotate', 'elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_responsive_control(
			$id_prefix . '_transform_rotateZ_effect_tab',
			array(
				'label'     => esc_html__( 'Rotate', 'elementor' ) . ' (deg)',
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
				'label'     => esc_html__( '3D Rotate', 'elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'elementor' ),
				'label_off' => esc_html__( 'Off', 'elementor' ),
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
				'label'     => esc_html__( 'Rotate X', 'elementor' ) . ' (deg)',
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
				'label'     => esc_html__( 'Rotate Y', 'elementor' ) . ' (deg)',
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
				'label'     => esc_html__( 'Perspective', 'elementor' ) . ' (px)',
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
				'label' => esc_html__( 'Offset', 'elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_responsive_control(
			$id_prefix . '_transform_translateX_effect_tab',
			array(
				'label'      => esc_html__( 'Offset X', 'elementor' ),
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
				'label'      => esc_html__( 'Offset Y', 'elementor' ),
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
				'label' => esc_html__( 'Scale', 'elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_control(
			$id_prefix . '_transform_keep_proportions_tab',
			array(
				'label'   => esc_html__( 'Keep Proportions', 'elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);

		$this->add_responsive_control(
			$id_prefix . '_transform_scale_effect_tab',
			array(
				'label'     => esc_html__( 'Scale', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'max'  => 2,
						'step' => 0.1,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_scale_popover_tab!' => '',
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
				'label'     => esc_html__( 'Scale X', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'max'  => 2,
						'step' => 0.1,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_scale_popover_tab!' => '',
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
				'label'     => esc_html__( 'Scale Y', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'max'  => 2,
						'step' => 0.1,
					),
				),
				'condition' => array(
					$id_prefix . '_transform_scale_popover_tab!' => '',
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
				'label' => esc_html__( 'Skew', 'elementor' ),
				'type'  => Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();

		$this->add_responsive_control(
			$id_prefix . '_transform_skewX_effect_tab',
			array(
				'label'     => esc_html__( 'Skew X', 'elementor' ) . ' (deg)',
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
				'label'     => esc_html__( 'Skew Y', 'elementor' ) . ' (deg)',
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
				'label'     => esc_html__( 'Flip Horizontal', 'elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'transform' => array(
						'title' => esc_html__( 'Flip Horizontal', 'elementor' ),
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
				'label'     => esc_html__( 'Flip Vertical', 'elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'transform' => array(
						'title' => esc_html__( 'Flip Vertical', 'elementor' ),
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
