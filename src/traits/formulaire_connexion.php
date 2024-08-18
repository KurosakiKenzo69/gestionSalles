<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">

<?php
// Démarrer la session
session_start();

// Inclusion du fichier de connexion à la base de données
include '../../src/db/connectDB.php';

$email = $_POST['email'];
$password = $_POST['password'];

global $conn;

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$query = "SELECT * FROM utilisateurs WHERE email = '$email'";
$result = $conn -> query($query);

if ($result -> num_rows > 0) {
    // Authentification réussie, définir les variables de session
    $utilisateur = $result->fetch_assoc();

    // Vérifier le mot de passe
    if (password_verify($password, $utilisateur['password'])) {
        $_SESSION['id'] = $utilisateur['id']; // Exemple d'utilisation de l'ID de l'utilisateur en tant que variable de session

        // Redirection vers la page de connexion
        header('Location: ../../public/pages/reservationSalle.php');
        exit(); // Assurez-vous que le script se termine après la redirection
    } else {
        echo '<div class="notification is-danger">Identifiant ou mot de passe incorrect</div>';
    }
}
else {
    echo '<div class="notification is-danger">Identifiant ou mot de passe incorrect</div>';
}

$conn -> close();
?>
