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

$rbelad_creative_widgets = array_fill_keys(
	array(
		'card',
		'testimonial',
	),
	array(
		'cat'       => 'rbelad_addons_general',
		'is_active' => true,
	)
);

$rbelad_site_widgets = array_fill_keys(
	array(
		'site-logo',
		'site-title',
		'post-title',
		'post-thumbnail',
		'post-meta',
		'post-excerpt',
		'post-navigation',
		'post-content',
		'post-comments',
		'archive-title',
		'archive-posts',
		'author-box',
		'author-list',
		'navigation-menu',
		'loop-grid',
		'breadcrumbs',
	),
	array(
		'cat' => 'rbelad_addons_site',
	)
);

$rbelad_pro_site = array_fill_keys(
	array(
		'accordion',
	),
	array(
		'cat' => 'rbelad_pro_slider',
	)
);

return array_merge(
	$rbelad_basic_widgets,
	$rbelad_creative_widgets,
	$rbelad_site_widgets,
	$rbelad_pro_site
);
