<?php
/**
 * Heading widget live preview.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<#
var prefix = 'general'; // must match your PHP prefix logic

var heading = settings[prefix + '_heading'];
var link    = settings[prefix + '_link'];
var tag     = settings[prefix + '_html_tag'] ? settings[prefix + '_html_tag'] : 'h2';

if ( ! heading ) {
	return;
}
#>

<{{ tag }} class="rbelad-heading-wrap">

	<# if ( link && link.url ) { #>
		<a href="{{ link.url }}"
			<# if ( link.is_external ) { #> target="_blank" <# } #>
			<# if ( link.nofollow ) { #> rel="nofollow" <# } #>
		>
	<# } #>

		{{{ heading }}}

	<# if ( link && link.url ) { #>
		</a>
	<# } #>

</{{ tag }}>
<?php
