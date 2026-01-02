<?php
/**
 * Font Icons
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_CLASS;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Icon Manager for font-icons.
 *
 * @package RBELAD_Elementor_Addons
 */
class Icons_Manager {
	/**
	 * Initialize Elementor icon integrations.
	 *
	 * Registers custom RBElad icon set tab in Elementor Icons Manager.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'elementor/icons_manager/additional_tabs', array( __CLASS__, 'add_rbelad_icons_tab' ) );
	}

	/**
	 * Add RBElad icon set tab to Elementor Icons Manager.
	 *
	 * Filters the additional icon tabs and registers the RBElad icons.
	 *
	 * @param array $tabs Existing Elementor icon tabs.
	 * @return array Modified icon tabs including RBElad icons.
	 */
	public static function add_rbelad_icons_tab( $tabs ) {
		$tabs['rbelad-icons'] = array(
			'name'          => 'rbelad-icons',
			'label'         => esc_html__( 'RBELAD Icons', 'rb-elementor-addons' ),
			'url'           => RBELAD_ASSETS . 'css/rbelad-fonts.css',
			'enqueue'       => array( RBELAD_ASSETS . 'css/rbelad-fonts.css' ),
			'prefix'        => 'rbelad-',
			'displayPrefix' => 'rbelad-icon',
			'labelIcon'     => 'rbelad-icon rbelad-rb-addons',
			'ver'           => RBELAD_VERSION,
			'fetchJson'     => RBELAD_ASSETS . 'js/rbelad-fonts.js',
			'native'        => false,
		);
		return $tabs;
	}


