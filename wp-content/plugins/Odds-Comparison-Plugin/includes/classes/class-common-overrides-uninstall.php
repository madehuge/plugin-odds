<?php

/**
 * Fired during plugin deactivation
 *
 * @package    Odds_Comparison
 */
if ( ! class_exists( 'Odds_Comparison_Uninstall' ) ) {
	class Odds_Comparison_Uninstall {
		public function __construct() {
			$this->uninstall();
		}

		public static function uninstall() {

		}
	}

	new Odds_Comparison_Uninstall();
}