<?php
/**
 * Select Link Render.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * -------------------------------------------------------------------------
 * Link base.
 * -------------------------------------------------------------------------
 */

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

$rbelad_select_link_id = ! empty( $rbelad_select_link_id )
	? $rbelad_select_link_id
	: '';

$rbelad_link_base = $rbelad_prefix . $rbelad_select_link_id;

/**
 * -------------------------------------------------------------------------
 * Link type.
 * -------------------------------------------------------------------------
 */

$rbelad_link_type = ! empty(
	$rbelad_settings[ $rbelad_link_base . '_select_option' ]
)
	? $rbelad_settings[ $rbelad_link_base . '_select_option' ]
	: 'none';

/**
 * -------------------------------------------------------------------------
 * Default link attributes.
 * -------------------------------------------------------------------------
 */

$rbelad_url               = '#';
$rbelad_target            = '';
$rbelad_rel               = '';
$rbelad_custom_attributes = '';

/**
 * -------------------------------------------------------------------------
 * Link type.
 * -------------------------------------------------------------------------
 */

switch ( $rbelad_link_type ) {

	/**
	 * ---------------------------------------------------------------------
	 * Page Link.
	 * ---------------------------------------------------------------------
	 */
	case 'page_link':
		/**
		 * Page URL.
		 */
		$rbelad_page_id = ! empty(
			$rbelad_settings[ $rbelad_link_base . '_page_link' ]
		)
			? (int) $rbelad_settings[ $rbelad_link_base . '_page_link' ]
			: 0;

		if ( $rbelad_page_id ) {

			$rbelad_page_url = get_permalink( $rbelad_page_id );

			if ( $rbelad_page_url ) {
				$rbelad_url = $rbelad_page_url;
			}
		}

		/**
		 * Open in new window.
		 */
		if ( ! empty(
			$rbelad_settings[ $rbelad_link_base . '_page_link_is_external' ]
		) ) {
			$rbelad_target = '_blank';
		}

		/**
		 * Rel attributes.
		 */
		$rbelad_rel_values = array();

		if ( ! empty(
			$rbelad_settings[ $rbelad_link_base . '_page_link_nofollow' ]
		) ) {
			$rbelad_rel_values[] = 'nofollow';
		}

		if ( '_blank' === $rbelad_target ) {
			$rbelad_rel_values[] = 'noopener';
		}

		if ( ! empty( $rbelad_rel_values ) ) {
			$rbelad_rel = implode(
				' ',
				array_unique( $rbelad_rel_values )
			);
		}

		/**
		 * Custom attributes.
		 */
		$rbelad_custom_attributes = ! empty(
			$rbelad_settings[ $rbelad_link_base . '_page_link_custom_attributes' ]
		)
			? $rbelad_settings[ $rbelad_link_base . '_page_link_custom_attributes' ]
			: '';

		break;

	/**
	 * ---------------------------------------------------------------------
	 * Post Link.
	 * ---------------------------------------------------------------------
	 */
	case 'post_link':
		/**
		 * Post URL.
		 */
		$rbelad_post_id = ! empty(
			$rbelad_settings[ $rbelad_link_base . '_post_link' ]
		)
			? (int) $rbelad_settings[ $rbelad_link_base . '_post_link' ]
			: 0;

		if ( $rbelad_post_id ) {

			$rbelad_post_url = get_permalink( $rbelad_post_id );

			if ( $rbelad_post_url ) {
				$rbelad_url = $rbelad_post_url;
			}
		}

		/**
		 * Open in new window.
		 */
		if ( ! empty(
			$rbelad_settings[ $rbelad_link_base . '_post_link_is_external' ]
		) ) {
			$rbelad_target = '_blank';
		}

		/**
		 * Rel attributes.
		 */
		$rbelad_rel_values = array();

		if ( ! empty(
			$rbelad_settings[ $rbelad_link_base . '_post_link_nofollow' ]
		) ) {
			$rbelad_rel_values[] = 'nofollow';
		}

		if ( '_blank' === $rbelad_target ) {
			$rbelad_rel_values[] = 'noopener';
		}

		if ( ! empty( $rbelad_rel_values ) ) {
			$rbelad_rel = implode(
				' ',
				array_unique( $rbelad_rel_values )
			);
		}

		/**
		 * Custom attributes.
		 */
		$rbelad_custom_attributes = ! empty(
			$rbelad_settings[ $rbelad_link_base . '_post_link_custom_attributes' ]
		)
			? $rbelad_settings[ $rbelad_link_base . '_post_link_custom_attributes' ]
			: '';

		break;

	/**
	 * ---------------------------------------------------------------------
	 * Custom Link.
	 * ---------------------------------------------------------------------
	 */
	case 'custom_link':
		/**
		 * Elementor URL control.
		 */
		$rbelad_custom_link = ! empty(
			$rbelad_settings[ $rbelad_link_base . '_custom_link' ]
		)
			? $rbelad_settings[ $rbelad_link_base . '_custom_link' ]
			: array();

		/**
		 * Custom URL.
		 */
		if ( ! empty( $rbelad_custom_link['url'] ) ) {
			$rbelad_url = $rbelad_custom_link['url'];
		}

		/**
		 * Open in new window.
		 */
		if ( ! empty( $rbelad_custom_link['is_external'] ) ) {
			$rbelad_target = '_blank';
		}

		/**
		 * Rel attributes.
		 */
		$rbelad_rel_values = array();

		if ( ! empty( $rbelad_custom_link['nofollow'] ) ) {
			$rbelad_rel_values[] = 'nofollow';
		}

		if ( '_blank' === $rbelad_target ) {
			$rbelad_rel_values[] = 'noopener';
		}

		if ( ! empty( $rbelad_rel_values ) ) {
			$rbelad_rel = implode(
				' ',
				array_unique( $rbelad_rel_values )
			);
		}

		/**
		 * Custom attributes.
		 */
		$rbelad_custom_attributes = ! empty(
			$rbelad_custom_link['custom_attributes']
		)
			? $rbelad_custom_link['custom_attributes']
			: '';

		break;
}

/**
 * -------------------------------------------------------------------------
 * Return link data.
 * -------------------------------------------------------------------------
 */

return array(
	'type'              => $rbelad_link_type,
	'url'               => $rbelad_url,
	'target'            => $rbelad_target,
	'rel'               => $rbelad_rel,
	'custom_attributes' => $rbelad_custom_attributes,
);
