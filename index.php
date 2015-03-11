<?php
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
	
	$movie = new Movie;
	$actor = new Actor;
	/**
	 * Here implementing test queries
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
				 * Colletion with actors
				 */
				var_dump($movie->getCollection($actor,TRUE));
			}
		}
	}
	/**
	 * Actors by birthdate descending
	 */
	var_dump($movie->getActorsByBrith($actors));
?>