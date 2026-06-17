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
	 * Font list.
	 *
	 * @return array
	 */
	public static function get_fonts() {

		return array(
			'font_default'     => 'Default',

			'roboto'           => 'Roboto',
			'poppins'          => 'Poppins',
			'montserrat'       => 'Montserrat',
			'lato'             => 'Lato',
			'open-sans'        => 'Open Sans',
			'nunito'           => 'Nunito',
			'inter'            => 'Inter',
			'jost'             => 'Jost',
			'work-sans'        => 'Work Sans',
			'dm-sans'          => 'DM Sans',
			'outfit'           => 'Outfit',
			'figtree'          => 'Figtree',

			'playfair-display' => 'Playfair Display',
			'merriweather'     => 'Merriweather',
			'lora'             => 'Lora',

			'caveat'           => 'Caveat',
			'dancing-script'   => 'Dancing Script',
			'pacifico'         => 'Pacifico',
		);
	}


	/**
	 * Elementor options.
	 *
	 * @return array
	 */
	public static function options() {

		return self::get_fonts();
	}


	/**
	 * CSS font map.
	 *
	 * @return array
	 */
	public static function css_map() {

		return array(

			'font_default'     =>
				'inherit',

			'roboto'           =>
				'"Roboto", sans-serif',

			'poppins'          =>
				'"Poppins", sans-serif',

			'montserrat'       =>
				'"Montserrat", sans-serif',

			'lato'             =>
				'"Lato", sans-serif',

			'open-sans'        =>
				'"Open Sans", sans-serif',

			'nunito'           =>
				'"Nunito", sans-serif',

			'inter'            =>
				'"Inter", sans-serif',

			'jost'             =>
				'"Jost", sans-serif',

			'work-sans'        =>
				'"Work Sans", sans-serif',

			'dm-sans'          =>
				'"DM Sans", sans-serif',

			'outfit'           =>
				'"Outfit", sans-serif',

			'figtree'          =>
				'"Figtree", sans-serif',

			'playfair-display' =>
				'"Playfair Display", serif',

			'merriweather'     =>
				'"Merriweather", serif',

			'lora'             =>
				'"Lora", serif',

			'caveat'           =>
				'"Caveat", cursive',

			'dancing-script'   =>
				'"Dancing Script", cursive',

			'pacifico'         =>
				'"Pacifico", cursive',

		);
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
