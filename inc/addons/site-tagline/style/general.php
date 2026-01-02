<?php
/**
 * Site Tagline widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix          = 'rbelad_site_tagline_general_';
$description_cls = '{{WRAPPER}} .rbelad-site-tagline';

// Start Section Tab - Content.
$this->start_controls_section(
	'general_style',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// End Section Tab.
$this->end_controls_section();
