<?php

include "../php/database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $abs = isset($_POST["abs"]) ? 1 : 0; 

    
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
        
        $sql = 'UPDATE Repas SET repas_midi = ?, repas_quatre_heure = ?, info_supplementaires = ?, absence = ? WHERE id_enfant = ? AND date_repas = ?';

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('sssiis',$repas_midi, $repas_4_heure, $info_supplementaire, $abs, $id_enfant , $date_repas);

        if( $stmt->execute() ){
            echo "repas mis a jour avec succées";
            header("Location: ../admin/admin.php");
        }else{
            echo "Erreur";
        }

    }else{

        $sql = 'INSERT INTO Repas (id_enfant, date_repas, repas_midi, repas_quatre_heure, info_supplementaires, absence) VALUES (?, ?, ?, ?, ?, ?)';

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('issssi', $id_enfant, $date_repas, $repas_midi, $repas_4_heure, $info_supplementaire, $abs);


        if( $stmt->execute() ){
            echo "repas ajouter avec succées";
            header("Location: ../admin/admin.php");
        }else{
            echo "Erreur";
        }
    }


}