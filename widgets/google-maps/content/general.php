<?php
/**
 * Button widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

$this->start_controls_section(
	'content_section',
	array(
		'label' => esc_html__( 'Content', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

$this->add_control(
	'address',
	array(
		'label'       => esc_html__( 'Location Address', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'placeholder' => 'Dhaka, Bangladesh',
		'default'     => 'Dhaka, Bangladesh',
	)
);

$this->add_control(
	'zoom',
	array(
		'label'   => esc_html__( 'Zoom Level', 'rb-addons-for-elementor' ),
		'type'    => Controls_Manager::NUMBER,
		'min'     => 1,
		'max'     => 20,
		'default' => 10,
	)
);

$this->add_control(
	'height',
	array(
		'label'   => esc_html__( 'Height (px)', 'rb-addons-for-elementor' ),
		'type'    => Controls_Manager::NUMBER,
		'default' => 300,
	)
);

$this->end_controls_section();
