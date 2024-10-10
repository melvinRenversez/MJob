<?php 
session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: ../index.php");
    exit;
}

include '../php/database.php';

if(isset($_GET['id'])) {
    $id_enfant = $_GET['id'];
} else {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php

        include '../php/nav.php';
    
    ?>


    <div class="days-container">



        <?php

            $sql = "
                SELECT Enfants.nom_enfant, Enfants.prenom_enfant, Enfants.photo, Repas.date_repas, Repas.repas_midi, Repas.repas_quatre_heure, Repas.info_supplementaires, Repas.absence
                FROM Enfants
                INNER JOIN Repas ON Enfants.id_enfant = Repas.id_enfant
                WHERE Enfants.id_enfant = $id_enfant
                ORDER BY Repas.date_repas DESC
            ";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {

                    if($row['absence'] == 1){
                        echo '
                        
                        <div class="container">
                            <div class="header">
                                <div>
                                    <div class="img">
                                        <img src="../img./'. $row['photo'] .'" alt="Photo">
                                    </div>
                                    <h4>'. $row['nom_enfant'] . " " . $row['prenom_enfant'] . '</h4>
                                </div>
                                <p class="date">'. $row['date_repas'] .'</p>
                            </div>
                            <div class="content">
                                Absent le '. $row['date_repas'] .'
                            </div>
                        </div>
                        
                        ';
                    }else{
                        echo '
                        
                        <div class="container">
                            <div class="header">
                                <div>
                                    <div class="img">
                                        <img src="../img./'. $row['photo'] .'" alt="Photo">
                                    </div>
                                    <h4>'. $row['nom_enfant'] . " " . $row['prenom_enfant'] . '</h4>
                                </div>
                                <p class="date">'. $row['date_repas'] .'</p>
                            </div>
                            <div class="content">
                                Repas du '. $row['date_repas'] .' : <br>
                                <p class="space">Midi : <br> </p>
                                <p class="space2">'. $row['repas_midi'] .' <br> </p>
                                <p class="space">4h : <br> </p>
                                <p class="space2"> '. $row['repas_quatre_heure'] .' <br> </p>
                                <p class="space">Supp : <br> </p>
                                <p class="space2"> '. $row['info_supplementaires'] .' <br> </p>
                            </div>
                        </div>
                        
                        ';
                    }

                }
            }

        ?>
    </div>
    
</body>
</html>