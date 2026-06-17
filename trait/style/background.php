<?php
/**
 * Background Style Trait
 *
 * Handles solid, gradient & image background controls for Elementor widgets.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Background Style Trait
 */
trait RBELAD_Background_Style_Trait {

	/**
	 * Add background controls
	 *
	 * @param string $key add.
	 * @param array  $args add.
	 */
	protected function rbelad_background_style( string $key, array $args ) {

		/**
		 * Elementor widget instance.
		 *
		 * @var \Elementor\Widget_Base $this
		 */
		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $bg_key => $values ) {

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
			// TYPE CONTROL
			// =========================
			$this->add_control(
				$key . '_' . $bg_key . '_type',
				array(
					'label'     => esc_html__( 'Background Type', 'rb-addons-for-elementor' ),
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

						'image'    => array(
							'title' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-image',
						),

					),
					'condition' => $condition,
				)
			);

			// =========================
			// SOLID BACKGROUND
			// =========================
			$this->add_control(
				$key . '_' . $bg_key . '_color',
				array(
					'label'     => esc_html__( 'Background Color', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						$selector => 'background-color: {{VALUE}};',
					),
					'condition' => array_merge(
						(array) $condition,
						array(
							$key . '_' . $bg_key . '_type' => 'solid',
						)
					),
				)
			);

			// =========================
			// GRADIENT BACKGROUND
			// =========================
			$this->add_control(
				$key . '_' . $bg_key . '_gradient',
				array(
					'label'       => esc_html__( 'Gradient CSS', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'rows'        => 4,
					'placeholder' => 'linear-gradient(90deg, #ff0000 0%, #0000ff 100%)',

					'selectors'   => array(
						$selector => 'background: {{VALUE}};',
					),

					'condition'   => array_merge(
						(array) $condition,
						array(
							$key . '_' . $bg_key . '_type' => 'gradient',
						)
					),
				)
			);

			// =========================
			// IMAGE BACKGROUND
			// =========================
			$this->add_control(
				$key . '_' . $bg_key . '_image',
				array(
					'label'     => esc_html__( 'Background Image', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::MEDIA,
					'selectors' => array(
						$selector => 'background-image: url({{URL}});',
					),
					'condition' => array_merge(
						(array) $condition,
						array(
							$key . '_' . $bg_key . '_type' => 'image',
						)
					),
				)
			);

			// ==================================================
			// BACKGROUND SIZE
			// ==================================================
			$this->add_control(
				$key . '_background_size',
				array(
					'label'     => esc_html__( 'Background Size', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'cover',
					'options'   => array(
						'cover'   => esc_html__( 'Cover', 'rb-addons-for-elementor' ),
						'contain' => esc_html__( 'Contain', 'rb-addons-for-elementor' ),
						'custom'  => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
					),
					'selectors' => array(
						$selector => 'background-size: {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			// =========================
			// CUSTOM WIDTH
			// =========================
			$this->add_responsive_control(
				$key . '_background_custom_size',
				array(
					'label'              => esc_html__( 'Background Custom Size', 'rb-addons-for-elementor' ),
					'type'               => Controls_Manager::DIMENSIONS,
					'size_units'         => array( 'px', '%', 'vw', 'vh' ),
					'allowed_dimensions' => array( 'width', 'height' ),
					'isLinked'           => true,
					'selectors'          => array(
						$selector => 'background-size: {{WIDTH}}{{UNIT}} {{HEIGHT}}{{UNIT}};',
					),

					'condition'          => array_merge(
						(array) $condition,
						array(
							$key . '_background_size' => 'custom',
						)
					),
				)
			);

			// ==================================================
			// BACKGROUND POSITION
			// ==================================================
			$this->add_control(
				$key . '_background_position',
				array(
					'label'     => esc_html__( 'Background Position', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'center center',
					'options'   => array(
						'left top'      => esc_html__( 'Left Top', 'rb-addons-for-elementor' ),
						'left center'   => esc_html__( 'Left Center', 'rb-addons-for-elementor' ),
						'left bottom'   => esc_html__( 'Left Bottom', 'rb-addons-for-elementor' ),

						'center top'    => esc_html__( 'Center Top', 'rb-addons-for-elementor' ),
						'center center' => esc_html__( 'Center Center', 'rb-addons-for-elementor' ),
						'center bottom' => esc_html__( 'Center Bottom', 'rb-addons-for-elementor' ),

						'right top'     => esc_html__( 'Right Top', 'rb-addons-for-elementor' ),
						'right center'  => esc_html__( 'Right Center', 'rb-addons-for-elementor' ),
						'right bottom'  => esc_html__( 'Right Bottom', 'rb-addons-for-elementor' ),
					),
					'selectors' => array(
						$selector => 'background-position: {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			// ==================================================
			// EXTRA CONTROL (REPEAT)
			// ==================================================
			$this->add_control(
				$key . '_background_repeat',
				array(
					'label'     => esc_html__( 'Repeat', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'no-repeat',
					'options'   => array(
						'no-repeat' => esc_html__( 'No Repeat', 'rb-addons-for-elementor' ),
						'repeat'    => esc_html__( 'Repeat', 'rb-addons-for-elementor' ),
						'repeat-x'  => esc_html__( 'Repeat X', 'rb-addons-for-elementor' ),
						'repeat-y'  => esc_html__( 'Repeat Y', 'rb-addons-for-elementor' ),
					),
					'selectors' => array(
						$selector => 'background-repeat: {{VALUE}};',
					),
					'condition' => $condition,
				)
			);
		}
	}
}
