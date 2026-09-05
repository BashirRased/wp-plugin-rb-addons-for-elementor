<?php
/**
 * Review Notice Class.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Classes;

defined( 'ABSPATH' ) || exit;

/**
 * Class Review
 */
class Review {
	/**
	 * Check if review notice should be shown or not.
	 **/
	public static function rbelad_void_check_installation_time() {

		$nobug = get_option( 'rbelad__spare_me', '0' );

		if ( '1' === $nobug || '3' === $nobug ) {
			return;
		}

		$install_date = get_option( 'rbelad_activation_time', strtotime( 'now' ) );
		$past_date    = strtotime( '-10 days' );

		$remind_time = get_option( 'rbelad__remind_me', strtotime( 'now' ) );
		$remind_due  = strtotime( '+15 days', $remind_time );
		$now         = strtotime( 'now' );

		if ( $now >= $remind_due ) {
			add_action( 'admin_notices', array( __CLASS__, 'rbelad_void_grid_display_admin_notice' ) );
		} elseif ( ( $past_date >= $install_date ) && '2' !== $nobug ) {
			add_action( 'admin_notices', array( __CLASS__, 'rbelad_void_grid_display_admin_notice' ) );
		}
	}

	/**
	 * Display Admin Notice, asking for a review
	 **/
	public static function rbelad_void_grid_display_admin_notice() {
		// WordPress global variable.
		global $pagenow;

		$exclude = array( 'themes.php', 'users.php', 'tools.php', 'options-general.php', 'options-writing.php', 'options-reading.php', 'options-discussion.php', 'options-media.php', 'options-permalink.php', 'options-privacy.php', 'edit-comments.php', 'upload.php', 'media-new.php', 'admin.php', 'import.php', 'export.php', 'site-health.php', 'export-personal-data.php', 'erase-personal-data.php' );

		if ( ! in_array( $pagenow, $exclude, true ) ) {

			$dont_disturb = esc_url(
				add_query_arg( 'spare_me', '1', self::rbelad_current_admin_url() )
			);

			$remind_me = esc_url(
				add_query_arg( 'remind_me', '1', self::rbelad_current_admin_url() )
			);

			$rated = esc_url(
				add_query_arg( 'rbelad_rated', '1', self::rbelad_current_admin_url() )
			);

			$reviewurl = esc_url(
				'https://wordpress.org/support/plugin/rb-addons-for-elementor/reviews/?rate=5#new-post'
			);

			$allowed_html = array(
				'div'  => array(
					'class' => array(),
				),
				'h3'   => array(),
				'p'    => array(),
				'a'    => array(
					'href'   => array(),
					'class'  => array(),
					'target' => array(),
				),
				'span' => array(),
				'img'  => array(
					'src' => array(),
				),
				'i'    => array(
					'class' => array(),
				),
			);

			printf(
				wp_kses(
					'<div class="notice rbelad-review-notice rbelad-review-notice--extended">
						<div class="rbelad-review-notice__aside">
							<div class="rbelad-review-notice__icon-wrapper">
								<i class="rbelad-wi rbelad-wi-plugin"></i>
							</div>
						</div>

						<div class="rbelad-review-notice__content">
							<h3>Enjoying RB Addons for Elementor?</h3>

							<p>
								Thank you for choosing RB Addons for Elementor. If you have found our plugin useful and makes you smile,
								please consider giving us a 5-star rating on WordPress.org.
							</p>

							<div class="rbelad-review-notice__actions">
								<a href="%1$s" class="rbelad-review-button rbelad-review-button--cta" target="_blank">
									<span>👍 Yes, You Deserve It!</span>
								</a>

								<a href="%2$s" class="rbelad-review-button rbelad-review-button--outline">
									<span>🙌 Already Rated!</span>
								</a>

								<a href="%3$s" class="rbelad-review-button rbelad-review-button--outline">
									<span>🔔 Remind Me Later</span>
								</a>

								<a href="%4$s" class="rbelad-review-button rbelad-review-button--error rbelad-review-button--outline">
									<span>💔 No Thanks</span>
								</a>
							</div>
						</div>
					</div>',
					$allowed_html
				),
				esc_url( $reviewurl ),
				esc_url( $rated ),
				esc_url( $remind_me ),
				esc_url( $dont_disturb )
			);
		}
	}

	/**
	 * Remove the notice for the user if review already done or if the user does not want to.
	 **/
	public static function rbelad_void_spare_me() {
		$dont_disturb = wp_nonce_url(
			add_query_arg( 'spare_me', '1', self::rbelad_current_admin_url() ),
			'rbelad_review_action',
			'rbelad_nonce'
		);

		if (
			isset( $_GET['spare_me'], $_GET['rbelad_nonce'] )
			&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['rbelad_nonce'] ) ), 'rbelad_review_action' )
		) {
			$spare_me = absint( wp_unslash( $_GET['spare_me'] ) );

			if ( 1 === $spare_me ) {
				update_option( 'rbelad__spare_me', '1' );
			}
		}

		if (
			isset( $_GET['remind_me'], $_GET['rbelad_nonce'] )
			&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['rbelad_nonce'] ) ), 'rbelad_review_action' )
		) {
			$remind_me = absint( wp_unslash( $_GET['remind_me'] ) );

			if ( 1 === $remind_me ) {
				update_option( 'rbelad__remind_me', time() );
				update_option( 'rbelad__spare_me', '2' );
			}
		}

		if (
			isset( $_GET['rbelad_rated'], $_GET['rbelad_nonce'] )
			&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['rbelad_nonce'] ) ), 'rbelad_review_action' )
		) {
			$rbelad_rated = absint( wp_unslash( $_GET['rbelad_rated'] ) );

			if ( 1 === $rbelad_rated ) {
				update_option( 'rbelad__rated', 'yes' );
				update_option( 'rbelad__spare_me', '3' );
			}
		}
	}

	/**
	 * Current Admin URL.
	 **/
	protected static function rbelad_current_admin_url() {
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		$uri = preg_replace( '|^.*/wp-admin/|i', '', $uri );

		if ( ! $uri ) {
			return '';
		}
		return remove_query_arg( array( '_wpnonce', '_wc_notice_nonce', 'wc_db_update', 'wc_db_update_nonce', 'wc-hide-notice' ), admin_url( $uri ) );
	}
}
