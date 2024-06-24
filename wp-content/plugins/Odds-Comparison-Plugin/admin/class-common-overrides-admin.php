<?php

/**
 * The file that defines the core plugin class
 *
 * @package    Odds_Comparison
 */


class Odds_Comparison_Admin_Class {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader Class as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Loader Class will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, Odds_Comparison_GLOBAL_PATH . 'admin/css/admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader Class as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Loader Class will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, Odds_Comparison_GLOBAL_PATH . 'admin/js/admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_additional_methods_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader Class as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Loader Class will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, Odds_Comparison_GLOBAL_PATH . 'admin/js/extra.js', array( 'jquery' ), $this->version, false );

	}


	public function add_admin_menu() {
        add_menu_page(
            'Odds Comparison', 
            'Odds Comparison', 
            'manage_options', 
            'odds-comparison', 
            array($this, 'show_admin_page'), 
            'dashicons-chart-line', 
            6
        );
    }

    public function show_admin_page() {
        // Admin page content
        echo '<div class="wrap">';
        echo '<h1>Odds Comparison Settings</h1>';
        echo '<form method="post" action="options.php">';
        settings_fields('odds_comparison_options');
        do_settings_sections('odds-comparison');
        submit_button();
        echo '</form>';
        echo '</div>';
    }

}