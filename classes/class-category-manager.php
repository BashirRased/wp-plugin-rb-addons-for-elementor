<?php
/**
 * Elementor Category Manager.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Classes;

use Elementor\Elements_Manager;
use RBELAD_Elementor_Addons\Widgets_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Category Manager.
 */
class Category_Manager {

	/**
	 * Category definitions.
	 *
	 * @return array
	 */
	private static function get_categories(): array {

		return array(
			'rbelad_addons_basic'   => array(
				'label' => esc_html__( 'RB Addons - Basic', 'rb-addons-for-elementor' ),
				'icon'  => 'rbelad-wi rbelad-wi-plugin',
			),

			'rbelad_addons_general' => array(
				'label' => esc_html__( 'RB Addons - General', 'rb-addons-for-elementor' ),
				'icon'  => 'rbelad-wi rbelad-wi-plugin',
			),

			'rbelad_pro_site'       => array(
				'label' => esc_html__( 'RB Pro - Theme Builder', 'rb-addons-for-elementor' ),
				'icon'  => 'rbelad-wi rbelad-wi-plugin',
			),

			'rbelad_pro_slider'     => array(
				'label' => esc_html__( 'RB Pro - Slider', 'rb-addons-for-elementor' ),
				'icon'  => 'rbelad-wi rbelad-wi-plugin',
			),

			'rbelad_pro_creative'   => array(
				'label' => esc_html__( 'RB Pro - Creative', 'rb-addons-for-elementor' ),
				'icon'  => 'rbelad-wi rbelad-wi-plugin',
			),
		);
	}

	/**
	 * Get widget count by category.
	 *
	 * Counts only active widgets.
	 *
	 * @param string $category_slug Category slug.
	 *
	 * @return int
	 */
	private static function get_category_count( string $category_slug ): int {

		$widgets = Widgets_Manager::get_local_widgets_map();

		$count = 0;

		foreach ( $widgets as $widget ) {

			if (
				! empty( $widget['is_active'] ) &&
				isset( $widget['cat'] ) &&
				$widget['cat'] === $category_slug
			) {
				++$count;
			}
		}

		return $count;
	}


	/**
	 * Register Elementor categories.
	 *
	 * @param Elements_Manager $elements_manager Elementor elements manager instance.
	 *
	 * @return void
	 */
	public static function register( Elements_Manager $elements_manager ): void {

		foreach ( self::get_categories() as $slug => $category ) {

			$elements_manager->add_category(
				$slug,
				array(
					'title' => sprintf(
						'%s (%d)',
						$category['label'],
						self::get_category_count( $slug )
					),
					'icon'  => $category['icon'],
				)
			);
		}
	}
}
