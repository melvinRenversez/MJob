<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="../php/changeUtilisateur.php" method="POST"> 
        <label for="">Changer nom utilisateur</label>
        <input type="text" placeholder="encient nom" name="last-name">
        <input type="text" placeholder="nouveau nom" name="new-name">
        <input type="submit" value="Changer">
    </form>
    
    
    <form action="../php/changePassword.php" method="POST"> 
        <label for="">Changer le mot de passe</label>
        <input type="text" placeholder="encient mdp" name="last-password">
        <input type="text" placeholder="nouveau mdp" name="new-password">
        <input type="submit" value="Changer">
    </form>

</body>
</html>