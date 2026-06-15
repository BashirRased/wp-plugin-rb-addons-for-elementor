<?php

namespace RBELAD_Elementor_Addons\Widgets\Basic;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * RB Text Editor Widget
 */
class Text_Editor extends Widget_Base {

	public function get_name() {
		return 'rbelad-text-editor';
	}

	public function get_title() {
		return esc_html__( 'RB Text Editor', 'rb-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	public function get_categories() {
		return [ 'rbelad_category' ];
	}

	public function get_keywords() {
		return [ 'text', 'editor', 'paragraph', 'content', 'rb' ];
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
			'content',
			[
				'label'   => esc_html__( 'Text', 'rb-addons-for-elementor' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Add your text here...', 'rb-addons-for-elementor' ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render output
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['content'] ) ) {
			return;
		}

		echo '<div class="rbelad-text-editor">';
		echo wp_kses_post( $settings['content'] );
		echo '</div>';
	}
}