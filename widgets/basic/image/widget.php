<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * RB Image Widget
 */
class Image extends Widget_Base {

	public function get_name() {
		return 'rbelad-image';
	}

	public function get_title() {
		return esc_html__( 'RB Image', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_categories() {
		return [ 'rbelad_category' ];
	}

	public function get_keywords() {
		return [ 'image', 'photo', 'rb', 'media' ];
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
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'rb-addons-for-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
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
	}

	/**
	 * Render output
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['image']['url'] ) ) {
			return;
		}

		$image_html = '<img src="' . esc_url( $settings['image']['url'] ) . '" alt="">';

		if ( ! empty( $settings['link']['url'] ) ) {

			$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

			echo '<a href="' . esc_url( $settings['link']['url'] ) . '"' . $target . $nofollow . '>';
			echo $image_html;
			echo '</a>';

		} else {
			echo $image_html;
		}
	}
}