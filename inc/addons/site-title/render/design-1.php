<?php
use Elementor\Utils;
$settings = $this->get_settings_for_display();

// HTML Class
$this->add_render_attribute( 'title', 'class', 'rb-site-title' );
$html_attr = $this->get_render_attribute_string( 'title' );

// HTML Text
$html = '';
$html_tag = Utils::validate_html_tag( $settings['html_tag'] );
$html_text = get_bloginfo( 'name' );

// Home Page Link
if ( 'home' === $settings['link_type'] ) {
	$this->add_render_attribute( 'title_link', 'href', esc_url( get_home_url() ) );
	$this->add_render_attribute( 'title_link', 'target', '_self');
	$this->add_render_attribute( 'title_link', 'rel', 'nofollow');
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
}

// General Page Link
elseif ( 'page' === $settings['link_type'] ) {
	$this->add_render_attribute( 'title_link', 'href', esc_url( get_permalink( $settings['page_link'] ) ) );
	$this->add_render_attribute( 'title_link', 'target', '_self');
	$this->add_render_attribute( 'title_link', 'rel', 'nofollow');
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
}

// Custom Link
elseif ( 'custom' === $settings['link_type'] && ! empty ( $settings['custom_link']['url'] ) ) {
	$this->add_link_attributes( 'title_link', $settings['custom_link'] );
	$link_attr = $this->get_render_attribute_string( 'title_link' );
	$html = sprintf( '<%1$s %2$s><a %3$s>%4$s</a></%1$s>', $html_tag, $html_attr, $link_attr, $html_text );
}

// Disable Link
else {
	$html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $html_tag, $html_attr, $html_text );
}

echo wp_kses_post($html);