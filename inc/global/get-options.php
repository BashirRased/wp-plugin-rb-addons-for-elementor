<?php
/**
 * All repeater controls load file.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly..
}

/**
 * Get elementor instance
 *
 * @return \Elementor\Plugin
 */
function rbelad_elementor() {
	return \Elementor\Plugin::instance();
}

/**
 * Checks if script debugging is enabled.
 *
 * @return bool True if script debugging is enabled, false otherwise.
 */
function rbelad_is_script_debug_enabled() {
	return ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
}

/**
 * Render icon HTML with backward compatibility.
 *
 * @param array  $settings   Widget settings array.
 * @param string $old_icon_id Old version icon ID.
 * @param string $new_icon_id New version icon ID.
 * @param array  $attributes Icon attributes.
 * @return string Rendered HTML output.
 */
function rbelad_render_icon( $settings = array(), $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = array() ) {
	return rbelad_get_icon_html( $settings, $old_icon_id, $new_icon_id, $attributes );
}

/**
 * Get icon HTML with backward compatibility.
 *
 * @param array  $settings   Widget settings array.
 * @param string $old_icon_id Old version icon ID.
 * @param string $new_icon_id New version icon ID.
 * @param array  $attributes  Icon attributes.
 * @return string HTML markup for the icon.
 */
function rbelad_get_icon_html( $settings = array(), $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = array() ) {
	// Check if its already migrated.
	$migrated = isset( $settings['__fa4_migrated'][ $new_icon_id ] );
	// Check if its a new widget without previously selected icon using the old Icon control.

	$is_new = empty( $settings[ $old_icon_id ] );

	$attributes['aria-hidden'] = 'true';

	if ( rbelad_is_elementor_version( '>=', '2.6.0' ) && ( $is_new || $migrated ) ) {
		return \Elementor\Icons_Manager::try_get_icon_html( $settings[ $new_icon_id ], $attributes );
	} else {
		if ( empty( $attributes['class'] ) ) {
			$attributes['class'] = $settings[ $old_icon_id ];
		} elseif ( is_array( $attributes['class'] ) ) {
			$attributes['class'][] = $settings[ $old_icon_id ];
		} else {
			$attributes['class'] .= ' ' . $settings[ $old_icon_id ];
		}
		return sprintf( '<i %s></i>', \Elementor\Utils::render_html_attributes( $attributes ) );
	}
}

/**
 * Escapes title HTML tags.
 *
 * @param string $tag          Input string of the title tag.
 * @param string $fallback     Fallback tag to return if no matches found.
 * @param array  $extra        Additional allowed tags to merge with the default set.
 * @return string Escaped title tag.
 */
function rbelad_escape_tags( $tag, $fallback = 'span', $extra = array() ) {
	$supports = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p' );
	$supports = array_merge( $supports, $extra );
	if ( ! in_array( $tag, $supports, true ) ) {
		return $fallback;
	}
	return $tag;
}

/**
 * Get a list of all the allowed HTML tags.
 *
 * @param string $level Allowed levels are 'basic', 'intermediate', or 'all'.
 * @return array List of allowed HTML tags with attributes.
 */
