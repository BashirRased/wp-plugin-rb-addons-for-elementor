<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'prefix_style',
	[
		'label' => esc_html__( 'Prefix', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'author_prefix_separtor!'	=> 'none',
		]
	]
);

// All content add here
$this->add_style_controls(
	'author_meta_prefix_style',
	[
		'controls' => [
			// Typography
			'typography' 				=> [
				'id' 							=> 'prefix_typography',
				'global'      					=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 					=> '{{WRAPPER}} .rb-author-meta-prefix',
				'condition' 					=> [
					'author_prefix_separtor'	=> 'text',
				]
			],			
			'text_stroke' 						=> [
				'id' 							=> 'prefix_text_stroke',
				'select_class' 					=> '{{WRAPPER}} .rb-author-meta-prefix',
				'condition' 					=> [
					'author_prefix_separtor'	=> 'text',
				]
			],
			'text_shadow' 						=> [
				'id' 							=> 'prefix_text_shadow',
				'select_class' 					=> '{{WRAPPER}} .rb-author-meta-prefix',
				'condition' 					=> [
					'author_prefix_separtor'	=> 'text',
				]
			],
			'typography_separator' 				=> [
				'condition' 					=> [
					'author_prefix_separtor'	=> 'text',
				]
			],

			// Colors
			'color' 						=> [
				'id' 							=> 'prefix_color',
				'default' 						=> '#777',
				'select_class' 					=> '{{WRAPPER}} .rb-author-meta-prefix',
				'condition' 					=> [
					'author_prefix_separtor'	=> [ 'icon', 'text' ],
				]
			],
			'color_separator' 					=> [
				'condition' 					=> [
					'author_prefix_separtor'	=> [ 'icon', 'text' ],
				]
			],
			
			// Width & Height
			'icon_img_size' 					=> [
				'id' 							=> 'prefix_img_size',
				'select_class' 					=> '{{WRAPPER}} .rb-author-meta-prefix img',
				'default' 						=> [
					'unit' 						=> 'px',
					'size' 						=> 20,
				],
				'condition' 					=> [
					'author_prefix_separtor'	=> 'img',
				]
			],
			'icon_size' 						=> [				
				'id' 							=> 'prefix_font_size',
				'select_class' 					=> '{{WRAPPER}} .rb-author-meta-prefix i',
				'select_class_2' 				=> '{{WRAPPER}} .rb-author-meta-prefix svg',
				'default' 						=> [
					'unit' 						=> 'px',
					'size' 						=> 20,
				],
				'condition' 					=> [
					'author_prefix_separtor'	=> 'icon',
				]
			],
			'width_height_separator'			=> [],
			
			// Margin & Padding
			'margin' 							=> [								
				'id' 							=> 'prefix_margin',
				'default' 						=> [
					'top' 						=> '0',
					'right' 					=> '10',
					'bottom' 					=> '0',
					'left' 						=> '0',
					'unit' 						=> 'px',
					'isLinked' 					=> false,
				],
				'select_class' 					=> '{{WRAPPER}} .rb-author-meta-prefix',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();