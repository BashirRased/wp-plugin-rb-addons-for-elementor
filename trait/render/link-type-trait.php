<?php
/**
 * Trait: Link Type Render
 *
 * Handles rendering HTML with different link types.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Link_Type_Render {
	/**
	 * Render link wrapper HTML.
	 *
	 * Supports link types:
	 * - default : Widget-provided URL
	 * - page    : Selected page/post ID
	 * - custom  : Elementor URL control
	 * - none    : No link
	 *
	 * @param string $section_prefix Section prefix for settings.
	 * @param string $text           Link text to render.
	 * @param string $html_tag       HTML tag (h1–h6, div, span).
	 * @param string $render_key     Unique render attribute key.
	 * @param string $default_url    Default/fallback URL.
	 *
	 * @return string Rendered HTML.
	 */
	protected function render_link_type(
		string $section_prefix,
		string $text,
		string $html_tag,
		string $render_key = 'title',
		string $default_url = ''
	): string {

		$settings  = $this->get_settings_for_display();
		$link_type = $settings[ $section_prefix . 'link_type' ] ?? 'none';

		$wrapper_attr = $this->get_render_attribute_string( $render_key );
		$link_key     = $render_key . '_link';

		// Default link.
		if ( 'default' === $link_type && ! empty( $default_url ) ) {

			$this->add_render_attribute( $link_key, 'href', esc_url( $default_url ) );
			$this->add_render_attribute( $link_key, 'target', '_self' );
			$this->add_render_attribute( $link_key, 'rel', 'nofollow' );

		} elseif ( 'page' === $link_type && ! empty( $settings[ $section_prefix . 'page_link' ] ) ) {

			$page_id  = (int) $settings[ $section_prefix . 'page_link' ];
			$page_url = get_permalink( $page_id );

			if ( $page_url ) {
				$this->add_render_attribute( $link_key, 'href', esc_url( $page_url ) );
				$this->add_render_attribute( $link_key, 'target', '_self' );
				$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
			}
		} elseif ( 'custom' === $link_type && ! empty( $settings[ $section_prefix . 'custom_link' ]['url'] ) ) {

			$this->add_link_attributes(
				$link_key,
				$settings[ $section_prefix . 'custom_link' ]
			);
		}

		// Render linked output.
		if ( $this->get_render_attribute_string( $link_key ) ) {

			$link_attr = $this->get_render_attribute_string( $link_key );

			return sprintf(
				'<%1$s %2$s><a %3$s>%4$s</a></%1$s>',
				esc_attr( $html_tag ),
				$wrapper_attr,
				$link_attr,
				$text
			);
		}

		// No link.
		return sprintf(
			'<%1$s %2$s>%3$s</%1$s>',
			esc_attr( $html_tag ),
			$wrapper_attr,
			$text
		);
	}
}
