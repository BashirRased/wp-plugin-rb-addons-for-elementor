<?php
/**
 * Admin Dashboard Menu - Credentials.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

$credential_list = Dashboard::get_credentials_map();
$credential_data = Dashboard::get_credentials();

defined( 'ABSPATH' ) || exit;
?>

<form id="rbelad-dashboard-form">

	<div class="rbelad-dashboard-credentials__item_list">
		<?php foreach ( $credential_list as $key => $cred ) : ?>			
			<div class="rbelad-dashboard-credentials__item">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-2">
						<div class="rbelad-dashboard-credentials__item-title-wrap">
							<span class="rbelad-dashboard-credentials__item-icon">
								<i class="hm hm-mail-chimp"></i>
							</span>
							<h3 class="rbelad-dashboard-credentials__item-title">
								<label><?php echo esc_html( $cred['title'] ); ?></label>
							</h3>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-10">
						<div class="row">
							<?php
							$field_count        = count( $cred['fields'] );
							$field_column_class = 'col-12 col-sm-12 col-lg-12';

							if ( 1 === $field_count ) {
								$field_column_class = 'col-12 col-sm-12 col-lg-12';
							} elseif ( 2 === $field_count ) {
								$field_column_class = 'col-12 col-sm-6';
							} elseif ( 3 === $field_count ) {
								$field_column_class = 'col-12 col-sm-6 col-lg-4';
							}
							foreach ( $cred['fields'] as $field ) :
								?>
							<div class="rbelad-dashboard-credentials__item-input-wrap d-flex flex-wrap flex-column row-gap-2 <?php echo esc_attr( $field_column_class ); ?>">
								<label class="rbelad-dashboard-credentials__item-label">
									<?php echo esc_html( $field['label'] ); ?>
									<?php if ( ! empty( $field['help']['link'] ) && ! empty( $field['help']['instruction'] ) ) : ?>
										<a href="<?php echo esc_url( $field['help']['link'] ); ?>" target="_blank" rel="noopener noreferrer">
											<?php echo esc_html( $field['help']['instruction'] ); ?>
										</a>
									<?php endif; ?>
								</label>
								<input class="rbelad-dashboard-credentials__item-input" 
									type="<?php echo esc_attr( $field['type'] ); ?>"
									name="credentials[<?php echo esc_attr( $key ); ?>][<?php echo esc_attr( $field['name'] ); ?>]"
									value="<?php echo esc_attr( $credential_data[ $key ][ $field['name'] ] ?? '' ); ?>"
								>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>					
				
			</div>			
		<?php endforeach; ?>
	</div>

	<div class="rbelad-save-wrap">
		<button type="submit" class="button button-primary">
			<?php esc_html_e( 'Save Settings', 'rb-addons-for-elementor' ); ?>
		</button>
	</div>

</form>
