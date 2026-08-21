<?php
/**
 * Icon List widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();

$rbelad_prefix = 'rbelad_list_style_general_content_';

/*
 * Get repeater items.
 */
$rbelad_items = $rbelad_settings[ $rbelad_prefix . 'list_style_repeater' ] ?? array();

if ( empty( $rbelad_items ) || ! is_array( $rbelad_items ) ) {
	return;
}
?>

<div class="rbelad-icon-list__wrap">

	<?php foreach ( $rbelad_items as $rbelad_item ) : ?>

		<?php
		$rbelad_icon_switch = $rbelad_item[ $rbelad_prefix . 'icon_switch' ] ?? 'yes';
		$rbelad_icon_type   = $rbelad_item[ $rbelad_prefix . 'icon_type' ] ?? 'icon';

		$rbelad_font_icon  = $rbelad_item[ $rbelad_prefix . 'font_icon' ] ?? array();
		$rbelad_icon_image = $rbelad_item[ $rbelad_prefix . 'icon_image' ] ?? array();

		$rbelad_label = $rbelad_item[ $rbelad_prefix . 'label_text' ] ?? '';

		$rbelad_separator_type = $rbelad_item[ $rbelad_prefix . 'separator_type' ] ?? 'text';
		$rbelad_separator_text = $rbelad_item[ $rbelad_prefix . 'separator_text' ] ?? '';

		$rbelad_separator_icon  = $rbelad_item[ $rbelad_prefix . 'separator_font_icon' ] ?? array();
		$rbelad_separator_image = $rbelad_item[ $rbelad_prefix . 'separator_icon_image' ] ?? array();

		$rbelad_info = $rbelad_item[ $rbelad_prefix . 'info_text' ] ?? '';
		?>

		<div class="rbelad-icon-list__item">

			<?php if ( 'yes' === $rbelad_icon_switch ) : ?>

				<div class="rbelad-icon-list__icon">

					<?php if ( 'icon' === $rbelad_icon_type && ! empty( $rbelad_font_icon['value'] ) ) : ?>

						<?php
						$rbelad_icon_html = \Elementor\Icons_Manager::try_get_icon_html(
							$rbelad_font_icon,
							array(
								'aria-hidden' => 'true',
							)
						);

						echo wp_kses_post( $rbelad_icon_html );
						?>

					<?php elseif ( 'image' === $rbelad_icon_type && ! empty( $rbelad_icon_image['id'] ) ) : ?>

						<?php
						$rbelad_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html(
							$rbelad_item,
							'icon_image',
							$rbelad_icon_image['id']
						);

						echo wp_kses_post( $rbelad_image_html );
						?>

					<?php endif; ?>

				</div>

			<?php endif; ?>

			<?php if ( ! empty( $rbelad_label ) ) : ?>
				<div class="rbelad-icon-list__label">
					<?php echo esc_html( $rbelad_label ); ?>
				</div>
			<?php endif; ?>

			<?php if ( 'text' === $rbelad_separator_type && ! empty( $rbelad_separator_text ) ) : ?>

				<div class="rbelad-icon-list__separator">
					<span class="rbelad-icon-list__separator-text">
						<?php echo esc_html( $rbelad_separator_text ); ?>
					</span>
				</div>

			<?php elseif ( 'icon' === $rbelad_separator_type && ! empty( $rbelad_separator_icon['value'] ) ) : ?>

				<div class="rbelad-icon-list__separator">
					<span class="rbelad-icon-list__separator-icon">
						<?php
						$rbelad_separator_icon_html = \Elementor\Icons_Manager::try_get_icon_html(
							$rbelad_separator_icon,
							array(
								'aria-hidden' => 'true',
							)
						);

						echo wp_kses_post( $rbelad_separator_icon_html );
						?>
					</span>
				</div>

			<?php elseif ( 'image' === $rbelad_separator_type && ! empty( $rbelad_separator_image['id'] ) ) : ?>

				<div class="rbelad-icon-list__separator">
					<span class="rbelad-icon-list__separator-img">
						<?php
						$rbelad_separator_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html(
							$rbelad_item,
							'separator_icon_image',
							$rbelad_separator_image['id']
						);

						echo wp_kses_post( $rbelad_separator_image_html );
						?>
					</span>
				</div>

			<?php endif; ?>

			<?php if ( ! empty( $rbelad_info ) ) : ?>
				<div class="rbelad-icon-list__info">
					<?php echo esc_html( $rbelad_info ); ?>
				</div>
			<?php endif; ?>

		</div>

	<?php endforeach; ?>

</div>