<?php
	session_start();
	require_once __DIR__ . '/vendor/autoload.php';
	$murl=$_SESSION['txtMurl'];
	$client = new MongoDB\Client($murl);
	/*$client = new MongoDB\Client(
		'mongodb+srv://omarsharif:omar2204@sharifkea.pi8df.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');
		//'mongodb+srv://ronysharif:rony2204@sharifmdb.px3qb.mongodb.net/flight_booking?retryWrites=true&w=majority');
		//'mongodb+srv://ronysharif:rony2204@sharifmdb.px3qb.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');
		/*require_once __DIR__ . '/vendor/autoload.php';
		$client = new MongoDB\Client('mongodb://localhost:27017');
			//'mongodb+srv://ronysharif:Rony2204*@cluster0.gulsk.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$coll='collone';
		$mdb='stmdb';
		$colldb='stmdb.collone';*/
?>
