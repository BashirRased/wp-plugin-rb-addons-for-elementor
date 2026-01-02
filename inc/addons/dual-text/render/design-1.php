<?php
use Elementor\Utils;
$settings = $this->get_settings_for_display();

// HTML Class
$this->add_render_attribute( 'title', 'class', 'rb-dual-text-heading' );

// Link Attrs
$this->add_link_attributes( 'title_link', $settings['link'] );

// Link Class
$this->add_render_attribute( 'title_link', 'class', 'rb-dual-text-link' );

// Text Highlight Class
$this->add_render_attribute( 'text_highlight', 'class', 'rb-dual-text-item-highlight' );

// Title Repeater
$title_item = '';
$text_highlight_attr = $this->get_render_attribute_string( 'text_highlight' );
foreach (  $settings['title_repeater'] as $item ) {
	if ( ! empty ($item['title_text']) ) {		
		$title_text = esc_html( $item['title_text'] );
		if ( 'yes' === $item['title_highlight'] ) {
			$title_item .= sprintf( '<span %1$s>%2$s</span>', $text_highlight_attr, $title_text );
		} else {
			$title_item .= $title_text;
		}
	}
}

// HTML
$html = '';
$html_tag = Utils::validate_html_tag( $settings['html_tag'] );
$html_attr = $this->get_render_attribute_string( 'title' );
$link_attr = $this->get_render_attribute_string( 'title_link' );
if ( ! empty( $settings['link']['url'] ) ) {
	$html = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $title_item );
} else {
	$html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $html_tag, $html_attr, $title_item );
}
echo wp_kses_post($html);