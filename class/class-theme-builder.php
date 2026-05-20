<?php
/**
 * Theme Builder Class.
 *
 * @package RB_Addons_For_Elementor
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Class Theme Builder
 */
class Theme_Builder {

	/**
	 * CPT slug.
	 */
	const CPT = 'rbelad_library';

	/**
	 * Constructor.
	 */
	public function __construct() {

		error_log( 'THEME BUILDER CONSTRUCTOR RUN' );

		add_action(
			'init',
			array( $this, 'create_themebuilder_cpt' ),
			0
		);

		add_action(
			'elementor/init',
			function () {

				$cpt_support = get_option(
					'elementor_cpt_support',
					array( 'page' )
				);

				if ( ! in_array( self::CPT, $cpt_support, true ) ) {

					$cpt_support[] = self::CPT;

					update_option(
						'elementor_cpt_support',
						$cpt_support
					);
				}
			}
		);

		add_action(
			'elementor/elements/categories_registered',
			array( $this, 'add_elementor_widget_categories' )
		);
	}

	/**
	 * Register Theme Builder CPT.
	 *
	 * @return void
	 */
	public function create_themebuilder_cpt() {
		$labels = array(
			'name'                  => esc_html_x( 'Theme Builder', 'Post Type General Name', 'rb-addons-for-elementor' ),
			'singular_name'         => esc_html_x( 'Theme Builder', 'Post Type Singular Name', 'rb-addons-for-elementor' ),
			'menu_name'             => esc_html_x( 'Theme Builder', 'Admin Menu text', 'rb-addons-for-elementor' ),
			'name_admin_bar'        => esc_html_x( 'Theme Builder', 'Add New on Toolbar', 'rb-addons-for-elementor' ),
			'archives'              => esc_html__( 'Theme Builder Archives', 'rb-addons-for-elementor' ),
			'attributes'            => esc_html__( 'Theme Builder Attributes', 'rb-addons-for-elementor' ),
			'parent_item_colon'     => esc_html__( 'Parent Theme Builder:', 'rb-addons-for-elementor' ),
			'all_items'             => esc_html__( 'All Theme Builder', 'rb-addons-for-elementor' ),
			'add_new_item'          => esc_html__( 'Add New Theme Builder', 'rb-addons-for-elementor' ),
			'add_new'               => esc_html__( 'Add New', 'rb-addons-for-elementor' ),
			'new_item'              => esc_html__( 'New Theme Builder', 'rb-addons-for-elementor' ),
			'edit_item'             => esc_html__( 'Edit Theme Builder', 'rb-addons-for-elementor' ),
			'update_item'           => esc_html__( 'Update Theme Builder', 'rb-addons-for-elementor' ),
			'view_item'             => esc_html__( 'View Theme Builder', 'rb-addons-for-elementor' ),
			'view_items'            => esc_html__( 'View Theme Builder', 'rb-addons-for-elementor' ),
			'search_items'          => esc_html__( 'Search Theme Builder', 'rb-addons-for-elementor' ),
			'not_found'             => esc_html__( 'Not found', 'rb-addons-for-elementor' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'rb-addons-for-elementor' ),
			'featured_image'        => esc_html__( 'Featured Image', 'rb-addons-for-elementor' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'rb-addons-for-elementor' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'rb-addons-for-elementor' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'rb-addons-for-elementor' ),
			'insert_into_item'      => esc_html__( 'Insert into Theme Builder', 'rb-addons-for-elementor' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this Theme Builder', 'rb-addons-for-elementor' ),
			'items_list'            => esc_html__( 'Theme Builder list', 'rb-addons-for-elementor' ),
			'items_list_navigation' => esc_html__( 'Theme Builder list navigation', 'rb-addons-for-elementor' ),
			'filter_items_list'     => esc_html__( 'Filter Theme Builder list', 'rb-addons-for-elementor' ),
		);
		$args   = array(
			'label'               => esc_html__( 'Theme Builder', 'rb-addons-for-elementor' ),
			'description'         => esc_html__( 'This best option', 'rb-addons-for-elementor' ),
			'labels'              => $labels,
			'supports'            => array( 'title' ),
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'hierarchical'        => false,
			'exclude_from_search' => true,
			'capability_type'     => 'page',
			'map_meta_cap'        => true,
		);
		error_log( 'CPT REGISTER RUNNING' );
		register_post_type( self::CPT, $args );
	}

	/**
	 * Add Elementor category.
	 *
	 * @param object $elements_manager Elementor manager.
	 *
	 * @return void
	 */
	public function add_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'rbelad_theme_builder',
			array(
				'title' => esc_html__(
					'RB Theme Builder',
					'rb-addons-for-elementor'
				),
				'icon'  => 'fa fa-plug',
			)
		);
	}
}
