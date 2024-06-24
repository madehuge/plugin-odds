<?php

/**
 * Fired during plugin activation
 *
 * @package    Odds_Comparison
 */

if ( ! class_exists( 'Odds_Comparison_Activator' ) ) {
	class Odds_Comparison_Activator {
		public function __construct() {
			$this->activate();
		}

		public static function activate() {

		}

	}

	new Odds_Comparison_Activator();
}