	/**
	 * Get a list of rbelad icons
	 *
	 * @return array
	 */
	public static function get_rbelad_icons() {
		return array(
			'rbelad-icon rbelad-navigation-menu'        => 'navigation-menu',
			'rbelad-icon rbelad-news-ticker'            => 'news-ticker',
			'rbelad-icon rbelad-page-list'              => 'page-list',
			'rbelad-icon rbelad-page-pagination'        => 'page-pagination',
			'rbelad-icon rbelad-rb-addons'              => 'rb-addons',
			'rbelad-icon rbelad-phone'                  => 'phone',
			'rbelad-icon rbelad-portfolio-section'      => 'portfolio-section',
			'rbelad-icon rbelad-post-carousel'          => 'post-carousel',
			'rbelad-icon rbelad-post-meta-separator'    => 'post-meta-separator',
			'rbelad-icon rbelad-post-view-meta'         => 'post-view-meta',
			'rbelad-icon rbelad-read-more-button'       => 'read-more-button',
			'rbelad-icon rbelad-ribbon-arrow-1'         => 'ribbon-arrow-1',
			'rbelad-icon rbelad-timeline'               => 'timeline',
			'rbelad-icon rbelad-accordion'              => 'accordion',
			'rbelad-icon rbelad-alert'                  => 'alert',
			'rbelad-icon rbelad-archive-description'    => 'archive-description',
			'rbelad-icon rbelad-archive-posts'          => 'archive-posts',
			'rbelad-icon rbelad-archive-title'          => 'archive-title',
			'rbelad-icon rbelad-author-meta'            => 'author-meta',
			'rbelad-icon rbelad-auto-typing'            => 'auto-typing',
			'rbelad-icon rbelad-business-hours'         => 'business-hours',
			'rbelad-icon rbelad-button'                 => 'button',
			'rbelad-icon rbelad-button-group'           => 'button-group',
			'rbelad-icon rbelad-call-to-action'         => 'call-to-action',
			'rbelad-icon rbelad-category-meta'          => 'category-meta',
			'rbelad-icon rbelad-comment-form'           => 'comment-form',
			'rbelad-icon rbelad-comment-header'         => 'comment-header',
			'rbelad-icon rbelad-comment-list'           => 'comment-list',
			'rbelad-icon rbelad-comment-meta'           => 'comment-meta',
			'rbelad-icon rbelad-comment-pagination'     => 'comment-pagination',
			'rbelad-icon rbelad-contact-form'           => 'contact-form',
			'rbelad-icon rbelad-contact-info'           => 'contact-info',
			'rbelad-icon rbelad-count-down'             => 'count-down',
			'rbelad-icon rbelad-date-meta'              => 'date-meta',
			'rbelad-icon rbelad-divider'                => 'divider',
			'rbelad-icon rbelad-donation-latest-posts'  => 'donation-latest-posts',
			'rbelad-icon rbelad-donation-post-carousel' => 'donation-post-carousel',
			'rbelad-icon rbelad-donation-post-category' => 'donation-post-category',
			'rbelad-icon rbelad-donation-post-grid'     => 'donation-post-grid',
			'rbelad-icon rbelad-donation-post-section'  => 'donation-post-section',
			'rbelad-icon rbelad-drop-cap'               => 'drop-cap',
			'rbelad-icon rbelad-dual-text'              => 'dual-text',
			'rbelad-icon rbelad-email'                  => 'email',
			'rbelad-icon rbelad-faq-section'            => 'faq-section',
			'rbelad-icon rbelad-fun-fact'               => 'fun-fact',
			'rbelad-icon rbelad-gradient-text'          => 'gradient-text',
			'rbelad-icon rbelad-icon-box'               => 'icon-box',
			'rbelad-icon rbelad-list-style'             => 'list-style',
			'rbelad-icon rbelad-image-grid'             => 'image-grid',
			'rbelad-icon rbelad-location'               => 'location',
			'rbelad-icon rbelad-location-2'             => 'location-2',
			'rbelad-icon rbelad-mega-menu'              => 'mega-menu',
			'rbelad-icon rbelad-massage'                => 'massage',
			'rbelad-icon rbelad-lottie-animation'       => 'lottie-animation',
			'rbelad-icon rbelad-page-title'             => 'page-title',
			'rbelad-icon rbelad-pdf-view'               => 'pdf-view',
			'rbelad-icon rbelad-post-edit-meta'         => 'post-edit-meta',
			'rbelad-icon rbelad-post-excerpt'           => 'post-excerpt',
			'rbelad-icon rbelad-post-grid'              => 'post-grid',
			'rbelad-icon rbelad-post-navigation'        => 'post-navigation',
			'rbelad-icon rbelad-post-pagination'        => 'post-pagination',
			'rbelad-icon rbelad-post-thumbnail'         => 'post-thumbnail',
			'rbelad-icon rbelad-rating-skill'           => 'rating-skill',
			'rbelad-icon rbelad-resume-list'            => 'resume-list',
			'rbelad-icon rbelad-scroll-down'            => 'scroll-down',
			'rbelad-icon rbelad-search-box'             => 'search-box',
			'rbelad-icon rbelad-section-header'         => 'section-header',
			'rbelad-icon rbelad-service-list'           => 'service-list',
			'rbelad-icon rbelad-share-button'           => 'share-button',
			'rbelad-icon rbelad-site-logo'              => 'site-logo',
			'rbelad-icon rbelad-site-tagline'           => 'site-tagline',
			'rbelad-icon rbelad-site-title'             => 'site-title',
			'rbelad-icon rbelad-skill-bar'              => 'skill-bar',
			'rbelad-icon rbelad-social-icon'            => 'social-icon',
			'rbelad-icon rbelad-tag-meta'               => 'tag-meta',
			'rbelad-icon rbelad-team-carousel'          => 'team-carousel',
			'rbelad-icon rbelad-team-grid'              => 'team-grid',
			'rbelad-icon rbelad-testimonial-grid'       => 'testimonial-grid',
			'rbelad-icon rbelad-testimonial-carousel'   => 'testimonial-carousel',
		);
	}
}

Icons_Manager::init();
