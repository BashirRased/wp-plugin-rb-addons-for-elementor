<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * RB Google Maps Widget
 */
class Google_Maps extends Widget_Base {

	public function get_name() {
		return 'rbelad-google-maps';
	}

	public function get_title() {
		return esc_html__( 'RB Google Maps', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'rbelad_category' ];
	}

	public function get_keywords() {
		return [ 'map', 'google', 'location', 'rb' ];
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
			'address',
			[
				'label'       => esc_html__( 'Location Address', 'rb-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 'Dhaka, Bangladesh',
				'default'     => 'Dhaka, Bangladesh',
			]
		);

		$this->add_control(
			'zoom',
			[
				'label' => esc_html__( 'Zoom Level', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::NUMBER,
				'min'   => 1,
				'max'   => 20,
				'default' => 10,
			]
		);

		$this->add_control(
			'height',
			[
				'label' => esc_html__( 'Height (px)', 'rb-addons-for-elementor' ),
				'type'  => Controls_Manager::NUMBER,
				'default' => 300,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render output
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['address'] ) ) {
			return;
		}

		$address = urlencode( $settings['address'] );
		$zoom    = ! empty( $settings['zoom'] ) ? $settings['zoom'] : 10;
		$height  = ! empty( $settings['height'] ) ? $settings['height'] : 300;

		$map_url = "https://www.google.com/maps?q={$address}&output=embed&z={$zoom}";

		echo '<div class="rbelad-google-map" style="width:100%;height:' . esc_attr( $height ) . 'px;">';
		echo '<iframe 
				width="100%" 
				height="100%" 
				style="border:0;"
				loading="lazy"
				allowfullscreen
				referrerpolicy="no-referrer-when-downgrade"
				src="' . esc_url( $map_url ) . '">
			</iframe>';
		echo '</div>';
	}
}