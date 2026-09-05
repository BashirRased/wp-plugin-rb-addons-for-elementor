<?php
/**
 * Basic Gallery widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

$rbelad_gallery  = ! empty( $rbelad_settings[ $rbelad_prefix . '_gallery' ] ) ? $rbelad_settings[ $rbelad_prefix . '_gallery' ] : array();
$rbelad_caption  = $rbelad_settings[ $rbelad_prefix . '_img_caption' ] ?? 'none';
$rbelad_order_by = $rbelad_settings[ $rbelad_prefix . '_img_sortable' ] ?? 'default';

if ( empty( $rbelad_gallery ) ) {
	return;
}

// Random order.
if ( 'random' === $rbelad_order_by ) {
	shuffle( $rbelad_gallery );
}

$rbelad_gallery_key = $rbelad_prefix . '_gallery';

$rbelad_gallery = ! empty( $rbelad_settings[ $rbelad_gallery_key ] )
	? $rbelad_settings[ $rbelad_gallery_key ]
	: array();

if ( empty( $rbelad_gallery ) || ! is_array( $rbelad_gallery ) ) {
	return;
}
?>

<div class="rbelad-gallery__wrap">

	<?php foreach ( $rbelad_gallery as $rbelad_image ) : ?>

		<?php
		$rbelad_image_id = ! empty( $rbelad_image['id'] )
			? absint( $rbelad_image['id'] )
			: 0;

		if ( ! $rbelad_image_id ) {
			continue;
		}

		$rbelad_image_html = wp_get_attachment_image(
			$rbelad_image_id,
			! empty( $rbelad_settings['img_size_size'] )
				? $rbelad_settings['img_size_size']
				: 'thumbnail',
			false,
			array(
				'class' => 'rbelad-gallery__image',
			)
		);

		if ( ! $rbelad_image_html ) {
			continue;
		}
		?>

		<figure class="rbelad-gallery__item">

			<div class="rbelad-gallery__image">
				<?php echo wp_kses_post( $rbelad_image_html ); ?>
			</div>

			<?php
			$rbelad_caption = ! empty(
				$rbelad_settings[ $rbelad_prefix . '_img_caption' ]
			)
				? $rbelad_settings[ $rbelad_prefix . '_img_caption' ]
				: 'none';

			if ( 'attachment' === $rbelad_caption ) :
				$rbelad_image_caption = wp_get_attachment_caption( $rbelad_image_id );

				if ( $rbelad_image_caption ) :
					?>

					<figcaption class="rbelad-gallery__caption">
						<?php echo esc_html( $rbelad_image_caption ); ?>
					</figcaption>

					<?php
				endif;
			endif;
			?>

		</figure>

	<?php endforeach; ?>

</div>
