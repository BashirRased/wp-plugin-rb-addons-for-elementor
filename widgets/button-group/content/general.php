<?php
/**
 * Button Group widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix = $this->get_section_content_prefix( 'general' );

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All repeater content add here.
$this->add_repeater_controls(
	$rbelad_prefix . 'style_2',
	array(
		'controls'    => array(
			'text'          => array(
				'id'      => $rbelad_prefix . '_btn_text',
				'label'   => esc_html__( 'Button Text', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Button', 'rb-addons-for-elementor' ),
			),
			'select'        => array(
				'id'      => $rbelad_prefix . 'link_type',
				'label'   => esc_html__( 'Link Type', 'rb-addons-for-elementor' ),
				'options' => array(
					'none'   => esc_html__( 'None', 'rb-addons-for-elementor' ),
					'page'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
					'custom' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
				),
				'default' => 'custom',
			),
			'page_link'     => array(
				'id'        => $rbelad_prefix . 'page_link',
				'condition' => array(
					$rbelad_prefix . 'link_type' => 'page',
				),
			),
			'custom_link'   => array(
				'id'        => $rbelad_prefix . 'custom_link',
				'condition' => array(
					$rbelad_prefix . 'link_type' => 'custom',
				),
			),
			// Icon.
			'icon_img'      => array(
				'id'      => $rbelad_prefix . '_btn_icon_img',
				'label'   => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'default' => 'icon',
			),

			// Icon Image.
			'img'           => array(
				'id'        => $rbelad_prefix . '_btn_img',
				'label'     => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'condition' => array(
					$rbelad_prefix . '_btn_icon_img' => 'image',
				),
			),

			// Icon Icon.
			'icon'          => array(
				'id'        => $rbelad_prefix . '_btn_icon_simple',
				'label'     => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'default'   => array(
					'value'   => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				),
				'condition' => array(
					$rbelad_prefix . '_btn_icon_img' => 'icon',
				),
			),

			// Icon Position.
			'icon_position' => array(
				'id'      => $rbelad_prefix . '_btn_icon_position',
				'default' => 'right',
			),
		),
		'id'          => $rbelad_prefix . 'repeater',
		'label'       => esc_html__( 'Button Items', 'rb-addons-for-elementor' ),
		'default'     => array(
			array(
				$rbelad_prefix . '_btn_text' => esc_html__( 'Download CV', 'rb-addons-for-elementor' ),
			),
			array(
				$rbelad_prefix . '_btn_text' => esc_html__( 'Contact Me', 'rb-addons-for-elementor' ),
			),
		),
		'title_field' => '{{{ ' . rtrim( $rbelad_prefix, '_' ) . '_btn_text }}}',
	),
);

// End Section Tab.
$this->end_controls_section();
