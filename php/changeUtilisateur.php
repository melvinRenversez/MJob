<?php

session_start();
include 'database.php';

echo $_SESSION["id_utilisateur"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    echo "send <br>";

    $lastName = $_POST["last-name"];
    $newName = $_POST["new-name"];

    $id_utilisateur = $_SESSION["id_utilisateur"];
    $sql = "SELECT nom_utilisateur FROM utilisateurs WHERE id_utilisateur = $id_utilisateur";

    $rerult = $conn->query($sql);

    if($rerult->num_rows > 0) {
        $row = $rerult->fetch_assoc();
        if($row["nom_utilisateur"] == $lastName) {
            $change = $conn->prepare("UPDATE utilisateurs SET nom_utilisateur = ? WHERE id_utilisateur = $id_utilisateur");
            $change->bind_param("s", $newName);
            $change->execute();
            echo "Encien nom changer";
        }else{
            echo "Encien nom incorrect";
        }
    }

}
