<?php
session_start();
require('../based.php');

if(isset($_POST['submit'])){
    $titre = trim($_POST['titre']);
    $auteur = trim($_POST['auteur']);
    $localisation = trim($_POST['localisation']);
    $resume = trim($_POST['resume']);
    $disponibilite = trim($_POST['disponibilite']);

    if(empty($titre) || empty($auteur) || empty($localisation) || empty($resume) || empty($disponibilite)){
        echo "Veuillez remplir tous les champs.";
        exit();
    }

    if (!$connection) {
        die("Erreur de connexion à la base de données.");
    }

   $stmt = $connection->prepare("INSERT INTO livres (titre, auteur, localisation, resume, disponibilite) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("sssss", $titre, $auteur, $localisation, $resume, $disponibilite);
   
   if($stmt->execute()){
       header('Location: all_livres.php'); 
       exit();
   } else {
       echo "Erreur lors de l'insertion : " . $connection->error;
   }

   
    $connection->close();
}
?>
