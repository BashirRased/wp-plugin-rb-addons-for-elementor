<?php
/**
 * Extend Elementor Container with custom style controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

add_action(
	'elementor/element/container/section_layout/after_section_end',
	function ( $element ) {
		$element->start_controls_section(
			'rbelad_style_section',
			array(
				'label' => esc_html__( 'Background Overlay - RB Elementor', 'rb-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$rbelad_container_cls = '{{WRAPPER}}::after, {{WRAPPER}} > .elementor-background-video-container::after, {{WRAPPER}} > .e-con-inner > .elementor-background-video-container::after, {{WRAPPER}} > .elementor-background-slideshow::after, {{WRAPPER}} > .e-con-inner > .elementor-background-slideshow::after, {{WRAPPER}} > .elementor-motion-effects-container > .elementor-motion-effects-layer::after';

		// Background Image Upload.
		$element->add_control(
			'rbelad_upload_img',
			array(
				'label'     => esc_html__( 'Upload Shape Image', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::MEDIA,
				'selectors' => array(
					$rbelad_container_cls => 'content: ""; top: calc(0px - var(--border-left-width)); left: calc(0px - var(--border-left-width)); height: max(100% + var(--border-top-width) + var(--border-bottom-width),100%); width: max(100% + var(--border-left-width) + var(--border-right-width),100%); position: absolute; background-image: url({{URL}}); background-repeat:no-repeat; z-index: -1;',
				),
			)
		);

		// Mix Blend Mode.
		$element->add_control(
			'rbelad_mix_blend_mode',
			array(
				'label'     => esc_html__( 'Mix Blend Mode', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'luminosity',
				'options'   => array(
					'normal'      => 'Normal',
					'multiply'    => 'Multiply',
					'screen'      => 'Screen',
					'overlay'     => 'Overlay',
					'darken'      => 'Darken',
					'lighten'     => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'color-burn'  => 'Color Burn',
					'hard-light'  => 'Hard Light',
					'soft-light'  => 'Soft Light',
					'difference'  => 'Difference',
					'exclusion'   => 'Exclusion',
					'hue'         => 'Hue',
					'saturation'  => 'Saturation',
					'color'       => 'Color',
					'luminosity'  => 'Luminosity',
				),
				'selectors' => array(
					$rbelad_container_cls => 'mix-blend-mode: {{VALUE}};',
				),
			)
		);

		// Opacity Control.
		$element->add_control(
			'rbelad_opacity',
			array(
				'label'     => esc_html__( 'Opacity', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1,
						'step' => 0.1,
					),
				),
				'default'   => array(
					'size' => 0.2,
				),
				'selectors' => array(
					$rbelad_container_cls => 'opacity: {{SIZE}};',
				),
			)
		);

		// Background Position Control.
		$element->add_control(
			'rbelad_background_position',
			array(
				'label'     => esc_html__( 'Background Position', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left top',
				'options'   => array(
					'left top'      => esc_html__( 'Left Top', 'rb-addons-for-elementor' ),
					'left center'   => esc_html__( 'Left Center', 'rb-addons-for-elementor' ),
					'left bottom'   => esc_html__( 'Left Bottom', 'rb-addons-for-elementor' ),
					'center top'    => esc_html__( 'Center Top', 'rb-addons-for-elementor' ),
					'center center' => esc_html__( 'Center Center', 'rb-addons-for-elementor' ),
					'center bottom' => esc_html__( 'Center Bottom', 'rb-addons-for-elementor' ),
					'right top'     => esc_html__( 'Right Top', 'rb-addons-for-elementor' ),
					'right center'  => esc_html__( 'Right Center', 'rb-addons-for-elementor' ),
					'right bottom'  => esc_html__( 'Right Bottom', 'rb-addons-for-elementor' ),
				),
				'selectors' => array(
					$rbelad_container_cls => 'background-position: {{VALUE}};',
				),
			)
		);

		$element->end_controls_section();
	},
	10,
	1
);
