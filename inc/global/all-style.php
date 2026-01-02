<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;

switch ( $key ) {
	// Typography
	case 'typography':
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'        	=> ! empty( $values['name'] ) ? $values['name'] : 'global_typography',
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Typography', 'rb-elementor-addons' ),
				'global'      	=> ! empty( $values['global'] ) ? $values['global'] : [
					$control_args['default'] = ! empty( $values['default'] ) ? $values['default'] : '',
				],
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
				'selector' 	  	=> ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			]
		);
		break;

	// Text Stroke
	case 'text_stroke':
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name'        	=> ! empty( $values['name'] ) ? $values['name'] : 'text_stroke',
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text Stroke', 'rb-elementor-addons' ),
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
				'selector' 	  	=> ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			]
		);
		break;

	// Text Shadow
	case 'text_shadow':		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'        	=> ! empty( $values['name'] ) ? $values['name'] : 'text_shadow',
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text Shadow', 'rb-elementor-addons' ),
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
				'selector' 	  	=> ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			]
		);
		break;

	// Border
	case 'border':		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        	=> ! empty( $values['name'] ) ? $values['name'] : 'border',
				'fields_options'=> ! empty( $values['fields_options'] ) ? $values['fields_options'] : [],
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
				'selector' 	  	=> ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			]
		);
		break;

	// Box Shadow
	case 'box_shadow':		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'        	=> ! empty( $values['name'] ) ? $values['name'] : 'box_shadow',
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Box Shadow', 'rb-elementor-addons' ),
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
				'selector' 	  	=> ! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}',
			]
		);
		break;	

	// Image Size
	case 'img_size':
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'       	=> ! empty( $values['name'] ) ? $values['name'] : 'img_size',
				'default'     	=> ! empty( $values['default'] ) ? $values['default'] : 'thumbnail',
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;

	// Text
	case 'text':
	case 'text_2':
	case 'text_3':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			[
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text', 'rb-elementor-addons' ),
				'type' 		  	=> Controls_Manager::TEXT,
				'ai' 			=> false,
				'default'     	=> ! empty( $values['default'] ) ? $values['default'] : '',
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;

	// Textarea
	case 'textarea':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'textarea',
			[
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Textarea', 'rb-elementor-addons' ),
				'label_block'   => true,
				'type' 		  	=> Controls_Manager::TEXTAREA,
				'ai' 			=> false,
				'default'     	=> ! empty( $values['default'] ) ? $values['default'] : '',
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;

	// Switcher
	case 'switch':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'switch',
			[
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Switcher', 'rb-elementor-addons' ),
				'type' 		  	=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_html__( 'Show', 'rb-elementor-addons' ),
				'label_off' 	=> esc_html__( 'Hide', 'rb-elementor-addons' ),
				'return_value' 	=> 'yes',
				'default'     	=> ! empty( $values['default'] ) ? $values['default'] : 'yes',
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;

	// Custom Link
	case 'custom_link':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'custom_link',
			[
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				'type' 		  	=> Controls_Manager::URL,
				'ai' 		  	=> false,
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;	

	// Upload Image
	case 'img':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'img',
			[
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Upload Image', 'rb-elementor-addons' ),
				'type' 		  	=> Controls_Manager::MEDIA,
				'label_block' 	=> true,
				'options'     	=> ! empty( $values['options'] ) ? $values['options'] : [],
				'default'     	=> ['url' => Utils::get_placeholder_image_src(),],
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;

	// Upload Icon
	case 'icon':
		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : 'icon',
			[
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Icon', 'rb-elementor-addons' ),
				'type' 		  	=> Controls_Manager::ICONS,
				'label_block' 	=> true,
				'options'     	=> ! empty( $values['options'] ) ? $values['options'] : [],
				'default'     	=> ! empty( $values['default'] ) ? $values['default'] : [],
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;

	// All Color Controls
	case 'color':
	case 'bg_color':
	case 'border_color':
	case 'fill':
	case 'fill_color':
		// Map to friendly labels
		$label_map = [
			'color'         => esc_html__( 'Color', 'rb-elementor-addons' ),
			'bg_color'      => esc_html__( 'Background Color', 'rb-elementor-addons' ),
			'border_color'  => esc_html__( 'Border Color', 'rb-elementor-addons' ),
			'fill'          => esc_html__( 'Fill Color', 'rb-elementor-addons' ),
			'fill_color'    => esc_html__( 'Color', 'rb-elementor-addons' ),
		];

		$label_text = $label_map[$key] ?? esc_html__( 'Color', 'rb-elementor-addons' );

		// Identify CSS selectors
		if ( $key === 'fill_color' ) {
			$selectors = [
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}'     => 'color: {{VALUE}};',
				! empty( $values['select_class_2'] ) ? $values['select_class_2'] : '{{WRAPPER}}' => 'fill: {{VALUE}};',
			];
		} else {
			$css_property = match ( $key ) {
				'color'        => 'color',
				'bg_color'     => 'background-color',
				'border_color' => 'border-color',
				'fill'         => 'fill',
				default        => 'color',
			};

			$selectors = [
				! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $css_property . ': {{VALUE}};',
			];
		}

		// Build control arguments
		$control_args = [
			'label'     => ! empty( $values['label'] ) ? $values['label'] : $label_text,
			'type'      => Controls_Manager::COLOR,
			'condition' => ! empty( $values['condition'] ) ? $values['condition'] : [],
			'selectors' => $selectors,
			'default'   => ! empty( $values['default'] ) ? $values['default'] : '',
		];

		$this->add_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			$control_args
		);
		break;

	// All Slider Controls (normal, transition, icon)
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

		// Common vars
		$css_property = str_replace('_', '-', $key);
		$is_unitless  = in_array($key, [ 'order', 'z_index', 'flex_grow', 'flex_shrink' ], true);
		$is_transition = in_array($key, [ 'transition_duration', 'transition_delay' ], true);
		$is_icon       = ($key === 'icon_size');
		$is_icon_img   = ($key === 'icon_img_size');
		$is_icon_img_2   = ($key === 'icon_img_size_2');

		// Default units & range
		if ($is_transition) {
			$size_units = ['s'];
			$range      = [
				's' => [
					'min'  => 0,
					'max'  => 1,
					'step' => 0.1,
				],
			];
		} elseif ( $is_icon || $is_icon_img || $is_icon_img_2 ) {
			$size_units = [ 'px', '%', 'em', 'rem', 'custom' ];
			$range      = !empty($values['range']) ? $values['range'] : rb_slider_range();
		} else {
			$size_units = $is_unitless ? [''] : (!empty($values['size_units']) ? $values['size_units'] : [ 'px', '%', 'em', 'rem' ]);
			$range      = !empty($values['range']) ? $values['range'] : rb_slider_range();
		}

		// Build selectors
		if ($is_icon) {
			$selectors = [
				!empty($values['select_class']) ? $values['select_class'] : '{{WRAPPER}}' => 'font-size: {{SIZE}}{{UNIT}};',
				!empty($values['select_class_2']) ? $values['select_class_2'] : '{{WRAPPER}}' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			];
		} elseif ( $is_icon_img || $is_icon_img_2 ) {
			$selectors = [
				!empty($values['select_class']) ? $values['select_class'] : '{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
			];
		} else {
			$selectors = [
				!empty($values['select_class']) ? $values['select_class'] : '{{WRAPPER}}' =>
					$css_property . ': {{SIZE}}' . ($is_unitless ? '' : '{{UNIT}}') . ';',
			];
		}

		// Add control
		$this->add_responsive_control(
			!empty($values['id']) ? $values['id'] : $key,
			[
				'label'       => !empty($values['label']) ? $values['label'] : esc_html( ucwords(str_replace('_', ' ', $key)), 'rb-elementor-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => $size_units,
				'range'       => $range,
				'default'     => !empty($values['default']) ? $values['default'] : [],
				'condition'   => !empty($values['condition']) ? $values['condition'] : [],
				'selectors'   => $selectors,
			]
		);
		break;

	// All Choose Controls
	case 'html_tag':
	case 'align':
	case 'justify_align':
	case 'multi_align':

		// Detect type
		$is_html_tag   = ($key === 'html_tag');
		$is_align      = ($key === 'align');
		$is_justify    = ($key === 'justify_align');
		$is_multi      = ($key === 'multi_align');

		// Decide control method
		$method = ($is_html_tag) ? 'add_control' : 'add_responsive_control';

		// Build options
		if ($is_html_tag) {
			$options = rb_heading_tags();
		} else {
			$options = !empty($values['options']) ? $values['options'] : [];
		}

		// Label
		$label_text = !empty($values['label'])
			? $values['label']
			: ($is_html_tag ? esc_html__('HTML Tag', 'rb-elementor-addons') : esc_html__('Alignment', 'rb-elementor-addons'));

		// Build selectors
		$selectors = [];
		if ($is_align || $is_justify) {
			$css_property = $is_align ? 'text-align' : 'justify-content';
			$selectors = [
				!empty($values['select_class']) ? $values['select_class'] : '{{WRAPPER}}' => $css_property . ': {{VALUE}};',
			];
		} elseif ($is_multi) {
			$selectors = [
				!empty($values['select_class']) ? $values['select_class'] : '{{WRAPPER}}' => 'text-align: {{VALUE}};',
				!empty($values['select_class_2']) ? $values['select_class_2'] : '{{WRAPPER}}' => 'justify-content: {{VALUE}};',
			];
		}

		// Control arguments
		$control_args = [
			'label'       => $label_text,
			'type'        => Controls_Manager::CHOOSE,
			'options'     => $options,
			'default'     => !empty($values['default']) ? $values['default'] : ($is_html_tag ? 'h2' : ''),
			'condition'   => !empty($values['condition']) ? $values['condition'] : [],
		];
		if (!empty($selectors)) {
			$control_args['selectors'] = $selectors;
		}

		// Add control
		if ($method === 'add_control') {
			$this->add_control(
				!empty($values['id']) ? $values['id'] : $key,
				$control_args
			);
		} else {
			$this->add_responsive_control(
				!empty($values['id']) ? $values['id'] : $key,
				$control_args
			);
		}
		break;	

	// Dimensions Controls
	case 'margin':
	case 'padding':
	case 'border_radius':
		$css_property = str_replace( '_', '-', $key );
		$this->add_responsive_control(
			! empty( $values['id'] ) ? $values['id'] : $key,
			[
				'label'        => ! empty( $values['label'] ) ? $values['label'] : esc_html( ucwords( str_replace( '_', ' ', $key ) ), 'rb-elementor-addons' ),
				'type'        	=> Controls_Manager::DIMENSIONS,
				'size_units'  	=> [ 'px', '%', 'em', 'rem' ],
				'default'     	=> ! empty( $values['default'] ) ? $values['default'] : [],
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
				'selectors'   	=> [
									! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => $css_property . ': {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								 ],
			]
		);
		break;	

	// Divider Controls
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
			[
				'type'      => Controls_Manager::DIVIDER,
				'condition' => ! empty( $values['condition'] ) ? $values['condition'] : [],
			]
		);
		break;		

	// All Select-Type Controls (custom, pages, timing)
	case 'select_option':
	case 'page_link':
	case 'timing_function':
	case 'flex_direction':
		$is_timing = ($key === 'timing_function');
		$is_page   = ($key === 'page_link');
		$is_direction   = ($key === 'flex_direction');

		// Label mapping
		$label_map = [
			'select_option'   => esc_html__( 'Select Option', 'rb-elementor-addons' ),
			'page_link'       => esc_html__( 'Select Page', 'rb-elementor-addons' ),
			'timing_function' => esc_html__( 'Timing Function', 'rb-elementor-addons' ),
			'flex_direction' => esc_html__( 'Flex Direction', 'rb-elementor-addons' ),
		];
		$label_text = $label_map[$key] ?? esc_html__( 'Select Option', 'rb-elementor-addons' );

		// Decide options
		if (!empty($values['options'])) {
			$options = $values['options'];
		} elseif ($is_page) {
			$options = rb_get_all_pages();
		} elseif ($is_timing) {
			$options = rb_transition_function();
		} elseif ($is_direction) {
			$options = rb_flex_direction();
		} else {
			$options = [];
		}

		// Build arguments
		$control_args = [
			'label'        => !empty($values['label']) ? $values['label'] : $label_text,
			'type'         => Controls_Manager::SELECT,
			'label_block'  => !empty($values['label_block']) ? $values['label_block'] : true,
			'options'      => $options,
			'default'      => !empty($values['default']) ? $values['default'] : '',
			'condition'    => !empty($values['condition']) ? $values['condition'] : [],
		];

		// Extra selectors for timing_function
		if ($is_timing) {
			$control_args['selectors'] = [
				!empty($values['select_class']) ? $values['select_class'] : '{{WRAPPER}}' => 'timing-function: {{VALUE}};',
			];
		} elseif ($is_direction) {
			$control_args['selectors'] = [
				!empty($values['select_class']) ? $values['select_class'] : '{{WRAPPER}}' => 'flex-direction: {{VALUE}};',
			];
		}

		// Add control (responsive for timing, normal for others)
		if ($is_timing) {
			$this->add_responsive_control(
				!empty($values['id']) ? $values['id'] : $key,
				$control_args
			);
		} else {
			$this->add_control(
				!empty($values['id']) ? $values['id'] : $key,
				$control_args
			);
		}
		break;

	// Transition Property
	case 'transition_property':		
		$this->add_responsive_control(
			! empty( $values['id'] ) ? $values['id'] : 'transition_property',
			[
				'label'       	=> ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Transition Property', 'rb-elementor-addons' ),
				'type'        	=> Controls_Manager::SELECT2,
				'multiple'    	=> true,
				'label_block' 	=> true,
				'size'        	=> 5,
				'options'     	=> rb_transition_property(),
				'default'     	=> ! empty( $values['default'] ) ? $values['default'] : '',
				'condition'   	=> ! empty( $values['condition'] ) ? $values['condition'] : [],
				'selectors'   	=> [
									! empty( $values['select_class'] ) ? $values['select_class'] : '{{WRAPPER}}' => 'transition-property: {{VALUE}};',
								 ],	
			]
		);
		break;

}