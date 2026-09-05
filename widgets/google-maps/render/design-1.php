<?php
/**
 * Google Maps widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$rbelad_settings = $this->get_settings_for_display();

if ( empty( $rbelad_settings['address'] ) ) {
	return;
}

$rbelad_address = rawurlencode( $rbelad_settings['address'] );
$rbelad_zoom    = ! empty( $rbelad_settings['zoom'] ) ? absint( $rbelad_settings['zoom'] ) : 10;
$rbelad_height  = ! empty( $rbelad_settings['height'] ) ? absint( $rbelad_settings['height'] ) : 300;

$rbelad_map_url = "https://www.google.com/maps?q={$rbelad_address}&output=embed&z={$rbelad_zoom}";
?>

<div
	class="rbelad-google-map"
	style="width:100%;height:<?php echo esc_attr( $rbelad_height ); ?>px;"
>
	<iframe
		width="100%"
		height="100%"
		style="border:0;"
		loading="lazy"
		allowfullscreen
		referrerpolicy="no-referrer-when-downgrade"
		src="<?php echo esc_url( $rbelad_map_url ); ?>"
	></iframe>
</div>
