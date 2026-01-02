<?php

use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'general_style',
	[
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'post_thumbnail_general_style',
	[
		'controls' => [
			// Width & Height
			'width' 				=> [				
				'id' 				=> 'width',
				'select_class' 		=> '{{WRAPPER}} .rb-post-thumbnail',
			],
			'max_width' 			=> [				
				'id' 				=> 'max_width',
				'select_class' 		=> '{{WRAPPER}} .rb-post-thumbnail',
			],
			'height' 				=> [
				'id' 				=> 'height',
				'select_class' 		=> '{{WRAPPER}} .rb-post-thumbnail',
			],
			'width_height_separator'=> [],
			
			// Text Align
			'align' 				=> [
				'id' 				=> 'align',
				'options'     		=> rb_align_text(),
				'default'     		=> is_rtl() ? 'right' : 'left',
				'select_class' 		=> '{{WRAPPER}} .rb-post-thumbnail-wrapper',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();