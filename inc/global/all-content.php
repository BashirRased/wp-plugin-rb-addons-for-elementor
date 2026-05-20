<?php
/**
 * All style controls
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

$controls = ! empty( $args['controls'] ) ? $args['controls'] : array();
if ( ! empty( $controls ) && is_array( $controls ) ) {
	foreach ( $controls as $key => $values ) {
		/**
		 * Control values.
		 *
		 * @var array<string, mixed> $values
		 */
		switch ( $key ) {
			/**
			 * =========================
			 * CHOOSE DESIGN
			 * =========================
			 */
			case 'choose_design':
				$this->add_control(
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Choose Design', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::VISUAL_CHOICE,
						'label_block' => true,
						'options'     => ! empty( $values['options'] ) ? $values['options'] : array(),
						'default'     => ! empty( $values['default'] ) ? $values['default'] : 'style-1',
						'columns'     => ! empty( $values['columns'] ) ? $values['columns'] : 2,
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
						'selectors'   => ! empty( $values['selectors'] ) ? $values['selectors'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Heading', 'rb-addons-for-elementor' ),
						'label_block' => true,
						'type'        => Controls_Manager::HEADING,
						'ai'          => false,
						'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'ai'          => false,
						'label_block' => true,
						'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
						'placeholder' => ! empty( $values['placeholder'] ) ? $values['placeholder'] : '',
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Textarea', 'rb-addons-for-elementor' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'ai'          => false,
						'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
						'placeholder' => ! empty( $values['placeholder'] ) ? $values['placeholder'] : '',
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Text Editor', 'rb-addons-for-elementor' ),
						'label_block' => true,
						'type'        => Controls_Manager::WYSIWYG,
						'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
					)
				);
				break;

			/**
			 * =========================
			 * HTML TAG
			 * =========================
			 */
			case 'html_tag':
				$options = array(
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'HTML Tag', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => true,
						'options'     => $options,
						'default'     => ! empty( $values['default'] ) ? $values['default'] : 'div',
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
				if ( 'heading_tag' === $key ) {
					$options = array(
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

					$default = ! empty( $values['default'] ) ? $values['default'] : 'h2';
					$label   = ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Heading Tag', 'rb-addons-for-elementor' );

				} else {

					$options = ! empty( $values['options'] ) ? $values['options'] : array();
					$default = ! empty( $values['default'] ) ? $values['default'] : '';
					$label   = ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Choose', 'rb-addons-for-elementor' );
				}

				$this->add_control(
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => $label,
						'type'        => Controls_Manager::CHOOSE,
						'label_block' => false,
						'toggle'      => false,
						'options'     => $options,
						'default'     => $default,
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'        => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Switcher', 'rb-addons-for-elementor' ),
						'description'  => $values['description'] ?? '',
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => esc_html__( 'Show', 'rb-addons-for-elementor' ),
						'label_off'    => esc_html__( 'Hide', 'rb-addons-for-elementor' ),
						'return_value' => 'yes',
						'default'      => ! empty( $values['default'] ) ? $values['default'] : 'yes',
						'condition'    => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
				$options = ! empty( $values['options'] ) ? $values['options'] : array();
				$this->add_control(
					$values['id'] ?? $key,
					array(
						'label'       => $values['label'] ?? esc_html__( 'Select Option', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::SELECT,
						'label_block' => $values['label_block'] ?? false,
						'options'     => $options,
						'default'     => $values['default'] ?? '',
						'description' => $values['description'] ?? '',
						'condition'   => $values['condition'] ?? array(),
					)
				);
				break;

			/**
			 * =========================
			 * MULTI SELECT
			 * =========================
			 */
			case 'multi_select':
				$options = ! empty( $values['options'] ) ? $values['options'] : array();
				$this->add_control(
					$values['id'] ?? $key,
					array(
						'label'          => $values['label'] ?? esc_html__( 'Select Option', 'rb-addons-for-elementor' ),
						'type'           => Controls_Manager::SELECT2,
						'label_block'    => $values['label_block'] ?? false,
						'options'        => $options,
						'default'        => $values['default'] ?? '',
						'placeholder'    => $values['placeholder'] ?? '',
						'multiple'       => $values['multiple'] ?? '',
						'dynamic'        => $values['dynamic'] ?? array(),
						'dynamic_params' => $values['dynamic_params'] ?? array(),
						'select2options' => $values['select2options'] ?? array(),
						'description'    => $values['description'] ?? '',
						'condition'      => $values['condition'] ?? array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::URL,
						'ai'          => false,
						'label_block' => $values['label_block'] ?? true,
						'placeholder' => ! empty( $values['placeholder'] ) ? $values['placeholder'] : esc_html__( 'https://your-link.com', 'rb-addons-for-elementor' ),
						'options'     => array( 'url', 'is_external', 'nofollow', 'custom_attributes' ),
						'default'     => array(
							'url'               => ! empty( $values['default']['url'] ) ? $values['default']['url'] : '',
							'is_external'       => true,
							'nofollow'          => true,
							'custom_attributes' => '',
						),
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
				$is_video   = ( 'video' === $key ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
				$media_type = $is_video ? 'video' : 'image'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

				$this->add_control(
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] )
						? $values['label']
						: ( $is_video
							? esc_html__( 'Upload Video', 'rb-addons-for-elementor' )
							: esc_html__( 'Upload Image', 'rb-addons-for-elementor' )
						),
						'type'        => Controls_Manager::MEDIA,
						'media_type'  => $media_type,
						'label_block' => true,
						'default'     => ! empty( $values['default'] )
						? $values['default']
						: ( ! $is_video
							? array( 'url' => Utils::get_placeholder_image_src() )
							: array()
						),
						'ai'          => false,
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
						'name'      => ! empty( $values['name'] ) ? $values['name'] : 'img_size',
						'default'   => ! empty( $values['default'] ) ? $values['default'] : 'thumbnail',
						'condition' => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'                  => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Icon', 'rb-addons-for-elementor' ),
						'type'                   => Controls_Manager::ICONS,
						'fa4compatibility'       => ! empty( $values['fa4compatibility'] ) ? $values['fa4compatibility'] : 'icon',
						'label_block'            => isset( $values['label_block'] ) ? $values['label_block'] : true,
						'skin'                   => ! empty( $values['skin'] ) ? $values['skin'] : 'media',
						'skin_settings'          => ! empty( $values['skin_settings'] ) ? $values['skin_settings'] : array(),
						'recommended'            => ! empty( $values['recommended'] ) ? $values['recommended'] : array(),
						'exclude_inline_options' => ! empty( $values['exclude_inline_options'] )
						? $values['exclude_inline_options']
						: array(),
						'default'                => ! empty( $values['default'] ) ? $values['default'] : array(),
						'condition'              => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Icon', 'rb-addons-for-elementor' ),
						'type'        => Controls_Manager::ICONS,
						'label_block' => isset( $values['label_block'] ) ? $values['label_block'] : true,
						'default'     => ! empty( $values['default'] ) ? $values['default'] : array(),
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
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
				$is_unitless = ! empty( $values['unitless'] );

				// Units.
				$size_units = ! empty( $values['size_units'] )
					? $values['size_units']
					: ( $is_unitless ? array( '' ) : array( 'px', '%', 'em', 'rem' ) );

				// Range.
				$range = ! empty( $values['range'] )
					? $values['range']
					: array();

				// Add control.
				$this->add_responsive_control(
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'      => ! empty( $values['label'] ) ? $values['label'] : esc_html( ucwords( str_replace( '_', ' ', $key ) ) ), // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
						'type'       => Controls_Manager::SLIDER,
						'size_units' => $size_units,
						'range'      => $range,
						'default'    => ! empty( $values['default'] ) ? $values['default'] : array(),
						'condition'  => ! empty( $values['condition'] ) ? $values['condition'] : array(),
						'selectors'  => ! empty( $values['selectors'] ) ? $values['selectors'] : array(),
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
					! empty( $values['id'] ) ? $values['id'] : $key,
					array(
						'label'       => ! empty( $values['label'] ) ? $values['label'] : esc_html__( 'Number', 'rb-addons-for-elementor' ),
						'type'        => ! empty( $values['type'] ) ? $values['type'] : Controls_Manager::NUMBER,
						'default'     => ! empty( $values['default'] ) ? $values['default'] : '',
						'description' => $values['description'] ?? '',
						'min'         => ! empty( $values['min'] ) ? $values['min'] : '',
						'max'         => ! empty( $values['max'] ) ? $values['max'] : '',
						'step'        => ! empty( $values['step'] ) ? $values['step'] : '',
						'condition'   => ! empty( $values['condition'] ) ? $values['condition'] : array(),
						'selectors'   => ! empty( $values['selectors'] ) ? $values['selectors'] : array(),
					)
				);
				break;
		}
	}
}
