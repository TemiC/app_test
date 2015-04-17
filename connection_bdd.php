<?php

// PostgreSQL connection 

$host='localhost'; 
$user='postgres'; 
$password='toto'; 
$dbname='postgres'; 
$port = 5433;

// Connexion to the base


//$connexion = new PDO("pgsql:dbname=$dbname; host=$host",$user,$password);
$connexion = pg_connect("host=localhost port=5433 dbname=postgres user=postgres password=toto") or die ("Impossible to connect");

//$select = pg_select($dbname) or die("Impossible to select some date coming from the data base");



?>
