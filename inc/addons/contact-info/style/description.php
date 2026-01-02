<?php
/**
 * Contact Info widget - Description style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix          = 'rbelad_contact_info_description_';
$description_cls = '{{WRAPPER}} .rbelad-contact-info-text';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// End Section Tab.
$this->end_controls_section();
