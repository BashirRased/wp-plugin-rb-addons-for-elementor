<?php

/**
 * Get elementor instance
 *
 * @return \Elementor\Plugin
 */
function rb_elementor() {
	return \Elementor\Plugin::instance();
}

/**
 * Check contact form 7 plugin activated
 *
 */
function rb_is_cf7_activated() {
	return class_exists( '\WPCF7' );
}

/**
 * Get a list of all CF7 forms
 *
 * @return array
 */
function rb_get_cf7_forms(): array {
	$forms = [];

	if ( rb_is_cf7_activated() ) {
		$_forms = get_posts( [
			'post_type'      => 'wpcf7_contact_form',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		] );

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
function rb_show_plugin_missing_alert( $plugin_name ) {
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
 * Get plugin missing info.
 *
 * If the plugin is not installed or not activated.
 *
 * @param array $args
 * @since 1.0.0
 * @return array
 */
function rb_get_plugin_missing_info( $args = [] ) {
	$elementor_info = [
		'installed' => false,
	];

	if ( empty( $args ) ) {
		return $elementor_info;
	}

	$plugin_title = ! empty( $args['plugin_title'] ) ? $args['plugin_title'] : '';
	$plugin_name = ! empty( $args['plugin_name'] ) ? $args['plugin_name'] : '';
	$plugin_file = ! empty( $args['plugin_file'] ) ? $args['plugin_file'] : '';

	if ( ! empty( $plugin_file ) && file_exists( WP_PLUGIN_DIR . '/' . $plugin_file ) ) {
		// translators: %s: Plugin title.
		$elementor_info['title'] = sprintf( esc_html__( 'Activate %s', 'rb-elementor-addons' ), esc_html( $plugin_title ) );
		$elementor_info['url'] = wp_nonce_url( 'plugins.php?action=activate&plugin=' . $plugin_file . '&plugin_status=all&paged=1', 'activate-plugin_' . $plugin_file );
		$elementor_info['installed'] = true;
	} else {
		// translators: %s: Plugin title.
		$elementor_info['title'] = sprintf( esc_html__( 'Install %s', 'rb-elementor-addons' ), esc_html( $plugin_title ) );
		$elementor_info['url'] = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $plugin_name ), 'install-plugin_' . $plugin_name );
	}

	return $elementor_info;
}

/**
 * Get all Pages
 */
if (!function_exists('rb_get_all_pages')) {
    function rb_get_all_pages() {
        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
        ));
        $pages = array();
        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->ID] = $page->post_title;
            }
        }
        return $pages;
    }
}

/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function rb_get_allowed_html($level = 'basic') {
    if (!in_array($level, ['basic', 'intermediate', 'advance'])) {
        $level = 'basic';
    }
    $tags_str = '<' . implode('>,<', array_keys(rb_get_allowed_html_tags($level))) . '>';
    return sprintf(
        // translators: %1$s: A list of allowed HTML tags (e.g., <a>, <strong>).
        esc_html__(
            'This input field has support for the following HTML tags: %1$s',
            'rb-elementor-addons'
        ),
        '<code>' . esc_html($tags_str) . '</code>'
    );
}


/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function rb_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b' => [],
        'i' => [
            'class' => [],
        ],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];
    }

    if ($level === 'advance') {
        $allowed_html['ul'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['ol'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['li'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];

    }

    return $allowed_html;
}

// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function rb_kses($raw){

	$allowed_tags = array(
		'a' => array(
			'class' => array(),
			'href' => array(),
			'rel' => array(),
			'title' => array(),
			'target' => array(),
		),
		'abbr' => array('title' => array()),
		'b' => array(),
		'blockquote' => array('cite' => array()),
		'cite' => array('title' => array()),
		'code' => array(),
		'del' => array('datetime' => array(), 'title' => array()),
		'div' => array('class' => array(), 'title' => array(), 'style' => array()),
		'dl' => array(),
		'dt' => array(),
		'dd' => array(),
		'em' => array(),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array(),
		'h5' => array(),
		'h6' => array(),
		'i' => array('class' => array()),
		'img' => array(
			'alt' => array(),
			'class' => array(),
			'height' => array(),
			'src' => array(),
			'width' => array(),
		),
		'li' => array('class' => array()),
		'ol' => array('class' => array()),
		'p' => array('class' => array()),
		'q' => array('cite' => array(), 'title' => array()),
		'span' => array('class' => array(), 'title' => array(), 'style' => array()),
		'iframe' => array(
			'width' => array(),
			'height' => array(),
			'scrolling' => array(),
			'frameborder' => array(),
			'allow' => array(),
			'src' => array(),
		),
		'strong' => array(),
		'br' => array(),
		'strike' => array(),
		'ul' => array('class' => array()),
	);

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}
