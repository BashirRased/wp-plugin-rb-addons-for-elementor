<?php
/**
 * Elementor widgets manage.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Widget_Manager Class.
 */
class Widget_Manager {
	/**
	 * Get widget thumbnail url.
	 *
	 * @param string $widget_id Widget slug (folder name).
	 * @param string $file_name Image file name.
	 *
	 * @return string
	 */
	public static function get_widget_thumbnail_url( $widget_id, $file_name ) {
		$widget_id = sanitize_key( $widget_id );
		$file_name = basename( $file_name );

		// New relative path.
		$relative_path = 'inc/addons/' . $widget_id . '/thumb/' . $file_name;

		$file_path = trailingslashit( RBELAD_PLUGIN_DIR ) . $relative_path;
		$file_url  = trailingslashit( RBELAD_PLUGIN_URL ) . $relative_path;

		return file_exists( $file_path ) ? esc_url( $file_url ) : '';
	}

	/**
	 * All free widgets list
	 */
	public static function get_free_widgets_map() {
		$addons = array(
			// Basic Addons.
			'heading'         => array(
				'cat' => 'rbelad_addons_basic',
			),
			'image'           => array(
				'cat' => 'rbelad_addons_basic',
			),
			'text-editor'     => array(
				'cat' => 'rbelad_addons_basic', // Next version.
			),
			'video'           => array(
				'cat' => 'rbelad_addons_basic',
			),
			'button'          => array(
				'cat' => 'rbelad_addons_basic',
			),
			'button-group'    => array(
				'cat' => 'rbelad_addons_basic',
			),
			'divider'         => array(
				'cat' => 'rbelad_addons_basic',
			),
			'spacer'          => array(
				'cat' => 'rbelad_addons_basic', // Next version.
			),
			'google-maps'     => array(
				'cat' => 'rbelad_addons_basic', // Next version.
			),
			'icon'            => array(
				'cat' => 'rbelad_addons_basic', // Next version.
			),

			// General Addons.
			'tabs'            => array(
				'cat' => 'rbelad_addons_general',
			),
			'info-box'        => array(
				'cat' => 'rbelad_addons_general', // Next version.
			),
			'image-carousel'  => array(
				'cat' => 'rbelad_addons_general',
			),
			'image-gallery'   => array(
				'cat' => 'rbelad_addons_general',
			),
			'icon-list'       => array(
				'cat' => 'rbelad_addons_general',
			),
			'counter'         => array(
				'cat' => 'rbelad_addons_general',
			),
			'progress'        => array(
				'cat' => 'rbelad_addons_general',
			),
			'testimonial'     => array(
				'cat' => 'rbelad_addons_general',
			),
			'social-icons'    => array(
				'cat' => 'rbelad_addons_general',
			),
			'alert'           => array(
				'cat' => 'rbelad_addons_general', // Next version.
			),
			'audio'           => array(
				'cat' => 'rbelad_addons_general', // Next version.
			),
			'shortcode'       => array(
				'cat' => 'rbelad_addons_general', // Next version.
			),
			'html'            => array(
				'cat' => 'rbelad_addons_general', // Next version.
			),
			'rating'          => array(
				'cat' => 'rbelad_addons_general',
			),
			'text-path'       => array(
				'cat' => 'rbelad_addons_general',
			),

			// Creative Addons.
			'scroll-down'     => array(
				'cat' => 'rbelad_addons_creative',
			),

			// Site Addons.
			'site-logo'       => array(
				'cat' => 'rbelad_addons_site',
			),
			'site-title'      => array(
				'cat' => 'rbelad_addons_site',
			),
			'menu'            => array(
				'cat' => 'rbelad_addons_site',
			),
			'breadcrumbs'     => array(
				'cat' => 'rbelad_addons_site',
			),
			'page-title'      => array(
				'cat' => 'rbelad_addons_site',
			),
			'featured-iImage' => array(
				'cat' => 'rbelad_addons_site',
			),
			'post-meta'       => array(
				'cat' => 'rbelad_addons_site',
			),
			'post-excerpt'    => array(
				'cat' => 'rbelad_addons_site',
			),
			'read-more'       => array(
				'cat' => 'rbelad_addons_site', // Next version.
			),
			'author-box'      => array(
				'cat' => 'rbelad_addons_site',
			),
			'post-comments'   => array(
				'cat' => 'rbelad_addons_site',
			),
			'post-navigation' => array(
				'cat' => 'rbelad_addons_site',
			),
			'archive-title'   => array(
				'cat' => 'rbelad_addons_site',
			),
			'archive-posts'   => array(
				'cat' => 'rbelad_addons_site',
			),
		);
		$return = array();

		foreach ( $addons as $slug => $data ) {
			$return[ $slug ] = array_merge(
				$data,
				array(
					'is_active' => true,
				)
			);
		}

		return $return;
	}

