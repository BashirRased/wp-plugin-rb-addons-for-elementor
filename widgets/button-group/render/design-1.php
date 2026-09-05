<?php
/**
 * Button Group widget output.
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
 * Repeater items.
 */
$rbelad_items = ! empty( $rbelad_settings[ $rbelad_prefix . 'repeater' ] )
	? $rbelad_settings[ $rbelad_prefix . 'repeater' ]
	: array();

if ( empty( $rbelad_items ) || ! is_array( $rbelad_items ) ) {
	return;
}
?>

<div class="rbelad-button-group__wrap">

	<?php foreach ( $rbelad_items as $rbelad_index => $rbelad_item ) : ?>

		<?php
		/**
		 * Button text.
		 */
		$rbelad_text = ! empty(
			$rbelad_item[ $rbelad_prefix . '_btn_text' ]
		)
			? $rbelad_item[ $rbelad_prefix . '_btn_text' ]
			: '';

		/**
		 * Link type.
		 */
		$rbelad_link_type = ! empty(
			$rbelad_item[ $rbelad_prefix . 'link_type' ]
		)
			? $rbelad_item[ $rbelad_prefix . 'link_type' ]
			: 'none';

		/**
		 * Default URL.
		 */
		$rbelad_url = '#';

		/**
		 * Link attributes.
		 */
		$rbelad_link_attrs = array();

		/**
		 * Page Link.
		 */
		if ( 'page' === $rbelad_link_type ) {

			$rbelad_page_id = ! empty(
				$rbelad_item[ $rbelad_prefix . 'page_link' ]
			)
				? $rbelad_item[ $rbelad_prefix . 'page_link' ]
				: '';

			if ( ! empty( $rbelad_page_id ) ) {
				$rbelad_url = get_permalink( $rbelad_page_id );
			}
		}

		/**
		 * Custom Link.
		 */
		if ( 'custom' === $rbelad_link_type ) {

			$rbelad_custom_link = ! empty(
				$rbelad_item[ $rbelad_prefix . 'custom_link' ]
			)
				? $rbelad_item[ $rbelad_prefix . 'custom_link' ]
				: array();

			if ( is_array( $rbelad_custom_link ) ) {

				if ( ! empty( $rbelad_custom_link['url'] ) ) {
					$rbelad_url = $rbelad_custom_link['url'];
				}

				if ( ! empty( $rbelad_custom_link['is_external'] ) ) {
					$rbelad_link_attrs['target'] = '_blank';
					$rbelad_link_attrs['rel']    = 'noopener';
				}

				if ( ! empty( $rbelad_custom_link['nofollow'] ) ) {
					$rbelad_link_attrs['rel'] = 'nofollow';
				}
			}
		}

		/**
		 * Icon / image type.
		 */
		$rbelad_icon_img = ! empty(
			$rbelad_item[ $rbelad_prefix . '_btn_icon_img' ]
		)
			? $rbelad_item[ $rbelad_prefix . '_btn_icon_img' ]
			: 'icon';

		/**
		 * Icon position.
		 */
		$rbelad_icon_position = ! empty(
			$rbelad_item[ $rbelad_prefix . '_btn_icon_position' ]
		)
			? $rbelad_item[ $rbelad_prefix . '_btn_icon_position' ]
			: 'right';

		/**
		 * Icon.
		 */
		$rbelad_icon = ! empty(
			$rbelad_item[ $rbelad_prefix . '_btn_icon_simple' ]
		)
			? $rbelad_item[ $rbelad_prefix . '_btn_icon_simple' ]
			: array();

		/**
		 * Image.
		 */
		$rbelad_image = ! empty(
			$rbelad_item[ $rbelad_prefix . '_btn_img' ]
		)
			? $rbelad_item[ $rbelad_prefix . '_btn_img' ]
			: array();

		/**
		 * Button classes.
		 */
		$rbelad_button_classes = array(
			'rbelad-button-group__button',
			'rbelad-button-group__button-' . absint( $rbelad_index ),
			'rbelad-button-group__icon-' . sanitize_html_class( $rbelad_icon_position ),
		);

		/**
		 * Link attributes.
		 */
		$rbelad_attributes = '';

		foreach ( $rbelad_link_attrs as $rbelad_attr_name => $rbelad_attr_value ) {
			$rbelad_attributes .= sprintf(
				' %1$s="%2$s"',
				esc_attr( $rbelad_attr_name ),
				esc_attr( $rbelad_attr_value )
			);
		}
		?>
		<a
			class="<?php echo esc_attr( implode( ' ', $rbelad_button_classes ) ); ?>"
			href="<?php echo esc_url( $rbelad_url ); ?>"
			<?php foreach ( $rbelad_link_attrs as $rbelad_attr_name => $rbelad_attr_value ) : ?>
				<?php
				printf(
					' %1$s="%2$s"',
					esc_attr( $rbelad_attr_name ),
					esc_attr( $rbelad_attr_value )
				);
				?>
			<?php endforeach; ?>
		>

			<?php if ( 'left' === $rbelad_icon_position ) : ?>

				<?php if ( 'image' === $rbelad_icon_img && ! empty( $rbelad_image['url'] ) ) : ?>

					<span class="rbelad-button-group__icon rbelad-button-group__icon-image">
						<img
							src="<?php echo esc_url( $rbelad_image['url'] ); ?>"
							alt="<?php echo esc_attr( $rbelad_image['alt'] ?? $rbelad_text ); ?>"
						>
					</span>

				<?php elseif ( 'icon' === $rbelad_icon_img && ! empty( $rbelad_icon['value'] ) ) : ?>

					<span class="rbelad-button-group__icon">
						<?php Icons_Manager::render_icon( $rbelad_icon, array( 'aria-hidden' => 'true' ) ); ?>
					</span>

				<?php endif; ?>

			<?php endif; ?>


			<?php if ( ! empty( $rbelad_text ) ) : ?>

				<span class="rbelad-button-group__text">
					<?php echo esc_html( $rbelad_text ); ?>
				</span>

			<?php endif; ?>


			<?php if ( 'right' === $rbelad_icon_position ) : ?>

				<?php if ( 'image' === $rbelad_icon_img && ! empty( $rbelad_image['url'] ) ) : ?>

					<span class="rbelad-button-group__icon rbelad-button-group__icon-image">
						<img
							src="<?php echo esc_url( $rbelad_image['url'] ); ?>"
							alt="<?php echo esc_attr( $rbelad_image['alt'] ?? $rbelad_text ); ?>"
						>
					</span>

				<?php elseif ( 'icon' === $rbelad_icon_img && ! empty( $rbelad_icon['value'] ) ) : ?>

					<span class="rbelad-button-group__icon">
						<?php Icons_Manager::render_icon( $rbelad_icon, array( 'aria-hidden' => 'true' ) ); ?>
					</span>

				<?php endif; ?>

			<?php endif; ?>

		</a>

	<?php endforeach; ?>

</div>
