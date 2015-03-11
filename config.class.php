<?php
	/**
	 * Configuration class
	 */ 
	class Config {
		/**
		 * Return with all config values
		 * @return array Configuration values as array
		 */
		function getConfig() {
			return array(
				'db' => array(
					'host' => 'localhost',
					'user' => 'root',
					'pass' => '',
					'db' => 'movie'
				)
			);
		}
	}
?>