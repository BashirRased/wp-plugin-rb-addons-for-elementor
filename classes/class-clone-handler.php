<?php
/**
 * Clone Handler
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Classes;

defined( 'ABSPATH' ) || exit;

use Elementor\Core\Files\CSS\Post as Post_CSS;

/**
 * Clone Handler Class
 */
class Clone_Handler {
	const ACTION = 'rbelad_duplicate_thing';

	/**
	 * Initialize clone handler hooks.
	 *
	 * Registers actions and filters required for post cloning functionality.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter(
			'post_row_actions',
			array( __CLASS__, 'add_row_actions' ),
			10,
			2
		);
		add_action(
			'admin_action_' . self::ACTION,
			array( __CLASS__, 'duplicate_thing' )
		);
	}

	/**
	 * Add clone action link in post row actions.
	 *
	 * Adds a custom clone link for Elementor-supported post types.
	 *
	 * @param array    $actions Existing row actions.
	 * @param \WP_Post $post    Current post object.
	 *
	 * @return array Modified row actions.
	 */
	public static function add_row_actions( $actions, $post ) {
		if (
			current_user_can( 'edit_post', $post->ID )
			&& post_type_supports( $post->post_type, 'elementor' )
		) {
			$actions[ self::ACTION ] = sprintf(
				'<a href="%1$s">%2$s</a>',
				esc_url(
					self::get_url(
						$post->ID,
						'list'
					)
				),
				esc_html__(
					'RB Clone',
					'rb-addons-for-elementor'
				)
			);
		}
		return $actions;
	}

	/**
	 * Generate clone URL.
	 *
	 * Creates a nonce protected admin URL for duplicating a post.
	 *
	 * @param int    $post_id Post ID.
	 * @param string $ref     Request reference source.
	 *
	 * @return string Clone URL.
	 */
	public static function get_url( $post_id, $ref = '' ) {
		return wp_nonce_url(
			add_query_arg(
				array(

					'action'  => self::ACTION,
					'post_id' => $post_id,
					'ref'     => $ref,

				),
				admin_url( 'admin.php' )
			),
			self::ACTION
		);
	}

	/**
	 * Handle clone request.
	 *
	 * Validates request permissions, duplicates the post,
	 * copies related data, and redirects user.
	 *
	 * @return void
	 */
	public static function duplicate_thing() {
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		$post_id = isset( $_GET['post_id'] )
			? absint( $_GET['post_id'] )
			: 0;

		check_admin_referer(
			self::ACTION
		);

		$post = get_post( $post_id );

		if ( ! $post ) {
			wp_die(
				'Invalid post'
			);
		}

		$new_id = self::duplicate_post( $post );

		if (
			! is_wp_error( $new_id )
		) {

			self::duplicate_taxonomies(
				$post,
				$new_id
			);

			self::duplicate_meta_entries(
				$post,
				$new_id
			);

			$css = Post_CSS::create( $new_id );
			$css->update();

		}

		wp_safe_redirect(
			admin_url(
				'edit.php?post_type=' . $post->post_type
			)
		);
		exit;
	}

	/**
	 * Duplicate post.
	 *
	 * Creates a new draft post using the original post data.
	 *
	 * @param \WP_Post $post Original post object.
	 *
	 * @return int|\WP_Error New post ID or error object.
	 */
	protected static function duplicate_post( $post ) {
		$current_user = wp_get_current_user();
		return wp_insert_post(
			array(
				'post_title'   => $post->post_title . ' - Clone',
				'post_content' => $post->post_content,
				'post_status'  => 'draft',
				'post_type'    => $post->post_type,
				'post_author'  => $current_user->ID,
			)
		);
	}

	/**
	 * Duplicate post taxonomies.
	 *
	 * Copies taxonomy terms from original post to cloned post.
	 *
	 * @param \WP_Post $post   Original post object.
	 * @param int      $new_id New duplicated post ID.
	 *
	 * @return void
	 */
	protected static function duplicate_taxonomies(
		$post,
		$new_id
	) {
		$taxonomies = get_object_taxonomies(
			$post->post_type
		);

		foreach ( $taxonomies as $taxonomy ) {
			$terms = wp_get_object_terms(
				$post->ID,
				$taxonomy,
				array(
					'fields' => 'slugs',
				)
			);
			wp_set_object_terms(
				$new_id,
				$terms,
				$taxonomy
			);
		}
	}

	/**
	 * Duplicate post meta entries.
	 *
	 * Copies all metadata including Elementor data
	 * from original post to cloned post.
	 *
	 * @param \WP_Post $post   Original post object.
	 * @param int      $new_id New duplicated post ID.
	 *
	 * @return void
	 */
	protected static function duplicate_meta_entries(
		$post,
		$new_id
	) {

		$meta = get_post_meta(
			$post->ID
		);

		foreach ( $meta as $rbelad_key => $rbelad_values ) {
			foreach ( $rbelad_values as $value ) {
				add_post_meta(
					$new_id,
					$rbelad_key,
					maybe_unserialize( $value )
				);
			}
		}
	}
}
