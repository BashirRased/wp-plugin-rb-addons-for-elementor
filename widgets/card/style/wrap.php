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
$prefix = $this->get_section_style_prefix( 'wrap' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Wrap', 'rb-addons-for-elementor' ),
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
		'selector' => '{{WRAPPER}} .rbelad-card__wrap',
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
			'{{WRAPPER}} .rbelad-card__wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		'selector' => '{{WRAPPER}} .rbelad-card__wrap',
	)
);

/**
 * Flex Direction
 */
$this->add_control(
	$prefix . '_flex_direction',
	array(
		'label'     => esc_html__( 'Flex Direction', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'row' => array(
				'title' => esc_html__( 'Row', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-right',
			),
			'column' => array(
				'title' => esc_html__( 'Column', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-down',
			),
			'row-reverse' => array(
				'title' => esc_html__( 'Row Reverse', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-left',
			),
			'column-reverse' => array(
				'title' => esc_html__( 'Column Reverse', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-up',
			),
		),
		'default'   => 'row',
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .rbelad-card__wrap' => 'flex-direction: {{VALUE}};',
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
			'{{WRAPPER}} .rbelad-card__wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);

/**
 * Background Color Control
 */
$this->add_control(
	$prefix . '_color',
	array(
		'label'     => esc_html__( 'Background Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .rbelad-card__wrap' => 'background-color: {{VALUE}};',
		),
	)
);

// End Section Tab.
$this->end_controls_section();
