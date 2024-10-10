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
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>

    <?php
    include("../php/nav.php");

    ?>

    <div class="container">

        <?php

        if($_SESSION['role'] == 'Admin'){

            $sql = "SELECT * FROM Enfants";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '
                        <a href="../enfant/enfant.php?id='. $row['id_enfant'] .'" class="box">
                            <h1>' . $row['prenom_enfant'] . " " . $row['nom_enfant']. '</h1>
                            <div class="img">
                                <img src="../img/'. $row['photo'] .'" alt="Photo">
                            </div>
                            <p>'. $row['date_naissance'] .'</p>
                        </a>
                    ';
                }
            }


        }else{
            $sql = "SELECT id_enfant, nom_enfant, prenom_enfant, date_naissance, photo FROM Enfants WHERE id_utilisateur = " . $_SESSION['id_utilisateur'];
            $result = $conn->query($sql);
    
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '
                        <a href="../enfant/enfant.php?id='. $row['id_enfant'] .'" class="box">
                            <h1>' . $row['prenom_enfant'] . " " . $row['nom_enfant']. '</h1>
                            <div class="img">
                                <img src="../img/'. $row['photo'] .'" alt="Photo">
                            </div>
                            <p>'. $row['date_naissance'] .'</p>
                        </a>
                    ';
                }
            }
        }


        ?>
    </div>



</body>
</html>