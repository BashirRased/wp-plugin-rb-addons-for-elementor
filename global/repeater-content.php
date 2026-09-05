<?php
/**
 * All repeater controls load file.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

// Start Repeater.
$repeater = new Repeater(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$title_field_id = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$controls = ! empty( $rbelad_args['controls'] ) ? $rbelad_args['controls'] : array(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
if ( ! empty( $controls ) && is_array( $controls ) ) {
	foreach ( $controls as $rbelad_key => $rbelad_values ) {
		if ( ! is_array( $rbelad_values ) || empty( $rbelad_values['id'] ) ) {
			continue;
		}

		$field_id = $rbelad_values['id']; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		// Auto-detect title_field ID from the first text/text_2/text_3.
		if ( empty( $title_field_id ) && in_array( $rbelad_key, array( 'text', 'text_2', 'text_3' ), true ) ) {
			$title_field_id = $field_id; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		}

		switch ( $rbelad_key ) {

			// Text.
			case 'text':
			case 'text_2':
			case 'text_3':
				$repeater->add_control(
					$field_id,
					array(
						'label'       => $rbelad_values['label'] ?? esc_html__( 'Text', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'label_block' => $rbelad_values['label_block'] ?? true,
						'default'     => $rbelad_values['default'] ?? esc_html__( 'Text', 'rb-addons-for-elementor' ),
						'ai'          => false,
						'condition'   => $rbelad_values['condition'] ?? array(),
					)
				);
				break;

			case 'textarea':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'textarea',
					array(
						'label'       => $rbelad_values['label'] ?? esc_html__( 'Text', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'label_block' => $rbelad_values['label_block'] ?? true,
						'default'     => $rbelad_values['default'] ?? esc_html__( 'Text', 'rb-addons-for-elementor' ),
						'ai'          => false,
						'condition'   => $rbelad_values['condition'] ?? array(),
					)
				);
				break;

			// Switcher.
			case 'switch':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'switch',
					array(
						'label'        => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Show', 'rb-addons-for-elementor' ),
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => esc_html__( 'Show', 'rb-addons-for-elementor' ),
						'label_off'    => esc_html__( 'Hide', 'rb-addons-for-elementor' ),
						'return_value' => 'yes',
						'default'      => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'yes',
						'condition'    => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			// Select.
			case 'select':
			case 'select_2':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'select',
					array(
						'label'     => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Select Item', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::SELECT,
						'options'   => ! empty( $rbelad_values['options'] ) ? $rbelad_values['options'] : array(),
						'default'   => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : '',
						'condition' => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			// Icon.
			case 'icon':
			case 'icon_2':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'icon',
					array(
						'label'     => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Icon', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::ICONS,
						'default'   => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : array(),
						'condition' => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			case 'icon_img':
				// Choose type.
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Choose Type', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::CHOOSE,
						'label_block' => isset( $rbelad_values['label_block'] ) ? $rbelad_values['label_block'] : false,
						'options'     => array(
							'icon'  => array(
								'title' => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
								'icon'  => 'eicon-star',
							),
							'image' => array(
								'title' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
								'icon'  => 'eicon-image',
							),
						),
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'icon',
					)
				);

				break;

			case 'icon_position':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] )
							? $rbelad_values['label']
							: esc_html__( 'Icon Position', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::CHOOSE,
						'label_block' => isset( $rbelad_values['label_block'] )
							? $rbelad_values['label_block']
							: false,
						'toggle'      => false,
						'options'     => array(
							'left'  => array(
								'title' => esc_html__( 'Left', 'rb-addons-for-elementor' ),
								'icon'  => 'eicon-h-align-left',
							),
							'right' => array(
								'title' => esc_html__( 'Right', 'rb-addons-for-elementor' ),
								'icon'  => 'eicon-h-align-right',
							),
						),
						'default'     => ! empty( $rbelad_values['default'] )
							? $rbelad_values['default']
							: 'right',
						'condition'   => ! empty( $rbelad_values['condition'] )
							? $rbelad_values['condition']
							: array(),
					)
				);
				break;

			// Image.
			case 'img':
			case 'img_2':
			case 'img_3':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'img',
					array(
						'label'     => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Upload Image', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::MEDIA,
						'default'   => array( 'url' => Utils::get_placeholder_image_src() ),
						'condition' => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			// Select Page.
			case 'page_link':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'page_link',
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Select Page', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => true,
						'options'     => function_exists( 'rbelad_get_all_pages' ) ? rbelad_get_all_pages() : array(),
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			// Custom Link.
			case 'custom_link':
			case 'custom_link_2':
				$repeater->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : 'custom_link',
					array(
						'label'     => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
						'type'      => Controls_Manager::URL,
						'ai'        => false,
						'condition' => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;
		}
	}
}

$title_field = '{{{ ' . ( $rbelad_args['title_field_id'] ?? $title_field_id ?? 'item' ) . ' }}}'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$this->add_control(
	$rbelad_args['id'] ?? 'repeater',
	array(
		'label'       => $rbelad_args['label'] ?? esc_html__( 'Item List', 'rb-addons-for-elementor' ),
		'type'        => Controls_Manager::REPEATER,
		'fields'      => $repeater->get_controls(),
		'default'     => $rbelad_args['default'] ?? array(),
		'title_field' => $rbelad_args['title_field'] ?? $title_field,
		'condition'   => $rbelad_args['condition'] ?? array(),
	)
);
