<?php
/**
 * Button widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

// Button Text.
$rbelad_text = ! empty( $rbelad_settings[ $rbelad_prefix . '_btn_text' ] )
	? $rbelad_settings[ $rbelad_prefix . '_btn_text' ]
	: '';

// Link Controls.
$rbelad_link_base = $rbelad_prefix . '_btn_select_link_type';

$rbelad_link_type = ! empty( $rbelad_settings[ $rbelad_link_base . '_select_option' ] )
	? $rbelad_settings[ $rbelad_link_base . '_select_option' ]
	: 'none';

// Default values.
$rbelad_url    = '#';
$rbelad_target = '';
$rbelad_rel    = '';

switch ( $rbelad_link_type ) {

	case 'page_link':
		if ( ! empty( $rbelad_settings[ $rbelad_link_base . '_page_link' ] ) ) {
			$rbelad_url = get_permalink( (int) $rbelad_settings[ $rbelad_link_base . '_page_link' ] );
		}
		break;

	case 'post_link':
		if ( ! empty( $rbelad_settings[ $rbelad_link_base . '_post_link' ] ) ) {
			$rbelad_url = get_permalink( (int) $rbelad_settings[ $rbelad_link_base . '_post_link' ] );
		}
		break;

	case 'custom_link':
		$rbelad_custom_link = ! empty( $rbelad_settings[ $rbelad_link_base . '_custom_link' ] )
			? $rbelad_settings[ $rbelad_link_base . '_custom_link' ]
			: array();

		if ( ! empty( $rbelad_custom_link['url'] ) ) {
			$rbelad_url = $rbelad_custom_link['url'];
		}

		if ( ! empty( $rbelad_custom_link['is_external'] ) ) {
			$rbelad_target = ' target="_blank"';
		}

		$rbelad_rel = array();

		if ( ! empty( $rbelad_custom_link['nofollow'] ) ) {
			$rbelad_rel[] = 'nofollow';
		}

		if ( ! empty( $rbelad_custom_link['is_external'] ) ) {
			$rbelad_rel[] = 'noopener';
		}

		$rbelad_rel = ! empty( $rbelad_rel )
			? ' rel="' . esc_attr( implode( ' ', $rbelad_rel ) ) . '"'
			: '';

		break;
}

?>
<div class="rbelad-button__wrap">
	<a class="rbelad-button__link rbelad-dl-block"
		href="<?php echo esc_url( $rbelad_url ); ?>"
		<?php echo wp_kses_post( $rbelad_target ); ?>
		<?php echo wp_kses_post( $rbelad_rel ); ?>>
		<?php echo esc_html( $rbelad_text ); ?>
	</a>
</div>
