<?php
/**
 * All style controls
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

$rbelad_controls = ! empty( $args['controls'] ) ? $args['controls'] : array();
if ( ! empty( $rbelad_controls ) && is_array( $rbelad_controls ) ) {
	foreach ( $rbelad_controls as $rbelad_key => $rbelad_values ) {
		/**
		 * Control values.
		 *
		 * @var array<string, mixed> $rbelad_values
		 */
		switch ( $rbelad_key ) {
			/**
			 * =========================
			 * CHOOSE DESIGN
			 * =========================
			 */
			case 'choose_design':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Choose Design', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::VISUAL_CHOICE,
						'label_block' => true,
						'options'     => ! empty( $rbelad_values['options'] ) ? $rbelad_values['options'] : array(),
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'style-1',
						'columns'     => ! empty( $rbelad_values['columns'] ) ? $rbelad_values['columns'] : 2,
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
						'selectors'   => ! empty( $rbelad_values['selectors'] ) ? $rbelad_values['selectors'] : array(),
					)
				);
				break;

			/**
			 * =========================
			 * HEADING
			 * =========================
			 */
			case 'heading':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Heading', 'rb-addons-for-elementor' ),
						'label_block' => true,
						'type'        => Controls_Manager::HEADING,
						'ai'          => false,
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : '',
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
						'classes'     => 'rbelad-editor-heading-control',
					)
				);
				break;

			/**
				 * =========================
				 * TEXT
				 * =========================
				 */
			case 'text':
			case 'text_2':
			case 'text_3':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Text', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'ai'          => false,
						'label_block' => true,
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : '',
						'placeholder' => ! empty( $rbelad_values['placeholder'] ) ? $rbelad_values['placeholder'] : '',
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * TEXTAREA
				 * =========================
				 */
			case 'textarea':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Textarea', 'rb-addons-for-elementor' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'ai'          => false,
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : '',
						'placeholder' => ! empty( $rbelad_values['placeholder'] ) ? $rbelad_values['placeholder'] : '',
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * Text Editor
				 * =========================
				 */
			case 'text_editor':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Text Editor', 'rb-addons-for-elementor' ),
						'label_block' => true,
						'type'        => Controls_Manager::WYSIWYG,
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : '',
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * HTML TAG
				 * =========================
				 */
			case 'html_tag':
				$rbelad_options = array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				);

				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'HTML Tag', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => true,
						'options'     => $rbelad_options,
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'div',
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * HEADING TAG
				 * =========================
				 */
			case 'heading_tag':
			case 'choose':
				// Default options for heading tags.
				if ( 'heading_tag' === $rbelad_key ) {
					$rbelad_options = array(
						'h1' => array(
							'title' => esc_html__( 'H1', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-editor-h1',
						),
						'h2' => array(
							'title' => esc_html__( 'H2', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-editor-h2',
						),
						'h3' => array(
							'title' => esc_html__( 'H3', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-editor-h3',
						),
						'h4' => array(
							'title' => esc_html__( 'H4', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-editor-h4',
						),
						'h5' => array(
							'title' => esc_html__( 'H5', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-editor-h5',
						),
						'h6' => array(
							'title' => esc_html__( 'H6', 'rb-addons-for-elementor' ),
							'icon'  => 'eicon-editor-h6',
						),
					);

					$rbelad_default = ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'h2';
					$rbelad_label   = ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Heading Tag', 'rb-addons-for-elementor' );

				} else {

					$rbelad_options = ! empty( $rbelad_values['options'] ) ? $rbelad_values['options'] : array();
					$rbelad_default = ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : '';
					$rbelad_label   = ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Choose', 'rb-addons-for-elementor' );
				}

				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => $rbelad_label,
						'type'        => Controls_Manager::CHOOSE,
						'label_block' => false,
						'toggle'      => false,
						'options'     => $rbelad_options,
						'default'     => $rbelad_default,
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * SWITCH
				 * =========================
				 */
			case 'switch':
			case 'switch_2':
			case 'switch_3':
			case 'switch_4':
			case 'switch_5':
			case 'switch_6':
			case 'switch_7':
			case 'switch_8':
			case 'switch_9':
			case 'switch_10':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'        => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Switcher', 'rb-addons-for-elementor' ),
						'description'  => $rbelad_values['description'] ?? '',
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => esc_html__( 'Show', 'rb-addons-for-elementor' ),
						'label_off'    => esc_html__( 'Hide', 'rb-addons-for-elementor' ),
						'return_value' => 'yes',
						'default'      => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'yes',
						'condition'    => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * SELECT OPTION
				 * =========================
				 */
			case 'select_option':
			case 'select_option_2':
			case 'select_option_3':
				$rbelad_options = ! empty( $rbelad_values['options'] ) ? $rbelad_values['options'] : array();
				$this->add_control(
					$rbelad_values['id'] ?? $rbelad_key,
					array(
						'label'       => $rbelad_values['label'] ?? esc_html__( 'Select Option', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => $rbelad_values['label_block'] ?? false,
						'options'     => $rbelad_options,
						'default'     => $rbelad_values['default'] ?? '',
						'description' => $rbelad_values['description'] ?? '',
						'condition'   => $rbelad_values['condition'] ?? array(),
					)
				);
				break;

			/**
				 * =========================
				 * MULTI SELECT
				 * =========================
				 */
			case 'multi_select':
				$rbelad_options = ! empty( $rbelad_values['options'] ) ? $rbelad_values['options'] : array();
				$this->add_control(
					$rbelad_values['id'] ?? $rbelad_key,
					array(
						'label'          => $rbelad_values['label'] ?? esc_html__( 'Select Option', 'rb-addons-for-elementor' ),
						'type'           => Controls_Manager::SELECT2,
						'label_block'    => $rbelad_values['label_block'] ?? false,
						'options'        => $rbelad_options,
						'default'        => $rbelad_values['default'] ?? '',
						'placeholder'    => $rbelad_values['placeholder'] ?? '',
						'multiple'       => $rbelad_values['multiple'] ?? '',
						'dynamic'        => $rbelad_values['dynamic'] ?? array(),
						'dynamic_params' => $rbelad_values['dynamic_params'] ?? array(),
						'select2options' => $rbelad_values['select2options'] ?? array(),
						'description'    => $rbelad_values['description'] ?? '',
						'condition'      => $rbelad_values['condition'] ?? array(),
					)
				);
				break;

			/**
				 * =========================
				 * CUSTOM LINK
				 * =========================
				 */
			case 'custom_link':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::URL,
						'ai'          => false,
						'label_block' => $rbelad_values['label_block'] ?? true,
						'placeholder' => ! empty( $rbelad_values['placeholder'] ) ? $rbelad_values['placeholder'] : esc_html__( 'https://your-link.com', 'rb-addons-for-elementor' ),
						'options'     => array( 'url', 'is_external', 'nofollow', 'custom_attributes' ),
						'default'     => array(
							'url'               => ! empty( $rbelad_values['default']['url'] ) ? $rbelad_values['default']['url'] : '',
							'is_external'       => true,
							'nofollow'          => true,
							'custom_attributes' => '',
						),
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * MEDIA - IMAGE, VIDEO
				 * =========================
				 */
			case 'img':
			case 'video':
				$is_video   = ( 'video' === $rbelad_key );     // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
				$media_type = $is_video ? 'video' : 'image'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] )
							? $rbelad_values['label']
							: ( $is_video
								? esc_html__( 'Upload Video', 'rb-addons-for-elementor' )
								: esc_html__( 'Upload Image', 'rb-addons-for-elementor' )
						),
						'type'        => Controls_Manager::MEDIA,
						'media_type'  => $media_type,
						'label_block' => true,
						'default'     => ! empty( $rbelad_values['default'] )
							? $rbelad_values['default']
							: ( ! $is_video
								? array( 'url' => Utils::get_placeholder_image_src() )
								: array()
						),
						'ai'          => false,
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * IMAGE SIZE
				 * =========================
				 */
			case 'img_size':
				$this->add_group_control(
					Group_Control_Image_Size::get_type(),
					array(
						'name'      => ! empty( $rbelad_values['name'] ) ? $rbelad_values['name'] : 'img_size',
						'default'   => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'thumbnail',
						'condition' => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * ICON
				 * =========================
				 */
			case 'icon':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'                  => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Icon', 'rb-addons-for-elementor' ),
						'type'                   => Controls_Manager::ICONS,
						'fa4compatibility'       => ! empty( $rbelad_values['fa4compatibility'] ) ? $rbelad_values['fa4compatibility'] : 'icon',
						'label_block'            => isset( $rbelad_values['label_block'] ) ? $rbelad_values['label_block'] : true,
						'skin'                   => ! empty( $rbelad_values['skin'] ) ? $rbelad_values['skin'] : 'media',
						'skin_settings'          => ! empty( $rbelad_values['skin_settings'] ) ? $rbelad_values['skin_settings'] : array(),
						'recommended'            => ! empty( $rbelad_values['recommended'] ) ? $rbelad_values['recommended'] : array(),
						'exclude_inline_options' => ! empty( $rbelad_values['exclude_inline_options'] )
							? $rbelad_values['exclude_inline_options']
							: array(),
						'default'                => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : array(),
						'condition'              => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * ICON
				 * =========================
				 */
			case 'icon_simple':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Icon', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::ICONS,
						'label_block' => isset( $rbelad_values['label_block'] ) ? $rbelad_values['label_block'] : true,
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : array(),
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * SLIDER
				 * =========================
				 */
			case 'slider':
				// Unitless properties.
				$is_unitless = ! empty( $rbelad_values['unitless'] );

				// Units.
				$size_units = ! empty( $rbelad_values['size_units'] )
					? $rbelad_values['size_units']
					: ( $is_unitless ? array( '' ) : array( 'px', '%', 'em', 'rem' ) );

				// Range.
				$range = ! empty( $rbelad_values['range'] )
					? $rbelad_values['range']
					: array();

				// Add control.
				$this->add_responsive_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'      => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html( ucwords( str_replace( '_', ' ', $rbelad_key ) ) ), // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
						'type'       => Controls_Manager::SLIDER,
						'size_units' => $size_units,
						'range'      => $range,
						'default'    => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : array(),
						'condition'  => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
						'selectors'  => ! empty( $rbelad_values['selectors'] ) ? $rbelad_values['selectors'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * Number
				 * =========================
				 */
			case 'number':
			case 'number_2':
			case 'number_3':
				$this->add_control(
					! empty( $rbelad_values['id'] ) ? $rbelad_values['id'] : $rbelad_key,
					array(
						'label'       => ! empty( $rbelad_values['label'] ) ? $rbelad_values['label'] : esc_html__( 'Number', 'rb-addons-for-elementor' ),
						'type'        => ! empty( $rbelad_values['type'] ) ? $rbelad_values['type'] : Controls_Manager::NUMBER,
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : '',
						'description' => $rbelad_values['description'] ?? '',
						'min'         => ! empty( $rbelad_values['min'] ) ? $rbelad_values['min'] : '',
						'max'         => ! empty( $rbelad_values['max'] ) ? $rbelad_values['max'] : '',
						'step'        => ! empty( $rbelad_values['step'] ) ? $rbelad_values['step'] : '',
						'condition'   => ! empty( $rbelad_values['condition'] ) ? $rbelad_values['condition'] : array(),
						'selectors'   => ! empty( $rbelad_values['selectors'] ) ? $rbelad_values['selectors'] : array(),
					)
				);
				break;

			/**
				 * =========================
				 * CHOOSE ICON / IMAGE / TEXT
				 * =========================
				 */
			case 'icon_img_text':
				// Choose type.
				$this->add_control(
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
							'text'  => array(
								'title' => esc_html__( 'Text', 'rb-addons-for-elementor' ),
								'icon'  => 'eicon-t-letter',
							),
						),
						'default'     => ! empty( $rbelad_values['default'] ) ? $rbelad_values['default'] : 'icon',
					)
				);

				break;
		}
	}
}
