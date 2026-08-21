<?php
/**
 * Image widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

// Settings.
$rbelad_image      = $rbelad_settings[ $rbelad_prefix . '_img' ] ?? array();
$rbelad_image_size = $rbelad_settings[ $rbelad_prefix . '_img_size' ] ?? 'full';
$rbelad_caption    = $rbelad_settings[ $rbelad_prefix . '_img_caption' ] ?? 'none';

/**
 * Link Controls.
 */
$rbelad_link_base = $rbelad_prefix . '_select_img_type';

$rbelad_link_type = $rbelad_settings[ $rbelad_link_base . '_select_option' ] ?? 'none';

$rbelad_link = array();

switch ( $rbelad_link_type ) {

	case 'page_link':
		if ( ! empty( $rbelad_settings[ $rbelad_link_base . '_page_link' ] ) ) {
			$rbelad_link['url'] = get_permalink( (int) $rbelad_settings[ $rbelad_link_base . '_page_link' ] );
		}
		break;

	case 'post_link':
		if ( ! empty( $rbelad_settings[ $rbelad_link_base . '_post_link' ] ) ) {
			$rbelad_link['url'] = get_permalink( (int) $rbelad_settings[ $rbelad_link_base . '_post_link' ] );
		}
		break;

	case 'custom_link':
		if ( ! empty( $rbelad_settings[ $rbelad_link_base . '_custom_link' ] ) ) {
			$rbelad_link = $rbelad_settings[ $rbelad_link_base . '_custom_link' ];
		}
		break;
}

if ( ! empty( $rbelad_link['url'] ) ) {
	$this->add_link_attributes( 'rbelad_image_link', $rbelad_link );
}
?>

<div class="rbelad-image__wrap">
		<?php
		// Get caption HTML.
		$rbelad_caption_html = '';

		if ( 'attachment' === $rbelad_caption && ! empty( $rbelad_image['id'] ) ) {
			$rbelad_caption_text = wp_get_attachment_caption( $rbelad_image['id'] );
		} elseif ( 'custom' === $rbelad_caption ) {
			$rbelad_caption_text = $rbelad_settings[ $rbelad_prefix . '_caption_text' ] ?? '';
		}

		if ( ! empty( $rbelad_caption_text ) ) {
			$rbelad_caption_html = sprintf(
				'<div class="rbelad-image__caption">%s</div>',
				esc_html( $rbelad_caption_text )
			);
		}

		// Image HTML.
		$rbelad_image_html = wp_kses_post(
			\Elementor\Group_Control_Image_Size::get_attachment_image_html(
				$rbelad_settings,
				$rbelad_prefix . '_img_size',
				$rbelad_prefix . '_img'
			)
		);

		if ( ! empty( $rbelad_link['url'] ) ) :
			?>
		<a <?php echo wp_kses_post( $this->get_render_attribute_string( 'link' ) ); ?>>
			<?php
			echo wp_kses_post( $rbelad_image_html );
			echo wp_kses_post( $rbelad_caption_html );
			?>
		</a>
			<?php
	else :
		echo wp_kses_post( $rbelad_image_html );
		echo wp_kses_post( $rbelad_caption_html );
	endif;
	?>
</div>
