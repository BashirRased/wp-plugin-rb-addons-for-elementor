<?php
/**
 * Divider widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

$html = '';
$this->add_render_attribute( 'divider_attr', 'class', 'rbelad-divider-container' );
$divider_attr = $this->get_render_attribute_string( 'divider_attr' );
$this->add_render_attribute( 'hr_attr', 'class', 'rbelad-divider' );
$hr_attr = $this->get_render_attribute_string( 'hr_attr' );
$html    = sprintf( '<div %1$s><hr %2$s></hr></div>', $divider_attr, $hr_attr );
echo wp_kses_post( $html );
