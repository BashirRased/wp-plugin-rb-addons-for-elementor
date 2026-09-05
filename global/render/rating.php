<?php
/**
 * Rating Render.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Icons_Manager;

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

$rbelad_rating_id = ! empty( $rbelad_rating_id )
? $rbelad_rating_id
: '';

$rbelad_rating_wrap_class = ! empty( $rbelad_classes['wrap'] )
? $rbelad_classes['wrap']
: '';

$rbelad_rating_full_class = ! empty( $rbelad_classes['full'] )
? $rbelad_classes['full']
: '';

$rbelad_rating_half_class = ! empty( $rbelad_classes['half'] )
? $rbelad_classes['half']
: '';

$rbelad_rating_empty_class = ! empty( $rbelad_classes['empty'] )
? $rbelad_classes['empty']
: '';

$rbelad_rating_base = $rbelad_prefix . $rbelad_rating_id;

$rbelad_rating = isset( $rbelad_settings[ $rbelad_rating_base . '_rating_value' ] )
? (float) $rbelad_settings[ $rbelad_rating_base . '_rating_value' ]
: 5;

$rbelad_empty_icon = ! empty(
	$rbelad_settings[ $rbelad_rating_base . '_empty_icon' ]
)
? $rbelad_settings[ $rbelad_rating_base . '_empty_icon' ]
: array();

$rbelad_fill_icon = ! empty(
	$rbelad_settings[ $rbelad_rating_base . '_fill_icon' ]
)
? $rbelad_settings[ $rbelad_rating_base . '_fill_icon' ]
: array();

$rbelad_half_icon = ! empty(
	$rbelad_settings[ $rbelad_rating_base . '_half_icon' ]
)
? $rbelad_settings[ $rbelad_rating_base . '_half_icon' ]
: array();

$rbelad_max_rating = 5;

if ( $rbelad_rating > 0 ) :
	?>
	<div
		class="<?php echo esc_attr( $rbelad_rating_wrap_class ); ?>"
		aria-label="<?php echo esc_attr( $rbelad_rating . ' out of ' . $rbelad_max_rating ); ?>"
	>
		<?php for ( $rbelad_i = 1; $rbelad_i <= $rbelad_max_rating; $rbelad_i++ ) : ?>
			<?php if ( $rbelad_rating >= $rbelad_i ) : ?>
				<span class="<?php echo esc_attr( $rbelad_rating_full_class ); ?>">
					<?php
					if ( ! empty( $rbelad_fill_icon['value'] ) ) {
						Icons_Manager::render_icon(
							$rbelad_fill_icon,
							array(
								'aria-hidden' => 'true',
							)
						);
					}
					?>
				</span>
			<?php elseif ( $rbelad_rating >= ( $rbelad_i - 0.5 ) ) : ?>
				<span class="<?php echo esc_attr( $rbelad_rating_half_class ); ?>">
					<?php
					if ( ! empty( $rbelad_half_icon['value'] ) ) {
						Icons_Manager::render_icon(
							$rbelad_half_icon,
							array(
								'aria-hidden' => 'true',
							)
						);
					}
					?>
				</span>
			<?php else : ?>
				<span class="<?php echo esc_attr( $rbelad_rating_empty_class ); ?>">
					<?php
					if ( ! empty( $rbelad_empty_icon['value'] ) ) {
						Icons_Manager::render_icon(
							$rbelad_empty_icon,
							array(
								'aria-hidden' => 'true',
							)
						);
					}
					?>
				</span>
			<?php endif; ?>
		<?php endfor; ?>
	</div>
	<?php
endif;
