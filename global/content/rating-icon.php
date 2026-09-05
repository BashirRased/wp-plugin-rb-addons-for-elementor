<?php
/**
 * Rating Icon Controls.
 *
 * Provides rating value, empty icon, fill icon, and half icon controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

/**
 * Base ID.
 */
$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? $rbelad_values['id']
	: 'rating_icon';

/**
 * ============================================================
 * RATING VALUE
 * ============================================================
 */
$this->add_control(
	$rbelad_base_id . '_rating_value',
	array(
		'label'     => ! empty( $rbelad_values['rating_label'] )
			? $rbelad_values['rating_label']
			: esc_html__( 'Rating', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::NUMBER,
		'min'       => isset( $rbelad_values['rating_min'] )
			? $rbelad_values['rating_min']
			: 0,
		'max'       => isset( $rbelad_values['rating_max'] )
			? $rbelad_values['rating_max']
			: 5,
		'step'      => isset( $rbelad_values['rating_step'] )
			? $rbelad_values['rating_step']
			: 0.5,
		'default'   => isset( $rbelad_values['rating_default'] )
			? $rbelad_values['rating_default']
			: 5,
		'condition' => ! empty( $rbelad_values['rating_condition'] )
			? $rbelad_values['rating_condition']
			: array(),
	)
);

/**
 * ============================================================
 * EMPTY ICON
 * ============================================================
 */
$rbelad_empty_icon_default = ! empty( $rbelad_values['empty_icon_default'] )
	? $rbelad_values['empty_icon_default']
	: array(
		'value'   => 'far fa-star',
		'library' => 'fa-regular',
	);

$rbelad_empty_icon_recommended = ! empty( $rbelad_values['empty_icon_recommended'] )
	? $rbelad_values['empty_icon_recommended']
	: array(
		'fa-regular' => array(
			'star',
			'heart',
			'circle',
		),
	);

$this->add_control(
	$rbelad_base_id . '_empty_icon',
	array(
		'label'                  => ! empty( $rbelad_values['empty_icon_label'] )
			? $rbelad_values['empty_icon_label']
			: esc_html__( 'Empty Icon', 'rb-addons-for-elementor' ),
		'type'                   => Controls_Manager::ICONS,
		'skin'                   => 'inline',
		'label_block'            => false,
		'skin_settings'          => array(
			'inline' => array(
				'icon' => array(
					'icon' => 'far fa-star',
				),
			),
		),
		'recommended'            => $rbelad_empty_icon_recommended,
		'default'                => $rbelad_empty_icon_default,
		'exclude_inline_options' => array( 'none' ),
		'condition'              => ! empty( $rbelad_values['empty_icon_condition'] )
			? $rbelad_values['empty_icon_condition']
			: array(),
	)
);

/**
 * ============================================================
 * FILL ICON
 * ============================================================
 */
$rbelad_fill_icon_default = ! empty( $rbelad_values['fill_icon_default'] )
	? $rbelad_values['fill_icon_default']
	: array(
		'value'   => 'fas fa-star',
		'library' => 'fa-solid',
	);

$rbelad_fill_icon_recommended = ! empty( $rbelad_values['fill_icon_recommended'] )
	? $rbelad_values['fill_icon_recommended']
	: array(
		'fa-solid' => array(
			'star',
			'heart',
			'circle',
		),
	);

$this->add_control(
	$rbelad_base_id . '_fill_icon',
	array(
		'label'                  => ! empty( $rbelad_values['fill_icon_label'] )
			? $rbelad_values['fill_icon_label']
			: esc_html__( 'Fill Icon', 'rb-addons-for-elementor' ),
		'type'                   => Controls_Manager::ICONS,
		'skin'                   => 'inline',
		'label_block'            => false,
		'skin_settings'          => array(
			'inline' => array(
				'icon' => array(
					'icon' => 'fas fa-star',
				),
			),
		),
		'recommended'            => $rbelad_fill_icon_recommended,
		'default'                => $rbelad_fill_icon_default,
		'exclude_inline_options' => array( 'none' ),
		'condition'              => ! empty( $rbelad_values['fill_icon_condition'] )
			? $rbelad_values['fill_icon_condition']
			: array(),
	)
);

/**
 * ============================================================
 * HALF ICON
 * ============================================================
 */
$rbelad_half_icon_default = ! empty( $rbelad_values['half_icon_default'] )
	? $rbelad_values['half_icon_default']
	: array(
		'value'   => 'fas fa-star-half-alt',
		'library' => 'fa-solid',
	);

$rbelad_half_icon_recommended = ! empty( $rbelad_values['half_icon_recommended'] )
	? $rbelad_values['half_icon_recommended']
	: array(
		'fa-solid'   => array(
			'star-half-alt',
			'star-half',
		),
		'fa-regular' => array(
			'star-half-alt',
			'star-half',
		),
	);

$this->add_control(
	$rbelad_base_id . '_half_icon',
	array(
		'label'                  => ! empty( $rbelad_values['half_icon_label'] )
			? $rbelad_values['half_icon_label']
			: esc_html__( 'Half Icon', 'rb-addons-for-elementor' ),
		'type'                   => Controls_Manager::ICONS,
		'skin'                   => 'inline',
		'label_block'            => false,
		'skin_settings'          => array(
			'inline' => array(
				'icon' => array(
					'icon' => 'fas fa-star-half-alt',
				),
			),
		),
		'recommended'            => $rbelad_half_icon_recommended,
		'default'                => $rbelad_half_icon_default,
		'exclude_inline_options' => array( 'none' ),
		'condition'              => ! empty( $rbelad_values['half_icon_condition'] )
			? $rbelad_values['half_icon_condition']
			: array(),
	)
);
