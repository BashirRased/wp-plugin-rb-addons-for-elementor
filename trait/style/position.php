<?php
/**
 * Position Trait
 *
 * Handles position controls for Elementor widgets.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Position Trait
 */
trait RBELAD_Position_Trait {

	/**
	 * Add position controls.
	 *
	 * @param string $prefix Control prefix.
	 * @param array  $args   Control arguments.
	 */
	protected function rbelad_position_controls( string $prefix, array $args ) {
		/**
		 * Elementor widget instance.
		 *
		 * @var \Elementor\Widget_Base $this
		 */
		$selector = $args['selector'] ?? array();

		if ( empty( $selector ) || ! is_array( $selector ) ) {
			return;
		}

		/**
		 * Position Type
		 */
		$this->add_responsive_control(
			$prefix . '_position',
			array(
				'label'     => esc_html__( 'Position', 'rb-addons-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'static'   => esc_html__( 'Static', 'rb-addons-for-elementor' ),
					'relative' => esc_html__( 'Relative', 'rb-addons-for-elementor' ),
					'absolute' => esc_html__( 'Absolute', 'rb-addons-for-elementor' ),
				),
				'default'   => 'static',
				'selectors' => array(
					$selector => 'position: {{VALUE}};',
				),
			)
		);

		/**
		 * Top
		 */
		$this->add_responsive_control(
			$prefix . '_top',
			array(
				'label'      => esc_html__( 'Top', 'rb-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem' ),
				'condition'  => array(
					$prefix . '_position' => array(
						'relative',
						'absolute',
					),
				),
				'selectors'  => array(
					$selector => 'top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		/**
		 * Right
		 */
		$this->add_responsive_control(
			$prefix . '_right',
			array(
				'label'      => esc_html__( 'Right', 'rb-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem' ),
				'condition'  => array(
					$prefix . '_position' => array(
						'relative',
						'absolute',
					),
				),
				'selectors'  => array(
					$selector => 'right: {{SIZE}}{{UNIT}};',
				),
			)
		);

		/**
		 * Bottom
		 */
		$this->add_responsive_control(
			$prefix . '_bottom',
			array(
				'label'      => esc_html__( 'Bottom', 'rb-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem' ),
				'condition'  => array(
					$prefix . '_position' => array(
						'relative',
						'absolute',
					),
				),
				'selectors'  => array(
					$selector => 'bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		/**
		 * Left
		 */
		$this->add_responsive_control(
			$prefix . '_left',
			array(
				'label'      => esc_html__( 'Left', 'rb-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem' ),
				'condition'  => array(
					$prefix . '_position' => array(
						'relative',
						'absolute',
					),
				),
				'selectors'  => array(
					$selector => 'left: {{SIZE}}{{UNIT}};',
				),
			)
		);
	}
}
