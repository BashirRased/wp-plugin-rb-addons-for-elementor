<?php
/**
 * Icon List widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Icons_Manager;

/**
 * Widget settings.
 */
$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

/**
 * Debug:
 * Actual repeater key from Elementor save data:
 */
$rbelad_repeater_id = $rbelad_prefix . '_list_style_repeater';

/**
 * Get repeater items.
 */
$rbelad_items = isset( $rbelad_settings[ $rbelad_repeater_id ] )
	&& is_array( $rbelad_settings[ $rbelad_repeater_id ] )
	? $rbelad_settings[ $rbelad_repeater_id ]
	: array();

/**
 * Temporary fallback.
 *
 * This makes the renderer work even if the prefix helper
 * returns an unexpected value.
 */
if ( empty( $rbelad_items ) ) {

	$rbelad_repeater_id = 'rbelad_list_style_general_content_list_style_repeater';

	$rbelad_items = isset( $rbelad_settings[ $rbelad_repeater_id ] )
		&& is_array( $rbelad_settings[ $rbelad_repeater_id ] )
		? $rbelad_settings[ $rbelad_repeater_id ]
		: array();
}

if ( empty( $rbelad_items ) ) {
	return;
}
?>

<div class="rbelad-icon-list__wrap">
	<?php foreach ( $rbelad_items as $rbelad_item ) : ?>

		<?php
		/**
		 * -----------------------------------------------------------------
		 * Item settings.
		 * -----------------------------------------------------------------
		 */
		$rbelad_icon_switch_id     = $rbelad_prefix . '_icon_switch';
		$rbelad_icon_type_id       = $rbelad_prefix . '_icon_type';
		$rbelad_font_icon_id       = $rbelad_prefix . '_font_icon';
		$rbelad_icon_image_id      = $rbelad_prefix . '_icon_image';
		$rbelad_label_id           = $rbelad_prefix . '_label_text';
		$rbelad_separator_type_id  = $rbelad_prefix . '_separator_type';
		$rbelad_separator_text_id  = $rbelad_prefix . '_separator_text';
		$rbelad_separator_icon_id  = $rbelad_prefix . '_separator_font_icon';
		$rbelad_separator_image_id = $rbelad_prefix . '_separator_icon_image';
		$rbelad_info_id            = $rbelad_prefix . '_info_text';

		/**
		 * Values.
		 */

		$rbelad_icon_switch = ! empty(
			$rbelad_item[ $rbelad_icon_switch_id ]
		)
			? $rbelad_item[ $rbelad_icon_switch_id ]
			: 'yes';

		$rbelad_icon_type = ! empty(
			$rbelad_item[ $rbelad_icon_type_id ]
		)
			? $rbelad_item[ $rbelad_icon_type_id ]
			: 'icon';

		$rbelad_font_icon = ! empty(
			$rbelad_item[ $rbelad_font_icon_id ]
		)
			? $rbelad_item[ $rbelad_font_icon_id ]
			: array();

		$rbelad_icon_image = ! empty(
			$rbelad_item[ $rbelad_icon_image_id ]
		)
			? $rbelad_item[ $rbelad_icon_image_id ]
			: array();

		$rbelad_label = ! empty(
			$rbelad_item[ $rbelad_label_id ]
		)
			? $rbelad_item[ $rbelad_label_id ]
			: '';

		$rbelad_separator_type = ! empty(
			$rbelad_item[ $rbelad_separator_type_id ]
		)
			? $rbelad_item[ $rbelad_separator_type_id ]
			: 'text';

		$rbelad_separator_text = ! empty(
			$rbelad_item[ $rbelad_separator_text_id ]
		)
			? $rbelad_item[ $rbelad_separator_text_id ]
			: '';

		$rbelad_separator_icon = ! empty(
			$rbelad_item[ $rbelad_separator_icon_id ]
		)
			? $rbelad_item[ $rbelad_separator_icon_id ]
			: array();

		$rbelad_separator_image = ! empty(
			$rbelad_item[ $rbelad_separator_image_id ]
		)
			? $rbelad_item[ $rbelad_separator_image_id ]
			: array();

		$rbelad_info = ! empty(
			$rbelad_item[ $rbelad_info_id ]
		)
			? $rbelad_item[ $rbelad_info_id ]
			: '';

		$rbelad_item_id = ! empty( $rbelad_item['_id'] )
			? sanitize_html_class( $rbelad_item['_id'] )
			: '';
		?>

		<div class="rbelad-icon-list__item<?php echo $rbelad_item_id ? ' rbelad-icon-list__item-' . esc_attr( $rbelad_item_id ) : ''; ?>" >
			<?php
			/**
			 * -----------------------------------------------------------------
			 * Icon / Image.
			 * -----------------------------------------------------------------
			 */
			if ( 'yes' === $rbelad_icon_switch ) :
				?>
				<div class="rbelad-icon-list__icon">
					<?php if ( 'icon' === $rbelad_icon_type ) : ?>
						<?php
						if (
							is_array( $rbelad_font_icon )
							&& ! empty( $rbelad_font_icon['value'] )
						) :
							?>
							<?php
							Icons_Manager::render_icon(
								$rbelad_font_icon,
								array(
									'aria-hidden' => 'true',
								)
							);
							?>
						<?php endif; ?>
					<?php elseif ( 'image' === $rbelad_icon_type ) : ?>
						<?php
						if (
							is_array( $rbelad_icon_image )
							&& ! empty( $rbelad_icon_image['id'] )
						) :
							?>
							<?php
							echo wp_get_attachment_image(
								(int) $rbelad_icon_image['id'],
								'full',
								false,
								array(
									'alt'         => '',
									'aria-hidden' => 'true',
								)
							);
							?>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php
			/**
			 * -----------------------------------------------------------------
			 * Label.
			 * -----------------------------------------------------------------
			 */

			if ( ! empty( $rbelad_label ) ) :
				?>
				<div class="rbelad-icon-list__label">
					<?php echo esc_html( $rbelad_label ); ?>
				</div>
			<?php endif; ?>

			<?php
			/**
			 * -----------------------------------------------------------------
			 * Separator.
			 * -----------------------------------------------------------------
			 */
			if ( 'text' === $rbelad_separator_type ) :
				if ( ! empty( $rbelad_separator_text ) ) :
					?>
					<div class="rbelad-icon-list__separator">
						<span class="rbelad-icon-list__separator-text">
							<?php echo esc_html( $rbelad_separator_text ); ?>
						</span>
					</div>
					<?php
				endif;

			elseif ( 'icon' === $rbelad_separator_type ) :

				if (
					is_array( $rbelad_separator_icon )
					&& ! empty( $rbelad_separator_icon['value'] )
				) :
					?>
					<div class="rbelad-icon-list__separator">
						<span class="rbelad-icon-list__separator-icon">
							<?php
							Icons_Manager::render_icon(
								$rbelad_separator_icon,
								array(
									'aria-hidden' => 'true',
								)
							);
							?>
						</span>
					</div>
					<?php
				endif;

			elseif ( 'image' === $rbelad_separator_type ) :
				if (
					is_array( $rbelad_separator_image )
					&& ! empty( $rbelad_separator_image['id'] )
				) :
					?>
					<div class="rbelad-icon-list__separator">
						<span class="rbelad-icon-list__separator-img">
							<?php
							echo wp_get_attachment_image(
								(int) $rbelad_separator_image['id'],
								'full',
								false,
								array(
									'alt'         => '',
									'aria-hidden' => 'true',
								)
							);
							?>
						</span>
					</div>
					<?php
				endif;
			endif;
			?>

			<?php
			/**
			 * -----------------------------------------------------------------
			 * Info.
			 * -----------------------------------------------------------------
			 */

			if ( ! empty( $rbelad_info ) ) :
				?>
				<div class="rbelad-icon-list__info">
					<?php echo esc_html( $rbelad_info ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>