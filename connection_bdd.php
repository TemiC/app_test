<?php

// PostgreSQL connection 

$server='localhost'; 
$user=''; 
$password=''; 
$dbname=''; 
$port = ;

// Connexion to the base
$connexion = pg_connect("$server", "$port","$dbname","$user","$password") or die ("Impossible to connect");
?>
