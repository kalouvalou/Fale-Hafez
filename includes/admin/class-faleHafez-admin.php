<?php

namespace faleHafez;

/**
 * Class Admin
 *
 * @package faleHafez
 */
class Admin {

    public function __construct() {
        
        $this->init_hooks();
    }

    /**
     * Initial plugin
     */
    private function init_hooks() {
        // Check exists require function
        if (!function_exists('wp_get_current_user')) {
            include(ABSPATH . "wp-includes/pluggable.php");
           
        }
        
        include(faleHafez_PLUGIN_DIRECTORY."includes/functions.php");
        

        // Add plugin caps to admin role
        if (is_admin() and is_super_admin()) {
            $this->add_cap();
        }

        // Actions.
       // add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
        add_action('admin_menu', [$this, 'admin_menu']);
    

        if (is_admin()) {
        

            if (!function_exists('get_plugin_data')) {
                require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }


        }

     
    }

    /**
     * Adding new capability in the plugin
     */
    public function add_cap() {
        // Get administrator role
        $role = get_role('administrator');
        $role->add_cap('fale-hafez');

    }

    /**
     * Register admin menu
     */
    public function admin_menu() {
        $noti_count = false;
        $icon       = faleHafez_PLUGIN_URL . '/includes/admin/assets/image/logo-20px.png';

        add_menu_page(
            __('Fale Hafez', 'fale-hafez'),
            __('Fale Hafez', 'fale-hafez'),
            
            'fale-hafez',
            'fale-hafez',
            '',
            '' . $icon . ''
        ); 
        add_submenu_page('fale-hafez', __('Fale Hafez', 'fale-hafez'), __('Fale Hafez', 'fale-hafez'), 'fale-hafez', 'fale-hafez', [$this, 'panel_callback']);
        //

    }

    /**
     * Callback outbox page.
     */
    public function panel_callback() {
        include_once faleHafez_PLUGIN_DIRECTORY . "/includes/admin/class-faleHafez-panel.php";
        $list_table = new faleHafez_panel();

    }

}

new Admin();


