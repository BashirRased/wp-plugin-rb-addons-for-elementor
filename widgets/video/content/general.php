<?php
/**
 * Video widget content controls.
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
	'video_url',
	array(
		'label'       => esc_html__( 'Video URL', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'placeholder' => 'https://www.youtube.com/watch?v=xxxx',
		'default'     => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
	)
);

$this->add_control(
	'autoplay',
	array(
		'label'        => esc_html__( 'Autoplay', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => 'Yes',
		'label_off'    => 'No',
		'return_value' => 'yes',
		'default'      => '',
	)
);

$this->add_control(
	'loop',
	array(
		'label'        => esc_html__( 'Loop', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => 'Yes',
		'label_off'    => 'No',
		'return_value' => 'yes',
		'default'      => '',
	)
);

$this->add_control(
	'mute',
	array(
		'label'        => esc_html__( 'Mute', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => 'Yes',
		'label_off'    => 'No',
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);

$this->end_controls_section();
