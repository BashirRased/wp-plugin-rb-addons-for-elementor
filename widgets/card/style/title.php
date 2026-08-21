<?php
/**
 * Card widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'title' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-card__title';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Title', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

$this->add_control(
	$rbelad_prefix . '_before_title_heading',
	array(
		'label'     => esc_html__( 'Title Before', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::HEADING,
		'separator' => 'before',
	)
);

/**
 * Width Control
 */
$this->add_responsive_control(
	$rbelad_prefix . '_before_width',
	array(
		'label'      => esc_html__( 'Before Width', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%', 'vw', 'em', 'rem' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 1000,
			),
			'%'  => array(
				'min' => 0,
				'max' => 100,
			),
		),
		'selectors'  => array(
			'{{WRAPPER}} .rbelad-card__title::before' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);

/**
 * Height Control
 */
$this->add_responsive_control(
	$rbelad_prefix . '_before_height',
	array(
		'label'      => esc_html__( 'Before Height', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%', 'vh', 'em', 'rem' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 1000,
			),
		),
		'selectors'  => array(
			'{{WRAPPER}} .rbelad-card__title::before' => 'height: {{SIZE}}{{UNIT}};',
		),
	)
);

/**
 * Text Color Control
 */
$this->add_control(
	$rbelad_prefix . '_before_bg_color',
	array(
		'label'     => esc_html__( 'Before Background Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .rbelad-card__title::before' => 'background-color: {{VALUE}};',
		),
	)
);

/**
 * Height Control
 */
$this->add_responsive_control(
	$rbelad_prefix . '_before_bottom',
	array(
		'label'      => esc_html__( 'Bottom', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%', 'vh', 'em', 'rem' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 1000,
			),
		),
		'selectors'  => array(
			'{{WRAPPER}} .rbelad-card__title::before' => 'bottom: {{SIZE}}{{UNIT}};',
		),
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'rbelad_typography' => array(
				'id'           => $rbelad_prefix . '_rbelad_typography',
				'select_class' => $rbelad_class_1,
			),
			'text_color'        => array(
				'id'           => $rbelad_prefix . '_text_color',
				'select_class' => $rbelad_class_1,
			),
			'height_width'      => array(
				'id'           => $rbelad_prefix . '_height_width',
				'select_class' => $rbelad_class_1,
			),
			'box_style'         => array(
				'id'           => $rbelad_prefix . '_box_style',
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
