<?php
try{
	$db = new PDO("mysql:host=localhost;dbname=db;charset=utf8", "root", "");
	echo"basarili";
}catch (PDOException $e){
	echo $e -> getMessage();
	echo"basarisiz";
}
?>