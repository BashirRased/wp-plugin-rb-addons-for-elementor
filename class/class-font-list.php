<?php
/**
 * Font List Class for Elementor Controls
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Class Font_List
 */
class Font_List {

	/**
	 * Grouped font list (for internal use)
	 *
	 * @return array
	 */
	public static function grouped_options() {
		return array(
			'Default'    => array(
				'font_default' => 'Default',
			),

			'Sans Serif' => array(
				'roboto'            => 'Roboto',
				'poppins'           => 'Poppins',
				'montserrat'        => 'Montserrat',
				'lato'              => 'Lato',
				'open-sans'         => 'Open Sans',
				'nunito'            => 'Nunito',
				'jost'              => 'Jost',
				'work-sans'         => 'Work Sans',
				'dm-sans'           => 'DM Sans',
				'outfit'            => 'Outfit',
				'inter'             => 'Inter',
				'inter-tight'       => 'Inter Tight',
				'figtree'           => 'Figtree',
				'quicksand'         => 'Quicksand',
				'rubik'             => 'Rubik',
				'noto-sans'         => 'Noto Sans',
				'barlow'            => 'Barlow',
				'plus-jakarta-sans' => 'Plus Jakarta Sans',
				'bebas-neue'        => 'Bebas Neue',
				'oswald'            => 'Oswald',
				'raleway'           => 'Raleway',
				'anton'             => 'Anton',
				'teko'              => 'Teko',
				'manrope'           => 'Manrope',
				'mulish'            => 'Mulish',
				'urbanist'          => 'Urbanist',
				'karla'             => 'Karla',
			),

			'Serif'      => array(
				'playfair-display' => 'Playfair Display',
				'merriweather'     => 'Merriweather',
				'lora'             => 'Lora',
				'cormorant'        => 'Cormorant',
				'cinzel'           => 'Cinzel',
				'noto-serif'       => 'Noto Serif',
				'pt-serif'         => 'PT Serif',
				'abril-fatface'    => 'Abril Fatface',
			),

			'Cursive'    => array(
				'caveat'         => 'Caveat',
				'dancing-script' => 'Dancing Script',
				'pacifico'       => 'Pacifico',
				'great-vibes'    => 'Great Vibes',
				'satisfy'        => 'Satisfy',
			),
		);
	}

	/**
	 * Flattened options for Elementor SELECT control
	 *
	 * @param bool $with_group_label Add group prefix to label.
	 * @return array
	 */
	public static function options( $with_group_label = false ) {
		$grouped = self::grouped_options();
		$flat    = array();

		foreach ( $grouped as $group => $fonts ) {
			foreach ( $fonts as $key => $label ) {
				$flat[ $key ] = $with_group_label
					? $group . ' → ' . $label
					: $label;
			}
		}

		return $flat;
	}

	/**
	 * Get CSS font-family map
	 *
	 * @return array
	 */
	public static function css_map() {
		return array(
			// Default.
			'font_default'      => 'inherit',

			// Sans Serif.
			'roboto'            => '"Roboto", sans-serif',
			'poppins'           => '"Poppins", sans-serif',
			'montserrat'        => '"Montserrat", sans-serif',
			'lato'              => '"Lato", sans-serif',
			'open-sans'         => '"Open Sans", sans-serif',
			'nunito'            => '"Nunito", sans-serif',
			'jost'              => '"Jost", sans-serif',
			'work-sans'         => '"Work Sans", sans-serif',
			'dm-sans'           => '"DM Sans", sans-serif',
			'outfit'            => '"Outfit", sans-serif',
			'inter'             => '"Inter", sans-serif',
			'inter-tight'       => '"Inter Tight", sans-serif',
			'figtree'           => '"Figtree", sans-serif',
			'quicksand'         => '"Quicksand", sans-serif',
			'rubik'             => '"Rubik", sans-serif',
			'noto-sans'         => '"Noto Sans", sans-serif',
			'barlow'            => '"Barlow", sans-serif',
			'plus-jakarta-sans' => '"Plus Jakarta Sans", sans-serif',
			'bebas-neue'        => '"Bebas Neue", sans-serif',
			'oswald'            => '"Oswald", sans-serif',
			'raleway'           => '"Raleway", sans-serif',
			'anton'             => '"Anton", sans-serif',
			'teko'              => '"Teko", sans-serif',
			'manrope'           => '"Manrope", sans-serif',
			'mulish'            => '"Mulish", sans-serif',
			'urbanist'          => '"Urbanist", sans-serif',
			'karla'             => '"Karla", sans-serif',

			// Serif.
			'playfair-display'  => '"Playfair Display", serif',
			'merriweather'      => '"Merriweather", serif',
			'lora'              => '"Lora", serif',
			'cormorant'         => '"Cormorant", serif',
			'cinzel'            => '"Cinzel", serif',
			'noto-serif'        => '"Noto Serif", serif',
			'pt-serif'          => '"PT Serif", serif',
			'abril-fatface'     => '"Abril Fatface", serif',

			// Cursive.
			'caveat'            => '"Caveat", cursive',
			'dancing-script'    => '"Dancing Script", cursive',
			'pacifico'          => '"Pacifico", cursive',
			'great-vibes'       => '"Great Vibes", cursive',
			'satisfy'           => '"Satisfy", cursive',
		);
	}

	/**
	 * Get single font CSS value safely
	 *
	 * @param string $key Font key.
	 * @return string
	 */
	public static function get_css( $key ) {
		$map = self::css_map();

		return isset( $map[ $key ] ) ? $map[ $key ] : 'inherit';
	}
}
