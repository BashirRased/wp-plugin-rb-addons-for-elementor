<?php
/**
 * Elementor widgets manage.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Widgets Manager.
 */
class Widgets_Manager {

	/**
	 * Register widgets.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager instance.
	 *
	 * @return void
	 */
	public static function register( $widgets_manager = null ) {
		require_once RBELAD_CLASSES_PATH . 'class-base.php';
		$inactive_widgets = array();
		foreach ( self::get_local_widgets_map() as $widget_key => $data ) {
			if ( in_array( $widget_key, $inactive_widgets, true ) ) {
				continue;
			}
			self::register_widget(
				$widget_key,
				$widgets_manager
			);
		}
	}

	/**
	 * Register single widget.
	 *
	 * @param string                          $widget_key Widget ID.
	 * @param \Elementor\Widgets_Manager|null $widgets_manager Elementor widgets manager.
	 *
	 * @return void
	 */
	protected static function register_widget( $widget_key, $widgets_manager = null ) {

		$widget_file = RBELAD_WIDGET_PATH . $widget_key . '/class-' . $widget_key . '.php';

		if ( is_readable( $widget_file ) ) {

			require_once $widget_file;

			$widget_class =
				'\RBELAD_Elementor_Addons\Widgets\\'
				. str_replace( '-', '_', $widget_key );

			if ( class_exists( $widget_class ) ) {

				$widgets_manager->register(
					new $widget_class()
				);
			}
		}
	}

	/**
	 * Get widget list.
	 *
	 * @return array
	 */
	public static function get_local_widgets_map() {
		$file = RBELAD_GLOBAL_PATH . 'free-widget-list.php';
		if ( file_exists( $file ) ) {
			return require $file;
		}
		return array();
	}

	/**
	 * Get default active widgets.
	 *
	 * @return array
	 */
	public static function get_default_active_widget() {
		$active = array_filter(
			self::get_local_widgets_map(),
			function ( $widget ) {
				return ! empty( $widget['is_active'] );
			}
		);
		return array_keys( $active );
	}
}
