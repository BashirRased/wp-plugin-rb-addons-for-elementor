<?php
namespace RB_Elementor_Addons;
use RB_Elementor_Addons\PageSettings\Page_Settings;
use RB_Elementor_Addons\Common\Widget_Manager;
use RB_Elementor_Addons\Common\Assets_Manager;

defined( 'ABSPATH' ) || exit;

class Plugin {
    private static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function init() {
        add_action( 'init', [ $this, 'include_files' ] );
        add_action( 'elementor/editor/after_enqueue_scripts', [ Assets_Manager::class, 'elementor_editor_assets' ] );
        add_action( 'elementor/widgets/register', [ Widget_Manager::class, 'register_widgets' ] );
        add_action( 'elementor/elements/categories_registered', [ Widget_Manager::class, 'register_categories' ] );
        $this->add_page_settings_controls();
        do_action( 'rb_addons_loaded' );
    }

    public function load_textdomain() {
		load_textdomain( 'rb-elementor-addons', WP_LANG_DIR . '/plugins/rb-elementor-addons-' . get_locale() . '.mo' );
	}

    public function include_files() {
        include_once RB_ADDONS_PATH . 'inc/common/widget-base.php';
        include_once RB_ADDONS_PATH . 'inc/common/widget-manager.php';
        include_once RB_ADDONS_PATH . 'inc/common/assets-manager.php';
    }

    private function add_page_settings_controls() {
        require_once RB_ADDONS_PATH . 'inc/common/page-settings.php';
        new Page_Settings();
    }
}
Plugin::instance();