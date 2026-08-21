<?php
/**
 * Button Group widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

$rbelad_buttons = ! empty( $rbelad_settings[ $rbelad_prefix . 'repeater' ] )
	? $rbelad_settings[ $rbelad_prefix . 'repeater' ]
	: array();

if ( empty( $rbelad_buttons ) ) {
	return;
}
?>

<div class="rbelad-button-group__wrap">

	<?php foreach ( $rbelad_buttons as $rbelad_button ) : ?>

		<?php
		$rbelad_text = ! empty( $rbelad_button[ $rbelad_prefix . 'btn_text' ] )
			? $rbelad_button[ $rbelad_prefix . 'btn_text' ]
			: '';

		$rbelad_link_type = ! empty( $rbelad_button[ $rbelad_prefix . 'link_type' ] )
			? $rbelad_button[ $rbelad_prefix . 'link_type' ]
			: 'none';

		$rbelad_url    = '';
		$rbelad_target = '';
		$rbelad_rel    = '';

		// Page link.
		if ( 'page' === $rbelad_link_type ) {

			$rbelad_page_link = ! empty( $rbelad_button[ $rbelad_prefix . 'page_link' ] )
				? $rbelad_button[ $rbelad_prefix . 'page_link' ]
				: '';

			if ( is_array( $rbelad_page_link ) ) {
				$rbelad_url    = ! empty( $rbelad_page_link['url'] ) ? $rbelad_page_link['url'] : '';
				$rbelad_target = ! empty( $rbelad_page_link['is_external'] ) ? ' target="_blank"' : '';
				$rbelad_rel    = ! empty( $rbelad_page_link['nofollow'] ) ? ' rel="nofollow"' : '';
			} else {
				$rbelad_url = $rbelad_page_link;
			}
		}

		// Custom link.
		if ( 'custom' === $rbelad_link_type ) {

			$rbelad_custom_link = ! empty( $rbelad_button[ $rbelad_prefix . 'custom_link' ] )
				? $rbelad_button[ $rbelad_prefix . 'custom_link' ]
				: '';

			if ( is_array( $rbelad_custom_link ) ) {
				$rbelad_url    = ! empty( $rbelad_custom_link['url'] ) ? $rbelad_custom_link['url'] : '';
				$rbelad_target = ! empty( $rbelad_custom_link['is_external'] ) ? ' target="_blank"' : '';
				$rbelad_rel    = ! empty( $rbelad_custom_link['nofollow'] ) ? ' rel="nofollow"' : '';
			} else {
				$rbelad_url = $rbelad_custom_link;
			}
		}
		?>

		<?php if ( ! empty( $rbelad_url ) ) : ?>

			<a
				class="rbelad-button-group__item"
				href="<?php echo esc_url( $rbelad_url ); ?>"
				<?php echo esc_attr( $rbelad_target ); ?>
				<?php echo esc_attr( $rbelad_rel ); ?>
			>
				<?php echo esc_html( $rbelad_text ); ?>
			</a>

		<?php else : ?>

			<span class="rbelad-button-group__item">
				<?php echo esc_html( $rbelad_text ); ?>
			</span>

		<?php endif; ?>

	<?php endforeach; ?>

</div>
