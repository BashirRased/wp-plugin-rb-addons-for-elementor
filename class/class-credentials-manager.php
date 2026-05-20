<?php
/**
 * Credentials Manager Classes.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Class Credentials_Manager
 *
 * Handles storing and retrieving plugin credentials.
 *
 * @package RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */
class Credentials_Manager {

	const OPTION_KEY = 'rbelad_credentials';

	/**
	 * Get credentials map (fields config)
	 */
	public static function get_credentials_map() {
		return array(
			'advanced_data_table' => array(
				'title'  => esc_html__( 'Advanced Data Table', 'rb-addons-for-elementor' ),
				'icon'   => 'rbelad-sf rbelad-sf-data-table',
				'fields' => array(
					array(
						'label' => esc_html__( 'Google API Key. ', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'api_key',
						'help'  => array(
							'instruction' => esc_html__( 'Get API Key', 'rb-addons-for-elementor' ),
							'link'        => 'https://console.developers.google.com/',
						),
					),
					array(
						'label' => esc_html__( 'Google Sheet ID. ', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'sheet_id',
					),
					array(
						'label' => esc_html__( 'Google Sheets Range. Ex: A1:D5 ', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'sheet_range',
					),
				),
			),

			'mailchimp'           => array(
				'title'  => esc_html__( 'MailChimp', 'rb-addons-for-elementor' ),
				'icon'   => 'rbelad-sf rbelad-sf-mailchip',
				'fields' => array(
					array(
						'label' => esc_html__( 'Enter API Key. ', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'api_key',
						'help'  => array(
							'instruction' => esc_html__( 'Get your api key here', 'rb-addons-for-elementor' ),
							'link'        => 'https://admin.mailchimp.com/account/api/',
						),
					),
				),
			),

			'twitter_feed'        => array(
				'title'  => esc_html__( 'Twitter Feed', 'rb-addons-for-elementor' ),
				'icon'   => 'rbelad-sf rbelad-sf-twitter',
				'fields' => array(
					array(
						'label' => esc_html__( 'User Name. (Use @ sign with your Twitter user name)', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'user_name',
					),
					array(
						'label' => esc_html__( 'Consumer Key', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'consumer_key',
						'help'  => array(
							'instruction' => esc_html__( 'Get Consumer Key', 'rb-addons-for-elementor' ),
							'link'        => 'https://apps.twitter.com/app/',
						),
					),
					array(
						'label' => esc_html__( 'Consumer Secret', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'consumer_secret',
						'help'  => array(
							'instruction' => esc_html__( 'Get Consumer Secret', 'rb-addons-for-elementor' ),
							'link'        => 'https://apps.twitter.com/app/',
						),
					),
				),
			),

			'facebook_feed'       => array(
				'title'  => esc_html__( 'Facebook Feed', 'rb-addons-for-elementor' ),
				'icon'   => 'rbelad-sf rbelad-sf-facebook',
				'fields' => array(
					array(
						'label' => esc_html__( 'Page ID. ', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'page_id',
						'help'  => array(
							'instruction' => esc_html__( 'Get Page ID', 'rb-addons-for-elementor' ),
							'link'        => 'https://developers.facebook.com/apps/',
						),
					),
					array(
						'label' => esc_html__( 'Access Token. ', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'access_token',
						'help'  => array(
							'instruction' => esc_html__( 'Get Access Token.', 'rb-addons-for-elementor' ),
							'link'        => 'https://developers.facebook.com/apps/',
						),
					),
				),
			),

			'instagram'           => array(
				'title'  => esc_html__( 'Instagram', 'rb-addons-for-elementor' ),
				'icon'   => 'rbelad-sf rbelad-sf-instagram',
				'fields' => array(
					array(
						'label' => esc_html__( 'Access Token. ', 'rb-addons-for-elementor' ),
						'type'  => 'text',
						'name'  => 'access_token',
						'help'  => array(
							'instruction' => esc_html__( 'Get Access Token', 'rb-addons-for-elementor' ),
							'link'        => 'https://developers.facebook.com/docs/instagram-basic-display-api/getting-started',
						),
					),
				),
			),
		);
	}

	/**
	 * Get saved credentials
	 */
	public static function get_credentials() {
		return get_option( self::OPTION_KEY, array() );
	}

	/**
	 * Save credentials.
	 *
	 * @param array $data Credentials data to store.
	 * @return void
	 */
	public static function save_credentials( $data = array() ) {
		update_option( self::OPTION_KEY, $data );
	}
}
