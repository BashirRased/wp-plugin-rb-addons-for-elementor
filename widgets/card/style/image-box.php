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
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'img' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

/**
 * Border Control
 */
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'     => $prefix . '_border',
		'selector' => '{{WRAPPER}} .rbelad-card__img-wrap img',
	)
);

/**
 * Border Radius Control
 */
$this->add_control(
	$prefix . '_border_radius',
	array(
		'label'      => esc_html__( 'Border Radius', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem' ),
		'default'    => array(
			'top'      => '0',
			'right'    => '0',
			'bottom'   => '0',
			'left'     => '0',
			'unit'     => 'px',
			'isLinked' => true,
		),
		'selectors'  => array(
			'{{WRAPPER}} .rbelad-card__img-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);

/**
 * Box Shadow Control
 */
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'     => $prefix . '_box_shadow',
		'label'    => esc_html__( 'Box Shadow', 'rb-addons-for-elementor' ),
		'selector' => '{{WRAPPER}} .rbelad-card__img-wrap img',
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
			'{{WRAPPER}} .rbelad-card__img-wrap img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);

/**
 * Padding Control
 */
$this->add_responsive_control(
	$prefix . '_padding',
	array(
		'label'      => esc_html__( 'Padding', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem' ),
		'selectors'  => array(
			'{{WRAPPER}} .rbelad-card__img-wrap img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'{{WRAPPER}} .rbelad-card__img-wrap img' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);

/**
 * Height Control
 */
$this->add_responsive_control(
	$prefix . '_height',
	array(
		'label'      => esc_html__( 'Height', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%', 'vh', 'em', 'rem' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 1000,
			),
		),
		'selectors'  => array(
			'{{WRAPPER}} .rbelad-card__img-wrap img' => 'height: {{SIZE}}{{UNIT}};',
		),
	)
);

/**
 * Text Color Control
 */
$this->add_control(
	$prefix . '_bg_color',
	array(
		'label'     => esc_html__( 'Background Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .rbelad-card__img-wrap' => 'background-color: {{VALUE}};',
		),
	)
);

// End Section Tab.
$this->end_controls_section();
