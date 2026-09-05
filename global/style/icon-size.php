<?php
/**
 * Icon Size Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

$rbelad_base_id  = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'icon_size';
$rbelad_selector = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';


// =========================
// HEADING
// =========================

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Icon Size Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => ! empty( $rbelad_values['condition'] )
			? $rbelad_values['condition']
			: array(),
		'classes'     => 'rbelad-editor-heading-control',
	)
);


// =========================
// ICON SIZE
// =========================

$this->add_control(
	$rbelad_base_id . '_size',
	array(
		'label'      => esc_html__( 'Icon Size', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em', 'rem' ),

		'range'      => array(
			'px'  => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 1,
			),
			'em'  => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 0.1,
			),
			'rem' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 0.1,
			),
		),

		'default'    => ! empty( $rbelad_values['default'] )
			? $rbelad_values['default']
			: array(
				'unit' => 'px',
				'size' => 24,
			),

		'selectors'  => array(
			$rbelad_selector => 'font-size: {{SIZE}}{{UNIT}};',
		),

		'condition'  => ! empty( $rbelad_values['condition'] )
			? $rbelad_values['condition']
			: array(),
	)
);
