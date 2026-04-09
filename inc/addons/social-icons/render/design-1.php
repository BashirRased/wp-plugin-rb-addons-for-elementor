<?php
/**
 * Social Icon widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $this->get_settings_for_display(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Counter (prevent undefined variable warning).
$count = 0; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Navbar Class.
$nav_class = 'rbelad-social-icon-nav';
if ( 'style-1' === $settings['rbelpro_social_icon_general_content_choose_design'] ) {
	$nav_class .= ' style-1'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
} elseif ( 'style-2' === $settings['rbelpro_social_icon_general_content_choose_design'] ) {
	$nav_class .= ' style-2'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
}
$this->add_render_attribute( 'icon_nav', 'class', $nav_class );

// Menu Class.
$this->add_render_attribute( 'icon_menu', 'class', 'rbelad-social-icon-menu' );

// Menu Link Class.
$this->add_render_attribute( 'icon_link', 'class', 'rbelad-social-icon-link' );
$link_attr = $this->get_render_attribute_string( 'icon_link' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Step 1: Create array of items.
$item_html_array = array(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

if ( ! empty( $settings['rbelpro_social_icon_general_content_social_icon_repeater'] ) ) {
	foreach ( $settings['rbelpro_social_icon_general_content_social_icon_repeater'] as $index => $item ) {
		++$count; // track how many items processed.

		// Unique class for each item.
		$item_key = 'icon_item_' . $index; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$this->add_render_attribute( $item_key, 'class', 'rbelad-social-icon-item' );
		$this->add_render_attribute( $item_key, 'class', 'elementor-repeater-item-' . esc_attr( $item['_id'] ) );
		$item_attr = $this->get_render_attribute_string( $item_key ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		// Render icon.
		$icon = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		if ( 'image' === $item['rbelpro_social_icon_general_content_icon_type'] && ! empty( $item['rbelpro_social_icon_general_content_icon_image']['url'] ) ) {
			$icon = '<img src="' . esc_url( $item['rbelpro_social_icon_general_content_icon_image']['url'] ) . '" alt="' . esc_attr( $item['rbelpro_social_icon_general_content_icon_title'] ) . '">';
		} elseif ( 'icon' === $item['rbelpro_social_icon_general_content_icon_type'] && ! empty( $item['rbelpro_social_icon_general_content_font_icon'] ) ) {
			$icon = rbelad_render_icon( $item, 'icon', 'rbelpro_social_icon_general_content_font_icon' );
		}

		// Create icon output based on style.
		$item_icon = ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		if ( 'style-1' === $settings['rbelpro_social_icon_general_content_choose_design'] ) {
			$item_icon = sprintf(
				'<span class="rbelad-social-icon-item-child child-style-1"></span>
				<span class="rbelad-social-icon-item-child child-style-1"></span>
				<span class="rbelad-social-icon-item-child child-style-1"></span>
				<span class="rbelad-social-icon-item-child child-style-1"></span>
				<span class="rbelad-social-icon-item-child child-style-1">%1$s</span>',
				$icon
			);
		} elseif ( 'style-2' === $settings['rbelpro_social_icon_general_content_choose_design'] ) {
			$item_icon = sprintf(
				'<span class="rbelad-social-icon-item-child before-child child-style-2">%1$s</span>
				<span class="rbelad-social-icon-item-child after-child child-style-2">%1$s</span>',
				$icon
			);
		}

		// Final list item with link if available.
		if ( ! empty( $item['rbelpro_social_icon_general_content_icon_link']['url'] ) ) {
			$item_html_array[] = sprintf( '<li %1$s><a %2$s>%3$s</a></li>', $item_attr, $link_attr, $item_icon );
		} else {
			$item_html_array[] = sprintf( '<li %1$s>%2$s</li>', $item_attr, $item_icon );
		}
	}
}

// Output full HTML.
$item_html = implode( '', $item_html_array ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$nav_attr  = $this->get_render_attribute_string( 'icon_nav' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
$menu_attr = $this->get_render_attribute_string( 'icon_menu' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

$html = sprintf( '<nav %1$s><ul %2$s>%3$s</ul></nav>', $nav_attr, $menu_attr, $item_html ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

/** WP kses allowed tags */
$allowed_tags = wp_kses_allowed_html( 'post' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Allow SVG + Font Awesome attributes.
$allowed_tags['svg']  = array(
	'class'       => true,
	'aria-hidden' => true,
	'role'        => true,
	'xmlns'       => true,
	'width'       => true,
	'height'      => true,
	'viewbox'     => true, // note: lowercase here.
	'fill'        => true,
);
$allowed_tags['path'] = array(
	'd'    => true,
	'fill' => true,
);

// Echo with custom allowed tags.
echo wp_kses( $html, $allowed_tags );
