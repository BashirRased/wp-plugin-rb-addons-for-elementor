<?php
/**
 * Free Widget List.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

return array(
	'card' => array(
		'cat'       => 'rbelad_addons_general',
		'is_active' => true,
		'title'     => esc_html__( 'Card', 'rb-addons-for-elementor' ),
		'icon'      => 'eicon-heading',
	),
);
