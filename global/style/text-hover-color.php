<?php
/**
 * Text Color Hover Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

/*
 * --------------------------------------------------------------------------
 * Base settings.
 * --------------------------------------------------------------------------
 */

$rbelad_base_id   = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'text_color';
$rbelad_selector  = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';
$rbelad_condition = ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array();

/*
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
 * Heading.
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

/*
 * --------------------------------------------------------------------------
 * Normal / Hover tabs.
 * --------------------------------------------------------------------------
 */

$rbelad_tabs = array(
	'normal' => array(
		'label'    => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector . ':hover',
	),
);

$this->start_controls_tabs( $rbelad_base_id . '_tabs' );

foreach ( $rbelad_tabs as $rbelad_tab_key => $rbelad_tab ) {

	$rbelad_type_id     = $rbelad_base_id . '_type_' . $rbelad_tab_key;
	$rbelad_color_id    = $rbelad_base_id . '_text_color_' . $rbelad_tab_key;
	$rbelad_gradient_id = $rbelad_base_id . '_gradient_' . $rbelad_tab_key;

	$this->start_controls_tab(
		$rbelad_base_id . '_' . $rbelad_tab_key . '_tab',
		array(
			'label'     => $rbelad_tab['label'],
			'condition' => $rbelad_condition,
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * Text Color Type.
	 * ----------------------------------------------------------------------
	 */

	$this->add_control(
		$rbelad_type_id,
		array(
			'label'     => esc_html__( 'Text Color', 'rb-addons-for-elementor' ),
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
			'default'   => $rbelad_defaults[ $rbelad_tab_key ]['color_type'],
			'toggle'    => true,
			'condition' => $rbelad_condition,
		)
	);

	/*
	 * ----------------------------------------------------------------------
	 * Solid Text Color.
	 * ----------------------------------------------------------------------
	 */

	$this->add_control(
		$rbelad_color_id,
		array(
			'label'     => ! empty( $rbelad_values['text_label'] )
				? $rbelad_values['text_label']
				: esc_html__( 'Color', 'rb-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => $rbelad_defaults[ $rbelad_tab_key ]['text_color'],
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
	 * Gradient Text.
	 * ----------------------------------------------------------------------
	 */

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
			'default'     => $rbelad_defaults[ $rbelad_tab_key ]['gradient_color'],
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
