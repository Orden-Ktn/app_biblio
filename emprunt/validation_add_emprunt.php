<?php
session_start();
require('../based.php');

if(isset($_POST['submit'])){
    // Récupération des données avec sécurité
    $date_emprunt = trim($_POST['date_emprunt']);
    $date_retour_prevue = trim($_POST['date_retour_prevue']);
    $id_livre = trim($_POST['id_livre']);
    $id_etudiant = trim($_POST['id_etudiant']);

    // Vérification des champs vides
    if(empty($date_emprunt) || empty($date_retour_prevue) || empty($id_livre) || empty($id_etudiant)){
        echo "Veuillez remplir tous les champs.";
        exit();
    }

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'gestion_bibliotheque';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($conn->connect_error){
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO emprunts (date_emprunt, date_retour_prevue, id_livre, id_etudiant) VALUES (?, ?, ?, ?)");
    
    if(!$stmt){
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    $stmt->bind_param("ssss", $date_emprunt, $date_retour_prevue, $id_livre, $id_etudiant);

    if($stmt->execute()){
        $stmt_update = $conn->prepare("UPDATE livres SET disponibilite = 'Emprunté' WHERE id_livre = ?");
        
        if($stmt_update){
            $stmt_update->bind_param("s", $id_livre);
            $stmt_update->execute();
            $stmt_update->close();
        } else {
            echo "Erreur lors de la mise à jour du livre : " . $conn->error;
        }

        // Redirection après succès
        header('Location: all_emprunt.php');
        exit();
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    $conn->close();
}
?>
