<?php

session_start();
include 'database.php';

echo $_SESSION["id_utilisateur"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    echo "send <br>";

    $lastPassword = $_POST["last-password"];
    $newPassword = $_POST["new-password"];

    $id_utilisateur = $_SESSION["id_utilisateur"];
    $sql = "SELECT mot_de_passe FROM utilisateurs WHERE id_utilisateur = $id_utilisateur";

    $rerult = $conn->query($sql);

    if($rerult->num_rows > 0) {
        $row = $rerult->fetch_assoc();
        if($row["mot_de_passe"] == $lastPassword) {
            $change = $conn->prepare("UPDATE utilisateurs SET mot_de_passe = ? WHERE id_utilisateur = $id_utilisateur");
            $change->bind_param("s", $newPassword);
            $change->execute();
        }else{
            echo "Encien mo de passe incorrect";
        }
    }

}
