<?php
$settings = $this->get_settings_for_display();

$html = '';
$item_html_array = [];
foreach ( $settings['contact_info_repeater'] as $index => $item ) {
	// Reset variables each loop
	$icon = '';
	$title = '';
	$text = '';

	// Create unique render attribute key for each item
	$item_key  = 'item_attr_' . $index;
	$icon_key  = 'icon_attr_' . $index;
	$title_key = 'title_attr_' . $index;
	$text_key  = 'text_attr_' . $index;

	// Add dynamic classes
	$this->add_render_attribute( $item_key, 'class', [
		'rb-contact-info-item',
		'elementor-repeater-item-' . esc_attr( $item['_id'] )
	] );
	$this->add_render_attribute( $icon_key, 'class', 'rb-contact-info-icon' );
	$this->add_render_attribute( $title_key, 'class', 'rb-contact-info-title' );
	$this->add_render_attribute( $text_key, 'class', 'rb-contact-info-text' );

	$item_attr = $this->get_render_attribute_string( $item_key );	

	// Icon HTML
	if ( 'yes' === $item['show_icon'] && 'image' === $item['icon_type'] && isset( $item['icon_image']['url'] ) && !empty( $item['icon_image']['url'] ) ) {
		$icon_attr = $this->get_render_attribute_string( $icon_key );
		$icon_html = '<img src="' . esc_url( $item['icon_image']['url'] ) . '">';
		$icon      = sprintf( '<span %1$s>%2$s</span>', $icon_attr, $icon_html );
	}
	
	elseif ( 'yes' === $item['show_icon'] && 'icon' === $item['icon_type'] && isset( $item['font_icon'] ) && !empty( $item['font_icon'] ) ) {
		$icon_attr = $this->get_render_attribute_string( $icon_key );
		$icon_html = rb_render_icon( $item, 'icon', 'font_icon' );
		$icon      = sprintf( '<span %1$s>%2$s</span>', $icon_attr, $icon_html );
	}

	// Title HTML
	if ( !empty( $item['info_title'] ) ) {		
		$title_attr = $this->get_render_attribute_string( $title_key );
		$title      = sprintf( '<h5 %1$s>%2$s</h5>', $title_attr, esc_html( $item['info_title'] ) );
	}

	// Info Text HTML
	if ( !empty( $item['info_text'] ) ) {		
		$text_attr = $this->get_render_attribute_string( $text_key );
		$text      = sprintf( '<p %1$s>%2$s</p>', $text_attr, rb_kses( $item['info_text'] ) );
	}

	$item_html_array[] = sprintf( '<div %1$s>%2$s %3$s %4$s</div>', $item_attr, $icon, $title, $text );
}
$item_html = implode( '', $item_html_array );

// Wrap HTML
$this->add_render_attribute( 'wrap_attr', 'class', 'rb-contact-info' );
$wrap_attr = $this->get_render_attribute_string( 'wrap_attr' );
$html = sprintf( '<div %1$s>%2$s</div>', $wrap_attr, $item_html );

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