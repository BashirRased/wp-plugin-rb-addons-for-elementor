<?php
/**
 * Image widget output.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

// ==============================
// Settings
// ==============================
$settings = $this->get_settings_for_display();
$prefix   = $this->get_section_content_prefix( 'general' );

// ==============================
// Image Setup (Ensure ID exists)
// ==============================
$image = $settings[ $prefix . '_img' ] ?? array();

// Fallback: Get attachment ID from URL (only if missing).
if ( empty( $image['id'] ) && ! empty( $image['url'] ) ) {
	$attachment_id = attachment_url_to_postid( $image['url'] );
	if ( $attachment_id ) {
		$image['id'] = $attachment_id;
	}
}

// Update settings (important for Elementor image size control).
$settings[ $prefix . '_img' ] = $image;

// Stop if no image.
if ( empty( $image['url'] ) ) {
	return;
}

// ==============================
// Link Handling
// ==============================
$link_type     = $settings[ $prefix . '_link_type' ] ?? '';
$link_url      = '';
$link_target   = '_self';
$link_nofollow = '';

switch ( $link_type ) {

	case 'page':
		if ( ! empty( $settings[ $prefix . '_page_link' ] ) ) {
			$link_url = get_permalink( $settings[ $prefix . '_page_link' ] );
		}
		break;

	case 'post':
		if ( ! empty( $settings[ $prefix . '_post_link' ] ) ) {
			$link_url = get_permalink( $settings[ $prefix . '_post_link' ] );
		}
		break;

	case 'custom':
		if ( ! empty( $settings[ $prefix . '_custom_link' ]['url'] ) ) {
			$link_url      = $settings[ $prefix . '_custom_link' ]['url'];
			$link_target   = ! empty( $settings[ $prefix . '_custom_link' ]['is_external'] ) ? '_blank' : '_self';
			$link_nofollow = ! empty( $settings[ $prefix . '_custom_link' ]['nofollow'] ) ? 'nofollow' : '';
		}
		break;
}

// ==============================
// Render Attributes
// ==============================

// Wrapper.
$this->add_render_attribute( 'wrapper', 'class', 'rbelad-image-widget' );

// Image.
$this->add_render_attribute( 'image', 'class', 'rbelad-image-widget-img' );

// Caption.
$this->add_render_attribute( 'caption', 'class', 'rbelad-image-widget-caption' );

// ==============================
// Image HTML (Elementor Way)
// ==============================
$image_html = Group_Control_Image_Size::get_attachment_image_html(
	$settings,
	$prefix . '_img_size',
	$prefix . '_img',
	'image' // adds render attribute properly.
);

// Stop if failed.
if ( empty( $image_html ) ) {
	return;
}

// ==============================
// Caption
// ==============================
$caption = '';

if ( ! empty( $settings[ $prefix . '_img_caption' ] ) ) {

	switch ( $settings[ $prefix . '_img_caption' ] ) {

		case 'attachment':
			if ( ! empty( $image['id'] ) ) {
				$caption = wp_get_attachment_caption( $image['id'] );
			}
			break;

		case 'custom':
			if ( ! Utils::is_empty( $settings[ $prefix . '_img_caption_text' ] ) ) {
				$caption = $settings[ $prefix . '_img_caption_text' ];
			}
			break;
	}
}

// ==============================
// Output
// ==============================

$wrapper_attr = $this->get_render_attribute_string( 'wrapper' );
$caption_attr = $this->get_render_attribute_string( 'caption' );
?>
<figure <?php echo $wrapper_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<?php if ( $link_url ) : ?>
		<a href="<?php echo esc_url( $link_url ); ?>"
			target="<?php echo esc_attr( $link_target ); ?>"
			rel="<?php echo esc_attr( $link_nofollow ); ?>">
			<?php echo wp_kses_post( $image_html ); ?>
		</a>
	<?php else : ?>
		<?php echo wp_kses_post( $image_html ); ?>
	<?php endif; ?>

	<?php if ( $caption ) : ?>
		<figcaption <?php echo $caption_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php echo esc_html( $caption ); ?>
		</figcaption>
	<?php endif; ?>

</figure>
