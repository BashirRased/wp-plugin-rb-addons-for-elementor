<?php
/**
 * Text Alignment Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

$rbelad_base_id  = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : '_text_align';
$rbelad_selector = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] ) ? $rbelad_values['heading_label'] : esc_html__( 'Text Alignment Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
		'classes'     => 'rbelad-editor-heading-control',
	)
);

/**
 * Text Alignment Control
 */
$rbelad_text_align = is_rtl() ? 'right' : 'left';
$this->add_control(
	$rbelad_base_id . '_text_align',
	array(
		'label'     => ! empty( $rbelad_values['text_label'] ) ? $rbelad_values['text_label'] : esc_html__( 'Text Alignment', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'left'    => array(
				'title' => esc_html__( 'Left', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center'  => array(
				'title' => esc_html__( 'Center', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'   => array(
				'title' => esc_html__( 'Right', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
			'justify' => array(
				'title' => esc_html__( 'Justify', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-justify',
			),
		),
		'default'   => ! empty( $rbelad_values['text_align_default'] ) ? $rbelad_values['text_align_default'] : $rbelad_text_align,
		'selectors' => array(
			$rbelad_selector => 'text-align: {{VALUE}};',
		),
	)
);
