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
 * Default Values.
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
	 * Translate.
	 */
	'translate_x' => array(
		'size' => '',
		'unit' => 'px',
	),

	'translate_y' => array(
		'size' => '',
		'unit' => 'px',
	),

	/*
	 * Transform.
	 */
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
 * Merge User Supplied Defaults.
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
 * 1. POSITION.
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
 * 2. POSITION OFFSETS POPOVER.
 * ==========================================================================
 */

$rbelad_position_popover_id = $rbelad_base_id . '_offsets';

$this->add_control(
	$rbelad_position_popover_id . '_toggle',
	array(
		'label'        => esc_html__( 'Position Offset', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Off', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'On', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => array_merge(
			$rbelad_condition,
			array(
				$rbelad_position_id => array(
					'relative',
					'absolute',
				),
			)
		),
	)
);

$this->start_popover();

/*
 * Position offset controls.
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

$this->end_popover();

/*
 * ==========================================================================
 * 3. TRANSLATE POPOVER.
 * ==========================================================================
 */

$rbelad_translate_popover_id = $rbelad_base_id . '_translate';

$this->add_control(
	$rbelad_translate_popover_id . '_toggle',
	array(
		'label'        => esc_html__( 'Translate', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Off', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'On', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

/*
 * Translate X.
 */

$rbelad_translate_x_id = $rbelad_base_id . '_translate_x';

$this->add_responsive_control(
	$rbelad_translate_x_id,
	array(
		'label'      => esc_html__( 'Translate X', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => $rbelad_size_unit,
		'default'    => $rbelad_defaults['translate_x'],
		'selectors'  => array(
			$rbelad_selector => 'transform: translateX({{SIZE}}{{UNIT}});',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * Translate Y.
 */

$rbelad_translate_y_id = $rbelad_base_id . '_translate_y';

$this->add_responsive_control(
	$rbelad_translate_y_id,
	array(
		'label'      => esc_html__( 'Translate Y', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => $rbelad_size_unit,
		'default'    => $rbelad_defaults['translate_y'],
		'selectors'  => array(
			$rbelad_selector => 'transform: translateY({{SIZE}}{{UNIT}});',
		),
		'condition'  => $rbelad_condition,
	)
);

$this->end_popover();

/*
 * ==========================================================================
 * 4. TRANSFORM POPOVER.
 * ==========================================================================
 */

$rbelad_transform_popover_id = $rbelad_base_id . '_transform';

$this->add_control(
	$rbelad_transform_popover_id . '_toggle',
	array(
		'label'        => esc_html__( 'Transform', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Off', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'On', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

/*
 * --------------------------------------------------------------------------
 * Rotate.
 * --------------------------------------------------------------------------
 */

$rbelad_rotate_id = $rbelad_base_id . '_rotate';

$this->add_responsive_control(
	$rbelad_rotate_id,
	array(
		'label'      => esc_html__( 'Rotate', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'deg' ),
		'default'    => $rbelad_defaults['rotate'],
		'selectors'  => array(
			$rbelad_selector => 'transform: rotate({{SIZE}}{{UNIT}});',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Scale.
 * --------------------------------------------------------------------------
 */

$rbelad_scale_id = $rbelad_base_id . '_scale';

$this->add_responsive_control(
	$rbelad_scale_id,
	array(
		'label'      => esc_html__( 'Scale', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( '' ),
		'range'      => array(
			'' => array(
				'min'  => 0,
				'max'  => 3,
				'step' => 0.01,
			),
		),
		'default'    => $rbelad_defaults['scale'],
		'selectors'  => array(
			$rbelad_selector => 'transform: scale({{SIZE}});',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Skew X.
 * --------------------------------------------------------------------------
 */

$rbelad_skew_x_id = $rbelad_base_id . '_skew_x';

$this->add_responsive_control(
	$rbelad_skew_x_id,
	array(
		'label'      => esc_html__( 'Skew X', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'deg' ),
		'default'    => $rbelad_defaults['skew_x'],
		'selectors'  => array(
			$rbelad_selector => 'transform: skewX({{SIZE}}{{UNIT}});',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Skew Y.
 * --------------------------------------------------------------------------
 */

$rbelad_skew_y_id = $rbelad_base_id . '_skew_y';

$this->add_responsive_control(
	$rbelad_skew_y_id,
	array(
		'label'      => esc_html__( 'Skew Y', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'deg' ),
		'default'    => $rbelad_defaults['skew_y'],
		'selectors'  => array(
			$rbelad_selector => 'transform: skewY({{SIZE}}{{UNIT}});',
		),
		'condition'  => $rbelad_condition,
	)
);

$this->end_popover();
