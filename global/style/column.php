<?php
/**
 * Responsive Column Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_base_id  = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'column';
$rbelad_selector = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';


// =========================
// HEADING
// =========================

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Column', 'rb-addons-for-elementor' ),
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
// RESPONSIVE COLUMN
// =========================

$this->add_responsive_control(
	$rbelad_base_id . '_column',
	array(
		'label'     => esc_html__( 'Column', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			'column-auto' => array(
				'title' => esc_html__( 'Auto', 'rb-addons-for-elementor' ),
			),
			'column-1'    => array(
				'title' => esc_html__( 'Column - 1', 'rb-addons-for-elementor' ),
			),
			'column-2'    => array(
				'title' => esc_html__( 'Column - 2', 'rb-addons-for-elementor' ),
			),
			'column-3'    => array(
				'title' => esc_html__( 'Column - 3', 'rb-addons-for-elementor' ),
			),
			'column-4'    => array(
				'title' => esc_html__( 'Column - 4', 'rb-addons-for-elementor' ),
			),
			'column-5'    => array(
				'title' => esc_html__( 'Column - 5', 'rb-addons-for-elementor' ),
			),
			'column-6'    => array(
				'title' => esc_html__( 'Column - 6', 'rb-addons-for-elementor' ),
			),
			'column-7'    => array(
				'title' => esc_html__( 'Column - 7', 'rb-addons-for-elementor' ),
			),
			'column-8'    => array(
				'title' => esc_html__( 'Column - 8', 'rb-addons-for-elementor' ),
			),
			'column-9'    => array(
				'title' => esc_html__( 'Column - 9', 'rb-addons-for-elementor' ),
			),
			'column-10'   => array(
				'title' => esc_html__( 'Column - 10', 'rb-addons-for-elementor' ),
			),
			'column-11'   => array(
				'title' => esc_html__( 'Column - 11', 'rb-addons-for-elementor' ),
			),
			'column-12'   => array(
				'title' => esc_html__( 'Column - 12', 'rb-addons-for-elementor' ),
			),
		),
		'default'   => 'auto',
		'selectors' => array(
			$rbelad_selector => 'width: calc(100% / {{VALUE}});',
		),
		'condition' => ! empty( $rbelad_values['condition'] )
			? $rbelad_values['condition']
			: array(),
	)
);
