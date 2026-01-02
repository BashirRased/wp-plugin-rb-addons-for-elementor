<?php
/**
 * Elementor widgets manage.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Widget_Manager Class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Widget_Manager {

	/**
	 * All free widgets list
	 */
	public static function get_free_widgets_map() {
		// Widgets variables.
		$demo_url     = 'https://bashir-rased.com/rb-elementor-addons/demos/';
		$doc_url      = 'https://bashir-rased.com/rb-elementor-addons/docs/';
		$import_url   = 'https://bashir-rased.com/rb-elementor-addons/blocks/';
		$tutorial_url = 'https://www.youtube.com/watch?v=';

		$addons = array(
			// General Addons.
			'dual-text'           => array(
				'cat' => 'rbelad_addons_general',
			),
			'button-group'        => array(
				'cat' => 'rbelad_addons_general',
			),
			'section-header'      => array(
				'cat' => 'rbelad_addons_general',
			),
			'divider'             => array(
				'cat' => 'rbelad_addons_general',
			),
			'list-style'          => array(
				'cat' => 'rbelad_addons_general',
			),
			'button'              => array(
				'cat' => 'rbelad_addons_general',
			),

			// Creative Addons.
			'scroll-down'         => array(
				'cat' => 'rbelad_addons_creative',
			),
			'resume-list'         => array(
				'cat' => 'rbelad_addons_creative',
			),
			'rating-skill'        => array(
				'cat' => 'rbelad_addons_creative',
			),
			'service-list'        => array(
				'cat' => 'rbelad_addons_creative',
			),
			'contact-info'        => array(
				'cat' => 'rbelad_addons_creative',
			),
			'contact-form'        => array(
				'cat' => 'rbelad_addons_creative',
			),

			// Theme Builder Addons.
			'site-logo'           => array(
				'cat' => 'rbelad_addons_builder',
			),
			'site-title'          => array(
				'cat' => 'rbelad_addons_builder',
			),
			'site-tagline'        => array(
				'cat' => 'rbelad_addons_builder',
			),
			'page-title'          => array(
				'cat' => 'rbelad_addons_builder',
			),
			'post-thumbnail'      => array(
				'cat' => 'rbelad_addons_builder',
			),
			'archive-title'       => array(
				'cat' => 'rbelad_addons_builder',
			),
			'archive-description' => array(
				'cat' => 'rbelad_addons_builder',
			),
			'author-meta'         => array(
				'cat' => 'rbelad_addons_builder',
			),
			'category-meta'       => array(
				'cat' => 'rbelad_addons_builder',
			),
			'tag-meta'            => array(
				'cat' => 'rbelad_addons_builder',
			),
			'date-meta'           => array(
				'cat' => 'rbelad_addons_builder',
			),
			'comment-meta'        => array(
				'cat' => 'rbelad_addons_builder',
			),
			'post-edit-meta'      => array(
				'cat' => 'rbelad_addons_builder',
			),
			'post-meta-separator' => array(
				'cat' => 'rbelad_addons_builder',
			),
			'post-excerpt'        => array(
				'cat' => 'rbelad_addons_builder',
			),
			'read-more-button'    => array(
				'cat' => 'rbelad_addons_builder',
			),
			'post-navigation'     => array(
				'cat' => 'rbelad_addons_builder',
			),
			'post-pagination'     => array(
				'cat' => 'rbelad_addons_builder',
			),
			'page-pagination'     => array(
				'cat' => 'rbelad_addons_builder',
			),
			'comment-pagination'  => array(
				'cat' => 'rbelad_addons_builder',
			),
			'comment-header'      => array(
				'cat' => 'rbelad_addons_builder',
			),
		);
		$return = array();

		foreach ( $addons as $slug => $data ) {
			$return[ $slug ] = array_merge(
				$data,
				array(
					'demo'     => $demo_url . $slug,
					'doc'      => $doc_url . $slug,
					'import'   => $import_url . $slug,
					'tutorial' => $tutorial_url . $slug,
				)
			);
		}

		return $return;
	}

	/**
	 * All pro widgets list
	 */
	public static function get_pro_widgets_map() {
		// Widgets variables.
		$demo_url     = 'https://bashir-rased.com/rb-elementor-addons/demos/';
		$doc_url      = 'https://bashir-rased.com/rb-elementor-addons/docs/';
		$import_url   = 'https://bashir-rased.com/rb-elementor-addons/blocks/';
		$tutorial_url = 'https://www.youtube.com/watch?v=';

		$addons = array(
			// Creative Addons.
			'social-icon'            => array(
				'cat' => 'rbelad_pro_creative',
			),
			'business-hours'         => array(
				'cat' => 'rbelad_pro_creative',
			),
			'hero-section'           => array(
				'cat' => 'rbelad_pro_creative',
			),
			'page-list'              => array(
				'cat' => 'rbelad_pro_creative',
			),
			'icon-box'               => array(
				'cat' => 'rbelad_pro_creative',
			),
			'alert'                  => array(
				'cat' => 'rbelad_pro_creative',
			),
			'drop-cap'               => array(
				'cat' => 'rbelad_pro_creative',
			),
			'call-to-action'         => array(
				'cat' => 'rbelad_pro_creative',
			),
			'gradient-text'          => array(
				'cat' => 'rbelad_pro_creative',
			),
			'about-image-section'    => array(
				'cat' => 'rbelad_pro_creative',
			),
			'logo-list'              => array(
				'cat' => 'rbelad_pro_creative',
			),
			'featured-list'          => array(
				'cat' => 'rbelad_pro_creative',
			),
			'featured-banner'        => array(
				'cat' => 'rbelad_pro_creative',
			),
			'image-grid'             => array(
				'cat' => 'rbelad_pro_creative',
			),
			'latest-post-list'       => array(
				'cat' => 'rbelad_pro_creative',
			),
			'simple-menu'            => array(
				'cat' => 'rbelad_pro_creative',
			),
			'video-section'          => array(
				'cat' => 'rbelad_pro_creative',
			),
			'faq'                    => array(
				'cat' => 'rbelad_pro_creative',
			),
			'faq-section'            => array(
				'cat' => 'rbelad_pro_creative',
			),
			'timeline'               => array(
				'cat' => 'rbelad_pro_creative',
			),

			// Slider & Carousel Addons.
			'auto-typing'            => array(
				'cat' => 'rbelad_pro_slider',
			),
			'pdf-view'               => array(
				'cat' => 'rbelad_pro_slider',
			),
			'lottie-animation'       => array(
				'cat' => 'rbelad_pro_slider',
			),
			'skill-bar'              => array(
				'cat' => 'rbelad_pro_slider',
			),
			'subscribe-form'         => array(
				'cat' => 'rbelad_pro_slider',
			),
			'fun-fact'               => array(
				'cat' => 'rbelad_pro_slider',
			),
			'share-button'           => array(
				'cat' => 'rbelad_pro_slider',
			),
			'news-ticker'            => array(
				'cat' => 'rbelad_pro_slider',
			),
			'accordion'              => array(
				'cat' => 'rbelad_pro_slider',
			),
			'hero-section-slider'    => array(
				'cat' => 'rbelad_pro_slider',
			),
			'logo-sliding'           => array(
				'cat' => 'rbelad_pro_slider',
			),
			'logo-carousel'          => array(
				'cat' => 'rbelad_pro_slider',
			),
			'post-carousel'          => array(
				'cat' => 'rbelad_pro_slider',
			),
			'service-post-carousel'  => array(
				'cat' => 'rbelad_pro_slider',
			),
			'portfolio-section'      => array(
				'cat' => 'rbelad_pro_slider',
			),
			'project-post-carousel'  => array(
				'cat' => 'rbelad_pro_slider',
			),
			'testimonial-carousel'   => array(
				'cat' => 'rbelad_pro_slider',
			),
			'team-carousel'          => array(
				'cat' => 'rbelad_pro_slider',
			),
			'donation-post-carousel' => array(
				'cat' => 'rbelad_pro_slider',
			),
			'featured-slider'        => array(
				'cat' => 'rbelad_pro_slider',
			),
			'twitter-feed'           => array(
				'cat' => 'rbelad_pro_slider',
			),
			'text-scrolling'         => array(
				'cat' => 'rbelad_pro_slider',
			),
			'advanced-tabs'          => array(
				'cat' => 'rbelad_pro_slider',
			),
			'google-map'             => array(
				'cat' => 'rbelad_pro_slider',
			),
			'google-map-section'     => array(
				'cat' => 'rbelad_pro_slider',
			),
			'countdown'              => array(
				'cat' => 'rbelad_pro_slider',
			),
			'countdown-section'      => array(
				'cat' => 'rbelad_pro_slider',
			),

			// Post Addons.
			'post-list'              => array(
				'cat' => 'rbelad_pro_post',
			),
			'post-grid'              => array(
				'cat' => 'rbelad_pro_post',
			),
			'service-post-grid'      => array(
				'cat' => 'rbelad_pro_post',
			),
			'service-latest-posts'   => array(
				'cat' => 'rbelad_pro_post',
			),
			'event-post-list'        => array(
				'cat' => 'rbelad_pro_post',
			),
			'event-post-grid'        => array(
				'cat' => 'rbelad_pro_post',
			),
			'project-post-list'      => array(
				'cat' => 'rbelad_pro_post',
			),
			'project-post-grid'      => array(
				'cat' => 'rbelad_pro_post',
			),
			'testimonial-section'    => array(
				'cat' => 'rbelad_pro_post',
			),
			'testimonial-grid'       => array(
				'cat' => 'rbelad_pro_post',
			),
			'team-grid'              => array(
				'cat' => 'rbelad_pro_post',
			),
			'donation-post-section'  => array(
				'cat' => 'rbelad_pro_post',
			),
			'donation-post-grid'     => array(
				'cat' => 'rbelad_pro_post',
			),
			'donation-post-category' => array(
				'cat' => 'rbelad_pro_post',
			),
			'donation-latest-posts'  => array(
				'cat' => 'rbelad_pro_post',
			),

			// Theme Builder Addons.
			'archive-posts'          => array(
				'cat' => 'rbelad_pro_builder',
			),
			'navigation-menu'        => array(
				'cat' => 'rbelad_pro_builder',
			),
			'mega-menu'              => array(
				'cat' => 'rbelad_pro_builder',
			),
			'post-view-meta'         => array(
				'cat' => 'rbelad_pro_builder',
			),
			'post-reading-time-meta' => array(
				'cat' => 'rbelad_pro_builder',
			),
			'search-box'             => array(
				'cat' => 'rbelad_pro_builder',
			),
			'comment-list'           => array(
				'cat' => 'rbelad_pro_builder',
			),
			'comment-form'           => array(
				'cat' => 'rbelad_pro_builder',
			),
		);
		$return = array();

		foreach ( $addons as $slug => $data ) {
			$return[ $slug ] = array_merge(
				$data,
				array(
					'demo'     => $demo_url . $slug,
					'doc'      => $doc_url . $slug,
					'import'   => $import_url . $slug,
					'tutorial' => $tutorial_url . $slug,
					'is_pro'   => true,
				)
			);
		}

		return $return;
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
		if ( isset( $map[ $widget_name ]['cat'] ) ) {
			return $map[ $widget_name ]['cat'];
		}
		return 'rbelad_addons_general';
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
	 * Get widget tutorial URL by name.
	 *
	 * @param string $widget_name Widget slug or class name.
	 *
	 * @return string Tutorial URL.
	 */
	public static function get_widget_tutorial( $widget_name ) {
		$map = self::get_all_widgets_map();
		return $map[ $widget_name ]['tutorial'] ?? '';
	}

	/**
	 * Get widget documentation URL by name.
	 *
	 * @param string $widget_name Widget slug or class name.
	 *
	 * @return string Documentation URL.
	 */
	public static function get_widget_doc( $widget_name ) {
		$map = self::get_all_widgets_map();
		return $map[ $widget_name ]['doc'] ?? '';
	}

	/**
	 * Get widget import blocks URL by name.
	 *
	 * @param string $widget_name Widget slug or class name.
	 *
	 * @return string Import Blocks URL.
	 */
	public static function get_widget_import( $widget_name ) {
		$map = self::get_all_widgets_map();
		return $map[ $widget_name ]['import'] ?? '';
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
			'rbelad_addons_creative',
			array(
				'title' => esc_html__( 'RB Creative Addons', 'rb-elementor-addons' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_builder',
			array(
				'title' => esc_html__( 'RB WordPress Addons', 'rb-elementor-addons' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_creative',
			array(
				'title' => esc_html__( 'RB Creative Pro', 'rb-elementor-addons' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_slider',
			array(
				'title' => esc_html__( 'RB Slider Pro', 'rb-elementor-addons' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_post',
			array(
				'title' => esc_html__( 'RB Post Pro', 'rb-elementor-addons' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_builder',
			array(
				'title' => esc_html__( 'RB WordPress Pro', 'rb-elementor-addons' ),
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
