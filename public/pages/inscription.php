<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-one-third">
                <form action="../../src/traits/formulaire_inscription.php" method="post">
                    <h1 class="title">Inscription</h1>

                    <div class="field">
                        <label class="label">Prénom</label>
                        <div class="control">
                            <input class="input" type="text" name="prenom" placeholder="Prénom" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                            <input class="input" type="text" name="nom" placeholder="Nom" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nom d'utilisateur</label>
                        <div class="control">
                            <input class="input" type="text" name="username" placeholder="Nom d'utilisateur" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="email" name="email" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Mot de passe</label>
                        <div class="control">
                            <input class="input" type="password" name="password" placeholder="Mot de passe" required>
                        </div>
                    </div> 

                    <div class="field">
                        <label class="label">Confirmer le mot de passe</label>
                        <div class="control">
                            <input class="input" type="password" name="confirmMdp" placeholder="Confirmer le mot de passe" required>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-link is-fullwidth" type="submit">S'inscrire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
