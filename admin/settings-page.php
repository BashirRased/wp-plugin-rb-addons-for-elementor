<?php

// Add menu + submenu
add_action( 'admin_menu', function() {
	add_menu_page(
		'RB Dashboard',
		'RB Dashboard',
		'manage_options',
		'rb_dashboard',
		'rb_admin_tabs_page',
		'dashicons-admin-generic',
		80
	);

	// Home Page
	add_submenu_page(
		'rb_dashboard',
		'Home',
		'Home',
		'manage_options',
		'rb_dashboard',
		'rb_admin_tabs_page'
	);

	// Submenu for Widgets (load with ?page=rb_dashboard_widgets)
	add_submenu_page(
		'rb_dashboard',
		'Widgets',
		'Widgets',
		'manage_options',
		'rb_dashboard_widgets',
		function () {
			$_GET['tab'] = 'widgets'; // force tab
			rb_admin_tabs_page();
		}
	);

	// Credentials Page
	add_submenu_page(
		'rb_dashboard',
		'Credentials',
		'Credentials',
		'manage_options',
		'rb_dashboard_credentials',
		function () {
			$_GET['tab'] = 'credentials';
			rb_admin_tabs_page();
		}
	);

	// Get Pro Page
	add_submenu_page(
		'rb_dashboard',
		'Get Pro',
		'Get Pro',
		'manage_options',
		'rb_dashboard_pro',
		function () {
			$_GET['tab'] = 'get-pro';
			rb_admin_tabs_page();
		}
	);

	// Theme Builder Page
	add_submenu_page(
		'rb_dashboard',
		'Theme Builder',
		'Theme Builder',
		'manage_options',
		'rb_dashboard_theme_builder',
		function () {
			$_GET['tab'] = 'theme-builder';
			rb_admin_tabs_page();
		}
	);

});

/**
 * Sanitize enabled widgets array.
 *
 * @param mixed $input Input from settings form.
 * @return array Sanitized widget slugs.
 */
function rb_sanitize_enabled_widgets( $input ) {
    if ( ! is_array( $input ) ) {
        return [];
    }

    // Allow only lowercase slugs with dashes/underscores
    return array_filter( array_map( function( $slug ) {
        return sanitize_key( $slug );
    }, $input ) );
}

// Register widget setting group
add_action( 'admin_init', function() {
	register_setting(
		'rb_widgets_group',
		'rb_enabled_widgets',
		[
			'sanitize_callback' => 'rb_sanitize_enabled_widgets',
		]
	);
});

// Render Tab UI
function rb_admin_tabs_page() {
	$tabs = [
		'home'           => 'Home',
		'widgets'        => 'Widgets',
		'credentials'    => 'Credentials',
		'get-pro'        => 'Get Pro',
		'theme-builder'  => 'Theme Builder',
	];

	if ( isset( $_GET['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'rb_dashboard_tabs' ) ) {
		wp_die( esc_html__( 'Invalid tab nonce.', 'rb-elementor-addons' ) );
	}
	$current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'home';

	echo '<div class="wrap"><h1 class="wp-heading-inline">RB Elementor Addons</h1>';
	echo '<h2 class="nav-tab-wrapper">';
	foreach ( $tabs as $slug => $label ) {
		$active = $slug === $current_tab ? ' nav-tab-active' : '';
		$tab_url = add_query_arg([
			'page'    => 'rb_dashboard',
			'tab'     => $slug,
			'_wpnonce' => wp_create_nonce( 'rb_dashboard_tabs' ),
		]);
		echo '<a href="' . esc_url( $tab_url ) . '" class="nav-tab' . esc_attr( $active ) . '">' . esc_html( $label ) . '</a>';
	}
	echo '</h2>';	

	echo '<div class="rb-tab-content">';
	$default_tab_file = plugin_dir_path( __FILE__ ) . 'tabs/' . $current_tab . '.php';
	if ( file_exists( $default_tab_file ) ) {
		require $default_tab_file;
	} else {
		echo '<p>Invalid tab file.</p>';
	}
	echo '</div>';

	echo '</div>';
}