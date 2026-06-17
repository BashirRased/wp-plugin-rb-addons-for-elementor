<?php
/**
 * Select Link Trait
 *
 * Handles custom select link controls for Elementor widgets.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;

/**
 * Trait: Select Link Type Controls
 */
trait RBELAD_Select_Link_Type_Trait {
	/**
	 * Select Link Type Controls
	 *
	 * @param string $prefix Control prefix.
	 * @param array  $args   Control arguments.
	 */
	protected function rbelad_select_link_type( string $prefix, array $args ) {
		/**
		 * Link Controls
		 *
		 * @var \Elementor\Widget_Base $this
		 */
		$controls = $args['controls'] ?? array();

		if ( ! is_array( $controls ) || empty( $controls ) ) {
			return;
		}

		if ( ! empty( $controls ) && is_array( $controls ) ) {

			foreach ( $controls as $key => $values ) {

				$rbelad_name      = ! empty( $values['name'] ) ? $values['name'] : 'link';
				$rbelad_condition = ! empty( $values['condition'] ) ? $values['condition'] : array();

				// =====================================
				// SELECT LINK TYPE
				// =====================================
				$this->add_control(
					$prefix . '_' . $rbelad_name . '_select_option',
					array(
						'label'       => $values['label'] ?? esc_html__( 'Select Link Type', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => true,
						'options'     => ! empty( $values['options'] ) ? $values['options'] : array(
							'none'        => esc_html__( 'None', 'rb-addons-for-elementor' ),
							'page_link'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
							'post_link'   => esc_html__( 'Post Link', 'rb-addons-for-elementor' ),
							'custom_link' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
						),
						'default'     => $values['default'] ?? 'none',
						'condition'   => $rbelad_condition,
					)
				);

				// =====================================
				// PAGE LINK
				// =====================================
				$page_options = ! empty( $values['page_options'] )
					? $values['page_options']
					: rbelad_get_all_pages();

				$this->add_control(
					$prefix . '_' . $rbelad_name . '_page_link',
					array(
						'label'       => esc_html__( 'Select Page', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => true,
						'options'     => $page_options,
						'default'     => ! empty( $page_options ) ? array_key_first( $page_options ) : '',
						'condition'   => array_merge(
							(array) $rbelad_condition,
							array(
								$prefix . '_' . $rbelad_name . '_select_option' => 'page_link',
							)
						),
					)
				);

				// =====================================
				// POST LINK
				// =====================================
				$post_options = ! empty( $values['post_options'] )
					? $values['post_options']
					: rbelad_get_all_posts();

				$this->add_control(
					$prefix . '_' . $rbelad_name . '_post_link',
					array(
						'label'       => esc_html__( 'Select Post', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => true,
						'options'     => $post_options,
						'default'     => ! empty( $post_options ) ? array_key_first( $post_options ) : '',
						'condition'   => array_merge(
							(array) $rbelad_condition,
							array(
								$prefix . '_' . $rbelad_name . '_select_option' => 'post_link',
							)
						),
					)
				);

				// =====================================
				// CUSTOM LINK
				// =====================================
				$this->add_control(
					$prefix . '_' . $rbelad_name . '_custom_link',
					array(
						'label'       => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::URL,
						'ai'          => false,
						'label_block' => true,
						'placeholder' => esc_html__( 'Enter your URL', 'rb-addons-for-elementor' ),
						'options'     => array( 'url', 'is_external', 'nofollow', 'custom_attributes' ),
						'default'     => array(
							'url'               => ! empty( $values['default']['url'] )
								? $values['default']['url']
								: esc_url( '#' ),

							'is_external'       => isset( $values['default']['is_external'] )
								? $values['default']['is_external']
								: true,

							'nofollow'          => isset( $values['default']['nofollow'] )
								? $values['default']['nofollow']
								: true,

							'custom_attributes' => ! empty( $values['default']['custom_attributes'] )
								? $values['default']['custom_attributes']
								: '',
						),
						'condition'   => array_merge(
							(array) $rbelad_condition,
							array(
								$prefix . '_' . $rbelad_name . '_select_option' => 'custom_link',
							)
						),
					)
				);
			}
		}
	}
}
