<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_bibliotheque";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Échec de connexion : " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = trim($_POST['titre']);
    $auteur = trim($_POST['auteur']);
    $localisation = trim($_POST['localisation']);
    $resume = trim($_POST['resume']);
    $disponibilite = trim($_POST['disponibilite']);

    $sql = "UPDATE livres SET titre=?, auteur=?, localisation=?, resume=?, disponibilite=? WHERE titre=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $titre, $auteur, $localisation, $resume, $disponibilite, $titre);

    if ($stmt->execute()) {
        header('Location: all_livres.php'); 
        exit();
    } else {
        echo "error";
    }

    $stmt->close();
}

$conn->close();
?>
