<?php
/**
 * Archive Title widget content controls.
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
$prefix         = $section_prefix . 'general';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'archive-title' );

// Link Type Content.
$this->register_link_type_content( $prefix );

// Heading Tag Content.
$this->register_heading_tag_content( $prefix );

// End Section Tab.
$this->end_controls_section();
