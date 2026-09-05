<?php
/**
 * All style controls
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

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
			 * CUSTOM TYPOGRAPHY
			 * =========================
			 */
			case 'rbelad_typography':
				require RBELAD_CONTROLS_STYLE_PATH . 'custom-typography.php';
				break;

			/**
			 * =========================
			 * HEIGHT & WIDTH
			 * =========================
			 */
			case 'height_width':
				require RBELAD_CONTROLS_STYLE_PATH . 'width-height.php';
				break;

			/**
			 * =========================
			 * SPACING
			 * =========================
			 */
			case 'spacing':
				require RBELAD_CONTROLS_STYLE_PATH . 'spacing.php';
				break;

			/**
			 * =========================
			 * BORDER
			 * =========================
			 */
			case 'border':
				require RBELAD_CONTROLS_STYLE_PATH . 'border.php';
				break;

			/**
			 * =========================
			 * DISPLAY
			 * =========================
			 */
			case 'display':
				require RBELAD_CONTROLS_STYLE_PATH . 'display.php';
				break;

			/**
			 * =========================
			 * POSITION
			 * =========================
			 */
			case 'position':
				require RBELAD_CONTROLS_STYLE_PATH . 'position.php';
				break;

			/**
			 * =========================
			 * FLEX
			 * =========================
			 */
			case 'flex':
				require RBELAD_CONTROLS_STYLE_PATH . 'flex.php';
				break;

			/**
			 * =========================
			 * SELECT COLUMNS
			 * =========================
			 */
			case 'column':
				require RBELAD_CONTROLS_STYLE_PATH . 'column.php';
				break;

			/**
			 * =========================
			 * TEXT COLOR
			 * =========================
			 */
			case 'text_color':
				require RBELAD_CONTROLS_STYLE_PATH . 'text-color.php';
				break;

			/**
			 * =========================
			 * TEXT HOVER COLOR
			 * =========================
			 */
			case 'text_hover_color':
				require RBELAD_CONTROLS_STYLE_PATH . 'text-hover-color.php';
				break;

			/**
			 * =========================
			 * BACKGROUND COLOR
			 * =========================
			 */
			case 'bg_color':
				require RBELAD_CONTROLS_STYLE_PATH . 'bg-color.php';
				break;

			/**
			 * =========================
			 * Text Alignment
			 * =========================
			 */
			case 'text_alignment':
				require RBELAD_CONTROLS_STYLE_PATH . 'text-align.php';
				break;

			/**
			 * =========================
			 * ICON SIZE
			 * =========================
			 */
			case 'icon_size':
				require RBELAD_CONTROLS_STYLE_PATH . 'icon-size.php';
				break;

			// /**
			// * =========================
			// * ICON SIZE
			// * =========================
			// */
			case 'icon_style':
			case 'icon_style_2':
			case 'icon_style_3':
				require RBELAD_CONTROLS_STYLE_PATH . 'icon-style.php';
				break;

			// /**
			// * =========================
			// * BACKGROUND COLOR
			// * =========================
			// */
			case 'box_style':
			case 'box_style_2':
				require RBELAD_CONTROLS_STYLE_PATH . 'box-style.php';
				break;
		}
	}
}
