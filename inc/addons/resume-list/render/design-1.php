<?php
$settings = $this->get_settings_for_display();

// Resume Label
$label = '';
if ( isset ( $settings ['resume_label'] ) && !empty ( $settings ['resume_label'] ) ) {
	$this->add_render_attribute( 'resume_label_attr', 'class', 'resume-list-label' );
	$label_attr = $this->get_render_attribute_string( 'resume_label_attr' );
	$label_html = $settings ['resume_label'];
	$label = sprintf( '<span %1$s>%2$s</span>', $label_attr, $label_html );
}

// Resume Title
$title = '';
if ( isset ( $settings ['resume_title'] ) && !empty ( $settings ['resume_title'] ) ) {
	$this->add_render_attribute( 'resume_title_attr', 'class', 'resume-list-title' );
	$title_attr = $this->get_render_attribute_string( 'resume_title_attr' );
	$title_html = $settings ['resume_title'];
	$title = sprintf( '<h4 %1$s>%2$s</h4>', $title_attr, $title_html );
}

// Resume Subtitle
$subtitle = '';
if ( isset ( $settings ['resume_subtitle'] ) && !empty ( $settings ['resume_subtitle'] ) ) {
	$this->add_render_attribute( 'resume_subtitle_attr', 'class', 'resume-list-subtitle' );
	$subtitle_attr = $this->get_render_attribute_string( 'resume_subtitle_attr' );
	$subtitle_html = $settings ['resume_subtitle'];
	$subtitle = sprintf( '<h6 %1$s>%2$s</h6>', $subtitle_attr, $subtitle_html );
}

// Resume Description
$description = '';
if ( isset ( $settings ['resume_description'] ) && !empty ( $settings ['resume_description'] ) ) {
	$this->add_render_attribute( 'resume_description_attr', 'class', 'resume-list-description' );
	$description_attr = $this->get_render_attribute_string( 'resume_description_attr' );
	$description_html = $settings ['resume_description'];
	$description = sprintf( '<p %1$s>%2$s</p>', $description_attr, $description_html );
}

// Wrapper HTML
$html = '';
$this->add_render_attribute( 'resume_item_attr', 'class', 'resume-list-item' );
$item_attr = $this->get_render_attribute_string( 'resume_item_attr' );
$html = sprintf( '<div %1$s>%2$s %3$s %4$s %5$s</div>', $item_attr, $label, $title, $subtitle, $description );
echo wp_kses_post($html);