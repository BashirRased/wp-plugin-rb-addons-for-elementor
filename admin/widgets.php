<?php
/**
 * Widgets Page Template
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use RBELAD_Elementor_Addons\Widget_Manager;

/**
 * Render the RB Widgets Manager admin page.
 *
 * Outputs the settings interface where users can enable or disable widgets.
 *
 * @return void
 */
function rbelad_widgets_manager_page() {
	// Check if Pro plugin is active.
	$is_pro_active = class_exists( 'RBELAD_Elementor_Pro' );

	// Get all widgets.
	$all_widgets_map = Widget_Manager::get_all_widgets_map();

	// Group widgets by category.
	$widgets_by_category = array(
		'rbelad_addons_general' => array(),
		'rbelad_addons_core'    => array(),
		'rbelad_addons_pro'     => array(),
	);

	foreach ( $all_widgets_map as $slug => $data ) {
		$is_pro = $data['is_pro'] ?? false;

		$category = $is_pro ? 'rbelad_addons_pro' : ( $data['cat'] ?? 'rbelad_addons_general' );

		$widgets_by_category[ $category ][ $slug ] = array(
			'label'  => ucwords( str_replace( '-', ' ', $slug ) ),
			'is_pro' => $is_pro,
		);
	}

	// Get saved widget states.
	$saved_widgets = get_option( 'rbelad_enabled_widgets' );
	$enabled       = is_array( $saved_widgets ) && ! empty( $saved_widgets )
		? $saved_widgets
		: array_keys( $all_widgets_map );

	$icon_path = defined( 'RBELAD_ICONS' ) ? RBELAD_ICONS . 'rbelad-' : '';

	// Begin markup.
	echo '<div class="wrap rbelad-dashboard">';

	echo '<h1 class="rbelad-dashboard-title">' . esc_html__( 'RB Elementor Widgets', 'rb-elementor-addons' ) . '</h1>';

	printf(
		'<p class="rbelad-dashboard-description">%s</p>',
		sprintf(
			/* translators: 1: Number of widgets. 2: Opening <strong> tag. 3: Closing </strong> tag. */
			esc_html__(
				'Here is the list of our all %1$d widgets. You can enable or disable widgets from here to optimize loading speed and Elementor editor experience. After enabling or disabling any widget make sure to click the %2$sSave Changes%3$s button.',
				'rb-elementor-addons'
			),
			absint( count( $all_widgets_map ) ),
			'<strong class="rbelad-dashboard-theme-color">',
			'</strong>'
		)
	);

	// Filter Buttons.
	echo '<div class="rbelad-action-list">';
	echo '<button type="button" class="rbelad-action--btn" data-filter="*">' . esc_html__( 'All', 'rb-elementor-addons' ) . '</button>';
	echo '<button type="button" class="rbelad-action--btn" data-filter="free">' . esc_html__( 'Free', 'rb-elementor-addons' ) . '</button>';
	echo '<button type="button" class="rbelad-action--btn" data-filter="pro">' . esc_html__( 'Pro', 'rb-elementor-addons' ) . '</button>';
	echo '<span class="rbelad-action--divider">|</span>';
	echo '<button type="button" class="rbelad-action--btn" data-action="enable">' . esc_html__( 'Enable All', 'rb-elementor-addons' ) . '</button>';
	echo '<button type="button" class="rbelad-action--btn" data-action="disable">' . esc_html__( 'Disable All', 'rb-elementor-addons' ) . '</button>';
	echo '</div>';

	// Start form.
	echo '<form method="post" action="options.php">';
	settings_fields( 'rbelad_widgets_group' );

	foreach ( $widgets_by_category as $category => $widgets ) {
		if ( empty( $widgets ) ) {
			continue;
		}

		switch ( $category ) {
			case 'rbelad_addons_general':
				$category_title = esc_html__( 'RB General Addons', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-free';
				break;
			case 'rbelad_addons_core':
				$category_title = esc_html__( 'RB WordPress Addons', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-free';
				break;
			case 'rbelad_addons_pro':
				$category_title = esc_html__( 'RB Addons Pro', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-pro';
				break;
			default:
				$category_title = ucfirst( str_replace( '_', ' ', $category ) );
				$category_class = 'rbelad-widget-free';
				break;
		}

		echo '<h2 class="rbelad-widget-title">' . esc_html( $category_title ) . '</h2>';
		echo '<div class="rbelad-dashboard-widgets__list">';

		foreach ( $widgets as $slug => $info ) {
			$label       = $info['label'];
			$is_pro      = $info['is_pro'];
			$is_disabled = ( $is_pro && ! $is_pro_active );

			// Safe WordPress helpers (return HTML attribute if condition is true).
			$checked_attr  = checked( in_array( $slug, $enabled, true ), true, false );
			$disabled_attr = disabled( $is_disabled, true, false );

			$demo_url       = Widget_Manager::get_widget_demo( $slug );
			$disabled_class = $is_disabled ? 'rbelad-toggle-disabled' : '';
			$tooltip        = $is_disabled ? esc_attr__( 'Activate Pro plugin to enable this widget.', 'rb-elementor-addons' ) : '';

			echo '<div class="rbelad-dashboard-widgets__item ' . esc_attr( $category_class ) . '">';
			echo '<img src="' . esc_url( $icon_path . $slug . '.svg' ) . '" alt="' . esc_attr( $label ) . '">';

			echo '<div class="rbelad-dashboard-widgets__item-text">';
			echo '<h3 class="rbelad-dashboard-widgets__item-title">' . esc_html( $label ) . '</h3>';
			if ( ! empty( $demo_url ) ) {
				echo '<a class="rbelad-dashboard-widgets__item-demo" href="' . esc_url( $demo_url ) . '" target="_blank">' . esc_html__( 'View Demo', 'rb-elementor-addons' ) . '</a>';
			}
			echo '</div>'; // .item-text

			echo '<div class="rbelad-dashboard-widgets__item-button ' . esc_attr( $disabled_class ) . '">';
			printf(
				'<input type="checkbox" name="rbelad_enabled_widgets[]" value="%1$s" %2$s %3$s class="rbelad-toggle__check" title="%4$s">',
				esc_attr( $slug ),
				checked( in_array( $slug, $enabled, true ), true, false ),
				disabled( $is_disabled, true, false ),
				esc_attr( $tooltip )
			);
			echo '<b class="rbelad-toggle__switch"></b><b class="rbelad-toggle__track"></b>';
			echo '</div>'; // .item-button

			echo '</div>'; // .item
		}

		echo '</div>'; // .list
	}

	submit_button();
	echo '</form>';

	echo '</div>'; // .wrap
}
rbelad_widgets_manager_page();
