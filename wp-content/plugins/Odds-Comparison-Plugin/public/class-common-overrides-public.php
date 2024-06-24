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
		function show_odds() {
			// Fetch and display odds
        $odds = [];
		$bookmakers = [
			'Bookmaker 1' => 'https://api.bookmaker1.com/odds',
			'Bookmaker 2' => 'https://api.bookmaker2.com/odds',
			// Add more bookmakers and their API endpoints here
		];

		foreach ($bookmakers as $bookmaker => $url) {
			$response = wp_remote_get($url);
			if (is_wp_error($response)) {
				continue;
			}
			$body = wp_remote_retrieve_body($response);
			$data = json_decode($body, true);
			if (json_last_error() === JSON_ERROR_NONE) {
				$odds[$bookmaker] = $data;
			}
		}
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
	

}