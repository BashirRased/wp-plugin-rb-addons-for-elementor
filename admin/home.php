<?php
/**
 * Admin Home Page Template
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use RBELAD_Elementor_Addons\Widget_Manager;

$widgets = Widget_Manager::get_all_widgets_map(); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
?>

<div class="wrap rbelad-dashboard">
	<div class="rbelad-dash-widget-area">

		<!-- ================= Sidebar ================= -->
		<aside class="rbelad-sidebar rbelad-dash-widget-sidebar">

			<!-- Search -->
			<div class="rbelad-search-box-area">
				<input
					type="search"
					class="rbelad-search-box-input"
					id="rbelad-sidebar-search"
					placeholder="<?php esc_attr_e( 'Search Widgets', 'rb-addons-for-elementor' ); ?>"
				>
			</div>

			<!-- Widgets List -->
			<ul class="rbelad-dash-widget-sidebar-list">
				<?php
				$is_first = true; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

				foreach ( $widgets as $slug => $widget ) :
					$widget_name = ucwords( str_replace( '-', ' ', $slug ) );  // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
					$style_count = ! empty( $widget['styles'] ) ? count( $widget['styles'] ) : 0;  // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
					$tab_id      = esc_attr( $slug . '-widget-tab' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
					$active      = $is_first ? 'active' : ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
					$is_first    = false; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
					?>

					<li
						class="rbelad-dash-widget-sidebar-item <?php echo esc_attr( $active ); ?>"
						data-tab="<?php echo esc_attr( $tab_id ); ?>"
						data-widget="<?php echo esc_attr( $slug ); ?>"
					>
						<i class="zy-fonticon zy-<?php echo esc_attr( ucfirst( $slug ) ); ?>"></i>
						<?php echo esc_html( $widget_name ); ?>

						<?php if ( $style_count > 0 ) : ?>
							<span class="rbelad-widget-count-list">
								<?php echo esc_html( $style_count ); ?>
							</span>
						<?php endif; ?>
					</li>

				<?php endforeach; ?>
			</ul>
		</aside>

		<!-- ================= Main ================= -->
		<main class="rbelad-main rbelad-dash-widget-main" role="main">

			<?php
			$i = 0; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

			foreach ( $widgets as $widget_slug => $widget ) :
				++$i;

				$tab_id      = esc_attr( $widget_slug . '-widget-tab' );
				$is_active   = ( 1 === $i ) ? 'active' : '';
				$style_count = ! empty( $widget['styles'] ) ? count( $widget['styles'] ) : 0;
				$enabled     = get_option( "rbelad_{$widget_slug}_widget_enabled", 'yes' );
				?>

				<div
					id="<?php echo esc_attr( $tab_id ); ?>"
					class="rbelad-widget-box <?php echo esc_attr( $is_active ); ?>"
					data-widget="<?php echo esc_attr( $widget_slug ); ?>"
				>

					<!-- Header -->
					<div class="rbelad-widget-header">
						<h3 class="rbelad-widget-title">
							<?php echo esc_html( ucwords( str_replace( '-', ' ', $widget_slug ) ) ); ?>

							<?php if ( $style_count > 0 ) : ?>
								<span class="rbelad-widget-style-count">
									<?php echo esc_html( sprintf( '%d styles', $style_count ) ); ?>
								</span>
							<?php endif; ?>
						</h3>
					</div>

					<!-- Styles -->
					<div class="rbelad-style-list">
						<?php
						foreach ( $widget['styles'] as $style_key => $style ) :
							$is_disabled = (
								'no' === $enabled ||
								empty( $style['is_active'] )
							);
							$style_class = $is_disabled ? 'is-disabled' : '';
							?>

							<div
								class="rbelad-style-item <?php echo esc_attr( $style_class ); ?>"
								data-style="<?php echo esc_attr( $style_key ); ?>"
							>

								<?php if ( ! empty( $style['thumb'] ) ) : ?>
									<img
										src="<?php echo esc_url( $style['thumb'] ); ?>"
										alt="<?php echo esc_attr( $style['name'] ); ?>"
									>
								<?php else : ?>
									<div class="rbelad-thumb-placeholder">
										<?php esc_html_e( 'No Image', 'rb-addons-for-elementor' ); ?>
									</div>
								<?php endif; ?>

								<div class="rbelad-dash-each-widget-style-content">
									<span class="rbelad-style-name">
										<?php echo esc_html( $style['name'] ); ?>
									</span>
								</div>

							</div>

						<?php endforeach; ?>
					</div>

				</div>

			<?php endforeach; ?>

		</main>
	</div>
</div>
