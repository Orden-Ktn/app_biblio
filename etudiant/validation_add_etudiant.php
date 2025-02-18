<?php
session_start();
require('../based.php');

if(isset($_POST['submit'])){
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $adresse = trim($_POST['adresse']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $classe = trim($_POST['classe']);

    if(empty($nom) || empty($prenom) || empty($adresse) || empty($email) || empty($telephone) || empty($classe)){
        echo "Veuillez remplir tous les champs.";
        exit();
    }

    if (!$connection) {
        die("Erreur de connexion à la base de données.");
    }

    $stmt = $connection->prepare("INSERT INTO etudiants (nom, prenom, adresse, email, telephone, classe) VALUES (?, ?, ?, ?, ?, ?)");
    
    if(!$stmt){
        die("Erreur de préparation : " . $connection->error);
    }

    $stmt->bind_param("ssssss", $nom, $prenom, $adresse, $email, $telephone, $classe);

    if($stmt->execute()){
        header('Location: all_etudiant.php'); 
        exit();
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    // Fermeture
    $stmt->close();
    $connection->close();
}
?>
