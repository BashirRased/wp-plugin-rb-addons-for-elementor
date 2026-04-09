<?php
/**
 * Review Notice Class.
 *
 * @package RB_Addons_For_Elementor
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Class Review
 */
class Review {

	/**
	 * Check installation time and decide to show notice.
	 *
	 * @return void
	 */
	public static function rbelad_check_installation_time() {

		$nobug = get_option( 'rbelad_spare_me', '0' );

		if ( '1' === $nobug || '3' === $nobug ) {
			return;
		}

		$install_date = (int) get_option( 'rbelad_activation_time', time() );
		$past_date    = strtotime( '-10 days' );

		$remind_time = (int) get_option( 'rbelad_remind_me', time() );
		$remind_due  = strtotime( '+15 days', $remind_time );
		$now         = time();

		if ( $now >= $remind_due ) {
			add_action( 'admin_notices', array( __CLASS__, 'rbelad_display_admin_notice' ) );
		} elseif ( $past_date >= $install_date && '2' !== $nobug ) {
			add_action( 'admin_notices', array( __CLASS__, 'rbelad_display_admin_notice' ) );
		}
	}

	/**
	 * Display admin review notice.
	 *
	 * @return void
	 */
	public static function rbelad_display_admin_notice() {

		global $pagenow;
		$nonce = wp_create_nonce( 'rbelad_review_nonce' );

		$exclude = array(
			'themes.php',
			'users.php',
			'tools.php',
			'options-general.php',
		);

		if ( in_array( $pagenow, $exclude, true ) ) {
			return;
		}

		$dont_disturb = esc_url(
			add_query_arg(
				array(
					'rbelad_spare_me' => '1',
					'_wpnonce'        => $nonce,
				),
				self::rbelad_current_admin_url()
			)
		);

		$remind_me = esc_url(
			add_query_arg(
				array(
					'rbelad_remind_me' => '1',
					'_wpnonce'         => $nonce,
				),
				self::rbelad_current_admin_url()
			)
		);

		$rated = esc_url(
			add_query_arg(
				array(
					'rbelad_rated' => '1',
					'_wpnonce'     => $nonce,
				),
				self::rbelad_current_admin_url()
			)
		);

		$review_url = esc_url(
			'https://wordpress.org/support/plugin/rb-addons-for-elementor/reviews/?rate=5#new-post'
		);

		?>
		<div class="notice notice-info rbelad-review-notice">
			<p>
				<strong>
					<?php esc_html_e( 'Enjoying RB Addons for Elementor?', 'rb-addons-for-elementor' ); ?>
				</strong>
			</p>

			<p>
				<?php esc_html_e( 'If you like our plugin, please consider giving us a 5-star review. Your support helps us grow!', 'rb-addons-for-elementor' ); ?>
			</p>

			<p>
				<a href="<?php echo esc_url( $review_url ); ?>" target="_blank" class="button button-primary">
					<?php esc_html_e( 'Leave a Review', 'rb-addons-for-elementor' ); ?>
				</a>

				<a href="<?php echo esc_url( $rated ); ?>" class="button">
					<?php esc_html_e( 'Already Rated', 'rb-addons-for-elementor' ); ?>
				</a>

				<a href="<?php echo esc_url( $remind_me ); ?>" class="button">
					<?php esc_html_e( 'Remind Me Later', 'rb-addons-for-elementor' ); ?>
				</a>

				<a href="<?php echo esc_url( $dont_disturb ); ?>" class="button">
					<?php esc_html_e( 'No Thanks', 'rb-addons-for-elementor' ); ?>
				</a>
			</p>
		</div>
		<?php
	}

	/**
	 * Handle notice actions.
	 *
	 * @return void
	 */
	public static function rbelad_handle_actions() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( ! isset( $_GET['_wpnonce'] ) ) {
			return;
		}

		$nonce = sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) );

		if ( ! wp_verify_nonce( $nonce, 'rbelad_review_nonce' ) ) {
			return;
		}

		if ( isset( $_GET['rbelad_spare_me'] ) ) {
			update_option( 'rbelad_spare_me', '1' );
		}

		if ( isset( $_GET['rbelad_remind_me'] ) ) {
			update_option( 'rbelad_remind_me', time() );
			update_option( 'rbelad_spare_me', '2' );
		}

		if ( isset( $_GET['rbelad_rated'] ) ) {
			update_option( 'rbelad_rated', 'yes' );
			update_option( 'rbelad_spare_me', '3' );
		}
	}

	/**
	 * Get current admin URL.
	 *
	 * @return string
	 */
	protected static function rbelad_current_admin_url() {

		$uri = isset( $_SERVER['REQUEST_URI'] )
			? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) )
			: '';

		if ( empty( $uri ) ) {
			return '';
		}

		return remove_query_arg(
			array(
				'_wpnonce',
				'_wp_http_referer',
			),
			admin_url( $uri )
		);
	}
}
