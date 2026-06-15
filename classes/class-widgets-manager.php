<?php

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Widgets Manager
 */
class Widgets_Manager {

	/**
	 * Register widgets
	 */
	public static function register( $widgets_manager ) {

		self::load_widgets( $widgets_manager );
	}

	private static function get_widgets() {

		return [
			[
				'path'  => 'basic/heading/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Heading',
			],
			[
				'path'  => 'basic/image/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Image',
			],
			[
				'path'  => 'basic/text-editor/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Text_Editor',
			],
			[
				'path'  => 'basic/video/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Video',
			],
			[
				'path'  => 'basic/button/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Button',
			],
			[
				'path'  => 'basic/divider/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Divider',
			],
			[
				'path'  => 'basic/spacer/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Spacer',
			],
			[
				'path'  => 'basic/google-maps/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Google_Maps',
			],
			[
				'path'  => 'basic/icon/widget.php',
				'class' => '\RBELAD_Elementor_Addons\Widgets\Basic\Icon',
			],
		];
	}

	/**
	 * Load all widgets
	 */
	private static function load_widgets( $widgets_manager ) {

		$widgets = self::get_widgets();

		foreach ( $widgets as $widget ) {

			$file  = RBELAD_WIDGET_PATH . $widget['path'];
			$class = $widget['class'];

			if ( file_exists( $file ) ) {
				require_once $file;

				if ( class_exists( $class ) ) {
					$widgets_manager->register( new $class );
				}
			}
		}
	}
}