<?php
/**
 * All options for widget content
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly..
}

/**
 * Load All Post
 */
if ( ! function_exists( 'rbelad_get_all_posts' ) ) {
	/**
	 * Get a list of all posts.
	 *
	 * Retrieves all WordPress posts and returns an array where the keys are
	 * post IDs and the values are the post titles.
	 *
	 * @return array List of posts with ID as key and title as value.
	 */
	function rbelad_get_all_posts() {
		$post_list = get_posts(
			array(
				'post_type'      => 'post',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => -1,
			)
		);

		$posts = array();
		if ( ! empty( $post_list ) && ! is_wp_error( $post_list ) ) {
			foreach ( $post_list as $post ) {
				$posts[ $post->ID ] = $post->post_title;
			}
		}
		return $posts;
	}
}

/**
 * Load All Page
 */
if ( ! function_exists( 'rbelad_get_all_pages' ) ) {
	/**
	 * Get a list of all pages.
	 *
	 * Retrieves all WordPress pages and returns an array where the keys are
	 * page IDs and the values are the page titles.
	 *
	 * @return array List of pages with ID as key and title as value.
	 */
	function rbelad_get_all_pages() {
		$page_list = get_posts(
			array(
				'post_type'      => 'page',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => -1,
			)
		);

		$pages = array();
		if ( ! empty( $page_list ) && ! is_wp_error( $page_list ) ) {
			foreach ( $page_list as $page ) {
				$pages[ $page->ID ] = $page->post_title;
			}
		}
		return $pages;
	}
}

/**
 * Slider Unit
 *
 * @return array
 */
function rbelad_slider_unit() {
	return array( 'px', '%', 'em', 'rem', 'vw', 'custom' );
}

/**
 * Slider Range
 *
 * @return array
 */
function rbelad_slider_range() {
	return array(
		'px'  => array(
			'min'  => -1000,
			'max'  => 1000,
			'step' => 1,
		),
		'%'   => array(
			'min'  => -100,
			'max'  => 100,
			'step' => 1,
		),
		'em'  => array(
			'min'  => -20,
			'max'  => 20,
			'step' => 0.1,
		),
		'rem' => array(
			'min'  => -20,
			'max'  => 20,
			'step' => 0.1,
		),
		'vh'  => array(
			'min'  => -100,
			'max'  => 100,
			'step' => 1,
		),
		'vw'  => array(
			'min'  => -100,
			'max'  => 100,
			'step' => 1,
		),
		'deg' => array(
			'min'  => -360,
			'max'  => 360,
			'step' => 1,
		),
	);
}
