<?php
namespace RB_Elementor_Addons\Widgets;
use Elementor\Widget_Base;
use RB_Elementor_Addons\Common\Widget_Manager;

defined( 'ABSPATH' ) || die();

abstract class Base extends Widget_Base {
    // All Widget ID List
    public function get_name() {
        $full_class = strtolower( get_class( $this ) );
        $namespace = strtolower( __NAMESPACE__ );
        $name = str_replace( $namespace . '\\', '', $full_class );
        $name = str_replace( '_', '-', $name );
        $name = ltrim( $name, '\\' );
        return 'rb-' . $name;
    }

    // All Widget Title List
    public function get_title() {
        $slug = $this->get_name();
        $slug_without_prefix = preg_replace( '/^rb-/', '', $slug );
        $title = ucwords( str_replace( '-', ' ', $slug_without_prefix ) );
        return esc_html( $title, 'rb-elementor-addons' );
    }

    // All Widget Icon List
    public function get_icon() {
        $slug = $this->get_name();
        return 'eicon-' . $slug;
    }

    // All Widget Category List
    public function get_categories(): array {
        $slug_without_prefix = preg_replace( '/^rb-/', '', $this->get_name() );
        $category = Widget_Manager::get_widget_category( $slug_without_prefix );
        return [ $category ];
    }
}
