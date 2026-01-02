<?php
$settings = $this->get_settings_for_display();
$html = '';

// Icon HTML
$this->add_render_attribute( 'meta_icon_attr', 'class', 'rb-author-meta-icon' );
$meta_icon_attr = $this->get_render_attribute_string( 'meta_icon_attr' );
$meta_icon_html = '';
if ( 'img' === $settings['author_icon'] && !empty( $settings['icon_img']['url'] ) ) {
	$meta_icon_html = '<img src="' . esc_url($settings['icon_img']['url']) . '">';
} elseif ( 'icon' === $settings['author_icon'] && !empty( $settings['icon_font'] ) ) {
	$meta_icon_html = rb_render_icon( $settings, 'icon', 'icon_font' );
}
$meta_icon = sprintf( '<span %1$s>%2$s</span>', $meta_icon_attr, $meta_icon_html );

// Prefix HTML
$this->add_render_attribute( 'meta_prefix_attr', 'class', 'rb-author-meta-prefix' );
$meta_prefix_attr = $this->get_render_attribute_string( 'meta_prefix_attr' );
$meta_prefix_html = '';
if ( 'img' === $settings['author_prefix_separtor'] && !empty( $settings['prefix_img']['url'] ) ) {
	$meta_prefix_html = '<img src="' . esc_url($settings['prefix_img']['url']) . '">';
} elseif ( 'icon' === $settings['author_prefix_separtor'] && !empty( $settings['prefix_font'] ) ) {
	$meta_prefix_html = rb_render_icon( $settings, 'icon', 'prefix_font' );
} elseif ( 'text' === $settings['author_prefix_separtor'] && isset( $settings['prefix_text'] ) ) {
	$meta_prefix_html = esc_html( $settings['prefix_text'] );
}
$meta_prefix = sprintf( '<span %1$s>%2$s</span>', $meta_prefix_attr, $meta_prefix_html );

// Author HTML
$this->add_render_attribute( 'author_attr', 'class', 'rb-author-meta' );
$author_attr = $this->get_render_attribute_string( 'author_attr' );
$author_id = get_the_author_meta( 'ID' );
$author_html = get_the_author_meta( 'display_name', $author_id );
$meta_text = sprintf( '<span %1$s>%2$s</span>', $author_attr, $author_html );
if ( isset ( $settings ['author_link'] ) && 'default' === $settings ['author_link'] ) {
	// Author Link Class
	$this->add_render_attribute( 'author_link_attr', 'href', esc_url( get_author_posts_url( $author_id ) ) );
	$this->add_render_attribute( 'author_link_attr', 'target', '_self');
	$this->add_render_attribute( 'author_link_attr', 'rel', 'nofollow');
	$this->add_render_attribute( 'author_link_attr', 'class', 'rb-author-meta-link' );
	$link_attr = $this->get_render_attribute_string( 'author_link_attr' );
	$meta_text = sprintf( '<a %1$s><span %2$s>%3$s</span></a>', $link_attr, $author_attr, $author_html );
}

// Wrapper HTML
$this->add_render_attribute( 'meta_attr', 'class', 'rb-author-meta-wrapper' );
$meta_attr = $this->get_render_attribute_string( 'meta_attr' );
$meta_html = sprintf( '%1$s %2$s %3$s', $meta_icon, $meta_prefix, $meta_text );
$html = sprintf( '<div %1$s>%2$s</div>', $meta_attr, $meta_html );
echo wp_kses_post($html);