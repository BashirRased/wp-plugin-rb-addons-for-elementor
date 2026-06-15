<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * RB Divider Widget
 */
class Divider extends Widget_Base {

	public function get_name() {
		return 'rbelad-divider';
	}

	public function get_title() {
		return esc_html__( 'RB Divider', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-divider';
	}

	public function get_categories() {
		return [ 'rbelad_category' ];
	}

	public function get_keywords() {
		return [ 'divider', 'separator', 'line', 'hr', 'rb' ];
	}

	/**
	 * Controls
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'rb-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Style', 'rb-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'solid'  => esc_html__( 'Solid', 'rb-addons-for-elementor' ),
					'dashed' => esc_html__( 'Dashed', 'rb-addons-for-elementor' ),
					'dotted' => esc_html__( 'Dotted', 'rb-addons-for-elementor' ),
				],
				'default' => 'solid',
			]
		);

		$this->add_control(
			'weight',
			[
				'label' => esc_html__( 'Weight (px)', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::NUMBER,
				'min'   => 1,
				'max'   => 20,
				'default' => 2,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#000000',
			]
		);

		$this->add_control(
			'width',
			[
				'label' => esc_html__( 'Width (%)', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 100,
				],
			]
		);

		$this->add_control(
			'alignment',
			[
				'label'   => esc_html__( 'Alignment', 'rb-addons-for-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'rb-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'rb-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'rb-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render output
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$style = $settings['style'];
		$weight = $settings['weight'];
		$color = $settings['color'];
		$width = $settings['width']['size'];
		$align = $settings['alignment'];

		$align_class = 'text-align:' . $align . ';';

		echo '<div class="rbelad-divider-wrapper" style="' . esc_attr( $align_class ) . '">';
		echo '<hr class="rbelad-divider" style="
			border: 0;
			border-top: ' . esc_attr( $weight ) . 'px ' . esc_attr( $style ) . ' ' . esc_attr( $color ) . ';
			width: ' . esc_attr( $width ) . '%;
			display: inline-block;
		" />';
		echo '</div>';
	}
}