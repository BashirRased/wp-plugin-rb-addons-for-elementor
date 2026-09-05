<?php
/**
 * Button widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Widget settings.
 */
$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

/**
 * -------------------------------------------------------------------------
 * Button text.
 * -------------------------------------------------------------------------
 */

$rbelad_text_id = $rbelad_prefix . '_btn_text';

$rbelad_text = ! empty( $rbelad_settings[ $rbelad_text_id ] )
	? $rbelad_settings[ $rbelad_text_id ]
	: '';

/**
 * Enable Elementor inline editing.
 */
$this->add_inline_editing_attributes(
	$rbelad_text,
	'none'
);

/**
 * -------------------------------------------------------------------------
 * Link Type.
 * -------------------------------------------------------------------------
 */
$rbelad_select_link_id = '_btn_select_link_type';

$rbelad_link = $this->render_select_link(
	$rbelad_settings,
	$rbelad_select_link_id
);

$rbelad_link_type         = $rbelad_link['type'];
$rbelad_url               = $rbelad_link['url'];
$rbelad_target            = $rbelad_link['target'];
$rbelad_rel               = $rbelad_link['rel'];
$rbelad_custom_attributes = $rbelad_link['custom_attributes'];

/**
 * -------------------------------------------------------------------------
 * Icon / image position.
 * -------------------------------------------------------------------------
 */

$rbelad_icon_position_id = $rbelad_prefix . '_btn_icon_position';

$rbelad_icon_position = ! empty(
	$rbelad_settings[ $rbelad_icon_position_id ]
)
	? $rbelad_settings[ $rbelad_icon_position_id ]
	: 'right';

/**
 * -------------------------------------------------------------------------
 * Button classes.
 * -------------------------------------------------------------------------
 */

$rbelad_button_classes = array(
	'rbelad-button__link',
);

if ( 'left' === $rbelad_icon_position ) {
	$rbelad_button_classes[] = 'rbelad-button--icon-left';
} else {
	$rbelad_button_classes[] = 'rbelad-button--icon-right';
}
?>

<div class="rbelad-button__wrap">
	<?php if ( 'none' !== $rbelad_link_type ) : ?>
		<a
			class="<?php echo esc_attr( implode( ' ', $rbelad_button_classes ) ); ?>"
			href="<?php echo esc_url( $rbelad_url ); ?>"
			<?php
			if ( ! empty( $rbelad_target ) ) {
				printf(
					' target="%s"',
					esc_attr( $rbelad_target )
				);
			}
			if ( ! empty( $rbelad_rel ) ) {
				printf(
					' rel="%s"',
					esc_attr( $rbelad_rel )
				);
			}
			/**
			 * -------------------------------------------------------------
			 * Custom attributes.
			 *
			 * Format:
			 * key|value,key2|value2
			 * -------------------------------------------------------------
			 */
			if ( ! empty( $rbelad_custom_attributes ) ) {

				$rbelad_attributes = explode(
					',',
					$rbelad_custom_attributes
				);

				foreach ( $rbelad_attributes as $rbelad_attribute ) {
					$rbelad_attribute = trim( $rbelad_attribute );
					if ( empty( $rbelad_attribute ) ) {
						continue;
					}
					$rbelad_attribute_parts = explode(
						'|',
						$rbelad_attribute,
						2
					);
					if ( 2 !== count( $rbelad_attribute_parts ) ) {
						continue;
					}
					$rbelad_attribute_name  = trim(
						$rbelad_attribute_parts[0]
					);
					$rbelad_attribute_value = trim(
						$rbelad_attribute_parts[1]
					);
					if ( empty( $rbelad_attribute_name ) ) {
						continue;
					}
					printf(
						' %1$s="%2$s"',
						esc_attr( $rbelad_attribute_name ),
						esc_attr( $rbelad_attribute_value )
					);
				}
			}
			?>
		>
	<?php else : ?>
		<span class="<?php echo esc_attr( implode( ' ', $rbelad_button_classes ) ); ?>">
	<?php endif; ?>
		<?php
		/**
		 * -----------------------------------------------------------------
		 * Left visual.
		 * -----------------------------------------------------------------
		 */
		if ( 'left' === $rbelad_icon_position ) {
			$this->render_icon_img(
				$rbelad_settings,
				'_btn_icon_img',
				'_btn_icon_simple',
				'_btn_img',
				array(
					'icon'  => 'rbelad-button__icon',
					'image' => 'rbelad-button__image',
				)
			);
		}
		?>
		<span class="rbelad-button__text">
			<?php echo esc_html( $rbelad_text ); ?>
		</span>
		<?php
		/**
		 * -----------------------------------------------------------------
		 * Right visual.
		 * -----------------------------------------------------------------
		 */
		if ( 'right' === $rbelad_icon_position ) {
			$this->render_icon_img(
				$rbelad_settings,
				'_btn_icon_img',
				'_btn_icon_simple',
				'_btn_img',
				array(
					'icon'  => 'rbelad-button__icon',
					'image' => 'rbelad-button__image',
				)
			);
		}
		?>
	<?php if ( 'none' !== $rbelad_link_type ) : ?>
		</a>
	<?php else : ?>
		</span>
	<?php endif; ?>
</div>
