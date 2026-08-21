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
 * Class Font_List
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
				'font_default' => 'Default',
			),

			'Sans Serif' => array(
				'inter'             => 'Inter',
				'roboto'            => 'Roboto',
				'open-sans'         => 'Open Sans',
				'poppins'           => 'Poppins',
				'montserrat'        => 'Montserrat',
				'lato'              => 'Lato',
				'nunito'            => 'Nunito',
				'work-sans'         => 'Work Sans',
				'dm-sans'           => 'DM Sans',
				'plus-jakarta-sans' => 'Plus Jakarta Sans',
				'raleway'           => 'Raleway',
				'oswald'            => 'Oswald',
				'quicksand'         => 'Quicksand',
				'josefin-sans'      => 'Josefin Sans',
				'figtree'           => 'Figtree',
				'lexend'            => 'Lexend',
				'syne'              => 'Syne',
				'urbanist'          => 'Urbanist',
			),

			'Serif'      => array(
				'merriweather'       => 'Merriweather',
				'playfair-display'   => 'Playfair Display',
				'lora'               => 'Lora',
				'eb-garamond'        => 'EB Garamond',
				'source-serif-4'     => 'Source Serif 4',
				'bitter'             => 'Bitter',
				'cormorant-garamond' => 'Cormorant Garamond',
				'libre-baskerville'  => 'Libre Baskerville',
				'domine'             => 'Domine',
				'spectral'           => 'Spectral',
				'rokkitt'            => 'Rokkitt',
				'fraunces'           => 'Fraunces',
			),
			'Cursive'    => array(
				'caveat'           => 'Caveat',
				'pacifico'         => 'Pacifico',
				'dancing-script'   => 'Dancing Script',
				'satisfy'          => 'Satisfy',
				'great-vibes'      => 'Great Vibes',
				'tangerine'        => 'Tangerine',
				'sacramento'       => 'Sacramento',
				'playball'         => 'Playball',
				'indie-flower'     => 'Indie Flower',
				'permanent-marker' => 'Permanent Marker',
				'patrick-hand'     => 'Patrick Hand',
				'kalam'            => 'Kalam',
			),
			'Monospace'  => array(
				'roboto-mono'     => 'Roboto Mono',
				'fira-code'       => 'Fira Code',
				'jetbrains-mono'  => 'JetBrains Mono',
				'source-code-pro' => 'Source Code Pro',
				'space-mono'      => 'Space Mono',
				'ibm-plex-mono'   => 'IBM Plex Mono',
			),
		);
	}

	/**
	 * Elementor options.
	 *
	 * @return array
	 */
	public static function options() {
		$fonts = array();
		foreach ( self::categories() as $group ) {
			$fonts = array_merge( $fonts, $group );
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
			$groups[] = array(
				'label'   => $label,
				'options' => $fonts,
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

			foreach ( $fonts as $slug => $name ) {

				if ( 'font_default' === $slug ) {
					continue;
				}

				// Choose fallback based on category or slug.
				$fallback = 'sans-serif';

				if ( in_array( $slug, array( 'abril-fatface', 'cinzel', 'cormorant', 'instrument-serif', 'lora', 'merriweather', 'noto-serif', 'playfair-display', 'pt-serif' ), true ) ) {
					$fallback = 'serif';
				} elseif ( in_array( $slug, array( 'courier-prime', 'cutive-mono' ), true ) ) {
					$fallback = 'monospace';
				} elseif ( in_array( $slug, array( 'caveat', 'dancing-script', 'great-vibes', 'pacifico', 'satisfy' ), true ) ) {
					$fallback = 'cursive';
				}

				$map[ $slug ] = sprintf(
					'"%s", %s',
					$name,
					$fallback
				);
			}
		}

		return $map;
	}

	/**
	 * Get CSS value.
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
