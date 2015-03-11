<?php
	/**
	 * Actor class can return all actors by movie ID
	 */
	class Actor {
		/**
		 * Unique ID of actor
		 */
		public $id;
		/**
		 * Unique ID of movie
		 */
		public $movie_id;
		/**
		 * Name of actor
		 */
		public $name;
		/**
		 * Birthday of actor
		 */
		public $birthdate;
		/**
		 * Validator object
		 */
		public $validation;
		/**
		 * Table name
		 */
		 public $table = 'actor';
		
		/**
		 * Constructor set up validation
		 */
		public function __construct() {
			require_once('validation.class.php');
			$this->validation = new ActorValidation;
		}
		
		/**
		 * Return actors details as JSON string
		 * @return string JSON string
		 */
		public function getJSON() {
			return json_encode(array(
				'name' => $this->name,
				'birthdate' => $this->birthdate
			));
		}
		
		/**
		 * Return actor details as array
		 * @return array Details of actor
		 */
		public function getData() {
			return array(
				'name' => $this->name,
				'birthdate' => $this->birthdate
			);
		}
		
		/**
		 * Return unique ID of actor
		 * @return integer
		 */
		public function id() {
			return $this->id;
		}
		
		/**
		 * Return unique id of movie
		 * @return integer
		 */
		public function movie_id() {
			return $this->movie_id;
		}
		
		/**
		 * Return name of actor
		 * @return string
		 */
		public function name() {
			return $this->name;
		}
		
		/**
		 * Return borthday of actor
		 * @return string A PHP date string
		 */
		public function birthdate() {
			return $this->birthdate;
		}
	}
?>