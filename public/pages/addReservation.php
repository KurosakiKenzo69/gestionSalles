<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une salle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Réserver une salle</h1>
            <form action="../../src/traits/formulaire_reservation.php" method="POST">
                <div class="field">
                    <label class="label">Date</label>
                    <div class="control">
                        <input class="input" type="date" name="date" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Heure de début</label>
                    <div class="control">
                        <input class="input" type="time" name="debut_reservation" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Heure de fin</label>
                    <div class="control">
                        <input class="input" type="time" name="fin_reservation" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Salle</label>
                    <div class="control">
                        <div class="select">
                            <select name="id_salle" required>
                                <?php
                                // Inclusion du fichier de connexion à la base de données
                                include '../../src/db/connectDB.php';

                                // Récupérer les salles disponibles pour la date et l'heure spécifiées
                                $date = $_POST['date'];
                                $debut = $_POST['debut_reservation'];
                                $fin = $_POST['fin_reservation'];
                                // $id_salle = $_POST['id_salle'];

                                $salles_query = "SELECT * FROM salles";
                                $salles_result = $conn->query($salles_query);

                                if ($salles_result->num_rows > 0) {
                                    // Afficher les options de sélection des salles disponibles
                                    while ($salle = $salles_result->fetch_assoc()) {
                                        // Vérifier si la salle est disponible pour la date et l'heure spécifiées
                                        $reservation_query = "SELECT * FROM reservations WHERE id_salle = " . $salle['id'] . " AND date = '" . $date . "' AND ((debut_reservation <= '" . $debut . ":00' AND fin_reservation >= '" . $fin . ":00') OR (debut_reservation >= '" . $debut . ":00' AND fin_reservation <= '" . $fin . ":00'))";
                                        $reservation_result = $conn->query($reservation_query);

                                        if ($reservation_result->num_rows == 0) {
                                            // La salle est disponible, ajouter une option au menu déroulant
                                            echo '<option value="' . $salle['id'] . '">' . $salle['nom'] . '</option>';
                                        }
                                    }
                                } else {
                                    echo '<option value="" disabled>Aucune salle disponible</option>';
                                    echo '<br>';
                                }
                                $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit">Réserver</button>
                        <button class="button is-primary"><a href="reservationSalle.php">Retour</a></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
