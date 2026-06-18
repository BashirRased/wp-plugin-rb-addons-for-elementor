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
use Elementor\Group_Control_Typography;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'description' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Description', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

/**
 * Typography Control
 */
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => $prefix . '_typography',
		'label'    => esc_html__( 'Typography', 'rb-addons-for-elementor' ),
		'selector' => '{{WRAPPER}} .rbelad-card__desc',
	)
);

/**
 * Text Color Control
 */
$this->add_control(
	$prefix . '_color',
	array(
		'label'     => esc_html__( 'Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .rbelad-card__desc' => 'color: {{VALUE}};',
		),
	)
);

/**
 * Margin Control
 */
$this->add_responsive_control(
	$prefix . '_margin',
	array(
		'label'      => esc_html__( 'Margin', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem' ),
		'selectors'  => array(
			'{{WRAPPER}} .rbelad-card__desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);

/**
 * Width Control
 */
$this->add_responsive_control(
	$prefix . '_width',
	array(
		'label'      => esc_html__( 'Width', 'rb-addons-for-elementor' ),
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
			'{{WRAPPER}} .rbelad-card__desc' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);

// End Section Tab.
$this->end_controls_section();
