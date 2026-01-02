<?php
$settings = $this->get_settings_for_display();

// Choose Design
if ( 'style-1' === $settings['choose_style'] ) {
	$this->add_render_attribute( 'rb_btn_attr', 'class', 'style-1' );
} elseif ( 'style-2' === $settings['choose_style'] ) {
	$this->add_render_attribute( 'rb_btn_attr', 'class', 'style-2' );
}

// Button Custom Link
if ( 'custom' === $settings['link_type'] && ! empty ( $settings['custom_link']['url'] ) ) {
	$this->add_link_attributes( 'rb_btn_attr', $settings['custom_link'] );
	$this->add_render_attribute( 'rb_btn_attr', 'class', 'rb-btn-item' );
	$btn_attr = $this->get_render_attribute_string( 'rb_btn_attr' );	
}

// Button Page Link
elseif ( 'page' === $settings['link_type'] ) {
	// Add dynamic class per item
	$this->add_render_attribute( 'rb_btn_attr', 'href', esc_url( get_permalink( $settings['page_link'] ) ) );
	$this->add_render_attribute( 'rb_btn_attr', 'target', '_self');
	$this->add_render_attribute( 'rb_btn_attr', 'rel', 'nofollow');
	$this->add_render_attribute( 'rb_btn_attr', 'class', 'rb-btn-item' );
	$btn_attr = $this->get_render_attribute_string( 'rb_btn_attr' );
}

// Button Without Link
else {
	$this->add_render_attribute( 'rb_btn_attr', 'class', 'rb-btn-item' );
	$btn_attr = $this->get_render_attribute_string( 'rb_btn_attr' );
}

// Button Text
$btn_text = '';
if ( ! empty ( $settings['btn_text'] ) ) {
	$btn_text = $settings['btn_text'];
}

// Button HTML
$btn_item = sprintf( '<button %1$s><span>%2$s</span></button>', $btn_attr, $btn_text );

// Button Wrap
$html = '';
$this->add_render_attribute( 'btn_wrapper', 'class', 'rb-btn-item-wrap' );
$html_attr = $this->get_render_attribute_string( 'btn_wrapper' );
$html = sprintf( '<div %1$s>%2$s</div>', $html_attr, $btn_item );
echo wp_kses_post($html);