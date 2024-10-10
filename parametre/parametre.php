<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Paramètre</title>
</head>
<body>

    <?php
        include("../php/nav.php");
    ?>

    <div class="forms">
        <form action="../php/changeUtilisateur.php" method="POST"> 
            <label for="">Changer le nom utilisateur</label>
            <div>
                <input type="text" required placeholder="encient nom" name="last-name">
                <input type="text" required placeholder="nouveau nom" name="new-name">
            </div>
            <input type="submit" value="Changer">
        </form>
        
        
        <form action="../php/changePassword.php" method="POST"> 
            <label for="">Changer le mot de passe</label>
            <div>
                <input type="text" required placeholder="encient mdp" name="last-password">
                <input type="text" required placeholder="nouveau mdp" name="new-password">
            </div>
            <input type="submit" value="Changer">
        </form>
    </div>


</body>
</html>