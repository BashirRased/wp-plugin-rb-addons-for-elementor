<?php
/**
 * Spacing Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

if ( ! isset( $rbelad_values ) || ! is_array( $rbelad_values ) ) {
	$rbelad_values = array();
}
$rbelad_base_id   = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'spacing';
$rbelad_size_unit = ! empty( $rbelad_values['size_unit'] ) ? $rbelad_values['size_unit'] : rbelad_slider_unit();
$rbelad_selector  = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] ) ? $rbelad_values['heading_label'] : esc_html__( 'Spacing Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
		'classes'     => 'rbelad-editor-heading-control',
	)
);

$rbelad_controls = array(
	'margin'  => array(
		'label'   => esc_html__( 'Margin', 'rb-addons-for-elementor' ),
		'default' => array(
			'top'      => '',
			'right'    => '',
			'bottom'   => '',
			'left'     => '',
			'unit'     => 'px',
			'isLinked' => true,
		),
	),
	'padding' => array(
		'label'   => esc_html__( 'Padding', 'rb-addons-for-elementor' ),
		'default' => array(
			'top'      => '',
			'right'    => '',
			'bottom'   => '',
			'left'     => '',
			'unit'     => 'px',
			'isLinked' => true,
		),
	),
);

foreach ( $rbelad_controls as $rbelad_property => $rbelad_control ) {

	$rbelad_default = ! empty( $rbelad_values[ $rbelad_property . '_default' ] ) && is_array( $rbelad_values[ $rbelad_property . '_default' ] )
		? $rbelad_values[ $rbelad_property . '_default' ]
		: $rbelad_control['default'];

	$this->add_responsive_control(
		$rbelad_base_id . '_' . $rbelad_property,
		array(
			'label'      => $rbelad_control['label'],
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => $rbelad_size_unit,
			'default'    => $rbelad_default,
			'selectors'  => array(
				$rbelad_selector => sprintf(
					'%1$s: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					str_replace( '_', '-', $rbelad_property )
				),
			),
			'condition'  => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
		)
	);
}
