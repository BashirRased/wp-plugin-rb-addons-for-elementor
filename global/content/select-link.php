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

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? $rbelad_values['id']
	: 'select_link_type';

/**
 * Default link options.
 */
$rbelad_link_defaults = array(
	'is_external'       => isset( $rbelad_values['default']['is_external'] )
		? $rbelad_values['default']['is_external']
		: true,

	'nofollow'          => isset( $rbelad_values['default']['nofollow'] )
		? $rbelad_values['default']['nofollow']
		: true,

	'custom_attributes' => ! empty( $rbelad_values['default']['custom_attributes'] )
		? $rbelad_values['default']['custom_attributes']
		: '',
);

// =====================================
// SELECT LINK TYPE
// =====================================

$this->add_control(
	$rbelad_base_id . '_select_option',
	array(
		'label'       => ! empty( $rbelad_values['link_type_label'] )
			? $rbelad_values['link_type_label']
			: esc_html__( 'Select Link Type', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'label_block' => isset( $rbelad_values['label_block'] )
			? $rbelad_values['label_block']
			: true,
		'options'     => ! empty( $rbelad_values['link_type_options'] )
			? $rbelad_values['link_type_options']
			: array(
				'none'        => esc_html__( 'None', 'rb-addons-for-elementor' ),
				'page_link'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
				'post_link'   => esc_html__( 'Post Link', 'rb-addons-for-elementor' ),
				'custom_link' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
			),
		'default'     => ! empty( $rbelad_values['link_type_default'] )
			? $rbelad_values['link_type_default']
			: 'none',
		'condition'   => ! empty( $rbelad_values['link_type_condition'] )
			? $rbelad_values['link_type_condition']
			: array(),
	)
);


// =====================================
// PAGE LINK
// =====================================

$rbelad_page_options = ! empty( $rbelad_values['page_options'] )
	? $rbelad_values['page_options']
	: rbelad_get_all_pages();

$rbelad_page_condition = ! empty( $rbelad_values['page_link_condition'] )
	? $rbelad_values['page_link_condition']
	: array();


// -------------------------------------
// SELECT PAGE
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_page_link',
	array(
		'label'       => ! empty( $rbelad_values['page_link_label'] )
			? $rbelad_values['page_link_label']
			: esc_html__( 'Select Page', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'label_block' => true,
		'options'     => $rbelad_page_options,
		'default'     => ! empty( $rbelad_values['default']['page_link'] )
			? $rbelad_values['default']['page_link']
			: (
				! empty( $rbelad_page_options )
					? array_key_first( $rbelad_page_options )
					: ''
			),
		'condition'   => array_merge(
			(array) $rbelad_page_condition,
			array(
				$rbelad_base_id . '_select_option' => 'page_link',
			)
		),
	)
);


// -------------------------------------
// PAGE LINK OPTIONS TOGGLE
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_page_link_options',
	array(
		'label'        => esc_html__( 'Link Options', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
		'icon'         => 'eicon-cog',
		'condition'    => array_merge(
			(array) $rbelad_page_condition,
			array(
				$rbelad_base_id . '_select_option' => 'page_link',
			)
		),
	)
);

$this->start_popover();


// -------------------------------------
// PAGE - OPEN IN NEW WINDOW
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_page_link_is_external',
	array(
		'label'        => esc_html__( 'Open in new window', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default'      => ! empty( $rbelad_link_defaults['is_external'] )
			? 'yes'
			: '',
	)
);


// -------------------------------------
// PAGE - NOFOLLOW
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_page_link_nofollow',
	array(
		'label'        => esc_html__( 'Add nofollow', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default'      => ! empty( $rbelad_link_defaults['nofollow'] )
			? 'yes'
			: '',
	)
);


// -------------------------------------
// PAGE - CUSTOM ATTRIBUTES
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_page_link_custom_attributes',
	array(
		'label'       => esc_html__( 'Custom Attributes', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'placeholder' => esc_html__( 'key|value', 'rb-addons-for-elementor' ),
		'description' => esc_html__(
			'Set custom attributes for the link element. Separate attributes from values using the pipe (|) character. Separate key-value pairs with a comma.',
			'rb-addons-for-elementor'
		),
		'default'     => $rbelad_link_defaults['custom_attributes'],
	)
);

$this->end_popover();


// =====================================
// POST LINK
// =====================================

$rbelad_post_options = ! empty( $rbelad_values['post_options'] )
	? $rbelad_values['post_options']
	: rbelad_get_all_posts();

$rbelad_post_condition = ! empty( $rbelad_values['post_link_condition'] )
	? $rbelad_values['post_link_condition']
	: array();


// -------------------------------------
// SELECT POST
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_post_link',
	array(
		'label'       => ! empty( $rbelad_values['post_link_label'] )
			? $rbelad_values['post_link_label']
			: esc_html__( 'Select Post', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'label_block' => true,
		'options'     => $rbelad_post_options,
		'default'     => ! empty( $rbelad_values['default']['post_link'] )
			? $rbelad_values['default']['post_link']
			: (
				! empty( $rbelad_post_options )
					? array_key_first( $rbelad_post_options )
					: ''
			),
		'condition'   => array_merge(
			(array) $rbelad_post_condition,
			array(
				$rbelad_base_id . '_select_option' => 'post_link',
			)
		),
	)
);


// -------------------------------------
// POST LINK OPTIONS TOGGLE
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_post_link_options',
	array(
		'label'        => esc_html__( 'Link Options', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
		'icon'         => 'eicon-cog',
		'condition'    => array_merge(
			(array) $rbelad_post_condition,
			array(
				$rbelad_base_id . '_select_option' => 'post_link',
			)
		),
	)
);

$this->start_popover();


// -------------------------------------
// POST - OPEN IN NEW WINDOW
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_post_link_is_external',
	array(
		'label'        => esc_html__( 'Open in new window', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default'      => ! empty( $rbelad_link_defaults['is_external'] )
			? 'yes'
			: '',
	)
);


// -------------------------------------
// POST - NOFOLLOW
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_post_link_nofollow',
	array(
		'label'        => esc_html__( 'Add nofollow', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default'      => ! empty( $rbelad_link_defaults['nofollow'] )
			? 'yes'
			: '',
	)
);


// -------------------------------------
// POST - CUSTOM ATTRIBUTES
// -------------------------------------

$this->add_control(
	$rbelad_base_id . '_post_link_custom_attributes',
	array(
		'label'       => esc_html__( 'Custom Attributes', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'placeholder' => esc_html__( 'key|value', 'rb-addons-for-elementor' ),
		'description' => esc_html__(
			'Set custom attributes for the link element. Separate attributes from values using the pipe (|) character. Separate key-value pairs with a comma.',
			'rb-addons-for-elementor'
		),
		'default'     => $rbelad_link_defaults['custom_attributes'],
	)
);

$this->end_popover();


// =====================================
// CUSTOM LINK
// =====================================

$rbelad_custom_link_condition = ! empty(
	$rbelad_values['custom_link_link_condition']
)
	? $rbelad_values['custom_link_link_condition']
	: array();

$this->add_control(
	$rbelad_base_id . '_custom_link',
	array(
		'label'       => ! empty( $rbelad_values['custom_link_label'] )
			? $rbelad_values['custom_link_label']
			: esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::URL,
		'ai'          => false,
		'label_block' => true,
		'placeholder' => esc_html__( 'Enter your URL', 'rb-addons-for-elementor' ),
		'options'     => array(
			'url',
			'is_external',
			'nofollow',
			'custom_attributes',
		),
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

			'custom_attributes' => ! empty(
				$rbelad_values['default']['custom_attributes']
			)
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
