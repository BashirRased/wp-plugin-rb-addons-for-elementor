<?php
/**
 * Background, Border, Shadow & Spacing Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/*
 * ==========================================================================
 * VALUES.
 * ==========================================================================
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

/*
 * ==========================================================================
 * BASE ID.
 * ==========================================================================
 */

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? sanitize_key( $rbelad_values['id'] )
	: 'style';

/*
 * ==========================================================================
 * SELECTORS.
 * ==========================================================================
 */

/**
 * Normal selector.
 */
$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

/**
 * Hover selector.
 */
$rbelad_selector_hover = ! empty( $rbelad_values['select_class_hover'] )
	? $rbelad_values['select_class_hover']
	: $rbelad_selector;

/**
 * Add :hover when it does not already exist.
 */
$rbelad_hover_selector = $rbelad_selector_hover;

if ( false === strpos( $rbelad_hover_selector, ':hover' ) ) {
	$rbelad_hover_selector .= ':hover';
}

/*
 * ==========================================================================
 * CONDITION.
 * ==========================================================================
 */

$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/*
 * ==========================================================================
 * UNITS.
 * ==========================================================================
 */

$rbelad_size_unit = array(
	'px',
	'em',
	'rem',
	'%',
	'vw',
	'vh',
);

if ( function_exists( 'rbelad_slider_unit' ) ) {
	$rbelad_size_unit = rbelad_slider_unit();
}

/*
 * ==========================================================================
 * DEFAULTS.
 * ==========================================================================
 */

$rbelad_defaults = array(

	/*
	 * ----------------------------------------------------------------------
	 * Background - Normal.
	 * ----------------------------------------------------------------------
	 */
	'background_normal_type'           => 'color',
	'background_normal_color'          => '',
	'background_normal_gradient'       => '',
	'background_normal_rb_gradient'    => '',
	'background_normal_image'          => array(),
	'background_normal_image_size'     => 'cover',
	'background_normal_image_position' => 'center center',
	'background_normal_image_repeat'   => 'no-repeat',

	/*
	 * ----------------------------------------------------------------------
	 * Background - Hover.
	 * ----------------------------------------------------------------------
	 */
	'background_hover_type'            => 'color',
	'background_hover_color'           => '',
	'background_hover_gradient'        => '',
	'background_hover_rb_gradient'     => '',
	'background_hover_image'           => array(),
	'background_hover_image_size'      => 'cover',
	'background_hover_image_position'  => 'center center',
	'background_hover_image_repeat'    => 'no-repeat',

	/*
	 * ----------------------------------------------------------------------
	 * Border - Normal.
	 * ----------------------------------------------------------------------
	 */
	'border_normal_border'             => '',
	'border_normal_width'              => array(
		'top'      => '',
		'right'    => '',
		'bottom'   => '',
		'left'     => '',
		'unit'     => 'px',
		'isLinked' => true,
	),
	'border_normal_color'              => '',
	'border_normal_radius'             => array(
		'top'      => '',
		'right'    => '',
		'bottom'   => '',
		'left'     => '',
		'unit'     => 'px',
		'isLinked' => true,
	),

	/*
	 * ----------------------------------------------------------------------
	 * Border - Hover.
	 * ----------------------------------------------------------------------
	 */
	'border_hover_border'              => '',
	'border_hover_width'               => array(
		'top'      => '',
		'right'    => '',
		'bottom'   => '',
		'left'     => '',
		'unit'     => 'px',
		'isLinked' => true,
	),
	'border_hover_color'               => '',
	'border_hover_radius'              => array(
		'top'      => '',
		'right'    => '',
		'bottom'   => '',
		'left'     => '',
		'unit'     => 'px',
		'isLinked' => true,
	),

	/*
	* ----------------------------------------------------------------------
	* Box Shadow - Normal.
	* ----------------------------------------------------------------------
	*/
	'box_shadow_normal_type'           => 'default',
	'box_shadow_normal'                => '',

	/*
	* ----------------------------------------------------------------------
	* Box Shadow - Hover.
	* ----------------------------------------------------------------------
	*/
	'box_shadow_hover_type'            => 'default',
	'box_shadow_hover'                 => '',

	/*
	 * ----------------------------------------------------------------------
	 * Drop Shadow - Normal.
	 * ----------------------------------------------------------------------
	 */
	'drop_shadow_normal'               => '',

	/*
	 * ----------------------------------------------------------------------
	 * Drop Shadow - Hover.
	 * ----------------------------------------------------------------------
	 */
	'drop_shadow_hover'                => '',

	/*
	 * ----------------------------------------------------------------------
	 * Transition.
	 * ----------------------------------------------------------------------
	 */
	'transition'                       => array(
		'size' => 0.3,
		'unit' => 's',
	),

	/*
	 * ----------------------------------------------------------------------
	 * Spacing.
	 * ----------------------------------------------------------------------
	 */
	'margin'                           => array(
		'top'      => '',
		'right'    => '',
		'bottom'   => '',
		'left'     => '',
		'unit'     => 'px',
		'isLinked' => true,
	),

	'padding'                          => array(
		'top'      => '',
		'right'    => '',
		'bottom'   => '',
		'left'     => '',
		'unit'     => 'px',
		'isLinked' => true,
	),
);

