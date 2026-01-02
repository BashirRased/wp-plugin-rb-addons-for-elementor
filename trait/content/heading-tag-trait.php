<?php
/**
 * Trait: Heading Tag Content
 *
 * Handles rendering HTML with different link types.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Heading_Tag_Content {
	/**
	 * Register Heading Tag Content controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 *
	 * @return void
	 */
	protected function register_heading_tag_content( $prefix ) {
		$prefix = is_string( $prefix ) ? $prefix : '';
		// =============================
		// Heading Tag Content
		// =============================
		$this->add_style_controls(
			$prefix . '_heading_tag_content',
			array(
				'controls' => array(
					// HTML Tag.
					'heading_tag' => array(
						'id' => $prefix . '_heading_tag',
					),
				),
			)
		);
	}
}
