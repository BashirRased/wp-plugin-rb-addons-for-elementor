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
			// General Addons.
			'button'       => array(
				'cat'    => 'rbelad_addons_general',
				'styles' => array(
					'style-1' => array(
						'name'      => esc_html__( 'Style - 01', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button', 'style-1.png' ),
					),
					'style-2' => array(
						'name'      => esc_html__( 'Style - 02', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button', 'style-2.png' ),
					),
					'style-3' => array(
						'name'      => esc_html__( 'Style - 03', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button', 'style-3.png' ),
					),
					'style-4' => array(
						'name'      => esc_html__( 'Style - 04', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button', 'style-4.png' ),
					),
					'style-5' => array(
						'name'      => esc_html__( 'Style - 05', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button', 'style-5.png' ),
					),
					'style-6' => array(
						'name'      => esc_html__( 'Style - 06', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button', 'style-6.png' ),
					),
				),
			),
			'button-group' => array(
				'cat'    => 'rbelad_addons_general',
				'styles' => array(
					'style-1' => array(
						'name'      => esc_html__( 'Style - 01', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button-group', 'style-1.png' ),
					),
					'style-2' => array(
						'name'      => esc_html__( 'Style - 02', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button-group', 'style-2.png' ),
					),
					'style-3' => array(
						'name'      => esc_html__( 'Style - 03', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button-group', 'style-3.png' ),
					),
					'style-4' => array(
						'name'      => esc_html__( 'Style - 04', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button-group', 'style-4.png' ),
					),
					'style-5' => array(
						'name'      => esc_html__( 'Style - 05', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button-group', 'style-5.png' ),
					),
					'style-6' => array(
						'name'      => esc_html__( 'Style - 06', 'rb-addons-for-elementor' ),
						'is_active' => true,
						'thumb'     => self::get_widget_thumbnail_url( 'button-group', 'style-6.png' ),
					),
				),
			),
			'divider'      => array(
				'cat' => 'rbelad_addons_general',
			),
			'dual-text'    => array(
				'cat' => 'rbelad_addons_general',
			),
			'list-style'   => array(
				'cat' => 'rbelad_addons_general',
			),

			// Creative Addons.
			'scroll-down'  => array(
				'cat' => 'rbelad_addons_creative',
			),
			'rating-star'  => array(
				'cat' => 'rbelad_addons_creative',
			),
		);
		$return = array();

		foreach ( $addons as $slug => $data ) {
			$return[ $slug ] = array_merge(
				$data,
				array()
			);
		}

		return $return;
	}

	/**
	 * All pro widgets list
	 */
	public static function get_pro_widgets_map() {
		// Widgets variables.
		$demo_url     = 'https://bashir-rased.com/rb-addons-for-elementor/demos/';
		$doc_url      = 'https://bashir-rased.com/rb-addons-for-elementor/docs/';
		$import_url   = 'https://bashir-rased.com/rb-addons-for-elementor/blocks/';
		$tutorial_url = 'https://www.youtube.com/watch?v=';

		$addons = array(
			// Creative Addons.
			'social-icon'      => array(
				'cat' => 'rbelad_pro_creative',
			),
			'page-list'        => array(
				'cat' => 'rbelad_pro_creative',
			),

			// Slider & Carousel Addons.
			'auto-typing'      => array(
				'cat' => 'rbelad_pro_slider',
			),
			'pdf-view'         => array(
				'cat' => 'rbelad_pro_slider',
			),
			'lottie-animation' => array(
				'cat' => 'rbelad_pro_slider',
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
				'title' => esc_html__( 'RB General Addons', 'rb-addons-for-elementor' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_creative',
			array(
				'title' => esc_html__( 'RB Creative Addons', 'rb-addons-for-elementor' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_creative',
			array(
				'title' => esc_html__( 'RB Creative Pro', 'rb-addons-for-elementor' ),
			)
		);

		$elements_manager->add_category(
			'rbelad_pro_slider',
			array(
				'title' => esc_html__( 'RB Slider Pro', 'rb-addons-for-elementor' ),
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
