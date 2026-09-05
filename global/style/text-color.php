<?php
/**
 * Text Color Group Controls.
 *
 * Provides normal and hover text color controls with:
 * - Solid text color.
 * - Custom CSS gradient.
 * - RB/Elementor gradient control.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

/*
 * --------------------------------------------------------------------------
 * Values.
 * --------------------------------------------------------------------------
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

/*
 * --------------------------------------------------------------------------
 * Base ID.
 * --------------------------------------------------------------------------
 */

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? sanitize_key( $rbelad_values['id'] )
	: 'text_color';

/*
 * --------------------------------------------------------------------------
 * Selector.
 * --------------------------------------------------------------------------
 */

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

/*
 * --------------------------------------------------------------------------
 * Condition.
 * --------------------------------------------------------------------------
 */

$rbelad_condition = isset( $rbelad_values['condition'] ) && is_array( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/*
 * --------------------------------------------------------------------------
 * Heading label.
 * --------------------------------------------------------------------------
 */

$rbelad_heading_label = ! empty( $rbelad_values['heading_label'] )
	? $rbelad_values['heading_label']
	: esc_html__( 'Text Color Controls', 'rb-addons-for-elementor' );

/*
 * --------------------------------------------------------------------------
 * Default values.
 * --------------------------------------------------------------------------
 */

$rbelad_defaults = array(
	'normal_type'     => 'color',
	'normal_color'    => '',
	'normal_gradient' => '',
	'normal_rb'       => array(),

	'hover_type'      => 'color',
	'hover_color'     => '',
	'hover_gradient'  => '',
	'hover_rb'        => array(),
);

/*
 * --------------------------------------------------------------------------
 * Merge user supplied defaults.
 * --------------------------------------------------------------------------
 */

if ( ! empty( $rbelad_values['defaults'] ) && is_array( $rbelad_values['defaults'] ) ) {
	$rbelad_defaults = array_replace_recursive(
		$rbelad_defaults,
		$rbelad_values['defaults']
	);
}

/*
 * --------------------------------------------------------------------------
 * Text Color Heading.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => $rbelad_heading_label,
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'classes'     => 'rbelad-editor-heading-control',
		'condition'   => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Text Color Toggle.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_toggle',
	array(
		'label'        => esc_html__( 'Text Color', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

/*
 * --------------------------------------------------------------------------
 * Normal / Hover Tabs.
 * --------------------------------------------------------------------------
 */

$this->start_controls_tabs(
	$rbelad_base_id . '_tabs'
);

$rbelad_color_tabs = array(
	'normal' => array(
		'label'    => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector . ':hover',
	),
);

foreach ( $rbelad_color_tabs as $rbelad_tab_key => $rbelad_tab ) {

	/**
	 * ----------------------------------------------------------------------
	 * Tab.
	 * ----------------------------------------------------------------------
	 */

	$this->start_controls_tab(
		$rbelad_base_id . '_' . $rbelad_tab_key . '_tab',
		array(
			'label' => $rbelad_tab['label'],
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * Control IDs.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_type_id     = $rbelad_base_id . '_' . $rbelad_tab_key . '_type';
	$rbelad_color_id    = $rbelad_base_id . '_' . $rbelad_tab_key . '_color';
	$rbelad_gradient_id = $rbelad_base_id . '_' . $rbelad_tab_key . '_gradient';
	$rbelad_rb_id       = $rbelad_base_id . '_' . $rbelad_tab_key . '_rb_gradient';

	/*
	 * ----------------------------------------------------------------------
	 * Type Default.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_type_default = ! empty( $rbelad_defaults[ $rbelad_tab_key . '_type' ] )
		? $rbelad_defaults[ $rbelad_tab_key . '_type' ]
		: 'color';

	/*
	 * ----------------------------------------------------------------------
	 * Color Type.
	 * ----------------------------------------------------------------------
	 */

	$this->add_control(
		$rbelad_type_id,
		array(
			'label'     => esc_html__( 'Color Type', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array(
				'color'       => array(
					'title' => esc_html__( 'Text Color', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-paint-brush',
				),
				'gradient'    => array(
					'title' => esc_html__( 'Gradient Color', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-background',
				),
				'rb_gradient' => array(
					'title' => esc_html__( 'RB Gradient Color', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-background',
				),
			),
			'toggle'    => true,
			'default'   => $rbelad_type_default,
			'condition' => $rbelad_condition,
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * Text Color.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_color_default = isset( $rbelad_defaults[ $rbelad_tab_key . '_color' ] )
		? $rbelad_defaults[ $rbelad_tab_key . '_color' ]
		: '';

	$this->add_control(
		$rbelad_color_id,
		array(
			'label'     => ! empty( $rbelad_values['text_label'] )
				? $rbelad_values['text_label']
				: esc_html__( 'Color', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => $rbelad_color_default,
			'selectors' => array(
				$rbelad_tab['selector'] => 'color: {{VALUE}};',
			),
			'condition' => array_merge(
				$rbelad_condition,
				array(
					$rbelad_type_id => 'color',
				)
			),
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * Gradient Color.
	 *
	 * User enters any valid CSS gradient.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_gradient_default = isset( $rbelad_defaults[ $rbelad_tab_key . '_gradient' ] )
		? $rbelad_defaults[ $rbelad_tab_key . '_gradient' ]
		: '';

	$this->add_control(
		$rbelad_gradient_id,
		array(
			'label'       => esc_html__( 'Gradient Color', 'rb-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'rows'        => 3,
			'placeholder' => esc_html__(
				'linear-gradient(90deg, #ff0000 0%, #0000ff 100%)',
				'rb-addons-for-elementor'
			),
			'description' => esc_html__(
				'Enter a valid CSS gradient value.',
				'rb-addons-for-elementor'
			),
			'default'     => $rbelad_gradient_default,
			'selectors'   => array(
				$rbelad_tab['selector'] =>
					'background-image: {{VALUE}};'
					. 'background-clip: text;'
					. '-webkit-background-clip: text;'
					. '-webkit-text-fill-color: transparent;',
			),
			'condition'   => array_merge(
				$rbelad_condition,
				array(
					$rbelad_type_id => 'gradient',
				)
			),
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * RB Gradient Color.
	 *
	 * Elementor Group_Control_Background provides the gradient picker.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_rb_gradient_default = isset( $rbelad_defaults[ $rbelad_tab_key . '_rb' ] )
		? $rbelad_defaults[ $rbelad_tab_key . '_rb' ]
		: array();

	$this->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'      => $rbelad_rb_id,
			'label'     => esc_html__( 'RB Gradient Color', 'rb-addons-for-elementor' ),
			'types'     => array( 'gradient' ),
			'selector'  => $rbelad_tab['selector'],
			'separator' => 'before',
			'default'   => $rbelad_rb_gradient_default,
			'condition' => array_merge(
				$rbelad_condition,
				array(
					$rbelad_type_id => 'rb_gradient',
				)
			),
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * End Tab.
	 * ----------------------------------------------------------------------
	 */

	$this->end_controls_tab();
}

$this->end_controls_tabs();

$this->end_popover();
