<?php
/**
 * Contact Info widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_contact_info_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'contact-info' );

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'style_1',
	array(
		'controls'    => array(
			'switch'   => array(
				'id'      => $prefix . 'show_icon',
				'default' => 'no',
			),
			'select'   => array(
				'id'        => $prefix . 'icon_type',
				'label'     => esc_html__( 'Select Icon', 'rb-elementor-addons' ),
				'options'   => array(
					'image' => esc_html__( 'Image Icon', 'rb-elementor-addons' ),
					'icon'  => esc_html__( 'Font Icon', 'rb-elementor-addons' ),
				),
				'default'   => 'icon',
				'condition' => array(
					$prefix . 'show_icon' => 'yes',
				),
			),
			'icon'     => array(
				'id'        => $prefix . 'font_icon',
				'condition' => array(
					$prefix . 'show_icon' => 'yes',
					$prefix . 'icon_type' => 'icon',
				),
			),
			'img'      => array(
				'id'        => $prefix . 'icon_image',
				'condition' => array(
					$prefix . 'show_icon' => 'yes',
					$prefix . 'icon_type' => 'image',
				),
			),
			'text'     => array(
				'id'    => $prefix . 'info_title',
				'label' => esc_html__( 'Info Title', 'rb-elementor-addons' ),
			),
			'textarea' => array(
				'id'    => $prefix . 'info_text',
				'label' => esc_html__( 'Info Text', 'rb-elementor-addons' ),
			),
		),
		'id'          => $prefix . 'contact_info_repeater',
		'label'       => esc_html__( 'Info Item', 'rb-elementor-addons' ),
		'default'     => array(
			array(
				$prefix . 'info_title' => esc_html__( 'Address:', 'rb-elementor-addons' ),
				$prefix . 'info_text'  => esc_html__( 'Dhaka, Bangladesh.', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'info_title' => esc_html__( 'Phone:', 'rb-elementor-addons' ),
				$prefix . 'info_text'  => esc_html__( '+88 01934 109870, +88 01841 109870', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'info_title' => esc_html__( 'E-mail:', 'rb-elementor-addons' ),
				$prefix . 'info_text'  => esc_html__( 'info@bashirrased.com, bashir.rased@gmail.com', 'rb-elementor-addons' ),
			),
		),
		'title_field' => '{{{ rbelad_contact_info_general_content_info_title }}}',
	),
);

// End Section Tab.
$this->end_controls_section();
