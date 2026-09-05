<?php
/**
 * Text Color Hover Group Controls.
 *
 * Provides normal and hover text color controls with:
 * - Solid text color.
 * - Elementor gradient color.
 * - RB custom gradient color.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

/**
 * --------------------------------------------------------------------------
 * Values.
 * --------------------------------------------------------------------------
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

/**
 * --------------------------------------------------------------------------
 * Base ID.
 * --------------------------------------------------------------------------
 */

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? sanitize_key( $rbelad_values['id'] )
	: 'text_color';

/**
 * --------------------------------------------------------------------------
 * Selector - Normal.
 * --------------------------------------------------------------------------
 *
 * Add select_class is used for all normal styles.
 */

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

/**
 * --------------------------------------------------------------------------
 * Selector - Hover.
 * --------------------------------------------------------------------------
 *
 * If select_class_hover is provided, use it.
 * Otherwise, fall back to select_class.
 *
 * Example:
 *
 * select_class        => '{{WRAPPER}} .button'
 * select_class_hover  => '{{WRAPPER}} .button-icon'
 *
 * Output:
 *
 * Normal:
 * {{WRAPPER}} .button
 *
 * Hover:
 * {{WRAPPER}} .button-icon:hover
 *
 * If select_class_hover is not provided:
 *
 * Hover:
 * {{WRAPPER}} .button:hover
 */

$rbelad_selector_hover = ! empty( $rbelad_values['select_class_hover'] )
	? $rbelad_values['select_class_hover']
	: $rbelad_selector;

/**
 * --------------------------------------------------------------------------
 * Hover selector with :hover.
 * --------------------------------------------------------------------------
 *
 * Avoid adding :hover twice if the user already supplied it.
 */

$rbelad_hover_selector = $rbelad_selector_hover;

if ( false === strpos( $rbelad_hover_selector, ':hover' ) ) {
	$rbelad_hover_selector .= ':hover';
}

/**
 * --------------------------------------------------------------------------
 * Condition.
 * --------------------------------------------------------------------------
 */

