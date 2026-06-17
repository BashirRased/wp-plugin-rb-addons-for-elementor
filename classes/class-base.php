<?php
/**
 * Widgets Base Class.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use Elementor\Widget_Base;
use RBELAD_Elementor_Addons\Widgets_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Base Class for RB Addons widgets.
 */
abstract class Base extends Widget_Base {

	/**
	 * Get widget configuration from widgets map.
	 *
	 * @return array
	 */
	protected function get_widget_config(): array {

		$widget_name = str_replace( 'rbelad-', '', $this->get_name() );

		$widgets = Widgets_Manager::get_local_widgets_map();

		return $widgets[ $widget_name ] ?? array();
	}

	/**
	 * Get widget name.
	 *
	 * @return string
	 */
	public function get_name(): string {

		$class_name = strtolower( get_class( $this ) );

		$class_name = preg_replace(
			'/^rbelad_elementor_addons\\\\widgets\\\\/',
			'',
			$class_name
		);

		$class_name = str_replace( '\\', '-', $class_name );

		return 'rbelad-' . $class_name;
	}

	/**
	 * Get widget title.
	 *
	 * @return string
	 */
	public function get_title(): string {

		$config = $this->get_widget_config();

		if ( ! empty( $config['title'] ) ) {
			return $config['title'];
		}

		$slug = str_replace( 'rbelad-', '', $this->get_name() );

		return ucwords( str_replace( '-', ' ', $slug ) );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string
	 */
	public function get_icon(): string {

		$config = $this->get_widget_config();

		return $config['icon'] ?? 'eicon-elementor';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array
	 */
	public function get_categories(): array {

		$config = $this->get_widget_config();

		return array(
			$config['cat'] ?? 'rbelad_addons_basic',
		);
	}

	/**
	 * Get custom wrapper class.
	 *
	 * @return string
	 */
	protected function get_custom_wrapper_class(): string {
		return '';
	}

	/**
	 * Get widget wrapper classes.
	 *
	 * @return string
	 */
	public function get_html_wrapper_class(): string {

		$slug = str_replace( 'rbelad-', '', $this->get_name() );

		$classes = array(
			'rbelad-wrap',
			'rbelad-wrap-' . $slug,
			'rbel-widget',
			'rbel-widget-' . $slug,
		);

		$custom_class = $this->get_custom_wrapper_class();

		if ( ! empty( $custom_class ) ) {
			$classes[] = $custom_class;
		}

		return implode( ' ', array_filter( $classes ) );
	}

	/**
	 * Get content section prefix.
	 *
	 * @param string $section Section name.
	 *
	 * @return string
	 */
	public function get_section_content_prefix( string $section ): string {

		$slug = str_replace( '-', '_', $this->get_name() );

		return $slug . '_content_' . $section;
	}

	/**
	 * Get style section prefix.
	 *
	 * @param string $section Section name.
	 *
	 * @return string
	 */
	public function get_section_style_prefix( string $section ): string {

		$slug = str_replace( '-', '_', $this->get_name() );

		return $slug . '_style_' . $section;
	}

	/**
	 * Add content controls.
	 *
	 * @param string $prefix Controls prefix.
	 * @param array  $args   Controls arguments.
	 *
	 * @return void
	 */
	protected function add_content_controls( string $prefix, array $args ): void {

		require RBELAD_GLOBAL_PATH . 'all-content.php';
	}
}
