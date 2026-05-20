<?php
/**
 * Image widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

// ==============================
// Settings
// ==============================
$settings = $this->get_settings_for_display(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
$prefix   = $this->get_section_content_prefix( 'general' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
