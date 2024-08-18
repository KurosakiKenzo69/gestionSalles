<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">


<?php
include '../../src/db/connectDB.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'utilisateur est connecté
    session_start();
    if(isset($_SESSION['id'])) {
        // Récupérer les données du formulaire
        $date = $_POST['date'];
        $debut = $_POST['debut_reservation'];
        $fin = $_POST['fin_reservation'];
        $id_salle = $_POST['id_salle'];
        $id_utilisateur = $_SESSION['id'];

        // Vérifier si la salle est disponible pour la date et l'heure spécifiées
        $reservation_query = "SELECT * FROM reservations WHERE id_salle = $id_salle AND date = '$date' AND ((debut_reservation <= '$debut' AND fin_reservation >= '$fin') OR (debut_reservation >= '$debut' AND fin_reservation <= '$fin'))";
        $reservation_result = $conn->query($reservation_query);

        if ($reservation_result->num_rows == 0) {
            // La salle est disponible, procéder à l'insertion de la réservation
            $insert_query = "INSERT INTO reservations (id_salle, id_utilisateur, date, debut_reservation, fin_reservation) VALUES ($id_salle, $id_utilisateur, '$date', '$debut', '$fin')";
            
            if ($conn->query($insert_query) === TRUE) {
                echo "Réservation effectuée avec succès.";
                echo "<br>";
                echo "<a href='reservationSalle.php'>Retour au planning des réservations</a>";
            } else {
                echo "Erreur lors de la réservation: " . $conn->error;
            }
        } else {
            echo "La salle n'est pas disponible à cette heure.";
        }
    } else {
        exit;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
