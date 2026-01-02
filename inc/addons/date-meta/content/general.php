<?php
/**
 * Date Meta widget style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$section_prefix = $this->get_section_prefix( 'content_section_' );

// Start Section Tab - Content.
$this->start_controls_section(
	$section_prefix . 'general',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'date-meta' );

// End Section Tab.
$this->end_controls_section();