	/**
	 * All pro widgets list
	 */
	public static function get_pro_widgets_map() {
		$addons = array(
			// Slider & Carousel Addons.
			'search'               => array(
				'cat' => 'rbelad_pro_general',
			),
			'contact-form-7'       => array(
				'cat' => 'rbelad_pro_general',
			),
			'animated-headline'    => array(
				'cat' => 'rbelad_pro_general',
			),
			'flip-box'             => array(
				'cat' => 'rbelad_pro_general',
			),
			'countdown'            => array(
				'cat' => 'rbelad_pro_general',
			),
			'share-buttons'        => array(
				'cat' => 'rbelad_pro_general',
			),
			'pdf-view'             => array(
				'cat' => 'rbelad_pro_general',
			),
			'lottie'               => array(
				'cat' => 'rbelad_pro_general',
			),
			'team-member'          => array(
				'cat' => 'rbelad_pro_general',
			),
			'profile-card'         => array(
				'cat' => 'rbelad_pro_general',
			),
			'post-grid'            => array(
				'cat' => 'rbelad_pro_general',
			),
			'post-carousel'        => array(
				'cat' => 'rbelad_pro_general',
			),
			'portfolio'            => array(
				'cat' => 'rbelad_pro_general',
			),
			'price-table'          => array(
				'cat' => 'rbelad_pro_general',
			),
			'price-list'           => array(
				'cat' => 'rbelad_pro_general',
			),
			'blockquote'           => array(
				'cat' => 'rbelad_pro_general',
			),
			'testimonial-carousel' => array(
				'cat' => 'rbelad_pro_general',
			),
			'logo-grid'            => array(
				'cat' => 'rbelad_pro_general',
			),
			'logo-carousel'        => array(
				'cat' => 'rbelad_pro_general',
			),
			'scrolling-image'      => array(
				'cat' => 'rbelad_pro_general',
			),
			'business-hour'        => array(
				'cat' => 'rbelad_pro_general',
			),
			'news-ticker'          => array(
				'cat' => 'rbelad_pro_general',
			),
			'toggle'               => array(
				'cat' => 'rbelad_pro_general',
			),
			'subscription-form'    => array(
				'cat' => 'rbelad_pro_general',
			),
		);
		$return = array();

		foreach ( $addons as $slug => $data ) {
			$return[ $slug ] = array_merge(
				$data,
				array(
					'is_pro' => true,
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
	 * Get default active widgets
	 */
	public static function get_default_active_widgets() {
		$all_widgets = self::get_all_widgets_map();

		$active_widgets = array_filter(
			$all_widgets,
			function ( $widget ) {
				return isset( $widget['is_active'] ) && true === $widget['is_active'];
			}
		);

		return array_keys( $active_widgets );
	}

	/**
	 * Return enabled widgets list.
	 */
	public static function get_widgets() {

		$enabled_widgets = get_option( 'rbelad_enabled_widgets' );

		// If no saved option → use default active widgets.
		if ( ! is_array( $enabled_widgets ) || empty( $enabled_widgets ) ) {
			return self::get_default_active_widgets();
		}

		// Only return valid widgets.
		$all_widgets = array_keys( self::get_all_widgets_map() );

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
	 * Register Elementor widget categories.
	 *
	 * @param \Elementor\Elements_Manager $elements_manager Elementor elements manager instance.
	 *
	 * @return void
	 */
	public static function register_categories( \Elementor\Elements_Manager $elements_manager ) {
		$elements_manager->add_category(
			'rbelad_addons_basic',
			array(
				'title' => esc_html__( 'RB Addons - Basic', 'rb-addons-for-elementor' ),
			)
		);
		$elements_manager->add_category(
			'rbelad_addons_general',
			array(
				'title' => esc_html__( 'RB Addons - General', 'rb-addons-for-elementor' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_creative',
			array(
				'title' => esc_html__( 'RB Addons - Creative', 'rb-addons-for-elementor' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_site',
			array(
				'title' => esc_html__( 'RB Addons - Site', 'rb-addons-for-elementor' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_general',
			array(
				'title' => esc_html__( 'RB Pro - General', 'rb-addons-for-elementor' ),
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
