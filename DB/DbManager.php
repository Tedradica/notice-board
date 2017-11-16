<?php 

function connect() {

	$dsn = "mysql:host=localhost;dbname=kyeongho_database";
	$user = "root";
	$pass = "";

	try{

		$db = new PDO($dsn,$user,$pass);

	}catch(Excpetion $e){
		
		print "오류발생";

	}

	return $db;

}

?>