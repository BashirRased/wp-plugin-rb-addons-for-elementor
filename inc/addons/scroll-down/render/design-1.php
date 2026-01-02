<?php
$settings = $this->get_settings_for_display();

// Wrapper HTML
$html = '';
$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' );

// Button Custom Link
if ( 'custom' === $settings['link_type'] && ! empty ( $settings['custom_link']['url'] ) ) {
	$this->add_link_attributes( 'wrapper_attr', $settings['custom_link'] );
	$this->add_render_attribute( 'wrapper_attr', 'class', 'rb-scroll-down' );
	$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' );	
}

// Button Page Link
elseif ( 'page' === $settings['link_type'] ) {
	// Add dynamic class per item
	$this->add_render_attribute( 'wrapper_attr', 'href', esc_url( get_permalink( $settings['page_link'] ) ) );
	$this->add_render_attribute( 'wrapper_attr', 'target', '_self' );
	$this->add_render_attribute( 'wrapper_attr', 'rel', 'nofollow' );
	$this->add_render_attribute( 'wrapper_attr', 'class', 'rb-scroll-down' );
	$wrapper_attr = $this->get_render_attribute_string( 'wrapper_attr' );
}

$html = sprintf( '<a %1$s></a>', $wrapper_attr );
echo wp_kses_post($html);