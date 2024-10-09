<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="content">
        <h1>Connexion</h1>
        <form action="php/connection.php" method="POST">
            <div class="inputLabel">
                <label for="nom_utilisateur">Nom d'utilisateur</label>
                <input type="text" name="nom_utilisateur" required>
            </div>
            <div class="inputLabel">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" name="mot_de_passe" required>
            </div>
            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>