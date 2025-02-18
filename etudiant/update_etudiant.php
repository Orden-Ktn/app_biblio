<?php
require('../based.php');

if (!$connection) {
    die("Échec de connexion à la base de données.");
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $classe = $_POST['classe'];

    $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom', adresse='$adresse', email='$email', telephone='$telephone', classe='$classe' WHERE id_etudiant='$id'";

    if (mysqli_query($connection, $sql)) {
        header('Location: all_etudiant.php'); 
        exit();
    } else {
        echo "Erreur : " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
