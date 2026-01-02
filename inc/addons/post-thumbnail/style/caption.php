<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'caption_style',
	[
		'label' => esc_html__( 'Caption', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'post_thumbnail_caption!' => 'none',
		],
	]
);

// All content add here
$this->add_style_controls(
	'post_thumbnail_caption_style',
	[
		'controls' => [
			// Typography
			'typography' 	=> [
				'name'        		=> 'caption_typography',
				'global'      		=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],			
			'text_stroke' 			=> [
				'name'        		=> 'caption_text_stroke',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
			'text_shadow' 			=> [
				'name'        		=> 'text_shadow',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
			'typography_separator' 	=> [],

			// Text Align
			'align' 				=> [
				'id' 				=> 'caption_align',
				'options'     		=> rb_align_text(),
				'default'     		=> is_rtl() ? 'right' : 'left',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
			'align_separator' 		=> [],

			// Colors
			'color' 				=> [
				'id' 				=> 'caption_color',
				'default' 			=> '#ffffff',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
			'bg_color' 		=> [				
				'id' 				=> 'caption_bg_color',
				'default' 			=> '#007bff',				
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
			'color_separator' 		=> [],

			// Border & Border Radius
			'border' 				=> [								
				'name'        		=> 'caption_border',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
			'border_radius' 		=> [
				'id' 				=> 'caption_border_radius',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],			
			'border_separator' 		=> [],

			// Margin & Padding
			'margin' 				=> [								
				'id' 				=> 'caption_margin',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
			'padding' 				=> [								
				'id' 				=> 'caption_padding',
				'select_class' 		=> '{{WRAPPER}} .rb-post-caption',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();