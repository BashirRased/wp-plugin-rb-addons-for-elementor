<?php
/**
 * Heading widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );

if ( empty( $rbelad_settings[ $rbelad_prefix . '_heading' ] ) ) {
	return;
}

$rbelad_control = $rbelad_prefix . '_heading';

$rbelad_tag = rbelad_escape_tags(
	$rbelad_settings[ $rbelad_prefix . '_html_tag' ] ?? 'h2',
	'h2'
);

$rbelad_heading = rbelad_kses_intermediate(
	$rbelad_settings[ $rbelad_control ]
);

/**
 * Enable Elementor inline editing.
 */
$this->add_inline_editing_attributes(
	$rbelad_control,
	'none'
);

/**
 * Heading wrapper attributes.
 */
$this->add_render_attribute(
	$rbelad_control,
	'class',
	'rbelad-heading__wrap'
);

/**
 * Link Controls.
 */
$rbelad_link_base = $rbelad_prefix . '_heading_link_type';

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
	$this->add_link_attributes( 'rbelad_heading_link', $rbelad_link );
}

?>

<<?php echo tag_escape( $rbelad_tag ); ?> <?php echo wp_kses_post( $this->get_render_attribute_string( $rbelad_control ) ); ?>>

	<?php if ( ! empty( $rbelad_link['url'] ) ) : ?>
		<a <?php echo wp_kses_post( $this->get_render_attribute_string( 'rbelad_heading_link' ) ); ?>>
			<?php echo esc_attr( $rbelad_heading ); ?>
		</a>
	<?php else : ?>
		<?php echo esc_attr( $rbelad_heading ); ?>
	<?php endif; ?>

</<?php echo tag_escape( $rbelad_tag ); ?>>