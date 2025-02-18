<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gestion_bibliotheque";
$connection = mysqli_connect($host, $user, $pass, $dbname);

if (!$connection) {
    die("Erreur de connexion : " . mysqli_connect_error());
} else {
    #echo "cool !";
}
?>