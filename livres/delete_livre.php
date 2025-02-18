<?php
session_start();
require('../based.php');

if (!$connection) {
    die("Échec de connexion à la base de données : " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];

    if (empty($_POST["titre"])) {
        die("Erreur : Aucun titre fourni pour la suppression.");
    }    

    $sql = "DELETE FROM livres WHERE titre=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $titre);

    if ($stmt->execute()) {
        header('Location: all_livres.php'); 
        exit();
    } else {
        echo "error";
    }
    
    $stmt->close();
}

$connection->close();
?>
