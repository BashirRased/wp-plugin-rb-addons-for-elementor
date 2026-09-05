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

/**
 * Controls variables.
 */
$rbelad_base_id  = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'column';
$rbelad_selector = ! empty( $rbelad_values['select_class'] ) ? $rbelad_values['select_class'] : '{{WRAPPER}}';

/**
 * Default column.
 *
 * Expected values:
 * auto, 1, 2, 3 ... 12
 */
$rbelad_default_column = isset( $rbelad_values['default'] )
	? $rbelad_values['default']
	: 'auto';

/**
 * Control condition.
 */
$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();


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
		'condition'   => $rbelad_condition,
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
			'auto' => esc_html__( 'Auto', 'rb-addons-for-elementor' ),

			'1'    => esc_html__( 'Column - 1', 'rb-addons-for-elementor' ),
			'2'    => esc_html__( 'Column - 2', 'rb-addons-for-elementor' ),
			'3'    => esc_html__( 'Column - 3', 'rb-addons-for-elementor' ),
			'4'    => esc_html__( 'Column - 4', 'rb-addons-for-elementor' ),
			'5'    => esc_html__( 'Column - 5', 'rb-addons-for-elementor' ),
			'6'    => esc_html__( 'Column - 6', 'rb-addons-for-elementor' ),
			'7'    => esc_html__( 'Column - 7', 'rb-addons-for-elementor' ),
			'8'    => esc_html__( 'Column - 8', 'rb-addons-for-elementor' ),
			'9'    => esc_html__( 'Column - 9', 'rb-addons-for-elementor' ),
			'10'   => esc_html__( 'Column - 10', 'rb-addons-for-elementor' ),
			'11'   => esc_html__( 'Column - 11', 'rb-addons-for-elementor' ),
			'12'   => esc_html__( 'Column - 12', 'rb-addons-for-elementor' ),
		),

		'default'   => $rbelad_default_column,

		'selectors' => array(
			$rbelad_selector => 'width: calc(100% / {{VALUE}});',
		),

		'condition' => $rbelad_condition,
	)
);
