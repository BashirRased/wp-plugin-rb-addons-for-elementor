<?php
/**
 * Background Color Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

/**
 * --------------------------------------------------------------------------
 * Values.
 * --------------------------------------------------------------------------
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

/**
 * Base ID.
 */
$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? sanitize_key( $rbelad_values['id'] )
	: 'bg_color';

/**
 * Selector.
 */
$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

/**
 * Defaults.
 */
$rbelad_defaults = isset( $rbelad_values['defaults'] ) && is_array( $rbelad_values['defaults'] )
	? $rbelad_values['defaults']
	: array();

/**
 * Condition.
 */
$rbelad_condition = isset( $rbelad_values['condition'] ) && is_array( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/**
 * Heading label.
 */
$rbelad_heading_label = ! empty( $rbelad_values['heading_label'] )
	? $rbelad_values['heading_label']
	: esc_html__( 'Background Controls', 'rb-addons-for-elementor' );

/**
 * --------------------------------------------------------------------------
 * Default values.
 * --------------------------------------------------------------------------
 */

$rbelad_type = isset( $rbelad_defaults['type'] )
	? $rbelad_defaults['type']
	: 'color';

$rbelad_color = isset( $rbelad_defaults['color'] )
	? $rbelad_defaults['color']
	: '';

$rbelad_gradient = isset( $rbelad_defaults['gradient'] )
	? $rbelad_defaults['gradient']
	: '';

$rbelad_image = isset( $rbelad_defaults['image'] ) && is_array( $rbelad_defaults['image'] )
	? $rbelad_defaults['image']
	: array();

$rbelad_size = isset( $rbelad_defaults['size'] )
	? $rbelad_defaults['size']
	: 'cover';

$rbelad_position = isset( $rbelad_defaults['position'] )
	? $rbelad_defaults['position']
	: 'center center';

$rbelad_repeat = isset( $rbelad_defaults['repeat'] )
	? $rbelad_defaults['repeat']
	: 'no-repeat';

/**
 * --------------------------------------------------------------------------
 * Conditions.
 * --------------------------------------------------------------------------
 */

$rbelad_color_condition = array_merge(
	$rbelad_condition,
	array(
		$rbelad_base_id . '_type' => 'color',
	)
);

$rbelad_gradient_condition = array_merge(
	$rbelad_condition,
	array(
		$rbelad_base_id . '_type' => 'gradient',
	)
);

$rbelad_image_condition = array_merge(
	$rbelad_condition,
	array(
		$rbelad_base_id . '_type' => 'image',
	)
);

/**
 * --------------------------------------------------------------------------
 * Background Heading.
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

/**
 * --------------------------------------------------------------------------
 * Background Type.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_type',
	array(
		'label'     => esc_html__( 'Background', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'color'    => array(
				'title' => esc_html__( 'Color', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-paint-brush',
			),
			'gradient' => array(
				'title' => esc_html__( 'Gradient Color', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-background',
			),
			'image'    => array(
				'title' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-image',
			),
		),
		'default'   => $rbelad_type,
		'toggle'    => true,
		'condition' => $rbelad_condition,
	)
);

/**
 * --------------------------------------------------------------------------
 * Background Color.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_color',
	array(
		'label'     => esc_html__( 'Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => $rbelad_color,
		'selectors' => array(
			$rbelad_selector => 'background-color: {{VALUE}};',
		),
		'condition' => $rbelad_color_condition,
	)
);

/**
 * --------------------------------------------------------------------------
 * Gradient.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_gradient',
	array(
		'label'       => esc_html__( 'Gradient', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXTAREA,
		'rows'        => 3,
		'placeholder' => 'linear-gradient(90deg, #000000 0%, #ffffff 100%)',
		'description' => esc_html__(
			'Enter any valid CSS gradient value.',
			'rb-addons-for-elementor'
		),
		'default'     => $rbelad_gradient,
		'selectors'   => array(
			$rbelad_selector => 'background-image: {{VALUE}};',
		),
		'condition'   => $rbelad_gradient_condition,
	)
);

/**
 * --------------------------------------------------------------------------
 * Background Image.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_image',
	array(
		'label'     => esc_html__( 'Image', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::MEDIA,
		'dynamic'   => array(
			'active' => true,
		),
		'default'   => $rbelad_image,
		'selectors' => array(
			$rbelad_selector => 'background-image: url("{{URL}}");',
		),
		'condition' => $rbelad_image_condition,
	)
);

/**
 * --------------------------------------------------------------------------
 * Background Image Size.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_image_size',
	array(
		'label'     => esc_html__( 'Image Size', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			'auto'      => esc_html__( 'Auto', 'rb-addons-for-elementor' ),
			'cover'     => esc_html__( 'Cover', 'rb-addons-for-elementor' ),
			'contain'   => esc_html__( 'Contain', 'rb-addons-for-elementor' ),
			'100% 100%' => esc_html__( 'Full', 'rb-addons-for-elementor' ),
		),
		'default'   => $rbelad_size,
		'selectors' => array(
			$rbelad_selector => 'background-size: {{VALUE}};',
		),
		'condition' => $rbelad_image_condition,
	)
);

/**
 * --------------------------------------------------------------------------
 * Background Image Position.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_image_position',
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
		'default'   => $rbelad_position,
		'selectors' => array(
			$rbelad_selector => 'background-position: {{VALUE}};',
		),
		'condition' => $rbelad_image_condition,
	)
);

/**
 * --------------------------------------------------------------------------
 * Background Image Repeat.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_image_repeat',
	array(
		'label'     => esc_html__( 'Image Repeat', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			'no-repeat' => esc_html__( 'No Repeat', 'rb-addons-for-elementor' ),
			'repeat'    => esc_html__( 'Repeat', 'rb-addons-for-elementor' ),
			'repeat-x'  => esc_html__( 'Repeat X', 'rb-addons-for-elementor' ),
			'repeat-y'  => esc_html__( 'Repeat Y', 'rb-addons-for-elementor' ),
		),
		'default'   => $rbelad_repeat,
		'selectors' => array(
			$rbelad_selector => 'background-repeat: {{VALUE}};',
		),
		'condition' => $rbelad_image_condition,
	)
);
