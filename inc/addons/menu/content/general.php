<?php
/**
 * Menu widget content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_content_prefix( 'general' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id' => $prefix . '_nav_menu_list',
				'label' => esc_html__( 'Select Menu', 'rb-addons-for-elementor' ),
				'options' => array(),
			),

			// Icon.
			'icon' => array(
				'id' => $prefix . '_hamburger_icon',
				'label' => esc_html__( 'Menu Icon', 'rb-addons-for-elementor' ),
				'label_block'      => false,
				'default'                => [
					'value'   => 'fas fa-bars',
					'library' => 'fa-solid',
				],
				'skin'                   => 'inline',
				'exclude_inline_options' => ['svg'],
			),

			// Icon.
			'icon_2' => array(
				'id' => $prefix . '_hamburger_close_icon',
				'label' => esc_html__( 'Close Icon', 'rb-addons-for-elementor' ),
				'label_block'      => false,
				'default'                => [
					'value'   => 'far fa-window-close',
					'library' => 'fa-solid',
				],
				'skin'                   => 'inline',
				'exclude_inline_options' => ['svg'],
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
