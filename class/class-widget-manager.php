<?php
/**
 * Elementor widgets manage.
 *
 * @package RB_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Widget_Manager Class.
 *
 * @package RB_Elementor_Addons
 */
class Widget_Manager {

	/**
	 * All free widgets list
	 */
	public static function get_free_widgets_map() {
		return array(
			// General Addons.
			'dual-text'           => array(
				'cat'  => 'rbelad_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/dual-text',
			),
			'button-group'        => array(
				'cat'  => 'rbelad_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/button-group',
			),
			'section-header'      => array(
				'cat'  => 'rbelad_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/section-header',
			),
			'divider'             => array(
				'cat'  => 'rbelad_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/divider',
			),
			'service-list'        => array(
				'cat'  => 'rbelad_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/service-list',
			),

			// WordPress Addons.
			'archive-title'       => array(
				'cat'  => 'rbelad_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/archive-title',
			),
			'archive-description' => array(
				'cat'  => 'rbelad_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/archive-description',
			),
		);
	}

	/**
	 * All pro widgets list
	 */
	public static function get_pro_widgets_map() {
		return array(
			'social-icon'       => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/social-icon',
				'is_pro' => true,
			),
			'auto-typing'       => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/auto-typing',
				'is_pro' => true,
			),
			'pdf-view'          => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/pdf-view',
				'is_pro' => true,
			),
			'lottie-animation'  => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/lottie-animation',
				'is_pro' => true,
			),
			'skill-bar'         => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/skill-bar',
				'is_pro' => true,
			),
			'portfolio-section' => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/portfolio-section',
				'is_pro' => true,
			),
			'subscribe-form'    => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/subscribe-form',
				'is_pro' => true,
			),
			'fun-fact'          => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/fun-fact',
				'is_pro' => true,
			),
			'testimonial'       => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/testimonial',
				'is_pro' => true,
			),
			'comment-template'  => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/comment-template',
				'is_pro' => true,
			),
			'archive-posts'     => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/archive-posts',
				'is_pro' => true,
			),
			'navigation-menu'   => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/navigation-menu',
				'is_pro' => true,
			),
			'post-view-meta'    => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/post-view-meta',
				'is_pro' => true,
			),
			'search-box'        => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/search-box',
				'is_pro' => true,
			),
			'team-member'       => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/team-member',
				'is_pro' => true,
			),
			'share-button'      => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/share-button',
				'is_pro' => true,
			),
			'business-hours'    => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/business-hours',
				'is_pro' => true,
			),
			'count-down'        => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/count-down',
				'is_pro' => true,
			),
			'news-ticker'       => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/news-ticker',
				'is_pro' => true,
			),
			'accordion'         => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/accordion',
				'is_pro' => true,
			),
			'mega-menu'         => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/mega-menu',
				'is_pro' => true,
			),
			'post-grid'         => array(
				'cat'    => 'rbelad_addons_pro',
				'demo'   => 'https://bashirrased.com/rb-elementor-addons/post-grid',
				'is_pro' => true,
			),
		);
	}

	/**
	 * All free and pro widget merge
	 */
	public static function get_all_widgets_map() {
		return array_merge( self::get_free_widgets_map(), self::get_pro_widgets_map() );
	}

	/**
	 * Return enabled widgets list.
	 */
	public static function get_widgets() {
		$all_widgets     = array_keys( self::get_all_widgets_map() );
		$enabled_widgets = get_option( 'rbelad_enabled_widgets' );
		if ( ! is_array( $enabled_widgets ) || empty( $enabled_widgets ) ) {
			return $all_widgets;
		}
		return array_values( array_intersect( $enabled_widgets, $all_widgets ) );
	}

	/**
	 * Get widget category by name.
	 *
	 * @param string $widget_name Widget slug or class name.
	 *
	 * @return string Widget category slug.
	 */
	public static function get_widget_category( $widget_name ) {
		$map = self::get_all_widgets_map();
		return $map[ $widget_name ]['cat'] ?? 'rbelad_addons_general';
	}

	/**
	 * Get widget demo URL by name.
	 *
	 * @param string $widget_name Widget slug or class name.
	 *
	 * @return string Demo URL.
	 */
	public static function get_widget_demo( $widget_name ) {
		$map = self::get_all_widgets_map();
		return $map[ $widget_name ]['demo'] ?? '';
	}

	/**
	 * Register Elementor widget categories.
	 *
	 * @param \Elementor\Elements_Manager $elements_manager Elementor elements manager instance.
	 *
	 * @return void
	 */
	public static function register_categories( \Elementor\Elements_Manager $elements_manager ) {
		$elements_manager->add_category(
			'rbelad_addons_general',
			array(
				'title' => esc_html__( 'RB General Addons', 'rb-elementor-addons' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_core',
			array(
				'title' => esc_html__( 'RB WordPress Addons', 'rb-elementor-addons' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_pro',
			array(
				'title' => esc_html__( 'RB Addons Pro', 'rb-elementor-addons' ),
			)
		);
	}

	/**
	 * Register all custom Elementor widgets.
	 *
	 * Loops through the plugin's widget folders, includes each widget file,
	 * instantiates the widget class, sets its category, and registers it with Elementor.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager instance.
	 *
	 * @return void
	 */
	public static function register_widgets( $widgets_manager ) {
		foreach ( self::get_widgets() as $widget_name ) {
			$widget_file = RBELAD_WIDGETS . "{$widget_name}/class-{$widget_name}.php";

			if ( file_exists( $widget_file ) ) {
				require_once $widget_file;

				$class_name = str_replace( '-', '_', ucwords( $widget_name, '-' ) );
				$full_class = "RBELAD_Elementor_Addons\\Widgets\\{$class_name}";

				if ( class_exists( $full_class ) ) {
					$widget_instance = new $full_class();

					// Set category.
					if ( method_exists( $widget_instance, 'set_categories' ) ) {
						$widget_instance->set_categories( array( self::get_widget_category( $widget_name ) ) );
					} elseif ( property_exists( $widget_instance, 'categories' ) ) {
						$widget_instance->categories = array( self::get_widget_category( $widget_name ) );
					}

					$widgets_manager->register( $widget_instance );
				}
			}
		}
	}
}
