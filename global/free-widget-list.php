<?php
/**
 * Free Widget List.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$rbelad_basic_widgets = array_fill_keys(
	array(
		'heading',
		'image',
		'basic-gallery',
		'video',
		'button',
		'button-group',
		'divider',
		'google-maps',
		'icon',
		'icon-list',
		'rating',
	),
	array(
		'cat'       => 'rbelad_addons_basic',
		'is_active' => true,
	)
);

$rbelad_general_widgets = array_fill_keys(
	array(
		'card',
		'testimonial',
	),
	array(
		'cat'       => 'rbelad_addons_general',
		'is_active' => true,
	)
);

return array_merge(
	$rbelad_basic_widgets,
	$rbelad_general_widgets,
);
