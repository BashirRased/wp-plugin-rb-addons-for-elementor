<?php
/**
 * Testimonial widget render.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Group_Control_Image_Size;

/**
 * Widget settings.
 */
$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

/**
 * -------------------------------------------------------------------------
 * Testimonial content.
 * -------------------------------------------------------------------------
 */

$rbelad_desc_id        = $rbelad_prefix . '_testimonial_content';
$rbelad_author_id      = $rbelad_prefix . '_testimonial_name';
$rbelad_designation_id = $rbelad_prefix . '_testimonial_job';

$rbelad_desc = ! empty( $rbelad_settings[ $rbelad_desc_id ] )
	? $rbelad_settings[ $rbelad_desc_id ]
	: '';

$rbelad_author = ! empty( $rbelad_settings[ $rbelad_author_id ] )
	? $rbelad_settings[ $rbelad_author_id ]
	: '';

$rbelad_designation = ! empty( $rbelad_settings[ $rbelad_designation_id ] )
	? $rbelad_settings[ $rbelad_designation_id ]
	: '';

$rbelad_tag = rbelad_escape_tags(
	$rbelad_settings[ $rbelad_prefix . '_html_tag' ] ?? 'h2',
	'h2'
);

/**
 * -------------------------------------------------------------------------
 * Link Type.
 * -------------------------------------------------------------------------
 */
$rbelad_select_link_id = '_testimonial_select_link_type';

$rbelad_link = $this->render_select_link(
	$rbelad_settings,
	$rbelad_select_link_id
);

$rbelad_link_type         = $rbelad_link['type'];
$rbelad_url               = $rbelad_link['url'];
$rbelad_target            = $rbelad_link['target'];
$rbelad_rel               = $rbelad_link['rel'];
$rbelad_custom_attributes = $rbelad_link['custom_attributes'];

// Image HTML.
$rbelad_image      = $rbelad_prefix . '_testimonial_reviewer_img';
$rbelad_image_html = wp_kses_post(
	Group_Control_Image_Size::get_attachment_image_html(
		$rbelad_settings,
		$rbelad_prefix . '_testimonial_reviewer_img_size',
		$rbelad_image
	)
);
?>

<div class="rbelad-testimonial__wrap">
	<header class="rbelad-testimonial__header">
		<?php
		$this->render_rating(
			$rbelad_settings,
			'_testimonial_rating',
			array(
				'wrap'  => 'rbelad-testimonial__ratings',
				'full'  => 'rbelad-testimonial__rating rbelad-testimonial__rating--full',
				'half'  => 'rbelad-testimonial__rating rbelad-testimonial__rating--half',
				'empty' => 'rbelad-testimonial__rating rbelad-testimonial__rating--empty',
			)
		);
		?>
	</header>

	<main class="rbelad-testimonial__main">
		<?php if ( $rbelad_desc ) : ?>
			<p class="rbelad-testimonial__desc">
				<?php echo esc_html( $rbelad_desc ); ?>
			</p>
		<?php endif; ?>
	</main>	

	<footer class="rbelad-testimonial__footer">		
		<?php if ( $rbelad_image_html ) : ?>
			<div class="rbelad-testimonial__reviewer-img">
				<?php echo wp_kses_post( $rbelad_image_html ); ?>
			</div>
		<?php endif; ?>		
		<div class="rbelad-testimonial__info">
			<?php if ( $rbelad_author ) : ?>
				<<?php echo tag_escape( $rbelad_tag ); ?> class="rbelad-testimonial__reviewer-name">
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
							<?php echo esc_html( $rbelad_author ); ?>
						</a>
					<?php else : ?>
						<?php echo esc_html( $rbelad_author ); ?>
					<?php endif; ?>
				</<?php echo tag_escape( $rbelad_tag ); ?>>
			<?php endif; ?>
			<?php if ( $rbelad_designation ) : ?>
				<span class="rbelad-testimonial__author_designation">
					<?php echo esc_html( $rbelad_designation ); ?>
				</span>
			<?php endif; ?>
		</div>
	</footer>

	<div class="rbelad-testimonial__absolute">
		<div class="rbelad-testimonial__quote">			
			<?php
			$this->render_icon_img(
				$rbelad_settings,
				'_testimonial_quote_icon_img',
				'_testimonial_quote_icon',
				'_testimonial_quote_img',
				array(
					'icon'  => 'rbelad-testimonial-quote__icon',
					'image' => 'rbelad-testimonial-quote__image',
				)
			);
			?>
		</div>
	</div>
</div>