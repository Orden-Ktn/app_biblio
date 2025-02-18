<?php
require('../based.php');

if (!$connection) {
    die("Échec de connexion à la base de données.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification et filtrage de l'ID
    if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
        $id = intval($_POST["id"]); // Sécurisation

        // Requête préparée
        $sql = "DELETE FROM emprunts WHERE id_emprunt=?";  
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header('Location: all_emprunt.php'); 
            exit();
        } else {
            echo "error";
        }

        $stmt->close();
    } else {
        echo "invalid_id";
    }
}

$connection->close();
?>
