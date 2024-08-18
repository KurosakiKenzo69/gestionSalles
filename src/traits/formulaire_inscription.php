<?php
    // Inclusion du fichier de connexion à la base de données
    include '../../src/db/connectDB.php';

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmMdp = $_POST['confirmMdp'];

    global $conn;

    // Vérifier si les deux mots de passe correspondent
    if ($password != $confirmMdp) {
        echo '<div class="notification is-danger">Les mots de passe ne correspondent pas</div>';
        exit();
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO utilisateurs (prenom, nom, username, email, password) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("sssss", $prenom, $nom, $username, $email, $hashed_password);

    if($query->execute()) {
        echo '<div class="notification is-success">Inscription réussie</div>';
    } else {
        echo '<div class="notification is-danger">Erreur lors de l\'inscription</div>';
    }

    // Redirection vers la page de connexion
    header('Location: ../../public/pages/connexion.php');
?>