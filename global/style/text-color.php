<?php
/**
 * Text Color Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

/*
 * --------------------------------------------------------------------------
 * Values.
 * --------------------------------------------------------------------------
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? sanitize_key( $rbelad_values['id'] )
	: 'color';

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/*
 * --------------------------------------------------------------------------
 * Default values.
 * --------------------------------------------------------------------------
 */

$rbelad_defaults = array(
	/**
	 * Normal.
	 */
	'color_normal_type'     => 'color',
	'color_normal_text'     => '',
	'color_normal_gradient' => '',

	/*
	 * Hover.
	 */
	'color_hover_type'      => 'color',
	'color_hover_text'      => '',
	'color_hover_gradient'  => '',
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
 * Text Color.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Text Color Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => $rbelad_condition,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

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
	 * Tab.
	 *
	 * Do not add parent condition here.
	 */
	$this->start_controls_tab(
		$rbelad_base_id . '_' . $rbelad_tab_key . '_tab',
		array(
			'label' => $rbelad_tab['label'],
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * Color Type.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_type_id = $rbelad_base_id . '_' . $rbelad_tab_key . '_type';

	$this->add_control(
		$rbelad_type_id,
		array(
			'label'     => esc_html__( 'Color Type', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array(
				'color'    => array(
					'title' => esc_html__( 'Color', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-paint-brush',
				),
				'gradient' => array(
					'title' => esc_html__( 'Gradient', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-background',
				),
			),
			'toggle'    => true,
			'default'   => $rbelad_defaults[ $rbelad_type_id ],
			'condition' => $rbelad_condition,
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * Solid Color.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_color_id = $rbelad_base_id . '_' . $rbelad_tab_key . '_text';

	$this->add_control(
		$rbelad_color_id,
		array(
			'label'     => ! empty( $rbelad_values['text_label'] )
				? $rbelad_values['text_label']
				: esc_html__( 'Color', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => $rbelad_defaults[ $rbelad_color_id ],
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
	 * ----------------------------------------------------------------------
	 */

	$rbelad_gradient_id = $rbelad_base_id . '_' . $rbelad_tab_key . '_gradient';

	$this->add_control(
		$rbelad_gradient_id,
		array(
			'label'       => esc_html__( 'Gradient', 'rb-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'rows'        => 4,
			'placeholder' => esc_html__(
				'linear-gradient(90deg, #ff0000 0%, #0000ff 100%)',
				'rb-addons-for-elementor'
			),
			'description' => esc_html__(
				'Enter a valid CSS gradient value.',
				'rb-addons-for-elementor'
			),
			'default'     => $rbelad_defaults[ $rbelad_gradient_id ],
			'selectors'   => array(
				$rbelad_tab['selector'] => 'background-image: {{VALUE}}; background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;',
			),
			'condition'   => array_merge(
				$rbelad_condition,
				array(
					$rbelad_type_id => 'gradient',
				)
			),
		)
	);

	$this->end_controls_tab();
}

$this->end_controls_tabs();

$this->end_popover();
