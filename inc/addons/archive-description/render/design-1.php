<?php
$settings = $this->get_settings_for_display();

// HTML Class
$this->add_render_attribute( 'title', 'class', 'rb-archive-description' );
$html_attr = $this->get_render_attribute_string( 'title' );

// HTML
$html = '';
$html_text = get_the_archive_description();
$html_text = preg_replace( '#^<p>(.*?)</p>$#is', '$1', trim( $html_text ) );

if ( rb_elementor()->editor->is_edit_mode() ) {
	$html_text = esc_html__( 'Placeholder archive description for design purposes only and will not appear on the frontend.', 'rb-elementor-addons' );
}

if ( ! empty( $html_text ) ) {
	$html = sprintf( '<p %1$s>%2$s</p>', $html_attr, $html_text );
	echo wp_kses_post($html);
}