$rbelad_condition = isset( $rbelad_values['condition'] )
	&& is_array( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/**
 * --------------------------------------------------------------------------
 * Default values.
 * --------------------------------------------------------------------------
 */

$rbelad_defaults = array(
	'normal' => array(
		'color_type'     => 'color',
		'text_color'     => '',
		'gradient_color' => '',
	),
	'hover'  => array(
		'color_type'     => 'color',
		'text_color'     => '',
		'gradient_color' => '',
	),
);

/**
 * --------------------------------------------------------------------------
 * Merge custom defaults.
 * --------------------------------------------------------------------------
 */

if (
	! empty( $rbelad_values['defaults'] )
	&& is_array( $rbelad_values['defaults'] )
) {
	$rbelad_defaults = array_replace_recursive(
		$rbelad_defaults,
		$rbelad_values['defaults']
	);
}

/**
 * --------------------------------------------------------------------------
 * Heading.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__(
				'Text Color Controls',
				'rb-addons-for-elementor'
			),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'classes'     => 'rbelad-editor-heading-control',
		'condition'   => $rbelad_condition,
	)
);

/**
 * --------------------------------------------------------------------------
 * Normal / Hover Tabs.
 * --------------------------------------------------------------------------
 */

$rbelad_tabs = array(
	'normal' => array(
		'label'    => esc_html__(
			'Normal',
			'rb-addons-for-elementor'
		),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__(
			'Hover',
			'rb-addons-for-elementor'
		),
		'selector' => $rbelad_hover_selector,
	),
);

$this->start_controls_tabs(
	$rbelad_base_id . '_tabs'
);

/**
 * --------------------------------------------------------------------------
 * Tabs Loop.
 * --------------------------------------------------------------------------
 */

foreach ( $rbelad_tabs as $rbelad_tab_key => $rbelad_tab ) {

	/**
	 * ----------------------------------------------------------------------
	 * Control IDs.
	 * ----------------------------------------------------------------------
	 */

	$rbelad_type_id = $rbelad_base_id . '_type_' . $rbelad_tab_key;

	$rbelad_color_id = $rbelad_base_id . '_text_color_' . $rbelad_tab_key;

	$rbelad_gradient_id =
		$rbelad_base_id . '_gradient_' . $rbelad_tab_key;

	$rbelad_rb_gradient_id =
		$rbelad_base_id . '_rb_gradient_' . $rbelad_tab_key;

	$rbelad_gradient_text_id =
		$rbelad_base_id . '_gradient_text_' . $rbelad_tab_key;

	/**
	 * ----------------------------------------------------------------------
	 * Conditions.
	 * ----------------------------------------------------------------------
	 */

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

	/**
	 * ----------------------------------------------------------------------
	 * Start Tab.
	 * ----------------------------------------------------------------------
	 */

	$this->start_controls_tab(
		$rbelad_base_id . '_' . $rbelad_tab_key . '_tab',
		array(
			'label'     => $rbelad_tab['label'],
			'condition' => $rbelad_condition,
		)
	);

	/**
	 * ----------------------------------------------------------------------
	 * Text Color Type.
	 *
	 * 1. Text Color
	 * 2. Gradient Color
	 * 3. RB Gradient Color
	 * ----------------------------------------------------------------------
	 */

	$this->add_control(
		$rbelad_type_id,
		array(
			'label'     => esc_html__(
				'Text Color',
				'rb-addons-for-elementor'
			),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array(
				'color'       => array(
					'title' => esc_html__(
						'Text Color',
						'rb-addons-for-elementor'
					),
					'icon'  => 'eicon-paint-brush',
				),
				'gradient'    => array(
					'title' => esc_html__(
						'Gradient Color',
						'rb-addons-for-elementor'
					),
					'icon'  => 'eicon-barcode',
				),
				'rb-gradient' => array(
					'title' => esc_html__(
						'RB Gradient Color',
						'rb-addons-for-elementor'
					),
					'icon'  => 'rbelad-wi rbelad-wi-plugin',
				),
			),
			'default'   => $rbelad_defaults[ $rbelad_tab_key ]['color_type'],
			'toggle'    => true,
			'condition' => $rbelad_condition,
		)
	);

	/**
	 * ----------------------------------------------------------------------
	 * 1. TEXT COLOR.
	 * ----------------------------------------------------------------------
	 */

	$this->add_control(
		$rbelad_color_id,
		array(
			'label'     => ! empty( $rbelad_values['text_label'] )
				? $rbelad_values['text_label']
				: esc_html__(
					'Color',
					'rb-addons-for-elementor'
				),
			'type'      => Controls_Manager::COLOR,
			'default'   => $rbelad_defaults[ $rbelad_tab_key ]['text_color'],
			'selectors' => array(
				$rbelad_tab['selector'] => 'color: {{VALUE}};',
			),
			'condition' => $rbelad_color_condition,
		)
	);

	/**
	 * ----------------------------------------------------------------------
	 * 2. ELEMENTOR GRADIENT COLOR.
	 * ----------------------------------------------------------------------
	 *
	 * Uses Elementor's native Group_Control_Background.
	 */

	$this->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'           => $rbelad_gradient_id,
			'label'          => esc_html__(
				'Gradient Color',
				'rb-addons-for-elementor'
			),
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

	/**
	 * ----------------------------------------------------------------------
	 * Elementor Gradient Text.
	 * ----------------------------------------------------------------------
	 *
	 * Converts Elementor's background gradient into a text gradient.
	 */

	$this->add_control(
		$rbelad_gradient_text_id,
		array(
			'label'        => esc_html__(
				'Gradient Text',
				'rb-addons-for-elementor'
			),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__(
				'Yes',
				'rb-addons-for-elementor'
			),
			'label_off'    => esc_html__(
				'No',
				'rb-addons-for-elementor'
			),
			'return_value' => 'yes',
			'default'      => 'yes',
			'selectors'    => array(
				$rbelad_tab['selector'] =>
					'background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;',
			),
			'condition'    => $rbelad_gradient_condition,
		)
	);

	/**
	 * ----------------------------------------------------------------------
	 * 3. RB GRADIENT COLOR.
	 * ----------------------------------------------------------------------
	 *
	 * Custom RB gradient CSS value.
	 */

	$this->add_control(
		$rbelad_rb_gradient_id,
		array(
			'label'       => esc_html__(
				'RB Gradient Color',
				'rb-addons-for-elementor'
			),
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
			'default'     => $rbelad_defaults[ $rbelad_tab_key ]['gradient_color'],
			'selectors'   => array(
				$rbelad_tab['selector'] =>
					'background-image: {{VALUE}}; background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;',
			),
			'condition'   => $rbelad_rb_gradient_condition,
		)
	);

	/**
	 * ----------------------------------------------------------------------
	 * End Tab.
	 * ----------------------------------------------------------------------
	 */

	$this->end_controls_tab();
}

/**
 * --------------------------------------------------------------------------
 * End Normal / Hover Tabs.
 * --------------------------------------------------------------------------
 */

$this->end_controls_tabs();
