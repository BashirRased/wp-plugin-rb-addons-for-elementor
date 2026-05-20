<?php
/**
 * Admin Dashboard Menu - Pro Widgets.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use RBELAD_Elementor_Addons\Widget_Manager;

defined( 'ABSPATH' ) || exit;

// Get data from Dashboard (no logic here).
$grouped_widgets  = Dashboard::get_pro_widget_map_catwise();
$category_labels  = Dashboard::get_pro_category_labels();
$inactive_widgets = get_option( 'rbelad_inactive_widgets', array() );
?>

<form id="rbelad-dashboard-form">

<?php if ( ! empty( $grouped_widgets ) ) : ?>

	<?php foreach ( $grouped_widgets as $cat_key => $widgets ) : ?>

		<div class="rbelad-widget-category">

			<!-- Header -->
			<div class="rbelad-admin-menu-section-head d-flex flex-wrap justify-content-between align-items-center">

				<h2 class="rbelad-admin-menu-section-title">
					<?php echo esc_html( $category_labels[ $cat_key ] ?? $cat_key ); ?>
					<span>(<?php echo esc_html( count( $widgets ) ); ?>)</span>
				</h2>

				<div class="rbelad-admin-menu-section-btns">
					<button type="button" class="rbelad-enable-all">
						<?php esc_html_e( 'Enable All', 'rb-addons-for-elementor' ); ?>
					</button>

					<button type="button" class="rbelad-disable-all">
						<?php esc_html_e( 'Disable All', 'rb-addons-for-elementor' ); ?>
					</button>
				</div>

			</div>

			<!-- Widgets -->
			<div class="rbelad-widgets-list">
				<div class="d-flex flex-wrap">

				<?php
				foreach ( $widgets as $slug => $widget ) :

					$slug_clean = preg_replace( '/^rbelad-/', '', $slug );

					$is_active = ! in_array( $slug, $inactive_widgets, true );
					?>

					<div class="col-sm-6 col-md-3 col-lg-4">
						<div class="rbelad-widgets-item d-flex justify-content-between align-items-center">

							<div class="d-flex align-items-center gap-2">

								<span class="rbelad-widgets-item-icon rbelad-wf rbelad-wf-<?php echo esc_attr( $slug_clean ); ?>"></span>

								<h5 class="rbelad-widgets-item-title">
									<?php echo esc_html( ucfirst( str_replace( '-', ' ', $slug_clean ) ) ); ?>
								</h5>

							</div>
							<div class="rbelad-widgets-item-btn-toggle">
								<input 
									type="checkbox"
									name="widgets[]"
									value="<?php echo esc_attr( $slug ); ?>"
									class="rbelad-widgets-item-btn-toggle__check"
									<?php checked( $is_active ); ?>
								/>
								<b class="rbelad-widgets-item-btn-toggle__switch"></b>
								<b class="rbelad-widgets-item-btn-toggle__track"></b>
							</div>

						</div>
					</div>

				<?php endforeach; ?>

				</div>
			</div>

		</div>

	<?php endforeach; ?>

	<!-- Global Save -->
	<div class="rbelad-save-wrap" style="margin-top:20px;">
		<button type="submit" class="button button-primary rbelad-global-save">
			<?php esc_html_e( 'Save Settings', 'rb-addons-for-elementor' ); ?>
		</button>
	</div>

<?php endif; ?>

</form>