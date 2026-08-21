<?php
/**
 * Select Link Type Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

$rbelad_base_id = ! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'select_link_type';

// =====================================
// SELECT LINK TYPE
// =====================================
$this->add_control(
	$rbelad_base_id . '_select_option',
	array(
		'label'       => ! empty( $rbelad_values['link_type_label'] ) ? $rbelad_values['link_type_label'] : esc_html__( 'Select Link Type', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'label_block' => isset( $rbelad_values['label_block'] ) ? $rbelad_values['label_block'] : true,
		'options'     => ! empty( $rbelad_values['link_type_options'] ) ? $rbelad_values['link_type_options'] : array(
			'none'        => esc_html__( 'None', 'rb-addons-for-elementor' ),
			'page_link'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
			'post_link'   => esc_html__( 'Post Link', 'rb-addons-for-elementor' ),
			'custom_link' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
		),
		'default'     => ! empty( $rbelad_values['link_type_default'] ) ? $rbelad_values['link_type_default'] : 'none',
		'condition'   => ! empty( $rbelad_values['link_type_condition'] ) ? $rbelad_values['link_type_condition'] : array(),
	)
);

// =====================================
// PAGE LINK
// =====================================
$rbelad_page_options   = ! empty( $rbelad_values['page_options'] )
	? $rbelad_values['page_options']
	: rbelad_get_all_pages();
$rbelad_page_condition = ! empty( $rbelad_values['page_link_condition'] ) ? $rbelad_values['page_link_condition'] : array();

$this->add_control(
	$rbelad_base_id . '_page_link',
	array(
		'label'       => ! empty( $rbelad_values['page_link_label'] ) ? $rbelad_values['page_link_label'] : esc_html__( 'Select Page', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'label_block' => true,
		'options'     => $rbelad_page_options,
		'default'     => ! empty( $rbelad_page_options ) ? array_key_first( $rbelad_page_options ) : '',
		'condition'   => array_merge(
			(array) $rbelad_page_condition,
			array(
				$rbelad_base_id . '_select_option' => 'page_link',
			)
		),
	)
);

// =====================================
// POST LINK
// =====================================
$rbelad_post_options   = ! empty( $rbelad_values['post_options'] )
	? $rbelad_values['post_options']
	: rbelad_get_all_posts();
$rbelad_post_condition = ! empty( $rbelad_values['post_link_condition'] ) ? $rbelad_values['post_link_condition'] : array();

$this->add_control(
	$rbelad_base_id . '_post_link',
	array(
		'label'       => ! empty( $rbelad_values['post_link_label'] ) ? $rbelad_values['post_link_label'] : esc_html__( 'Select Post', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'label_block' => true,
		'options'     => $rbelad_post_options,
		'default'     => ! empty( $rbelad_post_options ) ? array_key_first( $rbelad_post_options ) : '',
		'condition'   => array_merge(
			(array) $rbelad_post_condition,
			array(
				$rbelad_base_id . '_select_option' => 'post_link',
			)
		),
	)
);

// =====================================
// CUSTOM LINK
// =====================================
$rbelad_custom_link_condition = ! empty( $rbelad_values['custom_link_link_condition'] ) ? $rbelad_values['custom_link_link_condition'] : array();

$this->add_control(
	$rbelad_base_id . '_custom_link',
	array(
		'label'       => ! empty( $rbelad_values['custom_link_label'] ) ? $rbelad_values['custom_link_label'] : esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::URL,
		'ai'          => false,
		'label_block' => true,
		'placeholder' => esc_html__( 'Enter your URL', 'rb-addons-for-elementor' ),
		'options'     => array( 'url', 'is_external', 'nofollow', 'custom_attributes' ),
		'default'     => array(
			'url'               => ! empty( $rbelad_values['default']['url'] )
				? $rbelad_values['default']['url']
				: esc_url( '#' ),

			'is_external'       => isset( $rbelad_values['default']['is_external'] )
				? $rbelad_values['default']['is_external']
				: true,

			'nofollow'          => isset( $rbelad_values['default']['nofollow'] )
				? $rbelad_values['default']['nofollow']
				: true,

			'custom_attributes' => ! empty( $rbelad_values['default']['custom_attributes'] )
				? $rbelad_values['default']['custom_attributes']
				: '',
		),
		'condition'   => array_merge(
			(array) $rbelad_custom_link_condition,
			array(
				$rbelad_base_id . '_select_option' => 'custom_link',
			)
		),
	)
);
