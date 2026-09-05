<?php
/**
 * Image widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Group_Control_Image_Size;

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

// Settings.
$rbelad_image      = $rbelad_settings[ $rbelad_prefix . '_img' ] ?? array();
$rbelad_image_size = $rbelad_settings[ $rbelad_prefix . '_img_size' ] ?? 'full';
$rbelad_caption    = $rbelad_settings[ $rbelad_prefix . '_img_caption' ] ?? 'none';

/**
 * Enable Elementor inline editing.
 */
$this->add_inline_editing_attributes(
	$rbelad_caption,
	'none'
);

/**
 * -------------------------------------------------------------------------
 * Link Type.
 * -------------------------------------------------------------------------
 */
$rbelad_select_link_id = '_select_img_type';

$rbelad_link = $this->render_select_link(
	$rbelad_settings,
	$rbelad_select_link_id
);

$rbelad_link_type         = $rbelad_link['type'];
$rbelad_url               = $rbelad_link['url'];
$rbelad_target            = $rbelad_link['target'];
$rbelad_rel               = $rbelad_link['rel'];
$rbelad_custom_attributes = $rbelad_link['custom_attributes'];
?>

<div class="rbelad-image__wrap">
		<?php
		// Get caption HTML.
		$rbelad_caption_html = '';

		if ( 'attachment' === $rbelad_caption && ! empty( $rbelad_image['id'] ) ) {
			$rbelad_caption_text = wp_get_attachment_caption( $rbelad_image['id'] );
		} elseif ( 'custom' === $rbelad_caption ) {
			$rbelad_caption_text = $rbelad_settings[ $rbelad_prefix . '_caption_text' ] ?? '';
		}

		if ( ! empty( $rbelad_caption_text ) ) {
			$rbelad_caption_html = sprintf(
				'<div class="rbelad-image__caption">%s</div>',
				esc_html( $rbelad_caption_text )
			);
		}

		// Image HTML.
		$rbelad_image_html = wp_kses_post(
			Group_Control_Image_Size::get_attachment_image_html(
				$rbelad_settings,
				$rbelad_prefix . '_img_size',
				$rbelad_prefix . '_img'
			)
		);

		if ( 'none' !== $rbelad_link_type ) :
			?>
		<a
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
			<?php
			echo wp_kses_post( $rbelad_image_html );
			echo wp_kses_post( $rbelad_caption_html );
			?>
		</a>
			<?php
	else :
		echo wp_kses_post( $rbelad_image_html );
		echo wp_kses_post( $rbelad_caption_html );
	endif;
	?>
</div>
