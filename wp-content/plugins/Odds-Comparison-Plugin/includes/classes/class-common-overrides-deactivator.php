<?php

/**
 * Fired during plugin deactivation
 *
 * @package    Odds_Comparison
 */

if ( ! class_exists( 'Odds_Comparison_Deactivator' ) ) {
	class Odds_Comparison_Deactivator {
		public function __construct() {
			$this->deactivate();
		}

		public static function deactivate() {

		}
	}

	new Odds_Comparison_Deactivator();
}