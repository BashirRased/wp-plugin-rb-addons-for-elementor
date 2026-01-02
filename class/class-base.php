<?php
/**
 * Widgets ID, Title, Category & Wrapper Classes.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use Elementor\Widget_Base;
use RBELAD_Elementor_Addons\Widget_Manager;

defined( 'ABSPATH' ) || die();

/**
 * Base Class for RB Addons for Elementor widgets.
 *
 * Provides common functionality for all custom widgets,
 * including naming, titles, icons, and category assignment.
 *
 * @package RBELAD_Elementor_Addons
 */
abstract class Base extends Widget_Base {

	/**
	 * Get the widget name.
	 *
	 * Generates a unique widget slug based on the class name,
	 * prefixed with "rbelad".
	 *
	 * @return string Widget slug.
	 */
	public function get_name() {
		$full_class = strtolower( get_class( $this ) );
		$namespace  = strtolower( __NAMESPACE__ );
		$name       = str_replace( $namespace . '\\', '', $full_class );
		$name       = str_replace( '_', '-', $name );
		$name       = ltrim( $name, '\\' );
		return 'rbelad-' . $name;
	}

	/**
	 * Get the widget title.
	 *
	 * Converts the widget slug into a human-readable title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		$slug                = $this->get_name();
		$slug_without_prefix = preg_replace( '/^rbelad-/', '', $slug );
		$title               = ucwords( str_replace( '-', ' ', $slug_without_prefix ) );
		return esc_html( $title );
	}

	/**
	 * Get the widget icon.
	 *
	 * @return string Icon class name for Elementor editor.
	 */
	public function get_icon() {
		$slug = $this->get_name();
		return 'rbelad-icon ' . $slug;
	}

	/**
	 * Get the widget categories.
	 *
	 * @return array<string> List of categories.
	 */
	public function get_categories(): array {
		$slug_without_prefix = preg_replace( '/^rbelad-/', '', $this->get_name() );
		$category            = Widget_Manager::get_widget_category( $slug_without_prefix );
		return array( $category );
	}

	/**
	 * Get custom wrapper class.
	 *
	 * Override this in child widgets to append a custom class.
	 *
	 * @return string Custom wrapper class.
	 */
	protected function get_custom_wrapper_class() {
		return '';
	}

	/**
	 * Get the HTML wrapper class for the widget.
	 *
	 * Combines the base widget classes with any custom classes.
	 *
	 * @return string Wrapper class attribute value.
	 */
	public function get_html_wrapper_class() {
		$slug                = $this->get_name();
		$slug_without_prefix = preg_replace( '/^rbelad-/', '', $slug );
		return 'rbelad-wrap rbelad-wrap-' . $slug_without_prefix . ' ' . $this->get_custom_wrapper_class();
	}

	/**
	 * Get a unique section prefix for the widget.
	 *
	 * @param string $section Section name.
	 * @return string Section prefix.
	 */
	public function get_section_prefix( string $section ): string {
		$slug = $this->get_name(); // rbelad-archive-description.
		$slug = str_replace( '-', '_', $slug ); // rbelad_archive_description.
		return $slug . '_' . $section;
	}
}
