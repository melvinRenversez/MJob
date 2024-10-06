<?php
session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: ../index.php");
    exit;
}

include '../php/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js" defer></script>
</head>
<body>
    
    <?php

        include '../php/nav.php';
    ?>
    <div class="container">
    <?php
        $sql = "SELECT id_enfant, nom_enfant, prenom_enfant FROM Enfants";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            

            while($row = $result->fetch_assoc()) {
                echo '
                    <div class="box">
                        <div class="header">
                            <h4>'. $row['nom_enfant'] . " ". $row['prenom_enfant'] .'</h4> 
                            <h4>'. $row['id_enfant'] .'</h4>
                        </div>
                        <div class="content">
                            <form action="../php/add_repas.php" method="POST">
                                <input type="hidden" name="id_enfant" value="'. $row['id_enfant']. '">
                                <label for="">Date repas : </label>
                                <input id="inputDesable" type="date" name="date_repas" value="2024-10-05">
                                <label for="">repas midi : </label>
                                <input id="inputDesable" type="text" name="repas_midi" value="m">
                                <label for="">repas 4 heure : </label>
                                <input id="inputDesable" type="text" name="repas_4_heure" value="h">
                                <label for="">Info supplementaire : </label>
                                <textarea id="inputDesable" name="info_supp">s</textarea>
                                <div>
                                    <label for="">Absent </label>
                                    <input id="abs" type="checkbox" name="abs">
                                </div>
                                <div class="submit">
                                    <input type="submit" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                ';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
        
        
    </div>

        
</body>
</html>