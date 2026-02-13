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


// Check if Pro plugin is active.
$is_pro_active = class_exists( 'RBELAD_Elementor_Pro' );  // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Get all widgets.
$all_widgets_map = Widget_Manager::get_all_widgets_map();  // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Group widgets by category.
$widgets_by_category = array(
	'rbelad_addons_general'  => array(),
	'rbelad_addons_creative' => array(),
	'rbelad_pro_creative'    => array(),
	'rbelad_pro_slider'      => array(),
);  // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

foreach ( $all_widgets_map as $slug => $data ) {
	$is_pro  = ! empty( $data['is_pro'] ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$cat_key = $data['cat'] ?? 'rbelad_addons_general'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	if ( $is_pro ) {
		$cat_key = $data['cat'] ?? 'rbelad_pro_creative'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	}

	if ( ! isset( $widgets_by_category[ $cat_key ] ) ) {
		$cat_key = 'rbelad_addons_general'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	}

	$widgets_by_category[ $cat_key ][ $slug ] = array(
		'label'  => ucwords( str_replace( '-', ' ', $slug ) ), // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		'is_pro' => $is_pro, // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	);
}

// Get saved widget states.
$saved_widgets = get_option( 'rbelad_enabled_widgets', array() ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$enabled       = is_array( $saved_widgets ) && ! empty( $saved_widgets )
	? $saved_widgets
	: array_keys( $all_widgets_map ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Begin markup.
echo '<div class="wrap rbelad-widgets-tab">';

// Filter buttons.
echo '<div class="rbelad-action-list">';
echo '<button type="button" class="rbelad-action--btn rbelad-active--btn" data-filter="*">' . esc_html__( 'All', 'rb-addons-for-elementor' ) . '</button>';
echo '<button type="button" class="rbelad-action--btn" data-filter="free">' . esc_html__( 'Free', 'rb-addons-for-elementor' ) . '</button>';
echo '<button type="button" class="rbelad-action--btn" data-filter="pro">' . esc_html__( 'Pro', 'rb-addons-for-elementor' ) . '</button>';
echo '<span class="rbelad-action--divider">|</span>';
echo '<button type="button" class="rbelad-action--btn" data-action="enable">' . esc_html__( 'Enable All', 'rb-addons-for-elementor' ) . '</button>';
echo '<button type="button" class="rbelad-action--btn" data-action="disable">' . esc_html__( 'Disable All', 'rb-addons-for-elementor' ) . '</button>';
echo '</div>';

// Form start.
settings_fields( 'rbelad_widgets_group' );

foreach ( $widgets_by_category as $category => $widgets ) {
	if ( empty( $widgets ) ) {
		continue;
	}

	$category_title = ucfirst( str_replace( '_', ' ', $category ) ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$category_class = strpos( $category, 'pro' ) !== false ? 'rbelad-widget-pro' : 'rbelad-widget-free'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	switch ( $category ) {
		case 'rbelad_addons_general':
			$category_title = esc_html__( 'RB General Addons', 'rb-addons-for-elementor' );
			$category_class = esc_attr( 'rbelad-widget-free' );
			break;
		case 'rbelad_addons_creative':
			$category_title = esc_html__( 'RB Creative Addons', 'rb-addons-for-elementor' );
			$category_class = esc_attr( 'rbelad-widget-free' );
			break;
		case 'rbelad_pro_creative':
			$category_title = esc_html__( 'RB Creative Pro', 'rb-addons-for-elementor' );
			$category_class = esc_attr( 'rbelad-widget-pro' );
			break;
		case 'rbelad_pro_slider':
			$category_title = esc_html__( 'RB Slider Pro', 'rb-addons-for-elementor' );
			$category_class = esc_attr( 'rbelad-widget-pro' );
			break;
		default:
			$category_title = ucfirst( str_replace( '_', ' ', $category ) );
			$category_class = esc_attr( 'rbelad-widget-free' );
			break;
	}

	$category_total_widgets = count( $widgets ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	echo '<div class="' . esc_attr( $category_class ) . '">';
	echo '<div class="rbelad-dashboard-widgets__list-header">';
	echo '<h2 class="rbelad-widget-title">' . esc_html( $category_title ) . ' - <strong class="rbelad-dashboard-theme-color">(' . absint( $category_total_widgets ) . ' Widgets)</strong></h2>';
	echo '<div class="rbelad-cat-action-btns">';
	echo '<button type="button" class="rbelad-action--btn" data-action="enable_category">' . esc_html__( 'Enable Category', 'rb-addons-for-elementor' ) . '</button>';
	echo '<button type="button" class="rbelad-action--btn" data-action="disable_category">' . esc_html__( 'Disable Category', 'rb-addons-for-elementor' ) . '</button>';
	echo '</div></div>'; // header.

	echo '<div class="rbelad-dashboard-widgets__list">';
	foreach ( $widgets as $slug => $info ) {
		$label          = $info['label']; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$is_pro         = $info['is_pro']; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$is_disabled    = $is_pro && ! $is_pro_active; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$disabled_class = $is_disabled ? 'rbelad-toggle-disabled' : ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$tooltip        = $is_disabled ? esc_attr__( 'Activate Pro plugin to enable this widget.', 'rb-addons-for-elementor' ) : ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		echo '<div class="rbelad-dashboard-widgets__item">';
		echo '<i class="rbelad-icon rbelad-' . esc_attr( $slug ) . '"></i>';
		echo '<div class="rbelad-dashboard-widgets__item-text">';
		echo '<h3 class="rbelad-dashboard-widgets__item-title">' . esc_html( $label ) . '</h3>';
		echo '</div>'; // item-text.

		echo '<div class="rbelad-dashboard-widgets__item-button ' . esc_attr( $disabled_class ) . '">';
		printf(
			'<input type="checkbox" name="rbelad_enabled_widgets[]" value="%1$s" %2$s %3$s class="rbelad-toggle__check" title="%4$s">',
			esc_attr( $slug ),
			checked( in_array( $slug, $enabled, true ), true, false ),
			disabled( $is_disabled, true, false ),
			esc_attr( $tooltip )
		);
		echo '<b class="rbelad-toggle__switch"></b><b class="rbelad-toggle__track"></b>';
		echo '</div>'; // item-button.

		echo '</div>'; // item.
	}
	echo '</div></div>'; // list & category.
}

echo '</div>'; // wrap.
