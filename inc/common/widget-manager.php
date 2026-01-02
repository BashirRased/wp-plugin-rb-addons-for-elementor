<?php
namespace RB_Elementor_Addons\Common;

defined( 'ABSPATH' ) || exit;

class Widget_Manager {

    /**
     * All free widgets list
     */
    public static function get_free_widgets_map() {
    	return [
			// General Addons
			'dual-text' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/dual-text'
			],
			'button-group' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/button-group'
			],
			'section-header' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/section-header'
			],
			'divider' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/divider'
			],
			'list-style' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/list-style'
			],
			'button' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/button'
			],
			'scroll-down' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/scroll-down'
			],
			'resume-list' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/resume-list'
			],
			'rating-skill' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/rating-skill'
			],
			'service-list' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/service-list'
			],
			'contact-info' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/contact-info'
			],
			'contact-form' => [
				'cat'  => 'rb_addons_general',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/contact-form'
			],

			// WordPress Addons
			'site-logo' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/site-logo'
			],
			'site-title' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/site-title'
			],
			'site-tagline' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/site-tagline'
			],
			'page-title' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/page-title'
			],
			'post-thumbnail' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/post-thumbnail'
			],
			'archive-title' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/archive-title'
			],
			'archive-description' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/archive-description'
			],
			'author-meta' => [
				'cat'  => 'rb_addons_core',
				'demo' => 'https://bashirrased.com/rb-elementor-addons/author-meta'
			],

			/** Next Widgets */
			// 'post-list' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/post-list'
			// ],
			// 'date-meta' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/date-meta'
			// ],
			// 'comment-meta' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/comment-meta'
			// ],
			// 'category-meta' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/category-meta'
			// ],
			// 'tag-meta' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/tag-meta'
			// ],
			// 'post-edit-meta' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/post-edit-meta'
			// ],
			// 'post-meta-separator' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/post-meta-separator'
			// ],
			// 'post-meta' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/post-meta'
			// ],
			// 'post-excerpt' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/post-excerpt'
			// ],
			// 'read-more-button' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/read-more-button'
			// ],
			// 'post-navigation' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/post-navigation'
			// ],
			// 'post-pagination' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/post-pagination'
			// ],
			// 'page-pagination' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/page-pagination'
			// ],
			// 'comment-header' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/comment-header'
			// ],
			// 'comment-list' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/comment-list'
			// ],
			// 'comment-form' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/comment-form'
			// ],
			// 'comment-pagination' => [
			// 	'cat'  => 'rb_addons_core',
			// 	'demo' => 'https://bashirrased.com/rb-elementor-addons/comment-pagination'
			// ],
        ];
	}

	/**
     * All pro widgets list
     */
	public static function get_pro_widgets_map() {
		return [
			// 'comment-template' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/comment-template',
			// 	'is_pro'    => true,
			// ],
			// 'archive-posts' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/archive-posts',
			// 	'is_pro'    => true,
			// ],
			// 'portfolio-section' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/portfolio-section',
			// 	'is_pro'    => true,
			// ],
			// 'social-icon' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/social-icon',
			// 	'is_pro'    => true,
			// ],
			// 'navigation-menu' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/navigation-menu',
			// 	'is_pro'    => true,
			// ],
			// 'post-view-meta' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/post-view-meta',
			// 	'is_pro'    => true,
			// ],
			// 'auto-typing' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/auto-typing',
			// 	'is_pro'    => true,
			// ],
			// 'skill-bar' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/skill-bar',
			// 	'is_pro'    => true,
			// ],
			// 'fun-fact' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/fun-fact',
			// 	'is_pro'    => true,
			// ],
			// 'testimonial' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/testimonial',
			// 	'is_pro'    => true,
			// ],
			// 'pdf-view' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/pdf-view',
			// 	'is_pro'    => true,
			// ],
			// 'lottie-animation' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/lottie-animation',
			// 	'is_pro'    => true,
			// ],
			// 'search-box' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/search-box',
			// 	'is_pro'    => true,
			// ],
			// 'team-member' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/team-member',
			// 	'is_pro'    => true,
			// ],
			// 'share-btn' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/share-btn',
			// 	'is_pro'    => true,
			// ],
			// 'business-hours' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/business-hours',
			// 	'is_pro'    => true,
			// ],
			// 'subscribe-form' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/subscribe-form',
			// 	'is_pro'    => true,
			// ],
			// 'countdown' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/countdown',
			// 	'is_pro'    => true,
			// ],
			// 'news-ticker' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/news-ticker',
			// 	'is_pro'    => true,
			// ],
			// 'accordion' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/accordion',
			// 	'is_pro'    => true,
			// ],
			// 'mega-menu' => [
			// 	'cat'       => 'rb_addons_pro',
			// 	'demo'      => 'https://bashirrased.com/rb-elementor-addons/mega-menu',
			// 	'is_pro'    => true,
			// ],
		];
	}

	/**
     * All free and pro widget merge
     */
	public static function get_all_widgets_map() {
		return array_merge(self::get_free_widgets_map(), self::get_pro_widgets_map());
	}

    /**
     * Return enabled widgets list.
     */
	public static function get_widgets() {
		$all_widgets = array_keys( self::get_all_widgets_map() );
		$enabled_widgets = get_option( 'rb_enabled_widgets' );
		if ( ! is_array( $enabled_widgets ) || empty( $enabled_widgets ) ) {
			return $all_widgets;
		}
		return array_values( array_intersect( $enabled_widgets, $all_widgets ) );
	}

    /**
     * Get widget category by name.
     */
    public static function get_widget_category( $widget_name ) {
        $map = self::get_all_widgets_map();
		return $map[ $widget_name ]['cat'] ?? 'rb_addons_general';
    }

    /**
     * Get widget demo URL by name.
     */
    public static function get_widget_demo( $widget_name ) {
        $map = self::get_all_widgets_map();
		return $map[ $widget_name ]['demo'] ?? '';
    }

    /**
     * Register Elementor widget categories.
     */
    public static function register_categories( \Elementor\Elements_Manager $elements_manager ) {
        $elements_manager->add_category(
            'rb_addons_general',
            [ 'title' => __( 'RB General Addons', 'rb-elementor-addons' ), 'icon' => 'fa fa-plug' ]
        );

        $elements_manager->add_category(
            'rb_addons_core',
            [ 'title' => __( 'RB WordPress Addons', 'rb-elementor-addons' ), 'icon' => 'fa fa-plug' ]
        );

        $elements_manager->add_category(
            'rb_addons_pro',
            [ 'title' => __( 'RB Addons Pro', 'rb-elementor-addons' ), 'icon' => 'fa fa-plug' ]
        );
    }

	public static function register_widgets( $widgets_manager ) {
		foreach ( self::get_widgets() as $widget_folder_name ) {
			// You may want to check pro vs free paths if different,
			// but assuming widgets live in the same folder structure:
			$widget_file = RB_ADDONS_WIDGET . "{$widget_folder_name}/widget.php";

			if ( file_exists( $widget_file ) ) {
				require_once $widget_file;

				$class_name = str_replace( '-', '_', ucwords( $widget_folder_name, '-' ) );
				$full_class = "RB_Elementor_Addons\\Widgets\\{$class_name}";

				if ( class_exists( $full_class ) ) {
					$widget_instance = new $full_class();

					// Set category
					if ( method_exists( $widget_instance, 'set_categories' ) ) {
						$widget_instance->set_categories( [ self::get_widget_category( $widget_folder_name ) ] );
					} elseif ( property_exists( $widget_instance, 'categories' ) ) {
						$widget_instance->categories = [ self::get_widget_category( $widget_folder_name ) ];
					}
					$widgets_manager->register( $widget_instance );
				}
			}
		}
	}
}
