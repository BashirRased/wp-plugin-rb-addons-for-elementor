<?php
/**
 * Rating Star widget output.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rbelad_settings = $this->get_settings_for_display();
$rbelad_prefix   = $this->get_section_content_prefix( 'general' );
$this->render_rating(
	$rbelad_settings,
	'_general_rating',
	array(
		'wrap'  => 'rbelad-rating__wrap',
		'full'  => 'rbelad-rating__icon rbelad-rating__icon--full',
		'half'  => 'rbelad-rating__icon rbelad-rating__icon--half',
		'empty' => 'rbelad-rating__icon rbelad-rating__icon--empty',
	)
);
