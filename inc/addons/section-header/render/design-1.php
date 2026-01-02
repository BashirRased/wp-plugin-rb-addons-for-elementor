<?php
use Elementor\Utils;
$settings = $this->get_settings_for_display();

// Subtitle
$subtitle_html = '';
$this->add_render_attribute( 'subtitle_attr', 'class', 'rb-section-subtitle' );
$subtitle_attr = $this->get_render_attribute_string( 'subtitle_attr' );
if ( 'yes' === $settings['subtitle_switch'] && ! empty( $settings['subtitle_text'] ) ) {
	$subtitle_text = $settings['subtitle_text'];
	$subtitle_html = sprintf( '<span %1$s>%2$s</span>', $subtitle_attr, $subtitle_text );
}

// Title Before
$title_before_html = '';
$this->add_render_attribute( 'title_before_attr', 'class', 'rb-section-title-before' );
$title_before_attr = $this->get_render_attribute_string( 'title_before_attr' );
if ( 'yes' === $settings['title_before_switch'] ) {
	$title_before_html = sprintf( '<span %1$s></span>', $title_before_attr );
}		

// Title Highlight
$this->add_render_attribute( 'title_highlight_attr', 'class', 'rb-section-title-highlight' );
$title_highlight_attr = $this->get_render_attribute_string( 'title_highlight_attr' );

// Title Text Repeater
$title_item_array = [];
foreach ( $settings['title_list'] as $item ) {
	if ( isset( $item['title_text'] ) && ! empty( $item['title_text'] ) ) {
		$title_text = $item['title_text'];
		if ( isset( $item['title_show'] ) && 'yes' === $item['title_show'] ) {
			$title_item_array[] = sprintf( '<span %1$s>%2$s</span>', $title_highlight_attr, $title_text );
		} else {
			$title_item_array[] = sprintf( '%1$s', $title_text );
		}
	}
}

// Title After
$title_after_html = '';
$icon_type_class = 'triangle';
if ( 'circle' === $settings['title_after_icon_shape'] ) {
	$icon_type_class = 'circle';
} elseif ( 'square' === $settings['title_after_icon_shape'] ) {
	$icon_type_class = 'square';
}
$this->add_render_attribute( 'title_after_attr', 'class', 'rb-section-title-after' );
$this->add_render_attribute( 'title_after_attr', 'class', $icon_type_class );
$title_after_attr = $this->get_render_attribute_string( 'title_after_attr' );
if ( 'yes' === $settings['title_after_switch'] ) {
	$title_after_html = sprintf( '<span %1$s></span>', $title_after_attr );
}

// Title Wrapper
$this->add_render_attribute( 'title_wrapper_attr', 'class', 'rb-section-title-wrapper' );
$title_wrapper_attr = $this->get_render_attribute_string( 'title_wrapper_attr' );
$html_tag = Utils::validate_html_tag( $settings['html_tag'] );
$this->add_render_attribute( 'title_attr', 'class', 'rb-section-title' );
$title_attr = $this->get_render_attribute_string( 'title_attr' );
$title_item = implode( ' ', $title_item_array );
$title_html = sprintf( '<div %1$s><%2$s %3$s>%4$s %5$s %6$s</%2$s></div>', $title_wrapper_attr, $html_tag, $title_attr, $title_before_html, $title_item, $title_after_html );

// Description
$description_html = '';
$this->add_render_attribute( 'description_attr', 'class', 'rb-section-description' );
$description_attr = $this->get_render_attribute_string( 'description_attr' );
if ( 'yes' === $settings['description_switch'] && ! empty( $settings['description_text'] ) ) {
	$description_text = $settings['description_text'];
	$description_html = sprintf( '<p %1$s>%2$s</p>', $description_attr, $description_text );
}

// Wrapper HTML
$html = '';
$this->add_render_attribute( 'wrapper_attr', 'class', 'rb-section-header' );
$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' );
$html = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $wrapper_attr, $subtitle_html, $title_html, $description_html );
echo wp_kses_post($html);