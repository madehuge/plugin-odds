<?php

/**
 * Define the internationalization functionality
 *
 * @package    Odds_Comparison
 */

class Common_Overides_i18n {

	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'odds-comparison',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}