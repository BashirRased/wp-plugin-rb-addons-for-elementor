<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * RB Icon Widget
 */
class Icon extends Widget_Base {

	public function get_name() {
		return 'rbelad-icon';
	}

	public function get_title() {
		return esc_html__( 'RB Icon', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-star';
	}

	public function get_categories() {
		return [ 'rbelad_category' ];
	}

	public function get_keywords() {
		return [ 'icon', 'svg', 'font icon', 'rb' ];
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
			'icon',
			[
				'label' => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'rb-addons-for-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'https://example.com',
				'options'     => [ 'url', 'is_external', 'nofollow' ],
			]
		);

		$this->end_controls_section();

		/**
		 * Style Section
		 */
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'rb-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Icon Color', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .rbelad-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rbelad-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'size',
			[
				'label' => esc_html__( 'Size (px)', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .rbelad-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rbelad-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rbelad-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rbelad-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'radius',
			[
				'label' => esc_html__( 'Border Radius', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .rbelad-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render output
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$icon = $settings['icon'];

		$link = $settings['link'];

		$tag = 'div';

		if ( ! empty( $link['url'] ) ) {
			$tag = 'a';
		}

		$url      = ! empty( $link['url'] ) ? $link['url'] : '';
		$target   = ! empty( $link['is_external'] ) ? ' target="_blank"' : '';
		$nofollow = ! empty( $link['nofollow'] ) ? ' rel="nofollow"' : '';

		echo '<' . $tag . ' class="rbelad-icon" href="' . esc_url( $url ) . '"' . $target . $nofollow . '>';

		\Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );

		echo '</' . $tag . '>';
	}
}