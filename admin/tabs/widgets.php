<?php
use RB_Elementor_Addons\Common\Widget_Manager;

function rb_widgets_manager_page() {
	// Get all widgets from Widget_Manager methods (free + pro merged)
    $all_widgets_map = Widget_Manager::get_all_widgets_map();

	// Separate widgets by category
	$widgets_by_category = [
		'rb_addons_general' => [],
		'rb_addons_core'    => [],
		'rb_addons_pro'     => [],
	];

	foreach ( $all_widgets_map as $slug => $data ) {
		$category = $data['cat'] ?? 'rb_addons_general';
		// Make sure category key exists in $widgets_by_category before adding
		if ( ! isset( $widgets_by_category[ $category ] ) ) {
			$widgets_by_category[ $category ] = [];
		}
		$widgets_by_category[ $category ][ $slug ] = ucwords(str_replace('-', ' ', $slug));
	}

	// Get enabled widgets from DB
    $saved_widgets = get_option( 'rb_enabled_widgets' );
    $enabled = is_array( $saved_widgets ) && ! empty( $saved_widgets )
        ? $saved_widgets
        : array_keys( $all_widgets_map );

    $icon_path = defined( 'RB_ADDONS_ICON' ) ? RB_ADDONS_ICON . 'rb-' : '';

	// Wrap start
	$wrap_start = '<div class="wrap rb-dashboard">';
	echo wp_kses_post( $wrap_start );

	// Title
	$title = sprintf(
		'<h1 class="rb-dashboard-title">%s</h1>',
		esc_html__( 'RB Elementor Widgets', 'rb-elementor-addons' )
	);
	echo wp_kses_post( $title );

	// Description
	$description = sprintf(
		'<p class="rb-dashboard-description">%s</p>',
		sprintf(
			/* translators: %d is widget count */
			esc_html__(
				'Here is the list of our all %1$d widgets. You can enable or disable widgets from here to optimize loading speed and Elementor editor experience. After enabling or disabling any widget make sure to click the %2$sSave Changes%3$s button.',
				'rb-elementor-addons'
			),
			absint( count( $all_widgets_map ) ),
			'<strong class="rb-dashboard-theme-color">',
			'</strong>'
		)
	);
	echo wp_kses_post( $description );

	// Filter Buttons
	$filter_start = '<div class="rb-action-list">';
	$all_btn      = sprintf( '<button type="button" class="rb-action--btn" data-filter="*">%s</button>', esc_html__( 'All', 'rb-elementor-addons' ) );
	$free_btn     = sprintf( '<button type="button" class="rb-action--btn" data-filter="free">%s</button>', esc_html__( 'Free', 'rb-elementor-addons' ) );
	$pro_btn      = sprintf( '<button type="button" class="rb-action--btn" data-filter="pro">%s</button>', esc_html__( 'Pro', 'rb-elementor-addons' ) );
	$separator    = '<span class="rb-action--divider">|</span>';
	$enable_btn   = sprintf( '<button type="button" class="rb-action--btn" data-action="enable">%s</button>', esc_html__( 'Enable All', 'rb-elementor-addons' ) );
	$disable_btn  = sprintf( '<button type="button" class="rb-action--btn" data-action="disable">%s</button>', esc_html__( 'Disable All', 'rb-elementor-addons' ) );
	$filter_end   = '</div>';

	echo wp_kses_post( $filter_start );
	echo wp_kses_post( $all_btn );
	echo wp_kses_post( $free_btn );
	echo wp_kses_post( $pro_btn );
	echo wp_kses_post( $separator );
	echo wp_kses_post( $enable_btn );
	echo wp_kses_post( $disable_btn );
	echo wp_kses_post( $filter_end );

	// Form start
	echo '<form method="post" action="options.php">';
	settings_fields( 'rb_widgets_group' );

	// Loop categories separately
	foreach ( $widgets_by_category as $category => $widgets ) {
		if ( empty( $widgets ) ) {
			continue;
		}

		switch ( $category ) {
			case 'rb_addons_general':
				$category_title = esc_html__( 'RB General Addons', 'rb-elementor-addons' );
				$category_class = esc_attr( 'rb-widget-free' );
				break;
			case 'rb_addons_core':
				$category_title = esc_html__( 'RB WordPress Addons', 'rb-elementor-addons' );
				$category_class = esc_attr( 'rb-widget-free' );
				break;
			case 'rb_addons_pro':
				$category_title = esc_html__( 'RB Addons Pro', 'rb-elementor-addons' );
				$category_class = esc_attr( 'rb-widget-pro' );
				break;
			default:
				$category_title = ucfirst(str_replace('_', ' ', $category));
				$category_class = esc_attr( 'rb-widget-free' );
				break;
		}

		echo sprintf( '<h2 class="rb-widget-title">%s</h2>', esc_html( $category_title ) );
		echo '<div class="rb-dashboard-widgets__list">';

		foreach ( $widgets as $slug => $label ) {
			$checked  = checked( in_array( $slug, $enabled, true ), true, false );
			$demo_url = Widget_Manager::get_widget_demo( $slug );

			echo '<div class="rb-dashboard-widgets__item ' . esc_attr( $category_class ) . '">';
			echo sprintf( '<img src="%1$s%2$s.svg" alt="%3$s">', esc_url( $icon_path ), esc_attr( $slug ), esc_html( $label ) );

			echo '<div class="rb-dashboard-widgets__item-text">';
			echo sprintf( '<h3 class="rb-dashboard-widgets__item-title">%s</h3>', esc_html( $label ) );

			if ( ! empty( $demo_url ) ) {
				echo sprintf(
					'<a class="rb-dashboard-widgets__item-demo" href="%1$s" target="_blank">%2$s</a>',
					esc_url( $demo_url ),
					esc_html__( 'View Demo', 'rb-elementor-addons' )
				);
			}
			echo '</div>'; // text

			echo sprintf(
				'<div class="rb-dashboard-widgets__item-button"><input type="checkbox" name="rb_enabled_widgets[]" value="%1$s" %2$s class="rb-toggle__check"><b class="rb-toggle__switch"></b><b class="rb-toggle__track"></b></div>',
				esc_attr( $slug ),
				esc_attr( $checked )
			);


			echo '</div>'; // item
		}
		echo '</div>'; // list
	}

	submit_button();
	echo '</form>';

	// Wrap end
	$wrap_end = '</div>';
	echo wp_kses_post( $wrap_end );
}

rb_widgets_manager_page();
