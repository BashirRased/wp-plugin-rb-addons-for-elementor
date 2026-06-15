<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * RB Video Widget
 */
class Video extends Widget_Base {

	public function get_name() {
		return 'rbelad-video';
	}

	public function get_title() {
		return esc_html__( 'RB Video', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-video-camera';
	}

	public function get_categories() {
		return [ 'rbelad_category' ];
	}

	public function get_keywords() {
		return [ 'video', 'youtube', 'vimeo', 'media', 'rb' ];
	}

	/**
	 * Register controls
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
			'video_url',
			[
				'label'       => esc_html__( 'Video URL', 'rb-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 'https://www.youtube.com/watch?v=xxxx',
				'default'     => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => esc_html__( 'Autoplay', 'rb-addons-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => 'Yes',
				'label_off'    => 'No',
				'return_value' => 'yes',
				'default'      => '',
			]
		);

		$this->add_control(
			'loop',
			[
				'label'        => esc_html__( 'Loop', 'rb-addons-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => 'Yes',
				'label_off'    => 'No',
				'return_value' => 'yes',
				'default'      => '',
			]
		);

		$this->add_control(
			'mute',
			[
				'label'        => esc_html__( 'Mute', 'rb-addons-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => 'Yes',
				'label_off'    => 'No',
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render output
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['video_url'] ) ) {
			return;
		}

		$url = $settings['video_url'];

		$args = [];

		if ( 'yes' === $settings['autoplay'] ) {
			$args[] = 'autoplay=1';
		}

		if ( 'yes' === $settings['loop'] ) {
			$args[] = 'loop=1';
		}

		if ( 'yes' === $settings['mute'] ) {
			$args[] = 'mute=1';
		}

		// Convert YouTube URL to embed (simple version)
		$embed_url = str_replace(
			[ 'watch?v=', 'youtu.be/' ],
			[ 'embed/', 'www.youtube.com/embed/' ],
			$url
		);

		if ( ! empty( $args ) ) {
			$embed_url .= '?' . implode( '&', $args );
		}

		echo '<div class="rbelad-video-wrapper" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">';
		echo '<iframe 
				src="' . esc_url( $embed_url ) . '" 
				style="position:absolute;top:0;left:0;width:100%;height:100%;"
				frameborder="0"
				allow="autoplay; encrypted-media"
				allowfullscreen>
			</iframe>';
		echo '</div>';
	}
}