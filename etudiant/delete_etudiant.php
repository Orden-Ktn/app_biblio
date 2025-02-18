<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_bibliotheque";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM etudiants WHERE id_etudiant=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        header('Location: all_etudiant.php'); 
        exit();
    } else {
        echo "error";
    }

    $stmt->close();
}

$conn->close();
?>
