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

// Controls variables.
$prefix = 'rbelad_list_style_general_content_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'style_1',
	array(
		'controls'    => array(
			'switch'   => array(
				'id'      => $prefix . 'icon_switch',
				'label'   => esc_html__( 'Icon Show', 'rb-addons-for-elementor' ),
				'default' => 'no',
			),
			'select'   => array(
				'id'        => $prefix . 'icon_type',
				'label'     => esc_html__( 'Icon Type', 'rb-addons-for-elementor' ),
				'options'   => array(
					'icon'  => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
					'image' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
				),
				'default'   => 'icon',
				'condition' => array(
					$prefix . 'icon_switch' => 'yes',
				),
			),
			'icon'     => array(
				'id'        => $prefix . 'font_icon',
				'label'     => esc_html__( 'Font Icon', 'rb-addons-for-elementor' ),
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
				'label'     => esc_html__( 'Icon Image', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . 'icon_switch' => 'yes',
					$prefix . 'icon_type'   => 'image',
				),
			),
			'text'     => array(
				'id'      => $prefix . 'label_text',
				'label'   => esc_html__( 'Label Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Name', 'rb-addons-for-elementor' ),
			),
			'select_2' => array(
				'id'      => $prefix . 'separator_type',
				'label'   => esc_html__( 'Separator Type', 'rb-addons-for-elementor' ),
				'options' => array(
					'text'  => esc_html__( 'Text', 'rb-addons-for-elementor' ),
					'icon'  => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
					'image' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
				),
				'default' => 'text',
			),
			'text_2'   => array(
				'id'        => $prefix . 'separator_text',
				'label'     => esc_html__( 'Separator Text', 'rb-addons-for-elementor' ),
				'default'   => esc_html__( ':', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . 'separator_type' => 'text',
				),
			),
			'icon_2'   => array(
				'id'        => $prefix . 'separator_font_icon',
				'label'     => esc_html__( 'Separator Font Icon', 'rb-addons-for-elementor' ),
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
				'label'     => esc_html__( 'Separator Icon Image', 'rb-addons-for-elementor' ),
				'condition' => array(
					$prefix . 'separator_type' => 'image',
				),
			),
			'text_3'   => array(
				'id'      => $prefix . 'info_text',
				'label'   => esc_html__( 'Info Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Bashir Rased', 'rb-addons-for-elementor' ),
			),
		),
		'id'          => $prefix . 'list_style_repeater',
		'label'       => esc_html__( 'List Item', 'rb-addons-for-elementor' ),
		'default'     => array(
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-user',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Name', 'rb-addons-for-elementor' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-addons-for-elementor' ),
				$prefix . 'info_text'      => esc_html__( 'Bashir Rased', 'rb-addons-for-elementor' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-calendar-alt',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Date of Birth', 'rb-addons-for-elementor' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-addons-for-elementor' ),
				$prefix . 'info_text'      => esc_html__( '05 November 1994', 'rb-addons-for-elementor' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-phone-volume',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Mobile', 'rb-addons-for-elementor' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-addons-for-elementor' ),
				$prefix . 'info_text'      => esc_html__( '+88 01841 909870, +88 01934 109870', 'rb-addons-for-elementor' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-envelope',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'E-mail', 'rb-addons-for-elementor' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-addons-for-elementor' ),
				$prefix . 'info_text'      => esc_html__( 'info@bashirrased.com, bashir.rased@gmail.com', 'rb-addons-for-elementor' ),
			),
			array(
				$prefix . 'font_icon'      => array(
					'value'   => 'fas fa-map-marker-alt',
					'library' => 'fa-solid',
				),
				$prefix . 'label_text'     => esc_html__( 'Address', 'rb-addons-for-elementor' ),
				$prefix . 'separator_text' => esc_html__( ':', 'rb-addons-for-elementor' ),
				$prefix . 'info_text'      => esc_html__( 'Shonir Akhra, Jatrabari, Dhaka-1362.', 'rb-addons-for-elementor' ),
			),
		),
		'title_field' => '{{{ rbelad_list_style_general_content_label_text }}}',
	),
);

// End Section Tab.
$this->end_controls_section();
