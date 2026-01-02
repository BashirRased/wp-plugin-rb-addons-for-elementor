<?php
/**
 * Contact Form widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_contact_form_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => rbelad_is_cf7_activated() ? esc_html__( 'Contact Form 7', 'rb-elementor-addons' ) : esc_html__( 'Warning!', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'contact-form' );

if ( ! rbelad_is_cf7_activated() ) {
	$cf7_missing_info = rbelad_get_plugin_missing_info(
		array(
			'plugin_name' => 'contact-form-7',
			'plugin_file' => 'contact-form-7/wp-contact-form-7.php',
		)
	);

	$cf7_missing_url   = ! empty( $cf7_missing_info['url'] ) ? $cf7_missing_info['url'] : '#';
	$cf7_missing_title = ! empty( $cf7_missing_info['title'] ) ? $cf7_missing_info['title'] : '';

	$this->add_control(
		'_cf7_missing_notice',
		array(
			'type'            => Controls_Manager::RAW_HTML,
			'raw'             => sprintf(
				// translators: 1: Plugin name link, 2: Plugin status (activated/installed), 3: Plugin name lowercase.
				esc_html__( 'It seems that %1$s plugin is not %2$s on your site. Please click the link below to %3$s it. Once done, be sure to refresh this page to continue.', 'rb-elementor-addons' ),
				sprintf(
					'<a href="%s" target="_blank" rel="noopener">%s</a>',
					esc_url( $cf7_missing_url ),
					esc_html( 'Contact Form 7' )
				),
				$cf7_missing_info['installed'] ? esc_html( 'activated' ) : esc_html( 'installed' ),
				esc_html( strtolower( $cf7_missing_title ) )
			),
			'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
		)
	);

	$this->add_control(
		'_cf7_install',
		array(
			'type' => Controls_Manager::RAW_HTML,
			'raw'  => sprintf(
				'<a href="%s" target="_blank" rel="noopener">%s Contact Form 7 Plugin</a>',
				esc_url( $cf7_missing_url ),
				esc_html( $cf7_missing_title )
			),
		)
	);
} else {
	// All content add here.
	$this->add_style_controls(
		$prefix . 'style_1',
		array(
			'controls' => array(
				'select_option' => array(
					'id'      => $prefix . 'form_id',
					'label'   => esc_html__( 'Select Your Form', 'rb-elementor-addons' ),
					'options' => rbelad_get_cf7_forms(),
				),
			),
		),
	);
}

// End Section Tab.
$this->end_controls_section();
