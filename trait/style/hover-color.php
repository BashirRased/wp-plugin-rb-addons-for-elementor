<?php
/**
 * Hover Color Style Trait
 *
 * Normal + Hover Color Controls
 *
 * @package RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait RBELAD_Hover_Color_Style_Trait {

	/**
	 * Add hover color style controls.
	 *
	 * @param string $key  Control key.
	 * @param array  $args Control args.
	 */
	protected function rbelad_hover_color_style( string $key, array $args ) {

		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $color_key => $values ) {

			// =========================
			// SELECTORS
			// =========================
			$selector = ! empty( $values['select_class'] )
				? $values['select_class']
				: '{{WRAPPER}}';

			$hover_selector = ! empty( $values['hover_select_class'] )
				? $values['hover_select_class']
				: $selector . ':hover';

			// =========================
			// CONDITIONS
			// =========================
			$condition = ! empty( $values['condition'] )
				? $values['condition']
				: array();

			// =========================
			// LABEL
			// =========================
			$label = ! empty( $values['label'] )
				? $values['label']
				: esc_html__( 'Color', 'rb-addons-for-elementor' );

			// =========================
			// START TABS
			// =========================
			$this->start_controls_tabs( $key . '_' . $color_key . '_tabs' );

			// ==================================================
			// NORMAL TAB
			// ==================================================
			$this->start_controls_tab(
				$key . '_' . $color_key . '_normal_tab',
				array(
					'label'     => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
					'condition' => $condition,
				)
			);

			// TYPE
			$this->add_control(
				$key . '_' . $color_key . '_type',
				array(
					'label'   => $label,
					'type'    => Controls_Manager::CHOOSE,
					'toggle'  => false,
					'default' => 'solid',
					'options' => array(

						'solid' => array(
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

			// SOLID COLOR
			$this->add_control(
				$key . '_' . $color_key,
				array(
					'label'     => esc_html__( 'Color', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						$selector => $color_key . ': {{VALUE}};',
					),
					'condition' => array_merge(
						(array) $condition,
						array(
							$key . '_' . $color_key . '_type' => 'solid',
						)
					),
				)
			);

			// GRADIENT
			$this->add_control(
				$key . '_' . $color_key . '_gradient',
				array(
					'label'       => esc_html__( 'Gradient CSS', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'rows'        => 4,
					'placeholder' => 'linear-gradient(90deg, #ff0000 0%, #0000ff 100%)',
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

			$this->end_controls_tab();

			// ==================================================
			// HOVER TAB
			// ==================================================
			$this->start_controls_tab(
				$key . '_' . $color_key . '_hover_tab',
				array(
					'label'     => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
					'condition' => $condition,
				)
			);

			// TYPE
			$this->add_control(
				$key . '_' . $color_key . '_hover_type',
				array(
					'label'   => $label,
					'type'    => Controls_Manager::CHOOSE,
					'toggle'  => false,
					'default' => 'solid',
					'options' => array(

						'solid' => array(
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

			// HOVER SOLID
			$this->add_control(
				$key . '_' . $color_key . '_hover',
				array(
					'label'     => esc_html__( 'Hover Color', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						$hover_selector => $color_key . ': {{VALUE}};',
					),
					'condition' => array_merge(
						(array) $condition,
						array(
							$key . '_' . $color_key . '_hover_type' => 'solid',
						)
					),
				)
			);

			// HOVER GRADIENT
			$this->add_control(
				$key . '_' . $color_key . '_hover_gradient',
				array(
					'label'       => esc_html__( 'Hover Gradient CSS', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'rows'        => 4,
					'selectors'   => array(
						$hover_selector => '
							background: {{VALUE}};
							-webkit-background-clip: text;
							-webkit-text-fill-color: transparent;
							background-clip: text;
						',
					),
					'condition'   => array_merge(
						(array) $condition,
						array(
							$key . '_' . $color_key . '_hover_type' => 'gradient',
						)
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();
		}
	}
}