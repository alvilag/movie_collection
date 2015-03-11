<?php
	/**
	 * Movie's validation class
	 */
	class MovieValidation extends Movie {
		/**
		 * Constructor will set up runtime and release date as timestamp
		 */
		function __construct() {
			/*Store movie's runtime as timestamp*/
			$this->runtime = $this->runtime*60;
			/*Store movie's release date as timestamp*/
			$this->release_date = strtotime($this->release_date);
		}
		/**
		 * Validator containts all validation process for each attribute
		 * @return mixed String on validaton failed or boolean (TRUE) on success
		 */
		function validate() {
			if(empty($this->title)) {
				return 'Title cannot be empty'; 
			}
			if(strlen($this->title) <= 2 OR $this->title > 255) {
				return 'Title must be between 2 and 255 characters';
			}
			
			if(!is_int($this->runtime)) {
				return 'Runtime must be a valid integer!';
			}
			if($this->runtime <= 0) {
				return 'Runtime must be positive!';
			}
			
			if(!is_int($this->release_date)) {
				return 'Release date must be a valid integer!';
			}
			if($this->release_date <= 0) {
				return 'Release date must be positive!';
			}
			return TRUE;
		}
	}
	
	/**
	 * Actor's validation class
	 */
	class ActorValidation extends Actor {
		/**
		 * Contructor will set up birthday as timestamp
		 */
		function __construct() {
			/*Store birthdate as timestamp*/
			$this->birthdate = strtotime($this->birthdate); 
		}
		/**
		 * Validator containts all validation process for each attribute
		 * @return mixed String on validaton failed or boolean (TRUE) on success
		 */
		function validate() {
			if(empty($this->name)) {
				return 'Name cannot be empty'; 
			}
			if(strlen($this->name) <= 2 OR $this->name > 255) {
				return 'Name must be between 2 and 255 characters';
			}
			
			if(!is_int($this->birthdate)) {
				return 'Birthdate must be a valid date!';
			}
			if($this->birthdate <= 0) {
				return 'Birthdate must be positive!';
			}
			return TRUE;
		}
	}
?>