/*
 * ==========================================================================
 * MERGE CUSTOM DEFAULTS.
 * ==========================================================================
 */

if ( ! empty( $rbelad_values['defaults'] ) && is_array( $rbelad_values['defaults'] ) ) {
	$rbelad_defaults = array_replace_recursive(
		$rbelad_defaults,
		$rbelad_values['defaults']
	);
}

/*
 * ==========================================================================
 * HEADING.
 * ==========================================================================
 */

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Box Style Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => $rbelad_condition,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

/*
 * ==========================================================================
 * BACKGROUND POPOVER.
 * ==========================================================================
 */

$this->add_control(
	$rbelad_base_id . '_background',
	array(
		'label'        => esc_html__( 'Background', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

$this->start_controls_tabs(
	$rbelad_base_id . '_background_tabs'
);

$rbelad_background_tabs = array(
	'normal' => array(
		'label'    => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_hover_selector,
	),
);

foreach ( $rbelad_background_tabs as $rbelad_tab_key => $rbelad_tab ) {

	$rbelad_type_id = $rbelad_base_id . '_background_' . $rbelad_tab_key . '_type';

	$rbelad_color_condition = array_merge(
		$rbelad_condition,
		array(
			$rbelad_type_id => 'color',
		)
	);

	$rbelad_gradient_condition = array_merge(
		$rbelad_condition,
		array(
			$rbelad_type_id => 'gradient',
		)
	);

	$rbelad_rb_gradient_condition = array_merge(
		$rbelad_condition,
		array(
			$rbelad_type_id => 'rb-gradient',
		)
	);

	$rbelad_image_condition = array_merge(
		$rbelad_condition,
		array(
			$rbelad_type_id => 'image',
		)
	);

	$this->start_controls_tab(
		$rbelad_base_id . '_background_' . $rbelad_tab_key . '_tab',
		array(
			'label' => $rbelad_tab['label'],
		)
	);

	/*
	 * Background Type.
	 */
	$this->add_control(
		$rbelad_type_id,
		array(
			'label'     => esc_html__( 'Background Type', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array(
				'color'       => array(
					'title' => esc_html__( 'Color', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-paint-brush',
				),
				'gradient'    => array(
					'title' => esc_html__( 'Gradient', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-barcode',
				),
				'rb-gradient' => array(
					'title' => esc_html__( 'RB Gradient', 'rb-addons-for-elementor' ),
					'icon'  => 'rbelad-wi rbelad-wi-plugin',
				),
				'image'       => array(
					'title' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-image',
				),
			),
			'toggle'    => true,
			'default'   => $rbelad_defaults[ 'background_' . $rbelad_tab_key . '_type' ],
			'condition' => $rbelad_condition,
		)
	);

	/*
	 * Color.
	 */
	$this->add_control(
		$rbelad_base_id . '_background_' . $rbelad_tab_key . '_color',
		array(
			'label'     => esc_html__( 'Color', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => $rbelad_defaults[ 'background_' . $rbelad_tab_key . '_color' ],
			'selectors' => array(
				$rbelad_tab['selector'] => 'background-color: {{VALUE}};',
			),
			'condition' => $rbelad_color_condition,
		)
	);

	/*
	 * Elementor Gradient.
	 */
	$this->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'           => $rbelad_base_id . '_background_' . $rbelad_tab_key . '_gradient',
			'label'          => esc_html__( 'Gradient', 'rb-addons-for-elementor' ),
			'types'          => array( 'gradient' ),
			'selector'       => $rbelad_tab['selector'],
			'fields_options' => array(
				'background' => array(
					'default' => 'gradient',
				),
			),
			'condition'      => $rbelad_gradient_condition,
		)
	);

	/*
	 * RB Gradient.
	 */
	$this->add_control(
		$rbelad_base_id . '_background_' . $rbelad_tab_key . '_rb_gradient',
		array(
			'label'       => esc_html__( 'RB Gradient', 'rb-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'rows'        => 3,
			'placeholder' => esc_html__(
				'linear-gradient(90deg, #4F46E5 0%, #9333EA 100%)',
				'rb-addons-for-elementor'
			),
			'description' => esc_html__(
				'Enter a valid CSS gradient value.',
				'rb-addons-for-elementor'
			),
			'default'     => $rbelad_defaults[ 'background_' . $rbelad_tab_key . '_rb_gradient' ],
			'selectors'   => array(
				$rbelad_tab['selector'] => 'background-image: {{VALUE}};',
			),
			'condition'   => $rbelad_rb_gradient_condition,
		)
	);

	/*
	 * Image.
	 */
	$this->add_control(
		$rbelad_base_id . '_background_' . $rbelad_tab_key . '_image',
		array(
			'label'     => esc_html__( 'Image', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::MEDIA,
			'dynamic'   => array(
				'active' => true,
			),
			'default'   => $rbelad_defaults[ 'background_' . $rbelad_tab_key . '_image' ],
			'selectors' => array(
				$rbelad_tab['selector'] => 'background-image: url("{{URL}}");',
			),
			'condition' => $rbelad_image_condition,
		)
	);

	/*
	 * Image Size.
	 */
	$this->add_control(
		$rbelad_base_id . '_background_' . $rbelad_tab_key . '_image_size',
		array(
			'label'     => esc_html__( 'Image Size', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => array(
				'auto'      => esc_html__( 'Auto', 'rb-addons-for-elementor' ),
				'cover'     => esc_html__( 'Cover', 'rb-addons-for-elementor' ),
				'contain'   => esc_html__( 'Contain', 'rb-addons-for-elementor' ),
				'100% 100%' => esc_html__( 'Full', 'rb-addons-for-elementor' ),
			),
			'default'   => $rbelad_defaults[ 'background_' . $rbelad_tab_key . '_image_size' ],
			'selectors' => array(
				$rbelad_tab['selector'] => 'background-size: {{VALUE}};',
			),
			'condition' => $rbelad_image_condition,
		)
	);

	/*
	 * Image Position.
	 */
	$this->add_control(
		$rbelad_base_id . '_background_' . $rbelad_tab_key . '_image_position',
		array(
			'label'     => esc_html__( 'Image Position', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => array(
				'center center' => esc_html__( 'Center Center', 'rb-addons-for-elementor' ),
				'center top'    => esc_html__( 'Center Top', 'rb-addons-for-elementor' ),
				'center bottom' => esc_html__( 'Center Bottom', 'rb-addons-for-elementor' ),
				'left center'   => esc_html__( 'Left Center', 'rb-addons-for-elementor' ),
				'right center'  => esc_html__( 'Right Center', 'rb-addons-for-elementor' ),
				'left top'      => esc_html__( 'Left Top', 'rb-addons-for-elementor' ),
				'right top'     => esc_html__( 'Right Top', 'rb-addons-for-elementor' ),
				'left bottom'   => esc_html__( 'Left Bottom', 'rb-addons-for-elementor' ),
				'right bottom'  => esc_html__( 'Right Bottom', 'rb-addons-for-elementor' ),
			),
			'default'   => $rbelad_defaults[ 'background_' . $rbelad_tab_key . '_image_position' ],
			'selectors' => array(
				$rbelad_tab['selector'] => 'background-position: {{VALUE}};',
			),
			'condition' => $rbelad_image_condition,
		)
	);

	/*
	 * Image Repeat.
	 */
	$this->add_control(
		$rbelad_base_id . '_background_' . $rbelad_tab_key . '_image_repeat',
		array(
			'label'     => esc_html__( 'Image Repeat', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => array(
				'no-repeat' => esc_html__( 'No Repeat', 'rb-addons-for-elementor' ),
				'repeat'    => esc_html__( 'Repeat', 'rb-addons-for-elementor' ),
				'repeat-x'  => esc_html__( 'Repeat X', 'rb-addons-for-elementor' ),
				'repeat-y'  => esc_html__( 'Repeat Y', 'rb-addons-for-elementor' ),
			),
			'default'   => $rbelad_defaults[ 'background_' . $rbelad_tab_key . '_image_repeat' ],
			'selectors' => array(
				$rbelad_tab['selector'] => 'background-repeat: {{VALUE}};',
			),
			'condition' => $rbelad_image_condition,
		)
	);

	$this->end_controls_tab();
}

$this->end_controls_tabs();

$this->end_popover();

/*
 * ==========================================================================
 * BORDER POPOVER.
 * ==========================================================================
 */

$this->add_control(
	$rbelad_base_id . '_border',
	array(
		'label'        => esc_html__( 'Border', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

$this->start_controls_tabs(
	$rbelad_base_id . '_border_tabs'
);

$rbelad_border_tabs = array(
	'normal' => array(
		'label'    => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_hover_selector,
	),
);

foreach ( $rbelad_border_tabs as $rbelad_tab_key => $rbelad_tab ) {

	$this->start_controls_tab(
		$rbelad_base_id . '_border_' . $rbelad_tab_key . '_tab',
		array(
			'label' => $rbelad_tab['label'],
		)
	);

	/*
	 * Border.
	 */
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'           => $rbelad_base_id . '_border_' . $rbelad_tab_key,
			'selector'       => $rbelad_tab['selector'],
			'fields_options' => array(
				'border' => array(
					'default' => $rbelad_defaults[ 'border_' . $rbelad_tab_key . '_border' ],
				),
				'width'  => array(
					'default' => $rbelad_defaults[ 'border_' . $rbelad_tab_key . '_width' ],
				),
				'color'  => array(
					'default' => $rbelad_defaults[ 'border_' . $rbelad_tab_key . '_color' ],
				),
			),
		)
	);

	/*
	 * Border Radius.
	 */
	$this->add_responsive_control(
		$rbelad_base_id . '_border_' . $rbelad_tab_key . '_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'rb-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => $rbelad_size_unit,
			'default'    => $rbelad_defaults[ 'border_' . $rbelad_tab_key . '_radius' ],
			'selectors'  => array(
				$rbelad_tab['selector'] => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$this->end_controls_tab();
}

$this->end_controls_tabs();

$this->end_popover();

/*
 * ==========================================================================
 * DROP SHADOW POPOVER.
 * ==========================================================================
 */
$this->add_control(
	$rbelad_base_id . '_drop_shadow',
	array(
		'label'        => esc_html__( 'Drop Shadow', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

$this->start_controls_tabs(
	$rbelad_base_id . '_drop_shadow_tabs'
);

$rbelad_drop_shadow_tabs = array(
	'normal' => array(
		'label'    => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_hover_selector,
	),
);

foreach ( $rbelad_drop_shadow_tabs as $rbelad_tab_key => $rbelad_tab ) {
	$this->start_controls_tab(
		$rbelad_base_id . '_drop_shadow_' . $rbelad_tab_key . '_tab',
		array(
			'label' => $rbelad_tab['label'],
		)
	);

	$this->add_control(
		$rbelad_base_id . '_drop_shadow_' . $rbelad_tab_key . '_value',
		array(
			'label'       => esc_html__( 'Drop Shadow', 'rb-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'rows'        => 3,
			'placeholder' => esc_html__(
				'drop-shadow(0 10px 10px rgba(0, 0, 0, 0.3))',
				'rb-addons-for-elementor'
			),
			'description' => esc_html__(
				'Enter a valid CSS filter value.',
				'rb-addons-for-elementor'
			),
			'default'     => $rbelad_defaults[ 'drop_shadow_' . $rbelad_tab_key ],
			'selectors'   => array(
				$rbelad_tab['selector'] => 'filter: {{VALUE}};',
			),
		)
	);

	$this->end_controls_tab();
}

$this->end_controls_tabs();

$this->end_popover();

/*
 * ==========================================================================
 * TRANSITION.
 * ==========================================================================
 */

$this->add_control(
	$rbelad_base_id . '_transition',
	array(
		'label'      => esc_html__( 'Transition Duration', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 's', 'ms' ),
		'range'      => array(
			'ms' => array(
				'min'  => 0,
				'max'  => 1000,
				'step' => 10,
			),
			's'  => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.1,
			),
		),
		'default'    => $rbelad_defaults['transition'],
		'selectors'  => array(
			$rbelad_selector => 'transition: all {{SIZE}}{{UNIT}} ease;',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * ==========================================================================
 * SPACING POPOVER.
 * ==========================================================================
 */

$this->add_control(
	$rbelad_base_id . '_spacing',
	array(
		'label'        => esc_html__( 'Spacing', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

$this->add_responsive_control(
	$rbelad_base_id . '_margin',
	array(
		'label'      => esc_html__( 'Margin', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => $rbelad_size_unit,
		'default'    => $rbelad_defaults['margin'],
		'selectors'  => array(
			$rbelad_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);

$this->add_responsive_control(
	$rbelad_base_id . '_padding',
	array(
		'label'      => esc_html__( 'Padding', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => $rbelad_size_unit,
		'default'    => $rbelad_defaults['padding'],
		'selectors'  => array(
			$rbelad_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);

$this->end_popover();



/*
 * ==========================================================================
 * BOX SHADOW TABS.
 * ==========================================================================
 */
$this->start_controls_tabs(
	$rbelad_base_id . '_box_shadow_tabs'
);

/*
 * ==========================================================================
 * BOX SHADOW TABS.
 * ==========================================================================
 */

$rbelad_box_shadow_tabs = array(
	'normal' => array(
		'label'    => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_hover_selector,
	),
);

foreach ( $rbelad_box_shadow_tabs as $rbelad_tab_key => $rbelad_tab ) {

	/**
	 * ----------------------------------------------------------------------
	 * IDs.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_box_shadow_type_id =
		$rbelad_base_id . '_box_shadow_type_' . $rbelad_tab_key;

	$rbelad_box_shadow_group_name =
		$rbelad_base_id . '_box_shadow_' . $rbelad_tab_key;

	$rbelad_box_shadow_custom_id =
		$rbelad_base_id . '_box_shadow_' . $rbelad_tab_key . '_custom';

	/*
	 * ----------------------------------------------------------------------
	 * Conditions.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_box_shadow_default_condition = array_merge(
		$rbelad_condition,
		array(
			$rbelad_box_shadow_type_id => 'default',
		)
	);

	$rbelad_box_shadow_custom_condition = array_merge(
		$rbelad_condition,
		array(
			$rbelad_box_shadow_type_id => 'rb-custom',
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * TAB.
	 * ----------------------------------------------------------------------
	 */

	$this->start_controls_tab(
		$rbelad_base_id . '_box_shadow_' . $rbelad_tab_key . '_tab',
		array(
			'label' => $rbelad_tab['label'],
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * BOX SHADOW TYPE.
	 * ----------------------------------------------------------------------
	 */

	$this->add_control(
		$rbelad_box_shadow_type_id,
		array(
			'label'     => esc_html__(
				'Box Shadow Type',
				'rb-addons-for-elementor'
			),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array(
				'default'   => array(
					'title' => esc_html__(
						'Elementor',
						'rb-addons-for-elementor'
					),
					'icon'  => 'eicon-barcode',
				),
				'rb-custom' => array(
					'title' => esc_html__(
						'RB Custom',
						'rb-addons-for-elementor'
					),
					'icon'  => 'rbelad-wi rbelad-wi-plugin',
				),
			),
			'toggle'    => true,
			'default'   => $rbelad_defaults[ 'box_shadow_' . $rbelad_tab_key . '_type' ],
			'condition' => $rbelad_condition,
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * ELEMENTOR BOX SHADOW.
	 * ----------------------------------------------------------------------
	 */

	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'name'      => $rbelad_box_shadow_group_name,
			'selector'  => $rbelad_tab['selector'],
			'condition' => $rbelad_box_shadow_default_condition,
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * RB CUSTOM BOX SHADOW.
	 * ----------------------------------------------------------------------
	 */

	$this->add_control(
		$rbelad_box_shadow_custom_id,
		array(
			'label'       => esc_html__(
				'Custom Box Shadow',
				'rb-addons-for-elementor'
			),
			'type'        => Controls_Manager::TEXTAREA,
			'rows'        => 3,
			'placeholder' => esc_html__(
				'0 10px 20px 0 rgba(0, 0, 0, 0.10)',
				'rb-addons-for-elementor'
			),
			'description' => esc_html__(
				'Enter a valid CSS box-shadow value.',
				'rb-addons-for-elementor'
			),
			'default'     => $rbelad_defaults[ 'box_shadow_' . $rbelad_tab_key ],
			'selectors'   => array(
				$rbelad_tab['selector'] => 'box-shadow: {{VALUE}};',
			),
			'condition'   => $rbelad_box_shadow_custom_condition,
		)
	);

	$this->end_controls_tab();
}

$this->end_controls_tabs();
