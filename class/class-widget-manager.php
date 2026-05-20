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
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-heading',
			),
			'image'           => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-image',
			),
			'text-editor'     => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-text-editor',
			),
			'video'           => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-play',
			),
			'button'          => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-button',
			),
			'button-group'    => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-button-group',
			),
			'divider'         => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-divider',
			),
			'spacer'          => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-spacer',
			),
			'google-maps'     => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-location-9',
			),
			'icon'            => array(
				'cat'  => 'rbelad_addons_basic',
				'icon' => 'rbelad-gf-icon rbelad-gf-star-4',
			),

			// General Addons.
			'tabs'            => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-tabs',
			),
			'info-box'        => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-content-box',
			),
			'image-carousel'  => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-image-carousel',
			),
			'image-gallery'   => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-image-gallery',
			),
			'icon-list'       => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-list',
			),
			'counter'         => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-alerm-clock',
			),
			'progress'        => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-progress',
			),
			'testimonial'     => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-testimonial',
			),
			'social-icons'    => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-social-icons',
			),
			'alert'           => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-notification',
			),
			'audio'           => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-audio',
			),
			'shortcode'       => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-code',
			),
			'html'            => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-html',
			),
			'rating'          => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-rating',
			),
			'text-path'       => array(
				'cat'  => 'rbelad_addons_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-text-path',
			),

			// Creative Addons.
			'scroll-down'     => array(
				'cat'  => 'rbelad_addons_creative',
				'icon' => 'rbelad-gf-icon rbelad-gf-scroll-down',
			),

			// Site Addons.
			'site-logo'       => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-site-logo',
			),
			'site-title'      => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-site-title',
			),
			'menu'            => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-menu',
			),
			'breadcrumbs'     => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-breadcrumbs',
			),
			'page-title'      => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-page-title',
			),
			'featured-image'  => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-image-2',
			),
			'post-meta'       => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-post-edit',
			),
			'post-excerpt'    => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-post-excerpt',
			),
			'read-more'       => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-read-more',
			),
			'author-box'      => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-profile-card-2',
			),
			'post-comments'   => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-comments',
			),
			'post-navigation' => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-navigation',
			),
			'archive-title'   => array(
				'cat' => 'rbelad_addons_site',
			),
			'archive-posts'   => array(
				'cat'  => 'rbelad_addons_site',
				'icon' => 'rbelad-gf-icon rbelad-gf-post-grid-2',
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
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-search-4',
			),
			'contact-form-7'       => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-contact-form-7',
			),
			'animated-headline'    => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-animated-text',
			),
			'flip-box'             => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-flip-box',
			),
			'countdown'            => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-alerm-clock-2',
			),
			'share-buttons'        => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-share-share-1',
			),
			'pdf-view'             => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-pdf',
			),
			'lottie'               => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-lottie',
			),
			'team-member'          => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-team-1',
			),
			'profile-card'         => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-profile-card-2',
			),
			'step-flow'            => array(
				'cat' => 'rbelad_pro_general',
			),
			'post-grid'            => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-post-grid',
			),
			'post-carousel'        => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-post-carousel',
			),
			'portfolio'            => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-portfolio',
			),
			'price-table'          => array(
				'cat' => 'rbelad_pro_general',
			),
			'price-list'           => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-price',
			),
			'blockquote'           => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-quote-left',
			),
			'testimonial-carousel' => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-testimonial-carousel',
			),
			'logo-grid'            => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-logo',
			),
			'logo-carousel'        => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-logo-carousel',
			),
			'scrolling-image'      => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-logo-image-carousel-2',
			),
			'business-hour'        => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-logo-business-hour',
			),
			'news-ticker'          => array(
				'cat' => 'rbelad_pro_general',
			),
			'toggle'               => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-logo-toggle',
			),
			'subscription-form'    => array(
				'cat'  => 'rbelad_pro_general',
				'icon' => 'rbelad-gf-icon rbelad-gf-logo-mailchimp',
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
	 * Get widget icon by name.
	 *
	 * @param string $widget_name Widget slug or class name.
	 *
	 * @return string Widget icon class.
	 */
	public static function get_widget_icon( $widget_name ) {
		$map = self::get_all_widgets_map();

		if ( isset( $map[ $widget_name ]['icon'] ) ) {
			return $map[ $widget_name ]['icon'];
		}

		return 'eicon-code';
	}

	/**
	 * Get total enabled widgets count by category.
	 *
	 * Counts only active/enabled widgets assigned to a specific category.
	 *
	 * @param string $category_slug Widget category slug.
	 *
	 * @return int Number of widgets in the category.
	 */
	private static function get_category_count( $category_slug ) {
		$widgets = self::get_widgets(); // enabled widgets only.
		$map     = self::get_all_widgets_map();

		$count = 0;

		foreach ( $widgets as $widget_slug ) {
			if (
				isset( $map[ $widget_slug ]['cat'] ) &&
				$map[ $widget_slug ]['cat'] === $category_slug
			) {
				++$count;
			}
		}

		return $count;
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
				'title' => sprintf(
					/* translators: %d: Number of widgets in Basic category */
					esc_html__( 'RB Addons - Basic (%d)', 'rb-addons-for-elementor' ),
					self::get_category_count( 'rbelad_addons_basic' )
				),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_general',
			array(
				'title' => sprintf(
					/* translators: %d: Number of widgets in Basic category */
					esc_html__( 'RB Addons - General (%d)', 'rb-addons-for-elementor' ),
					self::get_category_count( 'rbelad_addons_general' )
				),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_creative',
			array(
				'title' => sprintf(
					/* translators: %d: Number of widgets in Creative category */
					esc_html__( 'RB Addons - Creative (%d)', 'rb-addons-for-elementor' ),
					self::get_category_count( 'rbelad_addons_creative' )
				),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_site',
			array(
				'title' => sprintf(
					/* translators: %d: Number of widgets in Site category */
					esc_html__( 'RB Addons - Site (%d)', 'rb-addons-for-elementor' ),
					self::get_category_count( 'rbelad_addons_site' )
				),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_general',
			array(
				'title' => sprintf(
					/* translators: %d: Number of widgets in Site category */
					esc_html__( 'RB Pro - General (%d)', 'rb-addons-for-elementor' ),
					self::get_category_count( 'rbelad_addons_site' )
				),
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
