<?php
/**
 * Rating Star widget output.
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
$rbelad_rating = isset( $rbelad_settings[ $rbelad_prefix . '_rating_value' ] )
	? (float) $rbelad_settings[ $rbelad_prefix . '_rating_value' ]
	: 5;

$rbelad_rating = max( 0, min( 5, $rbelad_rating ) );

/*
 * Icon.
 */
$rbelad_icon = $rbelad_settings[ $rbelad_prefix . '_rating_icon' ] ?? array();

/*
 * Fallback icon.
 */
if ( empty( $rbelad_icon['value'] ) ) {
	$rbelad_icon = array(
		'value'   => 'eicon-star',
		'library' => 'eicons',
	);
}
?>

<div
	class="rbelad-rating"
	role="img"
	aria-label="<?php echo esc_attr( $rbelad_rating . ' out of 5 stars' ); ?>"
	data-rating="<?php echo esc_attr( $rbelad_rating ); ?>"
>

	<?php for ( $rbelad_star = 1; $rbelad_star <= 5; $rbelad_star++ ) : ?>

		<?php
		/*
		 * Determine star state.
		 */
		if ( $rbelad_rating >= $rbelad_star ) {
			$rbelad_star_class = 'rbelad-rating__item--full';
		} elseif ( $rbelad_rating >= ( $rbelad_star - 0.5 ) ) {
			$rbelad_star_class = 'rbelad-rating__item--half';
		} else {
			$rbelad_star_class = 'rbelad-rating__item--empty';
		}

		/*
		 * Render icon.
		 */
		$rbelad_icon_html = \Elementor\Icons_Manager::try_get_icon_html(
			$rbelad_icon,
			array(
				'aria-hidden' => 'true',
			)
		);
		?>

		<span
			class="rbelad-rating__item <?php echo esc_attr( $rbelad_star_class ); ?>"
			aria-hidden="true"
		>
			<?php echo wp_kses_post( $rbelad_icon_html ); ?>
		</span>

	<?php endfor; ?>

</div>