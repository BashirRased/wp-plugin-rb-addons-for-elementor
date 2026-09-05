<?php
/**
 * All style controls
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$rbelad_controls = ! empty( $rbelad_args['controls'] ) ? $rbelad_args['controls'] : array();
if ( ! empty( $rbelad_controls ) && is_array( $rbelad_controls ) ) {
	foreach ( $rbelad_controls as $rbelad_key => $rbelad_values ) {
		/**
		 * Control values.
		 *
		 * @var array<string, mixed> $rbelad_values
		 */
		switch ( $rbelad_key ) {
			/**
			 * =========================
			 * SELECT LINK TYPE
			 * =========================
			 */
			case 'select_link_type':
				require RBELAD_CONTROLS_RENDER_PATH . 'select-link.php';
				break;

			/**
			 * =========================
			 * RATING ICON
			 * =========================
			 */
			case 'rating_icon':
				require RBELAD_CONTROLS_RENDER_PATH . 'rating-icon.php';
				break;
		}
	}
}
