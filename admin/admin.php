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
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php

        include '../php/nav.php';
    ?>
    <div class="container">
    <?php
        
        $date_du_jour = date('Y-m-d');

        $sql = "SELECT id_enfant, nom_enfant, prenom_enfant, photo FROM Enfants";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {


            while($row = $result->fetch_assoc()) {


                $test = $conn->prepare("SELECT * FROM Repas WHERE id_enfant = ? AND date_repas = ?");
                $test->bind_param("is", $row['id_enfant'], $date_du_jour);
                $test->execute();
                $test_result = $test->get_result();

                if ($test_result->num_rows > 0) {

                    $absence = "";
                    $desabled = "";

                    $existing_meal   = $test_result->fetch_assoc();

                    if($existing_meal['absence'] == 1){ 
                        $absence =  "checked"; 
                        $desabled =  "disabled"; 
                    }

                    echo '
                        <div class="box">
                            <div class="header">
                                <div>
                                    <div class="img">
                                        <img src="../img./'. $row['photo'] .'" alt="Photo">
                                    </div>
                                    <h4>'. $row['nom_enfant'] . " ". $row['prenom_enfant'] .'</h4> 
                                </div>
                            </div>
                            <div class="content">
                                <form action="../php/add_repas.php" method="POST">
                                    <input type="hidden" name="id_enfant" value="'. $row['id_enfant']. '">
                                    <label for="">Date repas : </label>
                                    <input type="date" name="date_repas" value="'. $date_du_jour .'">
                                    <label for="">repas midi : </label>
                                    <input  '. $desabled .' id="inputDesable_'. $row['id_enfant'] .'" type="text" name="repas_midi" value="'. $existing_meal['repas_midi'].'">
                                    <label for="">repas 4 heure : </label>
                                    <input '. $desabled .' id="inputDesable_'. $row['id_enfant'] .'" type="text" name="repas_4_heure" value="'. $existing_meal['repas_quatre_heure'] .'">
                                    <label for="">Info supplementaire : </label>
                                    <textarea '. $desabled .' id="inputDesable_'. $row['id_enfant'] .'" name="info_supp">'. $existing_meal['info_supplementaires'] .'</textarea>
                                    <div>
                                        <label for="">Absent </label>
                                        <input id="abs_'. $row['id_enfant'] .'" type="checkbox" name="abs" '. $absence .'>
                                    </div>
                                    <div class="submit">
                                        <input type="submit" value="Modifer">
                                    </div>
                                </form>
                            </div>
                        </div>
                    ';


                }else{

                    echo '
                        <div class="box">
                            <div class="header">
                                <div>
                                    <div class="img">
                                        <img src="../img./'. $row['photo'] .'" alt="Photo">
                                    </div>
                                    <h4>'. $row['nom_enfant'] . " ". $row['prenom_enfant'] .'</h4> 
                                </div>
                                <h4>'. $row['id_enfant'] .'</h4>
                            </div>
                            <div class="content">
                                <form action="../php/add_repas.php" method="POST">
                                    <input type="hidden" name="id_enfant" value="'. $row['id_enfant']. '">
                                    <label for="">Date repas : </label>
                                    <input type="date" name="date_repas" value="'. $date_du_jour .'">
                                    <label for="">repas midi : </label>
                                    <input id="inputDesable_'. $row['id_enfant'] .'" type="text" name="repas_midi" >
                                    <label for="">repas 4 heure : </label>
                                    <input id="inputDesable_'. $row['id_enfant'] .'" class="inputDesable" type="text" name="repas_4_heure">
                                    <label for="">Info supplementaire : </label>
                                    <textarea id="inputDesable_'. $row['id_enfant'] .'" name="info_supp"></textarea>
                                    <div>
                                        <label for="">Absent </label>
                                        <input id="abs_'. $row['id_enfant'] .'" id="abs" type="checkbox" name="abs">
                                    </div>
                                    <div class="submit">
                                        <input type="submit" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    ';

                }


            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
        
        
    </div>

        
</body>
</html>
<script src="app.js"></script> 