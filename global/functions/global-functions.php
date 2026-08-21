<?php
/**
 * All options for widget content
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly..
}

/**
 * List rbelad icons
 *
 * @return array
 */
function rbelad_get_icons() {
	return \RBELAD_Elementor_Addons\Classes\Icons_Manager::get_rbelad_icons();
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
 * Check Elementor version.
 *
 * @param string $operator Comparison operator.
 * @param string $version  Elementor version to compare against.
 * @return bool True if the Elementor version matches the comparison.
 */
function rbelad_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
	return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

/**
 * Check whether pro version is defined.
 *
 * @return bool whether pro version is active
 */
function rbelad_has_pro() {
	return defined( 'RBELAD_PRO_Elementor_Addons' );
}

/**
 * Get RBELAD dashboard link.
 *
 * @param string $suffix Optional query string suffix for the dashboard URL.
 * @return string
 */
function rbelad_get_dashboard_link( $suffix = '#home' ) {
	return add_query_arg( array( 'page' => 'rbelad-dashboard' . $suffix ), admin_url( 'admin.php' ) );
}

/**
 * Admin Dashboard Icon
 */
function rbelad_get_dashboard_icon() {
	return 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyNi4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiNGRkZGRkY7fQ0KPC9zdHlsZT4NCjxnPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNC44LDEwLjNoLTEuOVYxM2gxLjhjMC41LDAsMC45LTAuMSwxLjEtMC4zYzAuMy0wLjIsMC40LTAuNiwwLjQtMUMxNi4yLDEwLjgsMTUuNywxMC4zLDE0LjgsMTAuM3oiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNS42LDYuNEgzLjl2M2gxLjdjMC41LDAsMC45LTAuMSwxLjItMC40czAuNC0wLjYsMC40LTEuMVM3LjEsNy4xLDYuOCw2LjhDNi42LDYuNSw2LjIsNi40LDUuNiw2LjR6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTE2LDcuN2MwLTAuNS0wLjEtMC44LTAuNC0xcy0wLjctMC4zLTEuMy0wLjNoLTEuNHYyLjVoMS41QzE1LjQsOC45LDE2LDguNSwxNiw3Ljd6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTEwLDBDNC41LDAsMCw0LjUsMCwxMHM0LjUsMTAsMTAsMTBzMTAtNC41LDEwLTEwUzE1LjUsMCwxMCwweiBNOS44LDE0LjdINy41TDUuNiwxMUgzLjl2My43aC0ydi0xMGgzLjcNCgkJYzEuMiwwLDIuMSwwLjMsMi43LDAuOGMwLjYsMC41LDEsMS4zLDEsMi4yYzAsMC43LTAuMSwxLjMtMC40LDEuN2MtMC4zLDAuNS0wLjcsMC44LTEuMywxLjFsMi4yLDQuMVYxNC43eiBNMTQuNywxNC43aC0zLjh2LTEwDQoJCWgzLjVjMS4yLDAsMi4xLDAuMiwyLjgsMC43YzAuNiwwLjUsMC45LDEuMiwwLjksMmMwLDAuNS0wLjEsMC45LTAuNCwxLjNjLTAuMywwLjQtMC42LDAuNi0xLjEsMC44YzAuNSwwLjEsMC45LDAuNCwxLjIsMC44DQoJCWMwLjMsMC40LDAuNCwwLjksMC40LDEuNGMwLDEtMC4zLDEuNy0wLjksMi4yQzE2LjcsMTQuNCwxNS44LDE0LjYsMTQuNywxNC43eiIvPg0KPC9nPg0KPC9zdmc+DQo=';
}
