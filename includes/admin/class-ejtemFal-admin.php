<?php

namespace ejtemFal;

/**
 * Class Admin
 *
 * @package ejtemFal
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
        
        include(ejtemFal_PLUGIN_DIRECTORY."includes/functions.php");
        

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
        $role->add_cap('hafez-ejtemFal');

    }

    /**
     * Register admin menu
     */
    public function admin_menu() {
        $noti_count = false;
        $icon       = ejtemFal_PLUGIN_URL . '/includes/admin/assets/image/logo-20px.png';

        add_menu_page(
            __('Fale Hafez', 'hafez-ejtemFal'),
            __('Fale Hafez', 'hafez-ejtemFal'),
            
            'hafez-ejtemFal',
            'hafez-ejtemFal',
            '',
            '' . $icon . ''
        ); 
        add_submenu_page('hafez-ejtemFal', __('Fale Hafez', 'hafez-ejtemFal'), __('Fale Hafez', 'hafez-ejtemFal'), 'hafez-ejtemFal', 'hafez-ejtemFal', [$this, 'panel_callback']);
        //

    }

    /**
     * Callback outbox page.
     */
    public function panel_callback() {
        include_once ejtemFal_PLUGIN_DIRECTORY . "/includes/admin/class-ejtemFal-panel.php";
        $list_table = new Panel_edit();

    }

}

new Admin();


