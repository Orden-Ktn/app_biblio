<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_bibliotheque";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification et filtrage de l'ID
    if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
        $id = intval($_POST["id"]); // Sécurisation

        // Requête préparée
        $sql = "DELETE FROM emprunts WHERE id_emprunt=?";  
        $stmt = $conn->prepare($sql);
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

$conn->close();
?>
