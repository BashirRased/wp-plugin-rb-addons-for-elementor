<?php
/**
 * Font List Helper.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Font_List.
 */
class Font_List {

	/**
	 * Font Categories.
	 *
	 * @return array
	 */
	public static function categories() {
		return array(
			'Default'    => array(
				'font_default' => array(
					'label'    => 'Default',
					'fallback' => 'inherit',
					'regular'  => true,
				),
			),

			'Sans Serif' => array(
				'arial-rounded-mt' => array(
					'label'    => 'Arial Rounded MT',
					'fallback' => 'sans-serif',
					'regular'  => true,
				),

				'bauhaus-93'       => array(
					'label'    => 'Bauhaus 93',
					'fallback' => 'sans-serif',
					'regular'  => true,
				),

				'myriad-pro'       => array(
					'label'    => 'Myriad Pro',
					'fallback' => 'sans-serif',
				),

				'broadway'         => array(
					'label'    => 'Broadway',
					'fallback' => 'sans-serif',
					'regular'  => true,
				),
			),

			'Serif'      => array(
				'bell-mt'           => array(
					'label'    => 'Bell MT',
					'fallback' => 'serif',
					'regular'  => true,
				),

				'bodoni-mt'         => array(
					'label'    => 'Bodoni MT',
					'fallback' => 'serif',
					'regular'  => true,
				),

				'book-antiqua'      => array(
					'label'    => 'Book Antiqua',
					'fallback' => 'serif',
					'regular'  => true,
				),

				'bookman-old-style' => array(
					'label'    => 'Bookman Old Style',
					'fallback' => 'serif',
					'regular'  => true,
				),

				'bricktown'         => array(
					'label'    => 'Bricktown',
					'fallback' => 'serif',
					'regular'  => true,
				),

				'trajan-pro'        => array(
					'label'    => 'Trajan Pro',
					'fallback' => 'serif',
					'regular'  => true,
				),
			),
		);
	}

	/**
	 * Get font data.
	 *
	 * @param string $font Font key.
	 *
	 * @return array
	 */
	public static function get( $font ) {
		foreach ( self::categories() as $fonts ) {
			if ( isset( $fonts[ $font ] ) ) {
				return $fonts[ $font ];
			}
		}

		return array();
	}

	/**
	 * Elementor font options.
	 *
	 * @return array
	 */
	public static function options() {
		$fonts = array();

		foreach ( self::categories() as $group ) {
			foreach ( $group as $slug => $font ) {
				$fonts[ $slug ] = $font['label'];
			}
		}

		return $fonts;
	}

	/**
	 * Elementor grouped font options.
	 *
	 * @return array
	 */
	public static function groups() {
		$groups = array();

		foreach ( self::categories() as $label => $fonts ) {

			$options = array();

			foreach ( $fonts as $slug => $font ) {
				$options[ $slug ] = $font['label'];
			}

			$groups[] = array(
				'label'   => $label,
				'options' => $options,
			);
		}

		return $groups;
	}

	/**
	 * CSS font map.
	 *
	 * @return array
	 */
	public static function css_map() {
		$map = array(
			'font_default' => 'inherit',
		);

		foreach ( self::categories() as $fonts ) {

			foreach ( $fonts as $slug => $font ) {

				if ( 'font_default' === $slug ) {
					continue;
				}

				$fallback = ! empty( $font['fallback'] )
					? $font['fallback']
					: 'sans-serif';

				$map[ $slug ] = sprintf(
					'"%s", %s',
					$font['label'],
					$fallback
				);
			}
		}

		return $map;
	}

	/**
	 * Get CSS font value.
	 *
	 * @param string $font Font key.
	 *
	 * @return string
	 */
	public static function get_css( $font ) {
		$fonts = self::css_map();

		return isset( $fonts[ $font ] )
			? $fonts[ $font ]
			: 'inherit';
	}
}
