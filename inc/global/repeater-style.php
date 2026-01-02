<?php
/**
 * All repeater controls load file.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly..
}

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

// Start Repeater.
$repeater = new Repeater();

$title_field_id = ''; // empty by default.

$controls = ! empty( $args['controls'] ) ? $args['controls'] : array();
if ( ! empty( $controls ) && is_array( $controls ) ) {
	foreach ( $controls as $key => $values ) {
		if ( ! is_array( $values ) || empty( $values['id'] ) ) {
			continue;
		}

		$field_id = $values['id'];

		// Auto-detect title_field ID from the first text/text_2/text_3.
		if ( empty( $title_field_id ) && in_array( $key, array( 'text', 'text_2', 'text_3' ), true ) ) {
			$title_field_id = $field_id;
		}

		switch ( $key ) {

			// Text.
			case 'text':
			case 'text_2':
			case 'text_3':
				$repeater->add_control(
					$field_id,
					array(
						'label'       => $values['label'] ?? esc_html__( 'Text', 'rb-elementor-addons' ),
						'type'        => Controls_Manager::TEXT,
						'label_block' => $values['label_block'] ?? true,
						'default'     => $values['default'] ?? esc_html__( 'Text', 'rb-elementor-addons' ),
						'ai'          => false,
						'condition'   => $values['condition'] ?? array(),
					)
				);
				break;

			case 'textarea':
				$repeater->add_control(
					! empty( $values['id'] ) ? $values['id'] : 'textarea',
					array(
						'label'       => $values['label'] ?? esc_html__( 'Text', 'rb-elementor-addons' ),
						'type'        => Controls_Manager::TEXTAREA,
						'label_block' => $values['label_block'] ?? true,
						'default'     => $values['default'] ?? esc_html__( 'Text', 'rb-elementor-addons' ),
						'ai'          => false,
						'condition'   => $values['condition'] ?? array(),
					)
				);
				break;

			// Switcher.
			case 'switch':
				$repeater->add_control(
					! empty( $values['id'] ) ? $values['id'] : 'switch',
					array(
						'label'        => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Show', 'rb-elementor-addons' ),
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => esc_html__( 'Show', 'rb-elementor-addons' ),
						'label_off'    => esc_html__( 'Hide', 'rb-elementor-addons' ),
						'return_value' => 'yes',
						'default'      => ! empty( $values['default'] ) ? $values['default'] : 'yes',
						'condition'    => ! empty( $values['condition'] ) ? $values['condition'] : array(),
					)
				);
				break;

			// Select.
			case 'select':
			case 'select_2':
				$repeater->add_control(
					! empty( $values['id'] ) ? $values['id'] : 'select',
					array(
						'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Select Item', 'rb-elementor-addons' ),
						'type'      => Controls_Manager::SELECT,
						'options'   => ! empty( $values['options'] ) ? $values['options'] : array(),
						'default'   => ! empty( $values['default'] ) ? $values['default'] : '',
						'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
					)
				);
				break;

			// Icon.
			case 'icon':
			case 'icon_2':
				$repeater->add_control(
					! empty( $values['id'] ) ? $values['id'] : 'icon',
					array(
						'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Icon', 'rb-elementor-addons' ),
						'type'      => Controls_Manager::ICONS,
						'default'   => ! empty( $values['default'] ) ? $values['default'] : array(),
						'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
					)
				);
				break;

			// Image.
			case 'img':
			case 'img_2':
				$repeater->add_control(
					! empty( $values['id'] ) ? $values['id'] : 'img',
					array(
						'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Upload Image', 'rb-elementor-addons' ),
						'type'      => Controls_Manager::MEDIA,
						'default'   => array( 'url' => Utils::get_placeholder_image_src() ),
						'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
					)
				);
				break;

			// Select Page.
			case 'page_link':
				$repeater->add_control(
					! empty( $values['id'] ) ? $values['id'] : 'page_link',
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Select Page', 'rb-elementor-addons' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => true,
						'options'     => rbelad_get_all_pages(),
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
					)
				);
				break;

			// Custom Link.
			case 'custom_link':
				$repeater->add_control(
					! empty( $values['id'] ) ? $values['id'] : 'custom_link',
					array(
						'label'     => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Custom Link', 'rb-elementor-addons' ),
						'type'      => Controls_Manager::URL,
						'ai'        => false,
						'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
					)
				);
				break;
		}
	}
}

$title_field = '{{{ ' . ( $args['title_field_id'] ?? $title_field_id ?? 'item' ) . ' }}}';

$this->add_control(
	$args['id'] ?? 'repeater',
	array(
		'label'       => $args['label'] ?? esc_html__( 'Item List', 'rb-elementor-addons' ),
		'type'        => Controls_Manager::REPEATER,
		'fields'      => $repeater->get_controls(),
		'default'     => $args['default'] ?? array(),
		'title_field' => $args['title_field'] ?? $title_field,
		'condition'   => $args['condition'] ?? array(),
	)
);
