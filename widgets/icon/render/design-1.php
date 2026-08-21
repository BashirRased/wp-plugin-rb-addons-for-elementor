<?php
/**
 * Icon widget render.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

/*
 * Icon.
 */
$rbelad_icon = $rbelad_settings[ $rbelad_prefix . '_icon' ] ?? array();

/*
 * Icon view and shape.
 */
$rbelad_icon_view  = $rbelad_settings[ $rbelad_prefix . '_icon_view' ] ?? 'default';
$rbelad_icon_shape = $rbelad_settings[ $rbelad_prefix . '_icon_shape' ] ?? 'circle';

/*
 * Icon classes.
 */
$rbelad_classes = array(
	'rbelad-icon__wrap',
	'rbelad-icon--' . sanitize_html_class( $rbelad_icon_view ),
);

if ( 'default' !== $rbelad_icon_view ) {
	$rbelad_classes[] = 'rbelad-icon--' . sanitize_html_class( $rbelad_icon_shape );
}

/*
 * Render icon.
 */
$rbelad_icon_html = '';

if ( ! empty( $rbelad_icon['value'] ) ) {
	$rbelad_icon_html = \Elementor\Icons_Manager::try_get_icon_html(
		$rbelad_icon,
		array(
			'aria-hidden' => 'true',
		)
	);
}

if ( empty( $rbelad_icon_html ) ) {
	return;
}
?>

<div class="<?php echo esc_attr( implode( ' ', $rbelad_classes ) ); ?>">
	<?php echo wp_kses_post( $rbelad_icon_html ); ?>
</div>