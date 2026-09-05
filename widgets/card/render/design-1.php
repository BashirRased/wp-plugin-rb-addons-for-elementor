<?php
/**
 * Card widget design - 1.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Group_Control_Image_Size;

/**
 * Widget settings.
 */
$rbelad_settings = $this->get_settings_for_display();

/**
 * Control prefixes.
 */
$rbelad_prefix_title  = $this->get_section_content_prefix( 'title' );
$rbelad_prefix_desc   = $this->get_section_content_prefix( 'desc' );
$rbelad_prefix_img    = $this->get_section_content_prefix( 'img' );
$rbelad_after_prefix  = $this->get_section_content_prefix( 'wrap_after' );
$rbelad_before_prefix = $this->get_section_content_prefix( 'wrap_before' );

/**
 * -----------------------------------------------------------------------
 * Control IDs.
 * -----------------------------------------------------------------------
 *
 * These must match the actual Elementor control IDs.
 */
$rbelad_title_control = $rbelad_prefix_title . '_text';
$rbelad_desc_control  = $rbelad_prefix_desc . '_desc';

/**
 * -----------------------------------------------------------------------
 * Card image.
 * -----------------------------------------------------------------------
 */
$rbelad_image_html = Group_Control_Image_Size::get_attachment_image_html(
	$rbelad_settings,
	$rbelad_prefix_img . '_img_size',
	$rbelad_prefix_img . '_img'
);

/**
 * Add Elementor inline editing attributes.
 */
$this->add_inline_editing_attributes(
	$rbelad_title_control,
	'basic'
);

$this->add_inline_editing_attributes(
	$rbelad_desc_control,
	'basic'
);

/**
 * Add Elementor attributes.
 */
$this->add_render_attribute(
	$rbelad_title_control,
	'class',
	'rbelad-card__title rbelad-absolute-before'
);

$this->add_render_attribute(
	$rbelad_desc_control,
	'class',
	'rbelad-card__desc'
);
?>

<div class="rbelad-card__wrap rbelad-flex rbelad-relative">

	<?php
	/**
	 * -----------------------------------------------------------------------
	 * Before icon/image.
	 * -----------------------------------------------------------------------
	 */
	?>
	<div class="rbelad-card__before-wrap">
		<?php
		$this->render_icon_img(
			$rbelad_settings,
			'_card_before_icon_img',
			'_card_before_icon_simple',
			'_card_before_img',
			array(
				'icon'  => 'rbelad-card__before-icon',
				'image' => 'rbelad-card__before-image',
			),
			$rbelad_before_prefix
		);
		?>
	</div>

	<?php
	/**
	 * -----------------------------------------------------------------------
	 * Card image.
	 * -----------------------------------------------------------------------
	 */
	?>
	<div class="rbelad-card__img-wrap rbelad-card__item">
		<?php
		if ( ! empty( $rbelad_image_html ) ) {
			echo wp_kses_post( $rbelad_image_html );
		}
		?>
	</div>

	<?php
	/**
	 * -----------------------------------------------------------------------
	 * Card content.
	 * -----------------------------------------------------------------------
	 */
	?>
	<div class="rbelad-card__content-wrap rbelad-card__item">

		<?php
		/**
		 * -------------------------------------------------------------------
		 * Card title.
		 * -------------------------------------------------------------------
		 */
		if ( ! empty( $rbelad_settings[ $rbelad_title_control ] ) ) {
			?>
			<h3	<?php echo wp_kses_post( $this->get_render_attribute_string( $rbelad_title_control ) ); ?>>
				<?php echo esc_html( $rbelad_settings[ $rbelad_title_control ] ); ?>
			</h3>
			<?php
		}
		?>

		<?php
		/**
		 * -------------------------------------------------------------------
		 * Card description.
		 * -------------------------------------------------------------------
		 */
		if ( ! empty( $rbelad_settings[ $rbelad_desc_control ] ) ) {
			?>
			<div <?php echo wp_kses_post( $this->get_render_attribute_string( $rbelad_desc_control ) ); ?>>
				<?php echo wp_kses_post( $rbelad_settings[ $rbelad_desc_control ] ); ?>
			</div>
			<?php
		}
		?>

	</div>

	<?php
	/**
	 * -----------------------------------------------------------------------
	 * After icon/image.
	 * -----------------------------------------------------------------------
	 */
	?>
	<div class="rbelad-card__after-wrap">
		<?php
		$this->render_icon_img(
			$rbelad_settings,
			'_card_after_icon_img',
			'_card_after_icon_simple',
			'_card_after_img',
			array(
				'icon'  => 'rbelad-card__after-icon',
				'image' => 'rbelad-card__after-image',
			),
			$rbelad_after_prefix
		);
		?>
	</div>

</div>
