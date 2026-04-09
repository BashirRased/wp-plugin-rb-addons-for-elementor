<?php
/**
 * Extend Elementor background size control.
 *
 * Adds RB Custom option and width/height responsive controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Extend background size control.
 *
 * @param \Elementor\Element_Base $element Elementor element instance.
 * @return void
 */
function rbelad_extend_background_size_control( $element ) {

	$element->update_control(
		'background_size',
		array(
			'options' => array(
				''          => esc_html__( 'Default', 'rb-addons-for-elementor' ),
				'auto'      => esc_html__( 'Auto', 'rb-addons-for-elementor' ),
				'cover'     => esc_html__( 'Cover', 'rb-addons-for-elementor' ),
				'contain'   => esc_html__( 'Contain', 'rb-addons-for-elementor' ),
				'initial'   => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
				'rb_custom' => esc_html__( 'RB Custom', 'rb-addons-for-elementor' ),
			),
		)
	);

	$element->add_responsive_control(
		'rbelad_bg_width',
		array(
			'label'      => esc_html__( 'Width', 'rb-addons-for-elementor' ),
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => array( '%', 'px', 'vw' ),
			'condition'  => array(
				'background_size' => 'rb_custom',
			),
		)
	);

	$element->add_responsive_control(
		'rbelad_bg_height',
		array(
			'label'      => esc_html__( 'Height', 'rb-addons-for-elementor' ),
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => array( '%', 'px', 'vh' ),
			'selectors'  => array(
				'{{WRAPPER}}' => 'background-size: {{rbelad_bg_width.SIZE}}{{rbelad_bg_width.UNIT}} {{SIZE}}{{UNIT}};',
			),
			'condition'  => array(
				'background_size' => 'rb_custom',
			),
		)
	);
}
add_action( 'elementor/element/container/section_background/before_section_end', 'rbelad_extend_background_size_control', 10, 1 );
