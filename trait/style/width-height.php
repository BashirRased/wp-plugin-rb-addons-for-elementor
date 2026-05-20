<?php
/**
 * Height Width Trait
 *
 * Handles width & height controls for Elementor widgets.
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
 * RBELAD Height Width Trait
 */
trait RBELAD_Height_Width_Trait {

	/**
	 * Add width & height controls.
	 *
	 * @param string $key  Control prefix key.
	 * @param array  $args Control arguments.
	 */
	protected function rbelad_height_width_style( string $key, array $args ) {

		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $size_key => $values ) {

			// =========================
			// ALLOWED SIZE TYPES
			// =========================
			if (
				! in_array(
					$size_key,
					array(
						'width',
						'min_width',
						'max_width',
						'height',
						'min_height',
						'max_height',
					),
					true
				)
			) {
				continue;
			}

			// =========================
			// CSS PROPERTY
			// =========================
			$css_property = str_replace( '_', '-', $size_key );

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
			// CONTROL
			// =========================
			$this->add_responsive_control(
				! empty( $values['id'] )
					? $values['id']
					: $key . '_' . $size_key,
				array(
					'label'      => ! empty( $values['label'] )
						? $values['label']
						: esc_html(
							ucwords(
								str_replace( '_', ' ', $size_key )
							)
						),

					'type'       => Controls_Manager::SLIDER,

					'size_units' => ! empty( $values['size_units'] )
						? $values['size_units']
						: array( 'px', '%', 'em', 'rem', 'vw', 'vh' ),

					'range'      => ! empty( $values['range'] )
						? $values['range']
						: array(
							'px' => array(
								'min' => 0,
								'max' => 2000,
							),
							'%'  => array(
								'min' => 0,
								'max' => 100,
							),
							'vw' => array(
								'min' => 0,
								'max' => 100,
							),
							'vh' => array(
								'min' => 0,
								'max' => 100,
							),
						),

					'default'    => ! empty( $values['default'] )
						? $values['default']
						: array(),

					'condition'  => $condition,

					'selectors'  => array(
						$selector => sprintf(
							'%1$s: {{SIZE}}{{UNIT}};',
							esc_attr( $css_property )
						),
					),
				)
			);
		}
	}
}
