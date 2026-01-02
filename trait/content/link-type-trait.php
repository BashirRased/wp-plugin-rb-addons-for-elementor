<?php
/**
 * Trait: Link Type Content
 *
 * Handles rendering HTML with different link types.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Link_Type_Content {
	/**
	 * Register Heading Tag Content controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 *
	 * @return void
	 */
	protected function register_link_type_content( $prefix ) {
		$prefix = is_string( $prefix ) ? $prefix : '';
		// =============================
		// Heading Tag Content
		// =============================
		$this->add_style_controls(
			$prefix . '_link_type_content',
			array(
				'controls' => array(
					// Link Type.
					'link_type'   => array(
						'id'      => $prefix . '_link_type',
						'default' => 'default',
					),

					// Custom Link.
					'custom_link' => array(
						'id'        => $prefix . '_custom_link',
						'condition' => array(
							$prefix . '_link_type' => 'custom',
						),
					),

					// Select Page.
					'page_link'   => array(
						'id'        => $prefix . '_page_link',
						'condition' => array(
							$prefix . '_link_type' => 'page',
						),
					),
				),
			)
		);
	}
}
