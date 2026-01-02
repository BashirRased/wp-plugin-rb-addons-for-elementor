<?php
/**
 * Rating Skill widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

$rating_item = '';
if ( '0' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
} elseif ( '1' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
} elseif ( '2' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
} elseif ( '3' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
} elseif ( '4' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star-o"></i>';
} elseif ( '5' === $settings['rbelad_rating_skill_general_content_rating'] ) {
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
	$rating_item .= '<i class="eicon-star"></i>';
}

// HTML Attr.
$this->add_render_attribute( 'rating_attr', 'class', 'rbelad-rating-skill' );
$rating_attr = $this->get_render_attribute_string( 'rating_attr' );

// Wrapper HTML.
$html = sprintf( '<div %1$s>%2$s</div>', $rating_attr, $rating_item );
echo wp_kses_post( $html );
