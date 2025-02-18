<?php
require('../based.php');

if (!$connection) {
    die("Échec de connexion à la base de données.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des données envoyées
    if (
        isset($_POST["id_emprunt"], $_POST["id_livre"], $_POST["date_emprunt"], 
              $_POST["date_retour_prevue"], $_POST["date_retour_effective"])
    ) {
        $id_emprunt = intval($_POST["id_emprunt"]); 
        $id_livre = intval($_POST["id_livre"]);
        $date_emprunt = $_POST["date_emprunt"];
        $date_retour_prevue = $_POST["date_retour_prevue"];
        $date_retour_effective = $_POST["date_retour_effective"];

        $date_aujourdhui = date("Y-m-d");

        // Traitement de la date de retour effective
        if ($date_retour_effective === "Oui") {
            $date_retour_effective = $date_retour_prevue;
        } elseif ($date_retour_effective === "Non") {
            $date_retour_effective = $date_aujourdhui;
        } else {
            $date_retour_effective = null; // Gérer le cas où la valeur est inattendue
        }

        // Mise à jour de l'emprunt
        $sql = "UPDATE emprunts 
                SET date_emprunt = ?, date_retour_prevue = ?, date_retour_effective = ? 
                WHERE id_emprunt = ?";
        $stmt = $connection->prepare($sql);
        if ($stmt === false) {
            die("Erreur de préparation : " . $connection->error);
        }

        $stmt->bind_param("sssi", $date_emprunt, $date_retour_prevue, $date_retour_effective, $id_emprunt);

        if (!$stmt->execute()) {
            die("Erreur lors de la mise à jour de l'emprunt : " . $stmt->error);
        }

        $stmt->close();

        if ($date_retour_prevue === $date_retour_effective) {
            $update = "UPDATE livres SET disponibilite = 'Disponible' WHERE id_livre = ?";
            $stmt2 = $connection->prepare($update);
            if ($stmt2 === false) {
                die("Erreur de préparation : " . $connection->error);
            }

            $stmt2->bind_param("i", $id_livre);

            if (!$stmt2->execute()) {
                die("Erreur lors de la mise à jour de la disponibilité du livre : " . $stmt2->error);
            }

            $stmt2->close();
        }

        // Redirection après mise à jour
        header('Location: all_emprunt.php');
        exit();
    } else {
        echo "Données invalides.";
    }
}

$connection->close();
?>
