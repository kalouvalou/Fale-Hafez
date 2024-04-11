<?php
/** Prevent this file from being accessed directly */
if (!defined('ABSPATH')) {
    die("Direct access of plugin files is not allowed.");
}

/**
 * Class ejtemFal
 */
class ejtemFal {
    public $plugin_path = "";

    public $plugin_url = "";

    /**
     * ejtemFal constructor.
     */
    public function __construct() {
        $this->plugin_path = ejtemFal_PLUGIN_DIRECTORY;
        $this->plugin_url  = ejtemFal_PLUGIN_URL;

        $this->includes();
        $this->init_hooks();
    }

    /**
     * Initial plugin setup.
     */
    private function init_hooks(): void {
        register_activation_hook(
            ejtemFal_PLUGIN_FILE,
            ['\ejtemFal\Install', 'install']
        );

        add_action('init', [$this, 'load_textdomain']);
    }

    /**
     * Load plugin textdomain.
     */
    public function load_textdomain(): void {
       
        load_plugin_textdomain(
            ejtemFal_PLUGIN_TEXTDOMAIN,
            false,
            ejtemFal_PLUGIN_DIRECTORY . "/languages"
        );
    }

    /**
     * Includes classes and functions.
     */
    public function includes(): void {
        require_once $this->plugin_path . 'includes/class-ejtemFal-install.php';

        if (is_admin()) {
            require_once $this->plugin_path . 'includes/admin/class-ejtemFal-admin.php';
        }
        else {
            require_once $this->plugin_path . 'includes/class-ejtemFal-public.php';
        }

        require_once $this->plugin_path . 'includes/class-ejtemFal-public.php';
    }
}
