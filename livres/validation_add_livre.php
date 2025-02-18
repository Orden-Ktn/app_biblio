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

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'gestion_bibliotheque';

    // Connexion à la base de données (ajout de la connexion)
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($conn->connect_error){
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

   // Insertion des données
   $stmt = $conn->prepare("INSERT INTO livres (titre, auteur, localisation, resume, disponibilite) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("sssss", $titre, $auteur, $localisation, $resume, $disponibilite);
   
   if($stmt->execute()){
       header('Location: all_livres.php'); 
       exit();
   } else {
       echo "Erreur lors de l'insertion : " . $conn->error;
   }

   
    $conn->close();
}
?>
