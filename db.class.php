<?php
	/**
	 * Database class
	 */
	class DB {
		/**
		 * Config will store config values from config.class.php
		 */
		private $config;
		/**
		 * Constructor will set up db connection
		 * @return $this->connect
		 * @see DB::connect() 
		 */
		function __construct() {
			require_once('config.class.php');
			$config = new Config;
			$this->config = $config->getConfig();
			return $this->connect();
		}
		
		/**
		 * Connect to mySQL database
		 * @return mixed DB resource on success or string on error
		 */
		function connect() {
			$link = mysql_connect($this->config['host'],$this->config['user'],$this->config['pass']);
			if(!$link) {
				return mysql_error();
			}
			if(!mysql_select_db($this->config['db'])) {
				return mysql_error();
			}
			return $link;
		}
	}
?>