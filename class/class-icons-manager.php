<?php
/**
 * Font Icons
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Icon Manager for font-icons.
 */
class Icons_Manager {
	/**
	 * Initialize Elementor icon integrations.
	 *
	 * Registers custom RB Elementor icon set tab in Elementor Icons Manager.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'elementor/icons_manager/additional_tabs', array( __CLASS__, 'add_rbelad_icons_tab' ) );
	}

	/**
	 * Add RB Elementor icon set tab to Elementor Icons Manager.
	 *
	 * Filters the additional icon tabs and registers the RB Elementor icons.
	 *
	 * @param array $tabs Existing Elementor icon tabs.
	 * @return array Modified icon tabs including RB Elementor icons.
	 */
	public static function add_rbelad_icons_tab( $tabs ) {
		$tabs['rbelad-wfs'] = array(
			'name'          => 'rbelad-wfs',
			'label'         => esc_html__( 'RB Widget Icons', 'rb-addons-for-elementor' ),
			'url'           => RBELAD_ASSETS . 'css/rbelad-widget-icons.css',
			'enqueue'       => array( RBELAD_ASSETS . 'css/rbelad-widget-icons.css' ),
			'prefix'        => 'rbelad-',
			'displayPrefix' => 'rbelad-wf',
			'labelIcon'     => 'rbelad-wf rbelad-wf-rb-addons',
			'ver'           => time(),
			'fetchJson'     => RBELAD_ASSETS . 'js/rbelad-widget-icons.js',
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
			'rbelad-wf rbelad-wf-animated-headline' => 'animated-headline',
			'rbelad-wf rbelad-wf-button'            => 'button',
			'rbelad-wf rbelad-wf-button-group'      => 'button-group',
			'rbelad-wf rbelad-wf-contact-form-7'    => 'contact-form-7',
			'rbelad-wf rbelad-wf-countdown'         => 'countdown',
			'rbelad-wf rbelad-wf-divider'           => 'divider',
			'rbelad-wf rbelad-wf-flip-box'          => 'flip-box',
			'rbelad-wf rbelad-wf-heading'           => 'heading',
			'rbelad-wf rbelad-wf-icon-list'         => 'icon-list',
			'rbelad-wf rbelad-wf-image'             => 'image',
			'rbelad-wf rbelad-wf-info-box'          => 'info-box',
			'rbelad-wf rbelad-wf-lottie'            => 'lottie',
			'rbelad-wf rbelad-wf-pdf-view'          => 'pdf-view',
			'rbelad-wf rbelad-wf-profile-card'      => 'profile-card',
			'rbelad-wf rbelad-wf-rating'            => 'rating',
			'rbelad-wf rbelad-wf-rb-addons'         => 'rb-addons',
			'rbelad-wf rbelad-wf-scroll-down'       => 'scroll-down',
			'rbelad-wf rbelad-wf-search'            => 'search',
			'rbelad-wf rbelad-wf-section-header'    => 'section-header',
			'rbelad-wf rbelad-wf-share-buttons'     => 'share-buttons',
			'rbelad-wf rbelad-wf-social-icons'      => 'social-icons',
			'rbelad-wf rbelad-wf-team-member'       => 'team-member',
			'rbelad-wf rbelad-wf-text-editor'       => 'text-editor',
			'rbelad-wf rbelad-wf-video'             => 'video',
		);
	}
}

Icons_Manager::init();
