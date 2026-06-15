<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Basic Heading Widget
 */
class Heading extends Widget_Base {

	public function get_name() {
		return 'rbelad-heading';
	}

	public function get_title() {
		return esc_html__( 'Heading', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_categories() {
		return array( 'rbelad_category' );
	}

	public function get_keywords() {
		return array( 'heading', 'title', 'text', 'rbelad' );
	}

	/**
	 * Register controls
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Heading', 'rb-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'rb-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'rb-addons-for-elementor' ),
			)
		);

		$this->add_control(
			'html_tag',
			array(
				'label'   => esc_html__( 'HTML Tag', 'rb-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				),
				'default' => 'h2',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render output
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$tag   = $settings['html_tag'];
		$title = $settings['title'];

		echo '<' . esc_html( $tag ) . ' class="rbelad-heading">';
		echo esc_html( $title );
		echo '</' . esc_html( $tag ) . '>';
	}
}
