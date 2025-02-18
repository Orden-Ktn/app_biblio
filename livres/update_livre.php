<?php
require('../based.php');

if (!$connection) {
    die("Échec de connexion à la base de données.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = trim($_POST['titre']);
    $auteur = trim($_POST['auteur']);
    $localisation = trim($_POST['localisation']);
    $resume = trim($_POST['resume']);
    $disponibilite = trim($_POST['disponibilite']);

    $sql = "UPDATE livres SET titre=?, auteur=?, localisation=?, resume=?, disponibilite=? WHERE titre=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssss", $titre, $auteur, $localisation, $resume, $disponibilite, $titre);

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
