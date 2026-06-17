<?php
/**
 * Spacing Style Trait
 *
 * Handles margin & padding controls for Elementor widgets.
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
 * RBELAD Spacing Style Trait
 */
trait RBELAD_Spacing_Style_Trait {

	/**
	 * Add spacing controls.
	 *
	 * @param string $key  Control prefix key.
	 * @param array  $args Control arguments.
	 */
	protected function rbelad_spacing_style( string $key, array $args ) {
		/**
		 * Elementor widget instance.
		 *
		 * @var \Elementor\Widget_Base $this
		 */
		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $spacing_key => $values ) {

			// =========================
			// VALIDATE TYPE
			// =========================
			if ( ! in_array( $spacing_key, array( 'margin', 'padding' ), true ) ) {
				continue;
			}

			// =========================
			// CSS PROPERTY
			// =========================
			$css_property = str_replace( '_', '-', $spacing_key );

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

			$this->add_control(
				$key . '_spacing_heading',
				array(
					'label'       => esc_html__( 'Spacing Controls', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::HEADING,
					'label_block' => true,
					'ai'          => false,
					'classes'     => 'rbelad-editor-heading-control',
				)
			);

			// =========================
			// CONTROL
			// =========================
			$this->add_responsive_control(
				! empty( $values['id'] )
					? $values['id']
					: $key . '_' . $spacing_key,
				array(
					'label'      => ! empty( $values['label'] )
						? $values['label']
						: esc_html(
							ucwords(
								str_replace( '_', ' ', $spacing_key )
							)
						),

					'type'       => Controls_Manager::DIMENSIONS,

					'size_units' => ! empty( $values['size_units'] )
						? $values['size_units']
						: array( 'px', '%', 'em', 'rem' ),

					'default'    => ! empty( $values['default'] )
						? $values['default']
						: array(),

					'condition'  => $condition,

					'selectors'  => array(
						$selector => sprintf(
							'%1$s: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							esc_attr( $css_property )
						),
					),
				)
			);
		}
	}
}
