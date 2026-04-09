<?php
/**
 * Dual Text widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Utils;

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$prefix = $this->get_section_content_prefix( 'general' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// -----------------------------------------------------------------------------
// Wrapper attributes.
// -----------------------------------------------------------------------------
$this->add_render_attribute(
	'title',
	array(
		'class' => 'rbelad-dual-text-heading',
	)
);

// -----------------------------------------------------------------------------
// Link attributes.
// -----------------------------------------------------------------------------
if ( ! empty( $settings[ $prefix . '_link' ]['url'] ) ) {
	$this->add_link_attributes(
		'title_link',
		$settings[ $prefix . '_link' ]
	);

	$this->add_render_attribute(
		'title_link',
		'class',
		'rbelad-dual-text-link'
	);
}

// -----------------------------------------------------------------------------
// Repeater rendering with inline editing.
// -----------------------------------------------------------------------------
$title_items = '';

if ( ! empty( $settings[ $prefix . '_title_repeater' ] ) ) {
	foreach ( $settings[ $prefix . '_title_repeater' ] as $item_index => $item ) {

		if ( empty( $item[ $prefix . '_title_text' ] ) ) {
			continue;
		}

		$item_key = $this->get_repeater_setting_key(
			$prefix . '_title_text',
			$prefix . '_title_repeater',
			$item_index
		); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		// Base class per item.
		$this->add_render_attribute(
			$item_key,
			'class',
			'rbelad-dual-text-item-text'
		);

		// Highlight modifier.
		if ( 'yes' === $item[ $prefix . '_title_highlight' ] ) {
			$this->add_render_attribute(
				$item_key,
				'class',
				'rbelad-dual-text-item-highlight'
			);
		}

		// Inline editing support.
		$this->add_inline_editing_attributes( $item_key, 'basic' );

		$title_text = esc_html( $item[ $prefix . '_title_text' ] ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		$title_items .= sprintf(
			'<span %1$s>%2$s</span>',
			$this->get_render_attribute_string( $item_key ),
			$title_text
		);
	}
}

// -----------------------------------------------------------------------------
// HTML tag + wrapper rendering.
// -----------------------------------------------------------------------------
$html_tag  = Utils::validate_html_tag( $settings[ $prefix . '_html_tag' ] ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$html_attr = $this->get_render_attribute_string( 'title' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$output = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

if ( ! empty( $settings[ $prefix . '_link' ]['url'] ) ) {

	$link_attr = $this->get_render_attribute_string( 'title_link' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	$output = sprintf(
		'<%1$s %2$s><a %3$s>%4$s</a></%1$s>',
		esc_attr( $html_tag ),
		$html_attr,
		$link_attr,
		$title_items
	);

} else {

	$output = sprintf(
		'<%1$s %2$s>%3$s</%1$s>',
		esc_attr( $html_tag ),
		$html_attr,
		$title_items
	);
}

echo wp_kses_post( $output );
