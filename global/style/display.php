<?php
/**
 * Flex Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

$rbelad_base_id  = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'display';
$rbelad_selector = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';

// =========================
// HEADING
// =========================
$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Display Controls', 'rb-addons-for-elementor' ),
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
// DISPLAY
// =========================
$this->add_control(
	$rbelad_base_id . '_display',
	array(
		'label'     => esc_html__( 'Display', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'block'        => array(
				'title' => esc_html__( 'Block', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-v-align-bottom',
			),
			'inline-block' => array(
				'title' => esc_html__( 'Inline Block', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			),
			'inline'       => array(
				'title' => esc_html__( 'Inline', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-ellipsis-h',
			),
		),
		'default'   => ! empty( $rbelad_values['default'] )
			? $rbelad_values['default']
			: 'block',
		'toggle'    => true,
		'selectors' => array(
			$rbelad_selector => 'display: {{VALUE}};',
		),
		'condition' => ! empty( $rbelad_values['condition'] )
			? $rbelad_values['condition']
			: array(),
	)
);
