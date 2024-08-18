<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-one-third is-vcentered">
                <form action="../../src/traits/formulaire_connexion.php" method="post">
                    <h1 class="title">Connexion</h1>
                    
                    <div class="field">
                        <div class="control">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                    </div><br>

                    <div class="field">
                        <div class="control">
                            <input class="input" type="password" name="password" placeholder="Votre mot de passe">
                        </div>
                    </div><br>

                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-link is-fullwidth" type="submit">Se connecter</button> <br>
                             <a href='inscription.php'> Pas de compte ? Inscrivez-vous</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
