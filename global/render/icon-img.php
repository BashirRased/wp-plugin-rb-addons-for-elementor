<?php
/**
 * Icon/Image Render.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Icons_Manager;

/**
 * Use custom prefix when provided.
 *
 * @param string $rbelad_prefix Section content prefix.
 */

$rbelad_prefix = ! empty( $rbelad_prefix )
	? $rbelad_prefix
	: $this->get_section_content_prefix( 'general' );

$rbelad_type_id = ! empty( $rbelad_type_id ) ? $rbelad_type_id : '';
$rbelad_img_id  = ! empty( $rbelad_img_id ) ? $rbelad_img_id : '';
$rbelad_icon_id = ! empty( $rbelad_icon_id ) ? $rbelad_icon_id : '';

/**
 * -------------------------------------------------------------------------
 * Visual classes.
 * -------------------------------------------------------------------------
 */

$rbelad_type_icon_class = ! empty( $rbelad_classes['icon'] )
	? $rbelad_classes['icon']
	: '';

$rbelad_type_img_class = ! empty( $rbelad_classes['image'] )
	? $rbelad_classes['image']
	: '';

/**
 * -------------------------------------------------------------------------
 * Visual type.
 * -------------------------------------------------------------------------
 *
 * Possible values:
 *
 * icon  = Elementor icon.
 * image = Image.
 */

$rbelad_visual_type_id = $rbelad_prefix . $rbelad_type_id;

$rbelad_visual_type = ! empty(
	$rbelad_settings[ $rbelad_visual_type_id ]
)
	? $rbelad_settings[ $rbelad_visual_type_id ]
	: 'icon';

/**
 * -------------------------------------------------------------------------
 * Icon.
 * -------------------------------------------------------------------------
 */

$rbelad_icon_id = $rbelad_prefix . $rbelad_icon_id;

$rbelad_icon = ! empty(
	$rbelad_settings[ $rbelad_icon_id ]
)
	? $rbelad_settings[ $rbelad_icon_id ]
	: array();

/**
 * -------------------------------------------------------------------------
 * Image.
 * -------------------------------------------------------------------------
 */

$rbelad_image_id = $rbelad_prefix . $rbelad_img_id;

$rbelad_image = ! empty(
	$rbelad_settings[ $rbelad_image_id ]
)
	? $rbelad_settings[ $rbelad_image_id ]
	: array();

/**
 * -------------------------------------------------------------------------
 * Render visual.
 * -------------------------------------------------------------------------
 */

if ( 'icon' === $rbelad_visual_type ) {

	if (
		is_array( $rbelad_icon )
		&& ! empty( $rbelad_icon['value'] )
	) {
		?>
		<span class="<?php echo esc_attr( $rbelad_type_icon_class ); ?> rbelad-dl-block">
			<?php
			Icons_Manager::render_icon(
				$rbelad_icon,
				array(
					'aria-hidden' => 'true',
				)
			);
			?>
		</span>
		<?php
	}
}

if ( 'image' === $rbelad_visual_type ) {

	if (
		is_array( $rbelad_image )
		&& ! empty( $rbelad_image['id'] )
	) {
		?>
		<span class="<?php echo esc_attr( $rbelad_type_img_class ); ?>">
			<?php
			echo wp_get_attachment_image(
				(int) $rbelad_image['id'],
				'full',
				false,
				array(
					'alt'         => '',
					'aria-hidden' => 'true',
				)
			);
			?>
		</span>
		<?php
	}
}
