<?php
/**
 * Card widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Icons_Manager;

$rbelad_settings      = $this->get_settings_for_display();
$rbelad_prefix_title  = $this->get_section_content_prefix( 'title' );
$rbelad_prefix_desc   = $this->get_section_content_prefix( 'desc' );
$rbelad_prefix_img    = $this->get_section_content_prefix( 'img' );
$rbelad_after_prefix  = $this->get_section_content_prefix( 'wrap_after' );
$rbelad_before_prefix = $this->get_section_content_prefix( 'wrap_before' );

/**
 * Render icon / image / text.
 *
 * @param string $rbelad_before_prefix Control prefix.
 * @param array  $rbelad_settings Widget settings.
 */
$rbelad_render_before_content = function ( $rbelad_before_prefix, $rbelad_settings ) {

	$rbelad_type = ! empty( $rbelad_settings[ $rbelad_before_prefix . '_icon_img_text' ] )
		? $rbelad_settings[ $rbelad_before_prefix . '_icon_img_text' ]
		: '';

	if ( 'icon' === $rbelad_type && ! empty( $rbelad_settings[ $rbelad_before_prefix . '_icon_simple' ]['value'] ) ) {

		Icons_Manager::render_icon(
			$rbelad_settings[ $rbelad_before_prefix . '_icon_simple' ],
			array(
				'aria-hidden' => 'true',
			)
		);

	} elseif ( 'image' === $rbelad_type && ! empty( $rbelad_settings[ $rbelad_before_prefix . '_image' ]['url'] ) ) {

		?>
		<img
			src="<?php echo esc_url( $rbelad_settings[ $rbelad_before_prefix . '_image' ]['url'] ); ?>"
			alt=""
		>
		<?php

	} elseif ( 'text' === $rbelad_type && ! empty( $rbelad_settings[ $rbelad_before_prefix . '_text' ] ) ) {

		echo esc_html( $rbelad_settings[ $rbelad_before_prefix . '_text' ] );
	}
};

/**
 * Render icon / image / text.
 *
 * @param string $rbelad_after_prefix Control prefix.
 * @param array  $rbelad_settings Widget settings.
 */
$rbelad_render_after_content = function ( $rbelad_after_prefix, $rbelad_settings ) {

	$rbelad_type = ! empty( $rbelad_settings[ $rbelad_after_prefix . '_icon_img_text' ] )
		? $rbelad_settings[ $rbelad_after_prefix . '_icon_img_text' ]
		: '';

	if ( 'icon' === $rbelad_type && ! empty( $rbelad_settings[ $rbelad_after_prefix . '_icon_simple' ]['value'] ) ) {

		Icons_Manager::render_icon(
			$rbelad_settings[ $rbelad_after_prefix . '_icon_simple' ],
			array(
				'aria-hidden' => 'true',
			)
		);

	} elseif ( 'image' === $rbelad_type && ! empty( $rbelad_settings[ $rbelad_after_prefix . '_image' ]['url'] ) ) {

		?>
		<img
			src="<?php echo esc_url( $rbelad_settings[ $rbelad_after_prefix . '_image' ]['url'] ); ?>"
			alt=""
		>
		<?php

	} elseif ( 'text' === $rbelad_type && ! empty( $rbelad_settings[ $rbelad_after_prefix . '_text' ] ) ) {

		echo esc_html( $rbelad_settings[ $rbelad_after_prefix . '_text' ] );
	}
};
?>

<div class="rbelad-card__wrap rbelad-flex rbelad-relative">
	<?php if ( ! empty( $rbelad_settings[ $rbelad_before_prefix . '_icon_img_text' ] ) ) : ?>
		<div class="rbelad-card__before-wrap rbelad-absolute">
			<?php $rbelad_render_before_content( $rbelad_before_prefix, $rbelad_settings ); ?>
		</div>
	<?php endif; ?>

	<div class="rbelad-card__img-wrap rbelad-card__item">
		<?php if ( ! empty( $rbelad_settings[ $rbelad_prefix_img . '_img' ]['url'] ) ) : ?>
			<img src="<?php echo esc_url( $rbelad_settings[ $rbelad_prefix_img . '_img' ]['url'] ); ?>">
		<?php endif; ?>
	</div>

	<div class="rbelad-card__content-wrap rbelad-card__item">
		<?php if ( ! empty( $rbelad_settings[ $rbelad_prefix_title . '_text' ] ) ) : ?>
			<h3 class="rbelad-card__title">
				<?php echo esc_html( $rbelad_settings[ $rbelad_prefix_title . '_text' ] ); ?>
			</h3>
		<?php endif; ?>

		<?php if ( ! empty( $rbelad_settings[ $rbelad_prefix_desc . '_desc' ] ) ) : ?>
			<div class="rbelad-card__desc">
				<?php echo wp_kses_post( $rbelad_settings[ $rbelad_prefix_desc . '_desc' ] ); ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if ( ! empty( $rbelad_settings[ $rbelad_after_prefix . '_icon_img_text' ] ) ) : ?>
		<div class="rbelad-card__after-wrap rbelad-absolute">
			<?php $rbelad_render_after_content( $rbelad_after_prefix, $rbelad_settings ); ?>
		</div>
	<?php endif; ?>

</div>
