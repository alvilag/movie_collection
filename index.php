<?php
/**
 * Here you can find how to use classes with or without DB.
 */
	/**
	 * Test details as arrays
	 */
	require_once('movies.php');
	require_once('actor.php');
	
	/**
	 * Get classes
	 */
	require_once('movie.class.php');
	require_once('actor.class.php');
	require_once('db.class.php');
	
	/**
	 * Class instances
	 */
	$movie = new Movie;
	$actor = new Actor;
	/**
	 * DB connection
	 */
	$db = new db;
	$db->connect();
	/**
	 * Use classes without DB.
	 */
	foreach($movies as $mov) {
		foreach($actors as $act) {
			if($mov['id'] == $act['movie_id']) {
				$movie->id = $mov['id'];
				$movie->title = $mov['title'];
				$movie->runtime = $mov['runtime'];
				$movie->release_date = $mov['release_date'];
				$actor->id = $act['id'];
				$actor->birthdate = $act['birthdate'];
				$actor->name = $act['name'];
				/**
				 * Colletion with actors as JSON
				 */
				var_dump($movie->getCollection($actor,TRUE));
			}
		}
	}
	/**
	 * Actors by birthdate descending without DB.
	 */
	var_dump($movie->getActorsByBrith($actors));
	

	/**
	 * Get movies with actors from DB
	 */
	var_dump($movie->getByIdFromDb(1));
	
	/** 
	 * Get actors by age descending from DB
	 */
	 var_dump($movie->getActorsByBrithDB(1));
?>