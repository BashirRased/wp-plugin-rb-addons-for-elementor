<?php
/**
 * Color Style Trait
 *
 * Handles solid & gradient color controls for Elementor widgets.
 *
 * @package RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * RBELAD Color Style Trait
 */
trait RBELAD_Color_Style_Trait {

	/**
	 * Add color style controls.
	 *
	 * @param string $key  Control prefix key.
	 * @param array  $args Control arguments.
	 */
	protected function rbelad_color_style( string $key, array $args ) {
		/**
		 * Elementor widget instance.
		 *
		 * @var \Elementor\Widget_Base $this
		 */
		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $color_key => $values ) {

			// =========================
			// SELECTOR
			// =========================
			$selector = ! empty( $values['select_class'] )
				? $values['select_class']
				: '{{WRAPPER}}';

			// =========================
			// CONDITION
			// =========================
			$condition = ! empty( $values['condition'] )
				? $values['condition']
				: array();

			// =========================
			// LABEL
			// =========================
			$label = ! empty( $values['label'] )
				? $values['label']
				: esc_html__( 'Color Type', 'rb-addons-for-elementor' );

			$this->add_control(
				$key . '_color_heading',
				array(
					'label'       => esc_html__( 'Color Controls', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::HEADING,
					'label_block' => true,
					'ai'          => false,
					'classes'     => 'rbelad-editor-heading-control',
				)
			);

			// =========================
			// COLOR TYPE
			// =========================
			$this->add_control(
				$key . '_' . $color_key . '_type',
				array(
					'label'     => $label,
					'type'      => Controls_Manager::CHOOSE,
					'toggle'    => false,
					'default'   => 'solid',
					'options'   => array(

						'solid'    => array(
							'title' => esc_html__( 'Classic', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-paint-brush',
						),

						'gradient' => array(
							'title' => esc_html__( 'Gradient', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-barcode',
						),

					),
					'condition' => $condition,
				)
			);

			// =========================
			// SOLID COLOR
			// =========================
			$this->add_control(
				$key . '_' . $color_key,
				array(
					'label'     => esc_html__( 'Color', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						$selector => 'color: {{VALUE}};',
					),
					'condition' => array_merge(
						(array) $condition,
						array(
							$key . '_' . $color_key . '_type' => 'solid',
						)
					),
				)
			);

			// =========================
			// GRADIENT CONTROL
			// =========================
			$this->add_control(
				$key . '_' . $color_key . '_gradient',
				array(
					'label'       => esc_html__( 'Gradient CSS', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'rows'        => 4,
					'placeholder' => 'linear-gradient(90deg, #ff0000 0%, #00ffcc 50%, #0000ff 100%)',
					'description' => esc_html__( 'Add any CSS gradient value.', 'rb-addons-for-elementor' ),

					'selectors'   => array(
						$selector => '
							background: {{VALUE}};
							-webkit-background-clip: text;
							-webkit-text-fill-color: transparent;
							background-clip: text;
						',
					),

					'condition'   => array_merge(
						(array) $condition,
						array(
							$key . '_' . $color_key . '_type' => 'gradient',
						)
					),
				)
			);
		}
	}
}
