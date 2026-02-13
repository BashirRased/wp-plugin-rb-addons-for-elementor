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
			'label'         => esc_html__( 'RBELAD Icons', 'rb-addons-for-elementor' ),
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
			'rbelad-icon rbelad-auto-typing'       => 'auto-typing',
			'rbelad-icon rbelad-box-open'          => 'box-open',
			'rbelad-icon rbelad-button'            => 'button',
			'rbelad-icon rbelad-button-group'      => 'button-group',
			'rbelad-icon rbelad-calendar'          => 'calendar',
			'rbelad-icon rbelad-credit-card'       => 'credit-card',
			'rbelad-icon rbelad-divider'           => 'divider',
			'rbelad-icon rbelad-dollar'            => 'dollar',
			'rbelad-icon rbelad-dual-text'         => 'dual-text',
			'rbelad-icon rbelad-email'             => 'email',
			'rbelad-icon rbelad-faq'               => 'faq',
			'rbelad-icon rbelad-flim'              => 'flim',
			'rbelad-icon rbelad-heading'           => 'heading',
			'rbelad-icon rbelad-helpline'          => 'helpline',
			'rbelad-icon rbelad-link-broken'       => 'link-broken',
			'rbelad-icon rbelad-list-style'        => 'list-style',
			'rbelad-icon rbelad-location'          => 'location',
			'rbelad-icon rbelad-location-2'        => 'location-2',
			'rbelad-icon rbelad-lottie-animation'  => 'lottie-animation',
			'rbelad-icon rbelad-marquee'           => 'marquee',
			'rbelad-icon rbelad-massage'           => 'massage',
			'rbelad-icon rbelad-menu'              => 'menu',
			'rbelad-icon rbelad-movie-camera'      => 'movie-camera',
			'rbelad-icon rbelad-next-link'         => 'next-link',
			'rbelad-icon rbelad-page-list'         => 'page-list',
			'rbelad-icon rbelad-pdf-view'          => 'pdf-view',
			'rbelad-icon rbelad-phone'             => 'phone',
			'rbelad-icon rbelad-quotation'         => 'quotation',
			'rbelad-icon rbelad-rating-star'       => 'rating-star',
			'rbelad-icon rbelad-rb-addons'         => 'rb-addons',
			'rbelad-icon rbelad-ribbon-arrow-1'    => 'ribbon-arrow-1',
			'rbelad-icon rbelad-right-top-arrow-1' => 'right-top-arrow-1',
			'rbelad-icon rbelad-scroll-down'       => 'scroll-down',
			'rbelad-icon rbelad-section-header'    => 'section-header',
			'rbelad-icon rbelad-social-icon'       => 'social-icon',
			'rbelad-icon rbelad-teamwork'          => 'teamwork',
			'rbelad-icon rbelad-trophy'            => 'trophy',
			'rbelad-icon rbelad-behance'           => 'behance',
			'rbelad-icon rbelad-codepen'           => 'codepen',
			'rbelad-icon rbelad-dribbble'          => 'dribbble',
			'rbelad-icon rbelad-facebook'          => 'facebook',
			'rbelad-icon rbelad-github'            => 'github',
			'rbelad-icon rbelad-instagram'         => 'instagram',
			'rbelad-icon rbelad-linkedin'          => 'linkedin',
			'rbelad-icon rbelad-pinterest'         => 'pinterest',
			'rbelad-icon rbelad-tiktok'            => 'tiktok',
			'rbelad-icon rbelad-twitter'           => 'twitter',
			'rbelad-icon rbelad-twitter-x'         => 'twitter-x',
			'rbelad-icon rbelad-whatsapp'          => 'whatsapp',
			'rbelad-icon rbelad-youtube'           => 'youtube',
		);
	}
}

Icons_Manager::init();
