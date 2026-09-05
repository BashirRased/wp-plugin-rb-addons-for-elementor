<?php
/**
 * Icon widget output.
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
 * -------------------------------------------------------------------------
 * Icon.
 * -------------------------------------------------------------------------
 */

$rbelad_icon_id = $rbelad_prefix . '_icon_simple';

$rbelad_icon = ! empty( $rbelad_settings[ $rbelad_icon_id ] )
	? $rbelad_settings[ $rbelad_icon_id ]
	: array();

$rbelad_icon_classes = array(
	'rbelad-icon__link',
);

/**
 * -------------------------------------------------------------------------
 * Link Type.
 * -------------------------------------------------------------------------
 */
$rbelad_select_link_id = '_select_link_type';

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

<div class="rbelad-icon__wrap">
	<?php if ( 'none' !== $rbelad_link_type && ! empty( $rbelad_icon['value'] ) ) : ?>
		<a
			class="<?php echo esc_attr( implode( ' ', $rbelad_icon_classes ) ); ?>"
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
			<span class="rbelad-icon__icon">
				<?php
				Icons_Manager::render_icon(
					$rbelad_icon,
					array(
						'aria-hidden' => 'true',
					)
				);
				?>
			</span>
		</a>
	<?php else : ?>
		<span class="rbelad-icon__icon">
			<?php
			Icons_Manager::render_icon(
				$rbelad_icon,
				array(
					'aria-hidden' => 'true',
				)
			);
			?>
		</span>
	<?php endif; ?>
</div>
