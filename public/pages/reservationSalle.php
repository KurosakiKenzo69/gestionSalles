<?php
include '../components/header.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning des réservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Planning des réservations</h1>
            <button class="button"><a href="addReservation.php">Réserver</a> </button> 
            <br>

            <div class="columns">
                <?php
                include '../../src/db/connectDB.php';

                $query = "SELECT * FROM reservations";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    // Afficher les réservations
                    while($row = $result->fetch_assoc()) {
                        $salle_query = "SELECT nom FROM salles WHERE id = ".$row['id_salle'];
                        $salle_result = $conn->query($salle_query);
                        $salle = $salle_result->fetch_assoc();

                        // Récupérer le nom et prénom de l'utilisateur
                        $utilisateur_query = "SELECT prenom, nom FROM utilisateurs WHERE id = ".$row['id_utilisateur'];
                        $utilisateur_result = $conn->query($utilisateur_query);
                        $utilisateur = $utilisateur_result->fetch_assoc();
                        ?>
                        <div class="column">
                            <div class="box">
                                <p><strong>Salle : <?php echo $salle['nom']; ?></strong></p>
                                <p>Date: <?php echo date('d/m/Y', strtotime($row['date'])); ?></p>                                
                                <p>Heure de début : <?php echo date('H:i', strtotime($row['debut_reservation'])); ?></p>
                                <p>Heure de fin : <?php echo date('H:i', strtotime($row['fin_reservation'])); ?></p>
                                <p>Réservé par : <?php echo $utilisateur['prenom'] . ' ' . $utilisateur['nom']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Aucune réservation trouvée.";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>
</body>
</html>
