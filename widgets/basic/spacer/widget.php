<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * RB Spacer Widget
 */
class Spacer extends Widget_Base {

	public function get_name() {
		return 'rbelad-spacer';
	}

	public function get_title() {
		return esc_html__( 'RB Spacer', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-spacer';
	}

	public function get_categories() {
		return [ 'rbelad_category' ];
	}

	public function get_keywords() {
		return [ 'spacer', 'space', 'gap', 'margin', 'rb' ];
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

		$this->add_responsive_control(
			'size',
			[
				'label' => esc_html__( 'Space (px)', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .rbelad-spacer' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render output
	 */
	protected function render() {

		echo '<div class="rbelad-spacer"></div>';
	}
}