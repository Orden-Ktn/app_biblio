<?php
require('../based.php');

if (!$connection) {
    die("Échec de connexion à la base de données.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM etudiants WHERE id_etudiant=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        header('Location: all_etudiant.php'); 
        exit();
    } else {
        echo "error";
    }

    $stmt->close();
}

$connection->close();
?>
