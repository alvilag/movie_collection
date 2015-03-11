Movie Colletion

Howto use it?
-------------
Configuration:
	1. In config.class.php you need to set up database connection
	2. Import dump.sql to your MySQL database.
	3. Folow instructions below. 
	
Before you try to use these classes:
	/*Required classes*/
	require_once('movie.class.php');
	require_once('actor.class.php');
	require_once('db.class.php');
	
	/*Class instances*/
	$movie = new Movie;
	$actor = new Actor;
	/*DB connection*/
	$db = new db;
	$db->connect();
	
Test details:
	If you don't want to use DB:
	----------------------------
	1. In actor.php and in movies.php you can find some test datas.
	2. In index.php you can see how to use classes with or without DB.
	
Most usefull methods are:
	/**
	 * Get actors by birthdate descending from database
	 * 
	 * @param integer If it is empty you'll get all actors [optional]
	 * @return array results from DB 
	 */
	$movie = new Movie;
	$movie->getActorsByBrithDB();
	
	/**
	 * Get movies by ID from database with actors
	 * @param integes ID of movie
	 * @param bool Return with JSON string or not. Default is FALSE. [optional]
	 */
	$movie = new Movie;
	$movie->getByIdFromDb(1);