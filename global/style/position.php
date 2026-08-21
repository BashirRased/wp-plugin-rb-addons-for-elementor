<?php
/**
 * Position Group Controls.
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
	: 'position';

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/*
 * --------------------------------------------------------------------------
 * Size Units.
 * --------------------------------------------------------------------------
 */

$rbelad_size_unit = ! empty( $rbelad_values['size_unit'] )
	? $rbelad_values['size_unit']
	: array( 'px', 'em', 'rem', '%', 'vw', 'vh' );

if ( empty( $rbelad_values['size_unit'] ) && function_exists( 'rbelad_slider_unit' ) ) {
	$rbelad_size_unit = rbelad_slider_unit();
}

/*
 * --------------------------------------------------------------------------
 * Default values.
 * --------------------------------------------------------------------------
 */

$rbelad_defaults = array(

	/*
	 * Position.
	 */
	'position'    => 'static',

	/*
	 * Position offsets.
	 */
	'top'         => array(
		'size' => '',
		'unit' => 'px',
	),
	'right'       => array(
		'size' => '',
		'unit' => 'px',
	),
	'bottom'      => array(
		'size' => '',
		'unit' => 'px',
	),
	'left'        => array(
		'size' => '',
		'unit' => 'px',
	),

	/*
	 * Transforms.
	 */
	'translate_x' => array(
		'size' => '',
		'unit' => 'px',
	),
	'translate_y' => array(
		'size' => '',
		'unit' => 'px',
	),
	'rotate'      => array(
		'size' => '',
		'unit' => 'deg',
	),
	'scale'       => array(
		'size' => 1,
		'unit' => '',
	),
	'skew_x'      => array(
		'size' => '',
		'unit' => 'deg',
	),
	'skew_y'      => array(
		'size' => '',
		'unit' => 'deg',
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
 * Position Heading.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Position Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => $rbelad_condition,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

/*
 * ==========================================================================
 * POSITION.
 * ==========================================================================
 */

$rbelad_position_id = $rbelad_base_id . '_position';

$this->add_responsive_control(
	$rbelad_position_id,
	array(
		'label'     => esc_html__( 'Position', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			'static'   => esc_html__( 'Static', 'rb-addons-for-elementor' ),
			'relative' => esc_html__( 'Relative', 'rb-addons-for-elementor' ),
			'absolute' => esc_html__( 'Absolute', 'rb-addons-for-elementor' ),
		),
		'default'   => $rbelad_defaults['position'],
		'selectors' => array(
			$rbelad_selector => 'position: {{VALUE}};',
		),
		'condition' => $rbelad_condition,
	)
);

/*
 * ==========================================================================
 * POSITION OFFSETS.
 * ==========================================================================
 */

$rbelad_offsets = array(
	'top',
	'right',
	'bottom',
	'left',
);

foreach ( $rbelad_offsets as $rbelad_offset ) {

	$rbelad_offset_id = $rbelad_base_id . '_' . $rbelad_offset;

	$this->add_responsive_control(
		$rbelad_offset_id,
		array(
			'label'      => esc_html( ucfirst( $rbelad_offset ) ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => $rbelad_size_unit,
			'default'    => $rbelad_defaults[ $rbelad_offset ],
			'condition'  => array_merge(
				$rbelad_condition,
				array(
					$rbelad_position_id => array(
						'relative',
						'absolute',
					),
				)
			),
			'selectors'  => array(
				$rbelad_selector => $rbelad_offset . ': {{SIZE}}{{UNIT}};',
			),
		)
	);
}

/*
 * ==========================================================================
 * TRANSFORMS.
 * ==========================================================================
 */

$rbelad_transforms = array(
	'translate_x' => array(
		'label' => esc_html__( 'Translate X', 'rb-addons-for-elementor' ),
		'css'   => 'translateX',
	),
	'translate_y' => array(
		'label' => esc_html__( 'Translate Y', 'rb-addons-for-elementor' ),
		'css'   => 'translateY',
	),
	'rotate'      => array(
		'label' => esc_html__( 'Rotate', 'rb-addons-for-elementor' ),
		'css'   => 'rotate',
	),
	'scale'       => array(
		'label' => esc_html__( 'Scale', 'rb-addons-for-elementor' ),
		'css'   => 'scale',
	),
	'skew_x'      => array(
		'label' => esc_html__( 'Skew X', 'rb-addons-for-elementor' ),
		'css'   => 'skewX',
	),
	'skew_y'      => array(
		'label' => esc_html__( 'Skew Y', 'rb-addons-for-elementor' ),
		'css'   => 'skewY',
	),
);

foreach ( $rbelad_transforms as $rbelad_key => $rbelad_transform ) {

	$rbelad_transform_id = $rbelad_base_id . '_' . $rbelad_key;

	/*
	 * Unit.
	 *
	 * Rotate/Skew use deg.
	 * Scale does not require a CSS unit.
	 */
	$rbelad_transform_units = $rbelad_size_unit;

	if ( 'rotate' === $rbelad_key || 'skew_x' === $rbelad_key || 'skew_y' === $rbelad_key ) {
		$rbelad_transform_units = array( 'deg' );
	}

	if ( 'scale' === $rbelad_key ) {
		$rbelad_transform_units = array( '' );
	}

	/*
	 * Transform control.
	 */
	$this->add_responsive_control(
		$rbelad_transform_id,
		array(
			'label'      => $rbelad_transform['label'],
			'type'       => Controls_Manager::SLIDER,
			'size_units' => $rbelad_transform_units,
			'default'    => $rbelad_defaults[ $rbelad_key ],
			'selectors'  => array(
				$rbelad_selector => 'transform: ' . $rbelad_transform['css'] . '({{SIZE}}{{UNIT}});',
			),
			'condition'  => $rbelad_condition,
		)
	);
}
