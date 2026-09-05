<?php
/**
 * Admin Dashboard Menu - Free Widgets.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Free widget configuration.
 */
$rbelad_widgets = Widgets_Manager::get_local_widgets_map();

/**
 * Free widget categories.
 *
 * Only free widget categories are included here.
 */
$rbelad_categories = array(
	'rbelad_addons_basic'   => array(
		'title' => esc_html__( 'Basic Widgets', 'rb-addons-for-elementor' ),
		'icon'  => 'rbelad-wi rbelad-wi-plugin',
	),

	'rbelad_addons_general' => array(
		'title' => esc_html__( 'General Widgets', 'rb-addons-for-elementor' ),
		'icon'  => 'rbelad-wi rbelad-wi-plugin',
	),
);
?>

<div class="rbelad-dashboard-free-widgets">

	<h2 class="title">
		<?php echo esc_html__( 'Free Widgets', 'rb-addons-for-elementor' ); ?>
	</h2>

	<?php foreach ( $rbelad_categories as $rbelad_category_slug => $rbelad_category ) : ?>

		<?php
		/**
		 * Get widgets from current category.
		 */
		$rbelad_category_widgets = array();

		foreach ( $rbelad_widgets as $rbelad_widget_slug => $rbelad_widget ) {

			if (
				isset( $rbelad_widget['cat'] ) &&
				$rbelad_widget['cat'] === $rbelad_category_slug
			) {
				$rbelad_category_widgets[ $rbelad_widget_slug ] = $rbelad_widget;
			}
		}

		/**
		 * Skip empty categories.
		 */
		if ( empty( $rbelad_category_widgets ) ) {
			continue;
		}
		?>

		<div class="rbelad-widget-category">

			<h3 class="rbelad-widget-category__title">
				<i class="<?php echo esc_attr( $rbelad_category['icon'] ); ?>" aria-hidden="true"></i>

				<?php echo esc_html( $rbelad_category['title'] ); ?>

				<span class="rbelad-widget-category__count">
					<?php echo esc_html( count( $rbelad_category_widgets ) ); ?>
				</span>
			</h3>

			<ul class="rbelad-widget-list">

				<?php foreach ( $rbelad_category_widgets as $rbelad_widget_slug => $rbelad_widget ) : ?>

					<?php
					/**
					 * Widget title.
					 */
					$rbelad_widget_title = ! empty( $rbelad_widget['title'] )
						? $rbelad_widget['title']
						: ucwords(
							str_replace(
								array( '-', '_' ),
								' ',
								$rbelad_widget_slug
							)
						);

					/**
					 * Widget icon.
					 */
					$rbelad_widget_icon = 'rbelad-wi rbelad-wi-' . str_replace(
						array( '-', '_' ),
						array( '-', '-' ),
						$rbelad_widget_slug
					);
					?>

					<li class="rbelad-widget-list__item">

						<span class="rbelad-widget-list__icon">
							<i
								class="<?php echo esc_attr( $rbelad_widget_icon ); ?>"
								aria-hidden="true"
							></i>
						</span>

						<span class="rbelad-widget-list__title">
							<?php echo esc_html( $rbelad_widget_title ); ?>
						</span>

					</li>

				<?php endforeach; ?>

			</ul>

		</div>

	<?php endforeach; ?>

</div>
