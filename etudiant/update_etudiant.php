<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_bibliotheque";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Échec de connexion : " . mysqli_connect_error());
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $classe = $_POST['classe'];

    $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom', adresse='$adresse', email='$email', telephone='$telephone', classe='$classe' WHERE id_etudiant='$id'";

    if (mysqli_query($conn, $sql)) {
        header('Location: all_etudiant.php'); 
        exit();
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
