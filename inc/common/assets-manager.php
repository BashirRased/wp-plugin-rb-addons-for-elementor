<?php
namespace RB_Elementor_Addons\Common;

defined( 'ABSPATH' ) || exit;

class Assets_Manager {
    /**
     * Elementor Editor (Admin) CSS & JS
     */
    public static function elementor_editor_assets() {
        wp_enqueue_style(
            'rb-icon-style',
            RB_ADDONS_ASSETS . 'css/all-icon.css',
            [],
            time(),
            'all'
        );
    }
}
