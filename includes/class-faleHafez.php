<?php
/** Prevent this file from being accessed directly */
if (!defined('ABSPATH')) {
    die("Direct access of plugin files is not allowed.");
}

/**
 * Class faleHafez
 */
class faleHafez {
    public $plugin_path = "";

    public $plugin_url = "";

    /**
     * faleHafez constructor.
     */
    public function __construct() {
        $this->plugin_path = faleHafez_PLUGIN_DIRECTORY;
        $this->plugin_url  = faleHafez_PLUGIN_URL;

        $this->includes();
        $this->init_hooks();
    }

    /**
     * Initial plugin setup.
     */
    private function init_hooks(): void {
        register_activation_hook(
            faleHafez_PLUGIN_FILE,
            ['\faleHafez\Install', 'install']
        );

        add_action('init', [$this, 'load_textdomain']);
    }

    /**
     * Load plugin textdomain.
     */
    public function load_textdomain(): void {
       
        load_plugin_textdomain(
            faleHafez_PLUGIN_TEXTDOMAIN,
            false,
            faleHafez_PLUGIN_DIRECTORY . "/languages"
        );
    }

    /**
     * Includes classes and functions.
     */
    public function includes(): void {
        require_once $this->plugin_path . 'includes/class-faleHafez-install.php';

        if (is_admin()) {
            require_once $this->plugin_path . 'includes/admin/class-faleHafez-admin.php';
        }
        else {
            require_once $this->plugin_path . 'includes/class-faleHafez-public.php';
        }

        require_once $this->plugin_path . 'includes/class-faleHafez-public.php';
    }
}
