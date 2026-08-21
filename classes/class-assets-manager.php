<?php
/**
 * Elementor & Admin assets.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Classes;

use RBELAD_Elementor_Addons\Font_List;

defined( 'ABSPATH' ) || exit;

/**
 * CSS & JS controller class.
 */
class Assets_Manager {
	/**
	 * Add Google Fonts.
	 *
	 * @return string
	 */
	private static function google_fonts_url() {

		$categories = Font_List::categories();

		$fonts = array();

		foreach ( $categories as $category => $items ) {

			// Skip Default font.
			if ( 'Default' === $category ) {
				continue;
			}

			foreach ( $items as $font_name ) {

				if ( empty( $font_name ) ) {
					continue;
				}

				$fonts[ $font_name ] = $font_name;
			}
		}

		if ( empty( $fonts ) ) {
			return '';
		}

		$families = array();

		$font_weight = '0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

		foreach ( $fonts as $font_name ) {

			$family = str_replace(
				'%20',
				'+',
				rawurlencode( $font_name )
			);

			$families[] = 'family=' . $family;
		}

		return 'https://fonts.googleapis.com/css2?'
		. implode( '&', $families )
		. ':ital,wght@' . $font_weight . '&display=swap';
	}

	/**
	 * Frontend  assets (CSS + JS).
	 */
	public static function frontend_assets() {
		wp_enqueue_style(
			'rbelad-google-fonts',
			self::google_fonts_url(),
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-layout',
			RBELAD_CSS_URL . 'layout.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS_URL . 'rbelad-general-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-b-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			array(),
			time()
		);
	}

	/**
	 * Elementor editor assets (CSS + JS).
	 */
	public static function editor_assets() {
		wp_enqueue_style(
			'rbelad-google-fonts',
			self::google_fonts_url(),
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-layout',
			RBELAD_CSS_URL . 'layout.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-editor',
			RBELAD_CSS_URL . 'editor.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS_URL . 'rbelad-general-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-b-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			array(),
			time()
		);
	}

	/**
	 * Admin dashboard assets (CSS + JS).
	 */
	public static function admin_assets() {
		wp_enqueue_style(
			'rbelad-google-fonts',
			self::google_fonts_url(),
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-layout',
			RBELAD_CSS_URL . 'layout.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-review',
			RBELAD_CSS_URL . 'review.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS_URL . 'rbelad-general-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-b-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			array(),
			time()
		);

		wp_enqueue_script(
			'rbelad-dashboard-menu',
			RBELAD_JS_URL . 'dashboard-menu.js',
			'',
			time(),
			true
		);
	}
}
