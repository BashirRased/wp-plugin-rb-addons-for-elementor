<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

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
	'rating_skill_general_style',
	[
		'controls' => [
			'color' 					=> [
				'default' 				=> '#FF9C00',
				'select_class' 			=> '{{WRAPPER}} .rb-rating-skill i',
			],
			'font_size' 				=> [		
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 16,
				],	
				'select_class' 			=> '{{WRAPPER}} .rb-rating-skill i',
			],
			'gap' 						=> [		
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 3,
				],	
				'select_class' 			=> '{{WRAPPER}} .rb-rating-skill',
			],
			'justify_align' 			=> [		
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-rating-skill',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();