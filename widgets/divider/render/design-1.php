<?php
/**
 * Divider widget design - 1.
 *
 * Renders separator as:
 * - Image.
 * - Icon.
 * - Text.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Icons_Manager;

/**
 * Widget settings.
 */
$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

/**
 * -------------------------------------------------------------------------
 * Separator type.
 * -------------------------------------------------------------------------
 *
 * Possible values:
 *
 * icon  = Elementor icon.
 * image = Image.
 * text  = Text.
 */

$rbelad_visual_type_id = $rbelad_prefix . '_icon_img_text';

$rbelad_visual_type = ! empty(
	$rbelad_settings[ $rbelad_visual_type_id ]
)
	? $rbelad_settings[ $rbelad_visual_type_id ]
	: 'icon';

/**
 * -------------------------------------------------------------------------
 * Separator icon.
 * -------------------------------------------------------------------------
 */

$rbelad_icon_id = $rbelad_prefix . '_icon_simple';

$rbelad_icon = ! empty(
	$rbelad_settings[ $rbelad_icon_id ]
)
	? $rbelad_settings[ $rbelad_icon_id ]
	: array();

/**
 * -------------------------------------------------------------------------
 * Separator image.
 * -------------------------------------------------------------------------
 */

$rbelad_image_id = $rbelad_prefix . '_img';

$rbelad_image = ! empty(
	$rbelad_settings[ $rbelad_image_id ]
)
	? $rbelad_settings[ $rbelad_image_id ]
	: array();

/**
 * -------------------------------------------------------------------------
 * Separator text.
 * -------------------------------------------------------------------------
 */

$rbelad_text_id = $rbelad_prefix . '_text';

$rbelad_text = ! empty(
	$rbelad_settings[ $rbelad_text_id ]
)
	? $rbelad_settings[ $rbelad_text_id ]
	: '';

/**
 * -------------------------------------------------------------------------
 * Render separator.
 * -------------------------------------------------------------------------
 */

?>

<div class="rbelad-divider__wrap">

	<span class="rbelad-divider__span rbelad-flex-1"></span>

	<span class="rbelad-divider__separator">

		<?php
		/**
		 * -------------------------------------------------------------
		 * Image.
		 * -------------------------------------------------------------
		 */

		if ( 'image' === $rbelad_visual_type ) {

			if (
				is_array( $rbelad_image )
				&& ! empty( $rbelad_image['id'] )
			) {
				echo '<span class="rbelad-divider__image">';

				echo wp_get_attachment_image(
					(int) $rbelad_image['id'],
					'full',
					false,
					array(
						'alt'         => '',
						'aria-hidden' => 'true',
					)
				);

				echo '</span>';
			}
		}

		/**
		 * -------------------------------------------------------------
		 * Icon.
		 * -------------------------------------------------------------
		 */

		if ( 'icon' === $rbelad_visual_type ) {

			if (
				is_array( $rbelad_icon )
				&& ! empty( $rbelad_icon['value'] )
			) {
				echo '<span class="rbelad-divider__icon">';

				Icons_Manager::render_icon(
					$rbelad_icon,
					array(
						'aria-hidden' => 'true',
					)
				);

				echo '</span>';
			}
		}

		/**
		 * -------------------------------------------------------------
		 * Text.
		 * -------------------------------------------------------------
		 */

		if ( 'text' === $rbelad_visual_type ) {

			if ( '' !== $rbelad_text ) {
				echo '<span class="rbelad-divider__text">';
				echo esc_html( $rbelad_text );
				echo '</span>';
			}
		}
		?>

	</span>

	<span class="rbelad-divider__span rbelad-flex-1"></span>

</div>