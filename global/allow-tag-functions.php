<?php
/**
 * All allow tag functions
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Escaped title HTML tags.
 *
 * @param string $rbelad_tag     Input title tag.
 * @param string $rbelad_default Default tag if no valid match is found.
 * @param array  $rbelad_extra   Additional supported tags.
 *
 * @return string Valid HTML tag.
 */
function rbelad_escape_tags( $rbelad_tag, $rbelad_default = 'span', $rbelad_extra = array() ) {

	$rbelad_supports = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p' );

	$rbelad_supports = array_merge( $rbelad_supports, $rbelad_extra );

	if ( ! in_array( $rbelad_tag, $rbelad_supports, true ) ) {
		return $rbelad_default;
	}

	return $rbelad_tag;
}

/**
 * Get a list of all the allowed html tags.
 *
 * @param string $rbelad_level Allowed levels are basic and intermediate.
 * @return array
 */
function rbelad_get_allowed_html_tags( $rbelad_level = 'basic' ) {
	$allowed_html = array(
		'b'      => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'i'      => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'u'      => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		's'      => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'br'     => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'em'     => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'del'    => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'ins'    => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'sub'    => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'sup'    => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'code'   => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'mark'   => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'small'  => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'strike' => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'abbr'   => array(
			'title' => array(),
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'span'   => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'strong' => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
	);

	if ( 'intermediate' === $rbelad_level || 'all' === $rbelad_level ) {
		$rbelad_tags = array(
			'a'       => array(
				'href'  => array(),
				'title' => array(),
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
			'q'       => array(
				'cite'  => array(),
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
			'img'     => array(
				'src'    => array(),
				'alt'    => array(),
				'height' => array(),
				'width'  => array(),
				'class'  => array(),
				'id'     => array(),
				'style'  => array(),
			),
			'dfn'     => array(
				'title' => array(),
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
			'time'    => array(
				'datetime' => array(),
				'class'    => array(),
				'id'       => array(),
				'style'    => array(),
			),
			'cite'    => array(
				'title' => array(),
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
			'acronym' => array(
				'title' => array(),
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
			'hr'      => array(
				'class' => array(),
				'id'    => array(),
				'style' => array(),
			),
		);

		$allowed_html = array_merge( $allowed_html, $rbelad_tags );
	}

	return $allowed_html;
}

/**
 * Strip all tags except allowed HTML tags.
 *
 * The name is based on the inline editing toolbar name.
 *
 * @param string $rbelad_content Data to sanitize.
 *
 * @return string
 */
function rbelad_kses_intermediate( string $rbelad_content = '' ): string {
	return wp_kses(
		$rbelad_content,
		rbelad_get_allowed_html_tags( 'intermediate' )
	);
}

/**
 * Strip all tags except allowed HTML tags.
 *
 * The name is based on the inline editing toolbar name.
 *
 * @param string $rbelad_content Data to sanitize.
 *
 * @return string
 */
function rbelad_kses_basic( $rbelad_content = '' ) {
	return wp_kses(
		$rbelad_content,
		rbelad_get_allowed_html_tags( 'basic' )
	);
}

/**
 * Get a translatable description of supported HTML tags.
 *
 * Allowed levels: basic, intermediate.
 *
 * @param string $rbelad_level Allowed level.
 *
 * @return string
 */
function rbelad_get_allowed_html_desc( string $rbelad_level = 'basic' ): string {

	if ( ! in_array( $rbelad_level, array( 'basic', 'intermediate' ), true ) ) {
		$rbelad_level = 'basic';
	}

	$rbelad_tags_str = sprintf(
		'<%s>',
		implode(
			'>,<',
			array_keys(
				rbelad_get_allowed_html_tags( $rbelad_level )
			)
		)
	);

	$allowed_html = sprintf(
		'<code>%s</code>',
		esc_html( $rbelad_tags_str )
	);

	return sprintf(
		wp_kses_post(
			/* translators: %1$s is a list of allowed HTML tags. */
			esc_html__( 'This input field has support for the following HTML tags: %1$s', 'rb-addons-for-elementor' )
		),
		$allowed_html
	);
}
