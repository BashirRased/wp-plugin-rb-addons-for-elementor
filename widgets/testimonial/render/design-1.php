<?php
/**
 * Testimonial widget render.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

/*
 * Rating.
 */
$rbelad_rating_map = array(
	'zero-star'       => 0,
	'one-star'        => 1,
	'one-half-star'   => 1.5,
	'two-star'        => 2,
	'two-half-star'   => 2.5,
	'three-star'      => 3,
	'three-half-star' => 3.5,
	'four-star'       => 4,
	'four-half-star'  => 4.5,
	'five-star'       => 5,
);

$rbelad_rating_key = $rbelad_settings[ $rbelad_prefix . '_rating' ] ?? 'five-star';
$rbelad_rating     = $rbelad_rating_map[ $rbelad_rating_key ] ?? 5;

/*
 * Content.
 */
$rbelad_content = $rbelad_settings[ $rbelad_prefix . '_testimonial_content' ] ?? '';
$rbelad_image   = $rbelad_settings[ $rbelad_prefix . '_testimonial_image' ] ?? array();
$rbelad_name    = $rbelad_settings[ $rbelad_prefix . '_testimonial_name' ] ?? '';
$rbelad_job     = $rbelad_settings[ $rbelad_prefix . '_testimonial_job' ] ?? '';
$rbelad_link    = $rbelad_settings[ $rbelad_prefix . '_testimonial_link' ] ?? array();

/**
 * Enable Elementor inline editing.
 */
$this->add_inline_editing_attributes( $rbelad_content, 'none' );
$this->add_inline_editing_attributes( $rbelad_name, 'none' );
$this->add_inline_editing_attributes( $rbelad_job, 'none' );
$this->add_inline_editing_attributes( $rbelad_content, 'none' );

/*
 * Image.
 */
$rbelad_image_html = '';

if ( ! empty( $rbelad_image['id'] ) ) {
	$rbelad_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html(
		$rbelad_settings,
		$rbelad_prefix . '_img_size',
		$rbelad_image['id']
	);
}

/*
 * Link.
 */
$rbelad_link_url = ! empty( $rbelad_link['url'] )
	? $rbelad_link['url']
	: '';

$rbelad_link_attributes = '';

if ( $rbelad_link_url ) {
	$rbelad_link_attributes .= ' href="' . esc_url( $rbelad_link_url ) . '"';

	if ( ! empty( $rbelad_link['is_external'] ) ) {
		$rbelad_link_attributes .= ' target="_blank"';
	}

	if ( ! empty( $rbelad_link['nofollow'] ) ) {
		$rbelad_link_attributes .= ' rel="nofollow"';
	}
}

/*
 * Rating stars.
 */
$rbelad_rating_html = '';

for ( $rbelad_star = 1; $rbelad_star <= 5; $rbelad_star++ ) {

	if ( $rbelad_rating >= $rbelad_star ) {
		$rbelad_icon = 'icon-star';
	} elseif ( $rbelad_rating >= $rbelad_star - 0.5 ) {
		$rbelad_icon = 'icon-star-half';
	} else {
		$rbelad_icon = 'icon-star-empty';
	}

	$rbelad_rating_html .= sprintf(
		'<span class="rbelad-testimonial__rating-star %1$s" aria-hidden="true"></span>',
		esc_attr( $rbelad_icon )
	);
}
?>

<div class="rbelad-testimonial__wrap">

	<?php if ( $rbelad_rating > 0 ) : ?>
		<div
			class="rbelad-testimonial__ratting"
			role="img"
			aria-label="<?php echo esc_attr( $rbelad_rating . ' out of 5 stars' ); ?>"
		>
			<?php echo wp_kses_post( $rbelad_rating_html ); ?>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $rbelad_content ) ) : ?>
		<div class="rbelad-testimonial__text">
			<?php echo wp_kses_post( $rbelad_content ); ?>
		</div>
	<?php endif; ?>

	<div class="rbelad-testimonial__reviewer-content">

		<?php if ( ! empty( $rbelad_image_html ) ) : ?>
			<div class="rbelad-testimonial__reviewer-img">
				<?php echo wp_kses_post( $rbelad_image_html ); ?>
			</div>
		<?php endif; ?>

		<div class="rbelad-testimonial__reviewer-info">

			<?php if ( ! empty( $rbelad_name ) ) : ?>
				<h3 class="rbelad-testimonial__name">

					<?php if ( $rbelad_link_url ) : ?>
						<a
							class="rbelad-testimonial__reviewer-link"
							<?php echo $rbelad_link_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						>
							<?php echo esc_html( $rbelad_name ); ?>
						</a>
					<?php else : ?>
						<?php echo esc_html( $rbelad_name ); ?>
					<?php endif; ?>

				</h3>
			<?php endif; ?>

			<?php if ( ! empty( $rbelad_job ) ) : ?>
				<p class="rbelad-testimonial__designation">
					<?php echo esc_html( $rbelad_job ); ?>
				</p>
			<?php endif; ?>

		</div>
	</div>

	<div class="rbelad-testimonial__quote" aria-hidden="true">
		<span class="icon-quote"></span>
	</div>

</div>