<?php
use Elementor\Utils;
$settings = $this->get_settings_for_display();

// Empty Variables
$html = '';
$item = '';
$item_hover = '';

// Icon HTML
$this->add_render_attribute( 'service_icon', 'class', 'rb-service-icon' );
$icon_attr = $this->get_render_attribute_string( 'service_icon' );
$icon_html = '';
if ( 'img' === $settings['icon_type'] && !empty( $settings['image_icon']['url'] ) ) {
	$icon_html = '<img src="' . esc_url($settings['image_icon']['url']) . '">';
} elseif ( 'icon' === $settings['icon_type'] && !empty( $settings['font_icon'] ) ) {
	$icon_html = rb_render_icon( $settings, 'icon', 'font_icon' );
}
$icon = sprintf( '<div %1$s>%2$s</div>', $icon_attr, $icon_html );

// Title HTML
$title_attr = '';
$title_html = '';
$html_tag = Utils::validate_html_tag( $settings['html_tag'] );
if ( isset ( $settings ['servie_title'] ) ) {
	$this->add_render_attribute( 'service_title', 'class', 'rb-service-title' );
	$title_attr = $this->get_render_attribute_string( 'service_title' );
	$title_html = $settings ['servie_title'];
}
$title = sprintf( '<%1$s %2$s>%3$s</%1$s>', $html_tag, $title_attr, $title_html );

// Description HTML
$description_attr = '';
$description_html = '';
if ( isset ( $settings ['servie_description'] ) ) {
	$this->add_render_attribute( 'service_description', 'class', 'rb-service-description' );
	$description_attr = $this->get_render_attribute_string( 'service_description' );
	$description_html = $settings ['servie_description'];
}
$description = sprintf( '<p %1$s>%2$s</p>', $description_attr, $description_html );

if ( 'style-1' === $settings['service_style'] ) :
// Item Wrap Class
$this->add_render_attribute( 'service_item_wrap', 'class', 'rb-service-item-wrap' );
$this->add_render_attribute( 'service_item_wrap', 'class', 'style-1' );
$wrap_attr = $this->get_render_attribute_string( 'service_item_wrap' );

// Service Item
$this->add_render_attribute( 'service_item', 'class', 'rb-service-item' );
$item_attr = $this->get_render_attribute_string( 'service_item' );
$item = sprintf( '<div %1$s>%2$s %3$s</div>', $item_attr, $icon, $title );

// Service Item Hover
$this->add_render_attribute( 'service_item_hover', 'class', 'rb-service-item-hover' );
$item_hover_attr = $this->get_render_attribute_string( 'service_item_hover' );
$item_hover = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $item_hover_attr, $icon, $title, $description );

elseif ( 'style-2' === $settings['service_style'] ) :
// Item Wrap Class
$this->add_render_attribute( 'service_item_wrap', 'class', 'rb-service-item-wrap' );
$this->add_render_attribute( 'service_item_wrap', 'class', 'style-2' );
$wrap_attr = $this->get_render_attribute_string( 'service_item_wrap' );

// Service Item
$this->add_render_attribute( 'service_item', 'class', 'rb-service-item' );
$item_attr = $this->get_render_attribute_string( 'service_item' );
$item = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $item_attr, $icon, $title, $description );

// Service Item Hover
$this->add_render_attribute( 'service_item_hover', 'class', 'rb-service-item-hover' );
$item_hover_attr = $this->get_render_attribute_string( 'service_item_hover' );
$item_hover = sprintf( '<div %1$s></div>', $item_hover_attr );
endif;

// Wrapper HTML
$html = sprintf( '<div %1$s>%2$s %3$s</div>', $wrap_attr, $item, $item_hover );

/** WP kses allowed tags */
$allowed_tags = wp_kses_allowed_html( 'post' );

// Allow SVG + Font Awesome attributes
$allowed_tags['svg'] = [
    'class'       => true,
    'aria-hidden' => true,
    'role'        => true,
    'xmlns'       => true,
    'width'       => true,
    'height'      => true,
    'viewbox'     => true, // note: lowercase here
    'fill'        => true,
];
$allowed_tags['path'] = [
    'd'    => true,
    'fill' => true,
];

// Echo with custom allowed tags
echo wp_kses( $html, $allowed_tags );