<?php
	/**
	 * Movie class can return all info about movie
	 */
	class Movie {
		/**
		 * Unique ID of movie
		 */
		public $id;
		/**
		 * Title of movie
		 */
		public $title;
		/**
		 * Movie's runtime in minutes
		 */
		public $runtime;
		/**
		 * Release date of movie
		 */
		public $release_date;
		/**
		 * Validator object
		 */
		public $validation;
		/**
		 * Table name
		 */
		 public $table = 'movie';
		
		/**
		 * Constructor will set up validator
		 */
		public function __construct() {
			require_once('validation.class.php');
			$this->validation = new MovieValidation;
		}
		
		/**
		 * Return all details of movie as JSON string
		 * 
		 * @return string JSON string
		 */
		public function getJSON() {
			return json_encode(array(
				'title' => $this->title,
				'runtime' => $this->runtime,
				'release_date' => $this->release_date
			));
		}
		
		/**
		 * Return all details of movie as array
		 * 
		 * @return array
		 */
		public function getData() {
			return array(
				'title' => $this->title,
				'runtime' => $this->runtime,
				'release_date' => $this->release_date
			);
		}
		
		/**
		 * Return unique ID of movie
		 * @return integer
		 */
		public function id() {
			return $this->id;
		}
		
		/**
		 * Return title of movie
		 * @return string
		 */
		public function title() {
			return $this->title;
		}
		
		/**
		 * Return runtime of movie as minutes
		 * @return integer Minutes
		 */
		public function runtime() {
			return $this->runtime;
		}
		
		/**
		 * Return release date of movie
		 * @return string A PHP date string
		 */
		public function release_date() {
			return $this->release_date;
		}
		
		/**
		 * Return movie details woth actors
		 * @param object Actor object
		 * @param boolean Return as JSON or not [optional]
		 * 
		 * @return array
		 * 
		 * @see actor.class.php
		 */
		public function getCollection($actor,$json = FALSE) {
			$actor->movie_id = $this->id;
			$actors = $actor->getData();
			$movie = $this->getData();
			array_push($movie,$actors);
			if($json) {
				return json_encode($movie);
			}
			return $movie;
		}
		
		/**
		 * Get actors by birthdate descending
		 * 
		 * @param array Actors array
		 * @return array The sorted array
		 * 
		 */
		public function getActorsByBrith($actor) {
			$sorted = array();
			foreach($actor as $key => $value) {
				$sorted[strtotime($value['birthdate'])] = array(
					$value['name']
				);
			}
			ksort($sorted);
			return $sorted;
		}
		
		/**
		 * Get actors by birthdate descending from database
		 * 
		 * @param integer If it is empty you'll get all actors [optional]
		 * @return array results from DB 
		 */
		public function getActorsByBrithDB($movie_id = NULL) {
			$sql = 'SELECT * FROM '.$this->table.' as m
				INNER JOIN actor as a ON(m.id = a.movie_id)';
			if($movie_id) {
				$sql.=' WHERE m.id = '.mysql_real_escape_string($movie_id).' ';
			}
			$sql .= ' ORDER BY a.birthdate DESC';
			$res = mysql_query($sql);
			if(!$res) {
				return mysql_error();
			}
			$result = array();
			while($row = mysql_fetch_assoc($res)) {
				if($row['runtime']) {
					$row['runtime'] = $row['runtime']*60; //Get minutes from seconds
				}
				if($row['release_date']) {
					$row['release_date'] = date('Y-m-d',$row['release_date']);
				}
				if($row['birthdate']) {
					$row['birthdate'] = date('Y-m-d',$row['birthdate']);
				}
				array_push($result,$row);
			}
			if($json) {
				return json_encode($result);
			}
			return $result;
		}
		
		/**
		 * Get movies by ID from database with actors
		 * @param integes ID of movie
		 * @param bool Return with JSON string or not. Default is FALSE. [optional]
		 */
		public function getByIdFromDb($id,$json = FALSE) {
			$sql = 'SELECT * FROM '.$this->table.' as m
				INNER JOIN actor as a ON(m.id = a.movie_id)
				WHERE m.id = '.mysql_real_escape_string($id);
			$res = mysql_query($sql);
			if(!$res) {
				return mysql_error();
			}
			$result = array();
			while($row = mysql_fetch_assoc($res)) {
				if($row['runtime']) {
					$row['runtime'] = $row['runtime']*60; //Get minutes from seconds
				}
				if($row['release_date']) {
					$row['release_date'] = date('Y-m-d',$row['release_date']);
				}
				if($row['birthdate']) {
					$row['birthdate'] = date('Y-m-d',$row['birthdate']);
				}
				array_push($result,$row);
			}
			if($json) {
				return json_encode($result);
			}
			return $result;
		}
	}
?>