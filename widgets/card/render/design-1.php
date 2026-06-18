<?php
/**
 * Card widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings      = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix_title  = $this->get_section_content_prefix( 'title' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix_desc   = $this->get_section_content_prefix( 'desc' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$prefix_img    = $this->get_section_content_prefix( 'img' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$after_prefix  = $this->get_section_content_prefix( 'wrap_after' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$before_prefix = $this->get_section_content_prefix( 'wrap_before' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

/**
 * Render icon / image / text.
 *
 * @param string $before_prefix Control prefix.
 * @param array  $settings Widget settings.
 */
$render_before_content = function ( $before_prefix, $settings ) {

	$type = ! empty( $settings[ $before_prefix . '_icon_img_text' ] )
		? $settings[ $before_prefix . '_icon_img_text' ]
		: '';

	if ( 'icon' === $type && ! empty( $settings[ $before_prefix . '_icon_simple' ]['value'] ) ) {

		\Elementor\Icons_Manager::render_icon(
			$settings[ $before_prefix . '_icon_simple' ],
			array(
				'aria-hidden' => 'true',
			)
		);

	} elseif ( 'image' === $type && ! empty( $settings[ $before_prefix . '_image' ]['url'] ) ) {

		?>
		<img
			src="<?php echo esc_url( $settings[ $before_prefix . '_image' ]['url'] ); ?>"
			alt=""
		>
		<?php

	} elseif ( 'text' === $type && ! empty( $settings[ $before_prefix . '_text' ] ) ) {

		echo esc_html( $settings[ $before_prefix . '_text' ] );
	}
};

/**
 * Render icon / image / text.
 *
 * @param string $after_prefix Control prefix.
 * @param array  $settings Widget settings.
 */
$render_after_content = function ( $after_prefix, $settings ) {

	$type = ! empty( $settings[ $after_prefix . '_icon_img_text' ] )
		? $settings[ $after_prefix . '_icon_img_text' ]
		: '';

	if ( 'icon' === $type && ! empty( $settings[ $after_prefix . '_icon_simple' ]['value'] ) ) {

		\Elementor\Icons_Manager::render_icon(
			$settings[ $after_prefix . '_icon_simple' ],
			array(
				'aria-hidden' => 'true',
			)
		);

	} elseif ( 'image' === $type && ! empty( $settings[ $after_prefix . '_image' ]['url'] ) ) {

		?>
		<img
			src="<?php echo esc_url( $settings[ $after_prefix . '_image' ]['url'] ); ?>"
			alt=""
		>
		<?php

	} elseif ( 'text' === $type && ! empty( $settings[ $after_prefix . '_text' ] ) ) {

		echo esc_html( $settings[ $after_prefix . '_text' ] );
	}
};
?>

<div class="rbelad-card__wrap rbelad-flex rbelad-relative">
	<?php if ( ! empty( $settings[ $before_prefix . '_icon_img_text' ] ) ) : ?>
		<div class="rbelad-card__before-wrap rbelad-absolute">
			<?php $render_before_content( $before_prefix, $settings ); ?>
		</div>
	<?php endif; ?>

	<div class="rbelad-card__img-wrap rbelad-card__item">
		<?php if ( ! empty( $settings[ $prefix_img . '_img' ]['url'] ) ) : ?>
			<img src="<?php echo esc_url( $settings[ $prefix_img . '_img' ]['url'] ); ?>">
		<?php endif; ?>
	</div>

	<div class="rbelad-card__content-wrap rbelad-card__item">
		<?php if ( ! empty( $settings[ $prefix_title . '_text' ] ) ) : ?>
			<h3 class="rbelad-card__title">
				<?php echo esc_html( $settings[ $prefix_title . '_text' ] ); ?>
			</h3>
		<?php endif; ?>

		<?php if ( ! empty( $settings[ $prefix_desc . '_desc' ] ) ) : ?>
			<div class="rbelad-card__desc">
				<?php echo wp_kses_post( $settings[ $prefix_desc . '_desc' ] ); ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if ( ! empty( $settings[ $after_prefix . '_icon_img_text' ] ) ) : ?>
		<div class="rbelad-card__after-wrap rbelad-absolute">
			<?php $render_after_content( $after_prefix, $settings ); ?>
		</div>
	<?php endif; ?>

</div>
