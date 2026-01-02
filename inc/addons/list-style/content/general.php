<?php
/**
 * List Style widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_list_style_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'list-style' );

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'style_1',
	array(
		'controls'    => array(
			'switch'   => array(
				'id'      => $prefix . 'icon_switch',
				'label'   => esc_html__( 'Icon Show', 'rb-elementor-addons' ),
				'default' => 'no',
			),
			'select'   => array(
				'id'        => $prefix . 'icon_type',
				'label'     => esc_html__( 'Icon Type', 'rb-elementor-addons' ),
				'options'   => array(
					'icon'  => esc_html__( 'Icon', 'rb-elementor-addons' ),
					'image' => esc_html__( 'Image', 'rb-elementor-addons' ),
				),
				'default'   => 'icon',
				'condition' => array(
					$prefix . 'icon_switch' => 'yes',
				),
			),
			'icon'     => array(
				'id'        => $prefix . 'font_icon',
				'label'     => esc_html__( 'Font Icon', 'rb-elementor-addons' ),
				'default'   => array(
					'value'   => 'fas fa-user',
					'library' => 'fa-solid',
				),
				'condition' => array(
					$prefix . 'icon_switch' => 'yes',
					$prefix . 'icon_type'   => 'icon',
				),
			),
			'img'      => array(
				'id'        => $prefix . 'icon_image',
				'label'     => esc_html__( 'Icon Image', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'icon_switch' => 'yes',
					$prefix . 'icon_type'   => 'image',
				),
			),
			'text'     => array(
				'id'      => $prefix . 'label_text',
				'label'   => esc_html__( 'Label Text', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Name', 'rb-elementor-addons' ),
			),
			'select_2' => array(
				'id'      => $prefix . 'separator_type',
				'label'   => esc_html__( 'Separator Type', 'rb-elementor-addons' ),
				'options' => array(
					'text'  => esc_html__( 'Text', 'rb-elementor-addons' ),
					'icon'  => esc_html__( 'Icon', 'rb-elementor-addons' ),
					'image' => esc_html__( 'Image', 'rb-elementor-addons' ),
				),
				'default' => 'text',
			),
			'text_2'   => array(
				'id'        => $prefix . 'separator_text',
				'label'     => esc_html__( 'Separator Text', 'rb-elementor-addons' ),
				'default'   => esc_html__( ':', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'separator_type' => 'text',
				),
			),
			'icon_2'   => array(
				'id'        => $prefix . 'separator_font_icon',
				'label'     => esc_html__( 'Separator Font Icon', 'rb-elementor-addons' ),
				'default'   => array(
					'value'   => 'fas fa-user',
					'library' => 'fa-solid',
				),
				'condition' => array(
					$prefix . 'separator_type' => 'icon',
				),
			),
			'img_2'    => array(
				'id'        => $prefix . 'separator_icon_image',
				'label'     => esc_html__( 'Separator Icon Image', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'separator_type' => 'image',
				),
			),
			'text_3'   => array(
				'id'      => $prefix . 'info_text',
				'label'   => esc_html__( 'Info Text', 'rb-elementor-addons' ),
				'default' => esc_html__( 'Bashir Rased', 'rb-elementor-addons' ),
			),
		),
		'id'          => $prefix . 'list_style_repeater',
		'label'       => esc_html__( 'List Item', 'rb-elementor-addons' ),
		'default'     => array(
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-user',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Name', 'rb-elementor-addons' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-elementor-addons' ),
				$prefix . 'info_text'      => esc_html__( 'Bashir Rased', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-calendar-alt',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Date of Birth', 'rb-elementor-addons' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-elementor-addons' ),
				$prefix . 'info_text'      => esc_html__( '05 November 1994', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-phone-volume',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Mobile', 'rb-elementor-addons' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-elementor-addons' ),
				$prefix . 'info_text'      => esc_html__( '+88 01841 909870, +88 01934 109870', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-envelope',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'E-mail', 'rb-elementor-addons' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-elementor-addons' ),
				$prefix . 'info_text'      => esc_html__( 'info@bashirrased.com, bashir.rased@gmail.com', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-map-marker-alt',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Address', 'rb-elementor-addons' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-elementor-addons' ),
				$prefix . 'info_text'      => esc_html__( 'Shonir Akhra, Jatrabari, Dhaka-1362.', 'rb-elementor-addons' ),
			),
		),
		'title_field' => '{{{ rbelad_list_style_general_content_label_text }}}',
	),
);

// End Section Tab.
$this->end_controls_section();
