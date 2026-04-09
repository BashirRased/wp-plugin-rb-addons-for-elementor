<?php
/**
 * Social Icon widget content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Utils;
use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelpro_social_icon_general_content_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Choose Design.
			'choose_design' => array(
				'id'      => $prefix . 'choose_design',
				'options' => array(
					'style-1' => array(
						'title' => esc_attr__( 'Style - 1', 'rb-addons-for-elementor' ),
						'image' => plugins_url( '/inc/addons/social-icon/thumb/style-1.png', RBELAD_PLUGIN_FILE ),
					),
					'style-2' => array(
						'title' => esc_attr__( 'Style - 2', 'rb-addons-for-elementor' ),
						'image' => plugins_url( '/inc/addons/social-icon/thumb/style-2.png', RBELAD_PLUGIN_FILE ),
					),
				),
			),
		),
	),
);

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'style_2',
	array(
		'controls'    => array(
			'text'        => array(
				'id'      => $prefix . 'icon_title',
				'label'   => esc_html__( 'Icon Title', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'Facebook', 'rb-addons-for-elementor' ),
			),
			'select'      => array(
				'id'      => $prefix . 'icon_type',
				'label'   => esc_html__( 'Icon Type', 'rb-addons-for-elementor' ),
				'default' => 'icon',
				'options' => array(
					'icon'  => esc_html__( 'Icon', 'rb-addons-for-elementor' ),
					'image' => esc_html__( 'Image', 'rb-addons-for-elementor' ),
				),
			),
			'icon'        => array(
				'id'        => $prefix . 'font_icon',
				'label'     => esc_html__( 'Font Icon', 'rb-addons-for-elementor' ),
				'default'   => array(
					'value'   => 'fab fa-facebook',
					'library' => 'fa-brands',
				),
				'condition' => array(
					$prefix . 'icon_type' => 'icon',
				),
			),
			'img'         => array(
				'id'        => $prefix . 'icon_image',
				'label'     => esc_html__( 'Icon Image', 'rb-addons-for-elementor' ),
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					$prefix . 'icon_type' => 'image',
				),
			),
			'custom_link' => array(
				'id'    => $prefix . 'icon_link',
				'label' => esc_html__( 'Link', 'rb-addons-for-elementor' ),
			),
		),
		'id'          => $prefix . 'social_icon_repeater',
		'label'       => esc_html__( 'Social Icon Item', 'rb-addons-for-elementor' ),
		'default'     => rbelad_social_icon_list(),
		'title_field' => '{{{ rbelpro_social_icon_general_content_icon_title }}}',
	),
);

// All content add here - Colors.
$this->add_style_controls(
	$prefix . 'style_3',
	array(
		'controls' => array(
			// Number.
			'number' => array(
				'id'    => $prefix . 'max_items',
				'label' => esc_html__( 'Number of Items', 'rb-addons-for-elementor' ),
			),
		),
	),
);

// Then add child color controls relative to number of items.
$max_items = 20;  // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$count     = 0;  // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$default_colors = array(
	'#3b5998', // Facebook.
	'#1da1f2', // Twitter.
	'#007bb5', // LinkedIn.
	'#bd081c', // Pinterest.
	'#c32aa3', // Instagram.
); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

for (
	$i = 0; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$i < $max_items;
	$i++
	) {
	$count                  = $i + 1; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
	$default_color_for_item = isset( $default_colors[ $i ] ) ? $default_colors[ $i ] : '#007bff'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

	// tabs.
	$this->start_controls_tabs(
		$prefix . "tabs_$i",
		array(
			'condition' => array(
				$prefix . 'social_icon_repeater!' => '',
				$prefix . 'max_items'             => range( $count, $max_items ), // use prefixed control id.
			),
		)
	);

	// normal_tab.
	$this->start_controls_tab(
		$prefix . "normal_tab_$i",
		array(
			'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		)
	);

	// All content add here - Colors.
	$this->add_style_controls(
		$prefix . 'style_4',
		array(
			'controls' => array(
				// Colors.
				'fill_color'   => array(
					'id'             => $prefix . "icon_color_$i",
					'label'          => esc_html__( 'Icon Color', 'rb-addons-for-elementor' ),
					'default'        => '#ffffff',
					// use sprintf to inject $count so $count is evaluated only here.
					'select_class'   => sprintf(
						'{{WRAPPER}} .style-1 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) span, {{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) span',
						$count
					),
					'select_class_2' => sprintf(
						'{{WRAPPER}} .style-1 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) span.rbelad-social-icon-item-child:nth-child(5) svg, {{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) span svg',
						$count
					),
				),
				'bg_color'     => array(
					'id'           => $prefix . "icon_bg_color_$i",
					'default'      => $default_color_for_item,
					'select_class' => sprintf(
						'{{WRAPPER}} .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) .child-style-1, {{WRAPPER}} .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) .child-style-2.before-child',
						$count
					),
				),
				'border_color' => array(
					'id'           => $prefix . "normal_icon_border_color_$i",
					'default'      => '#ffffff',
					'select_class' => sprintf(
						'{{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) > .rbelad-social-icon-item-child, {{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d) > .rbelad-social-icon-item-child',
						$count
					),
				),
			),
		),
	);

	$this->end_controls_tab();

	// hover_tab.
	$this->start_controls_tab(
		$prefix . "hover_tab_$i",
		array(
			'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		)
	);

	// All content add here - Colors.
	$this->add_style_controls(
		$prefix . 'style_5',
		array(
			'controls' => array(
				// Colors.
				'fill_color'   => array(
					'id'             => $prefix . "hover_icon_color_$i",
					'default'        => '#ffffff',
					'select_class'   => sprintf(
						'{{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):hover span, {{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):focus span',
						$count
					),
					'select_class_2' => sprintf(
						'{{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):hover span svg, {{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):focus span svg',
						$count
					),
				),
				'bg_color'     => array(
					'id'           => $prefix . "hover_icon_bg_color_$i",
					'default'      => $default_color_for_item,
					'select_class' => sprintf(
						'{{WRAPPER}} .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):hover .child-style-2.after-child, {{WRAPPER}} .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):focus .child-style-2.after-child',
						$count
					),
				),
				'border_color' => array(
					'id'           => $prefix . "hover_icon_border_color_$i",
					'select_class' => sprintf(
						'{{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):hover > .rbelad-social-icon-item-child, {{WRAPPER}} .style-2 .rbelad-social-icon-menu > .rbelad-social-icon-item:nth-child(%1$d):focus > .rbelad-social-icon-item-child',
						$count
					),
				),
			),
		),
	);

	$this->end_controls_tab();
	$this->end_controls_tabs();
}
$this->end_controls_section();
