<?php
/**
 * Icon List widget - Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix  = $this->get_section_style_prefix( 'icon' );
$rbelad_class_1 = '{{WRAPPER}} .rbelad-icon-list__icon';

// Start Section Tab - Style.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All style add here.
$this->add_style_controls(
	$rbelad_prefix . '_style_1',
	array(
		'controls' => array(
			'flex'         => array(
				'id'           => $rbelad_prefix . '_flex',
				'defaults'     => array(
					'display'         => 'inline-flex',
					'justify_content' => 'center',
					'align_items'     => 'center',
				),
				'select_class' => $rbelad_class_1,
			),
			'height_width' => array(
				'id'             => $rbelad_prefix . '_height_width',
				'width_default'  => array(
					'unit' => 'px',
					'size' => 40,
				),
				'height_default' => array(
					'unit' => 'px',
					'size' => 40,
				),
				'select_class'   => $rbelad_class_1,
			),
			'icon_style'   => array(
				'id'           => $rbelad_prefix . '_icon_style',
				'defaults'     => array(
					'size'  => array(
						'unit' => 'px',
						'size' => 20,
					),
					'color' => 'var(--rbelad-color-white)',
				),
				'select_class' => $rbelad_class_1,
			),
			'box_style'    => array(
				'id'           => $rbelad_prefix . '_box_style',
				'defaults'     => array(
					'background_normal_color' => 'var(--rbelad-color-primary)',
					'border_normal_radius'    => array(
						'top'      => 5,
						'right'    => 5,
						'bottom'   => 5,
						'left'     => 5,
						'unit'     => 'px',
						'isLinked' => true,
					),
					'padding'                 => array(
						'top'      => 5,
						'right'    => 5,
						'bottom'   => 5,
						'left'     => 5,
						'unit'     => 'px',
						'isLinked' => true,
					),
				),
				'select_class' => $rbelad_class_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
