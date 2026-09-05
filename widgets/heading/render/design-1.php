<?php
/**
 * Heading widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

if ( empty( $rbelad_settings[ $rbelad_prefix . '_heading' ] ) ) {
	return;
}

$rbelad_control = $rbelad_prefix . '_heading';

$rbelad_tag = rbelad_escape_tags(
	$rbelad_settings[ $rbelad_prefix . '_html_tag' ] ?? 'h2',
	'h2'
);

$rbelad_heading = rbelad_kses_intermediate(
	$rbelad_settings[ $rbelad_control ]
);

/**
 * Enable Elementor inline editing.
 */
$this->add_inline_editing_attributes(
	$rbelad_control,
	'basic'
);

/**
 * Heading wrapper attributes.
 */
$this->add_render_attribute(
	$rbelad_control,
	'class',
	'rbelad-heading__wrap'
);

/**
 * -------------------------------------------------------------------------
 * Link Type.
 * -------------------------------------------------------------------------
 */
$rbelad_select_link_id = '_heading_link_type';

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

<<?php echo tag_escape( $rbelad_tag ); ?> <?php echo wp_kses_post( $this->get_render_attribute_string( $rbelad_control ) ); ?>>

	<?php if ( 'none' !== $rbelad_link_type ) : ?>
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
			<?php echo esc_attr( $rbelad_heading ); ?>
		</a>
	<?php else : ?>
		<?php echo esc_attr( $rbelad_heading ); ?>
	<?php endif; ?>

</<?php echo tag_escape( $rbelad_tag ); ?>>
