<?php

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait RBELAD_Flex_Style_Trait {

	/**
	 * Flex Layout Controls
	 *
	 * @param string $key  Control prefix key.
	 * @param array  $args Control args.
	 */
	protected function rbelad_flex_style( string $key, array $args ) {

		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $values ) {

			// =========================
			// SELECTOR
			// =========================
			$selector = ! empty( $values['select_class'] )
				? $values['select_class']
				: '{{WRAPPER}}';

			$condition = ! empty( $values['condition'] )
				? $values['condition']
				: array();

			// =========================
			// FLEX WRAPPER NOTICE (optional)
			// =========================
			$this->add_control(
				$key . '_flex_heading',
				array(
					'label'     => esc_html__( 'Flex Layout', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'condition' => $condition,
				)
			);

			// =========================
			// FLEX DIRECTION
			// =========================
			$this->add_control(
				$key . '_flex_direction',
				array(
					'label'     => esc_html__( 'Direction', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'options' => array(
						'row' => array(
							'title' => 'Row',
							'icon'  => 'eicon-arrow-right',
						),
						'row-reverse' => array(
							'title' => 'Row Reverse',
							'icon'  => 'eicon-arrow-left',
						),
						'column' => array(
							'title' => 'Column',
							'icon'  => 'eicon-arrow-down',
						),
						'column-reverse' => array(
							'title' => 'Column Reverse',
							'icon'  => 'eicon-arrow-up',
						),
					),
					'default'   => 'row',
					'selectors' => array(
						$selector => 'display:flex; flex-direction: {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			// =========================
			// JUSTIFY CONTENT
			// =========================
			$this->add_control(
				$key . '_justify_content',
				array(
					'label'     => esc_html__( 'Justify Content', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'options' => array(
						'flex-start' => array(
							'title' => 'Start',
							'icon'  => 'eicon-h-align-left',
						),
						'center' => array(
							'title' => 'Center',
							'icon'  => 'eicon-h-align-center',
						),
						'flex-end' => array(
							'title' => 'End',
							'icon'  => 'eicon-h-align-right',
						),
						'space-between' => array(
							'title' => 'Space Between',
							'icon'  => 'eicon-justify-space-between-h',
						),
						'space-around' => array(
							'title' => 'Space Around',
							'icon'  => 'eicon-justify-space-around-h',
						),
						'space-evenly' => array(
							'title' => 'Space Evenly',
							'icon'  => 'eicon-justify-space-evenly-h',
						),
					),
					'default'   => 'flex-start',
					'selectors' => array(
						$selector => 'justify-content: {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			// =========================
			// ALIGN ITEMS
			// =========================
			$this->add_control(
				$key . '_align_items',
				array(
					'label'     => esc_html__( 'Align Items', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'options' => array(
						'flex-start' => array(
							'title' => 'Start',
							'icon'  => 'eicon-v-align-top',
						),
						'center' => array(
							'title' => 'Center',
							'icon'  => 'eicon-v-align-middle',
						),
						'flex-end' => array(
							'title' => 'End',
							'icon'  => 'eicon-v-align-bottom',
						),
						'stretch' => array(
							'title' => 'Stretch',
							'icon'  => 'eicon-v-align-stretch',
						),
						'baseline' => array(
							'title' => 'Baseline',
							'icon'  => 'eicon-vertical-align',
						),
					),
					'default'   => 'stretch',
					'selectors' => array(
						$selector => 'align-items: {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			// =========================
			// GAP (LINKED / UNLINKED)
			// =========================
			$this->add_responsive_control(
				$key . '_gap',
				array(
					'label'           => esc_html__( 'Gap', 'rb-addons-for-elementor' ),
					'type'            => Controls_Manager::DIMENSIONS,
					'size_units'      => array( 'px', 'em', 'rem', '%' ),
					'separator'       => 'default',
					'allowed_dimensions' => array( 'row-gap', 'column-gap' ),
					'selectors'       => array(
						$selector => 'gap: {{ROW}}{{UNIT}} {{COLUMN}}{{UNIT}};',
					),
					'condition'       => $condition,
				)
			);

			// =========================
			// OPTIONAL: FLEX WRAP
			// =========================
			$this->add_control(
				$key . '_flex_wrap',
				array(
					'label'     => esc_html__( 'Wrap', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'options'   => array(
						'nowrap' => 'No Wrap',
						'wrap'   => 'Wrap',
						'wrap-reverse' => 'Wrap Reverse',
					),
					'default'   => is_rtl() ? 'wrap-reverse' : 'wrap',
					'selectors' => array(
						$selector => 'flex-wrap: {{VALUE}};',
					),
					'condition' => $condition,
				)
			);
		}
	}
}