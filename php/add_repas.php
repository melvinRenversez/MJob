<?php

include "../php/database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $abs = isset($_POST["abs"]) ? "Oui" : "Non"; 

    if($abs == "Oui"){

        echo "enfant absent";
    }else{

        $id_enfant = $_POST["id_enfant"];
        $date_repas = $_POST["date_repas"];
        $repas_midi = $_POST["repas_midi"];
        $repas_4_heure = $_POST["repas_4_heure"];
        $info_supplementaire = $_POST["info_supp"];

        echo $id_enfant . "<br>";
        echo $date_repas . "<br>";
        echo $repas_midi . "<br>";
        echo $repas_4_heure . "<br>";
        echo $info_supplementaire . "<br>";

        $test = $conn->prepare("SELECT * FROM Repas WHERE id_enfant = ? AND date_repas = ?");
        $test->bind_param("is", $id_enfant, $date_repas);
        $test->execute();
        $test_result = $test->get_result();

        if ($test_result->num_rows > 0){
            echo "update";

            $sql = 'UPDATE Repas SET repas_midi = ?, repas_quatre_heure = ?, info_supplementaires = ? WHERE id_enfant = ? AND date_repas = ?';
    
            $stmt = $conn->prepare($sql);
    
            $stmt->bind_param('sssis',$repas_midi, $repas_4_heure, $info_supplementaire, $id_enfant , $date_repas);
    
    
            if( $stmt->execute() ){
                echo "repas mis a jour avec succées";
                header("Location: ../admin/admin.php");
            }else{
                echo "Erreur";
            }

        }else{

            $sql = 'INSERT INTO Repas (id_enfant, date_repas, repas_midi, repas_quatre_heure, info_supplementaires) VALUES (?, ?, ?, ?, ?)';
    
            $stmt = $conn->prepare($sql);
    
            $stmt->bind_param('issss', $id_enfant, $date_repas, $repas_midi, $repas_4_heure, $info_supplementaire);
    
    
            if( $stmt->execute() ){
                echo "repas ajouter avec succées";
                header("Location: ../admin/admin.php");
            }else{
                echo "Erreur";
            }
        }



    }


}