function rbelad_get_allowed_html( $level = 'basic' ) {
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

	if ( 'intermediate' === $level || 'all' === $level ) {
		$tags         = array(
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
		$allowed_html = array_merge( $allowed_html, $tags );
	}

	return $allowed_html;
}

/**
 * Strip all tags except allowed HTML tags (intermediate level).
 *
 * The name is based on the inline editing toolbar name.
 *
 * @param string $input  Input string to sanitize.
 * @return string Sanitized HTML string.
 */
function rbelad_kses_intermediate( $input = '' ) {
	return wp_kses( $input, rbelad_get_allowed_html( 'intermediate' ) );
}

/**
 * Strip all tags except allowed HTML tags (basic level).
 *
 * The name is based on the inline editing toolbar name.
 *
 * @param string $input  Input string to sanitize.
 * @return string Sanitized HTML string.
 */
function rbelad_kses_basic( $input = '' ) {
	return wp_kses( $input, rbelad_get_allowed_html( 'basic' ) );
}

/**
 * Get a translatable description string with allowed HTML tags.
 *
 * @param string $level  Allowed levels are 'basic' or 'intermediate'.
 * @return string Translatable description including supported HTML tags.
 */
function rbelad_get_allowed_html_desc( $level = 'basic' ) {
	if ( ! in_array( $level, array( 'basic', 'intermediate' ), true ) ) {
		$level = 'basic';
	}
	$tags_str = '<' . implode( '>,<', array_keys( rbelad_get_allowed_html( $level ) ) ) . '>';

	return sprintf(
		/* translators: %1$s: list of allowed HTML tags wrapped in code tags */
		esc_html__(
			'This input field has support for the following HTML tags: %1$s',
			'rb-elementor-addons'
		),
		'<code>' . esc_html( $tags_str ) . '</code>'
	);
}

/**
 * Admin Dashboard Icon
 */
function rbelad_get_custom_icon() {
	return 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyNi4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiNGRkZGRkY7fQ0KPC9zdHlsZT4NCjxnPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNC44LDEwLjNoLTEuOVYxM2gxLjhjMC41LDAsMC45LTAuMSwxLjEtMC4zYzAuMy0wLjIsMC40LTAuNiwwLjQtMUMxNi4yLDEwLjgsMTUuNywxMC4zLDE0LjgsMTAuM3oiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNS42LDYuNEgzLjl2M2gxLjdjMC41LDAsMC45LTAuMSwxLjItMC40czAuNC0wLjYsMC40LTEuMVM3LjEsNy4xLDYuOCw2LjhDNi42LDYuNSw2LjIsNi40LDUuNiw2LjR6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTE2LDcuN2MwLTAuNS0wLjEtMC44LTAuNC0xcy0wLjctMC4zLTEuMy0wLjNoLTEuNHYyLjVoMS41QzE1LjQsOC45LDE2LDguNSwxNiw3Ljd6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTEwLDBDNC41LDAsMCw0LjUsMCwxMHM0LjUsMTAsMTAsMTBzMTAtNC41LDEwLTEwUzE1LjUsMCwxMCwweiBNOS44LDE0LjdINy41TDUuNiwxMUgzLjl2My43aC0ydi0xMGgzLjcNCgkJYzEuMiwwLDIuMSwwLjMsMi43LDAuOGMwLjYsMC41LDEsMS4zLDEsMi4yYzAsMC43LTAuMSwxLjMtMC40LDEuN2MtMC4zLDAuNS0wLjcsMC44LTEuMywxLjFsMi4yLDQuMVYxNC43eiBNMTQuNywxNC43aC0zLjh2LTEwDQoJCWgzLjVjMS4yLDAsMi4xLDAuMiwyLjgsMC43YzAuNiwwLjUsMC45LDEuMiwwLjksMmMwLDAuNS0wLjEsMC45LTAuNCwxLjNjLTAuMywwLjQtMC42LDAuNi0xLjEsMC44YzAuNSwwLjEsMC45LDAuNCwxLjIsMC44DQoJCWMwLjMsMC40LDAuNCwwLjksMC40LDEuNGMwLDEtMC4zLDEuNy0wLjksMi4yQzE2LjcsMTQuNCwxNS44LDE0LjYsMTQuNywxNC43eiIvPg0KPC9nPg0KPC9zdmc+DQo=';
}

/**
 * Load All Page
 */
if ( ! function_exists( 'rbelad_get_all_pages' ) ) {
	/**
	 * Get a list of all pages.
	 *
	 * Retrieves all WordPress pages and returns an array where the keys are
	 * page IDs and the values are the page titles.
	 *
	 * @return array List of pages with ID as key and title as value.
	 */
	function rbelad_get_all_pages() {
		$page_list = get_posts(
			array(
				'post_type'      => 'page',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => -1,
			)
		);

		$pages = array();
		if ( ! empty( $page_list ) && ! is_wp_error( $page_list ) ) {
			foreach ( $page_list as $page ) {
				$pages[ $page->ID ] = $page->post_title;
			}
		}
		return $pages;
	}
}

/**
 * Load All Post Type Links
 */
if ( ! function_exists( 'rbelad_get_all_type_post_links' ) ) {
	/**
	 * Get a list of all type_post_links.
	 *
	 * Retrieves all WordPress type_post_links and returns an array where the keys are
	 * page IDs and the values are the page titles.
	 *
	 * @return array List of type_post_links with ID as key and title as value.
	 */
	function rbelad_get_all_type_post_links() {
		$post_link = get_posts(
			array(
				'post_type'      => 'any',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => -1,
			)
		);

		$all_type_post_links = array();
		if ( ! empty( $post_link ) && ! is_wp_error( $post_link ) ) {
			foreach ( $post_link as $link ) {
				$all_type_post_links[ $link->ID ] = $link->post_title;
			}
		}
		return $all_type_post_links;
	}
}

/**
 * Check contact form 7 plugin activated
 */
function rbelad_is_cf7_activated() {
	return class_exists( '\WPCF7' );
}

/**
 * Get a list of all CF7 forms
 *
 * @return array
 */
function rbelad_get_cf7_forms(): array {
	$forms = array();
	if ( rbelad_is_cf7_activated() ) {
		$_forms = get_posts(
			array(
				'post_type'      => 'wpcf7_contact_form',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => 'title',
				'order'          => 'ASC',
			)
		);
		if ( ! empty( $_forms ) ) {
			$forms = wp_list_pluck( $_forms, 'post_title', 'ID' );
		}
	}
	return $forms;
}

/**
 * Get plugin missing notice
 *
 * @param string $plugin_name Name of the plugin that is missing.
 * @return void
 */
function rbelad_show_plugin_missing_alert( $plugin_name ) {
	if ( current_user_can( 'activate_plugins' ) && ! empty( $plugin_name ) ) {
		printf(
			'<div %1$s><strong>%2$s</strong> %3$s</div>',
			'style="margin: 1rem;padding: 1rem 1.25rem;border-left: 5px solid #f5c848;color: #856404;background-color: #fff3cd;"',
			esc_html( $plugin_name ),
			esc_html__( 'plugin is missing! Please install and activate it.', 'rb-elementor-addons' )
		);
	}
}

/**
 * Get plugin missing information.
 *
 * Returns data if the plugin is not installed or not activated.
 *
 * @param array $args  Array of arguments to customize the missing plugin info.
 * @return array       Array containing plugin missing information.
 */
function rbelad_get_plugin_missing_info( $args = array() ) {
	$elementor_info = array(
		'installed' => false,
	);

	if ( empty( $args ) ) {
		return $elementor_info;
	}

	$plugin_title = ! empty( $args['plugin_title'] ) ? $args['plugin_title'] : '';
	$plugin_name  = ! empty( $args['plugin_name'] ) ? $args['plugin_name'] : '';
	$plugin_file  = ! empty( $args['plugin_file'] ) ? $args['plugin_file'] : '';

	if ( ! empty( $plugin_file ) && file_exists( WP_PLUGIN_DIR . '/' . $plugin_file ) ) {
		// translators: %s: Plugin title.
		$elementor_info['title']     = sprintf( esc_html__( 'Activate %s', 'rb-elementor-addons' ), esc_html( $plugin_title ) );
		$elementor_info['url']       = wp_nonce_url( 'plugins.php?action=activate&plugin=' . $plugin_file . '&plugin_status=all&paged=1', 'activate-plugin_' . $plugin_file );
		$elementor_info['installed'] = true;
	} else {
		// translators: %s: Plugin title.
		$elementor_info['title'] = sprintf( esc_html__( 'Install %s', 'rb-elementor-addons' ), esc_html( $plugin_title ) );
		$elementor_info['url']   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $plugin_name ), 'install-plugin_' . $plugin_name );
	}

	return $elementor_info;
}
