<?php
/**
 * Widgets Page Template
 *
 * @package RBELAD_Elementor_Addons
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
		'rbelad_addons_general'  => array(),
		'rbelad_addons_creative' => array(),
		'rbelad_addons_builder'  => array(),
		'rbelad_pro_creative'    => array(),
		'rbelad_pro_slider'      => array(),
		'rbelad_pro_post'        => array(),
		'rbelad_pro_builder'     => array(),
	);

	foreach ( $all_widgets_map as $slug => $data ) {
		$is_pro  = ! empty( $data['is_pro'] );
		$cat_key = $data['cat'] ?? 'rbelad_addons_general';

		// Force PRO widgets into their respective PRO category.
		if ( $is_pro ) {
			$cat_key = $data['cat'] ?? 'rbelad_pro_creative';
		}

		// Fallback if category is not registered.
		if ( ! isset( $widgets_by_category[ $cat_key ] ) ) {
			$cat_key = 'rbelad_addons_general';
		}

		$widgets_by_category[ $cat_key ][ $slug ] = array(
			'label'  => ucwords( str_replace( '-', ' ', $slug ) ),
			'is_pro' => $is_pro,
		);
	}

	// Get saved widget states.
	$saved_widgets = get_option( 'rbelad_enabled_widgets' );
	$enabled       = is_array( $saved_widgets ) && ! empty( $saved_widgets )
		? $saved_widgets
		: array_keys( $all_widgets_map );

	// Begin markup.
	echo '<div class="wrap rbelad-dashboard">';

	echo '<h1 class="rbelad-dashboard-title">' . esc_html__( 'RB Elementor Widgets', 'rb-elementor-addons' ) . '</h1>';

	$total_widgets = count( $all_widgets_map );
	$free_widgets  = 0;
	$pro_widgets   = 0;

	foreach ( $all_widgets_map as $data ) {
		if ( ! empty( $data['is_pro'] ) ) {
			++$pro_widgets;
		} else {
			++$free_widgets;
		}
	}

	// Filter Buttons.
	echo '<div class="rbelad-action-list">';
	echo '<button type="button" class="rbelad-action--btn rbelad-active--btn" data-filter="*">' . esc_html__( 'All', 'rb-elementor-addons' ) . '</button>';
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
			case 'rbelad_addons_creative':
				$category_title = esc_html__( 'RB Creative Addons', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-free';
				break;
			case 'rbelad_addons_builder':
				$category_title = esc_html__( 'RB WordPress Addons', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-free';
				break;
			case 'rbelad_pro_creative':
				$category_title = esc_html__( 'RB Creative Pro', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-pro';
				break;
			case 'rbelad_pro_slider':
				$category_title = esc_html__( 'RB Slider Pro', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-pro';
				break;
			case 'rbelad_pro_post':
				$category_title = esc_html__( 'RB Post Pro', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-pro';
				break;
			case 'rbelad_pro_builder':
				$category_title = esc_html__( 'RB WordPress Pro', 'rb-elementor-addons' );
				$category_class = 'rbelad-widget-pro';
				break;
			default:
				$category_title = ucfirst( str_replace( '_', ' ', $category ) );
				$category_class = 'rbelad-widget-free';
				break;
		}

		$category_total_widgets = count( $widgets );
		echo '<div class="' . esc_attr( $category_class ) . '"><div class="rbelad-dashboard-widgets__list-header"><h2 class="rbelad-widget-title">' . esc_html( $category_title ) . ' - <strong class="rbelad-dashboard-theme-color">(' . absint( $category_total_widgets ) . ' Widgets)</strong></h2><div class="rbelad-cat-action-btns"><button type="button" class="rbelad-action--btn" data-action="enable_category">Enable Category</button><button type="button" class="rbelad-action--btn" data-action="disable_category">Disable Category</button></div></div>';
		echo '<div class="rbelad-dashboard-widgets__list">';

		foreach ( $widgets as $slug => $info ) {
			$label       = $info['label'];
			$is_pro      = $info['is_pro'];
			$is_disabled = ( $is_pro && ! $is_pro_active );

			$demo_url       = Widget_Manager::get_widget_demo( $slug );
			$disabled_class = $is_disabled ? 'rbelad-toggle-disabled' : '';
			$tooltip        = $is_disabled ? esc_attr__( 'Activate Pro plugin to enable this widget.', 'rb-elementor-addons' ) : '';

			echo '<div class="rbelad-dashboard-widgets__item">';
			echo '<i class="rbelad-icon rbelad-' . esc_attr( $slug ) . '"></i>';

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

		echo '</div></div>'; // .list
	}

	submit_button();
	echo '</form>';

	echo '</div>'; // .wrap
}
rbelad_widgets_manager_page();
