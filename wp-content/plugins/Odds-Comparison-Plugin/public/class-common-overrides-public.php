<?php

/**
 * The file that defines the core plugin class
 *
 * @package    Odds_Comparison
 */

class Odds_Comparison_Public_Class {
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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, Odds_Comparison_GLOBAL_PATH . 'public/css/front-end.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, Odds_Comparison_GLOBAL_PATH . 'public/js/front-end.js', array( 'jquery' ), $this->version, false );

	}

	public function register_shortcodes_odss(){

		add_shortcode( 'odds_comparison','show_odds'  );
		function show_odds(  ) {
			// Fetch and display odds
        $odds = $this->fetch_odds();
        ob_start();
        echo '<div class="odds-comparison">';
        foreach ($odds as $bookmaker => $data) {
            echo '<div class="bookmaker">';
            echo '<h2>' . esc_html($bookmaker) . '</h2>';
            foreach ($data as $event => $odd) {
                echo '<p>' . esc_html($event) . ': ' . esc_html($odd) . '</p>';
            }
            echo '</div>';
        }
        echo '</div>';
        return ob_get_clean();
		}
	}
	
    private function fetch_odds() {
        // Fetch odds from external APIs
        $odds = [];
        // Example data, replace with actual API calls
        $odds['Bookmaker 1'] = [
            'Event 1' => '1.5',
            'Event 2' => '2.0',
        ];
        $odds['Bookmaker 2'] = [
            'Event 1' => '1.6',
            'Event 2' => '1.9',
        ];
        return $odds;
    }
}