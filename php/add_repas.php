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

        $sql = 'INSERT INTO Repas (id_enfant, date_repas, repas_midi, repas_quatre_heure, info_supplementaires) VALUES (?, ?, ?, ?, ?)';

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('issss', $id_enfant, $date_repas, $repas_midi, $repas_4_heure, $info_supplementaire);


        if( $stmt->execute() ){
            echo "repas ajouter avec succées";
        }else{
            echo "Erreur";
        }


    }


}