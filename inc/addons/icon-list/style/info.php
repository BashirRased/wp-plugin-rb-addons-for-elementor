<?php
/**
 * List Style widget - Info style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_style_prefix( 'info' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// End Section Tab.
$this->end_controls_section();
