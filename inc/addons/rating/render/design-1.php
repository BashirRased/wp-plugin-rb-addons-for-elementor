<?php
/**
 * Rating Star widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$rating_item = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
if ( '0' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
} elseif ( '1' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
} elseif ( '2' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
} elseif ( '3' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
} elseif ( '4' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star-o"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
} elseif ( '5' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$rating_item .= '<i class="eicon-star"></i>'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
}

// HTML Attr.
$this->add_render_attribute( 'rating_attr', 'class', 'rbelad-rating-star-widget rbelad-d-flex' );
$rating_attr = $this->get_render_attribute_string( 'rating_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Wrapper HTML.
$html = sprintf( '<div %1$s>%2$s</div>', $rating_attr, $rating_item ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
echo wp_kses_post( $html );
