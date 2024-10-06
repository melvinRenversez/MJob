<?php

session_start();
include 'database.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $mot_de_passe = $_POST["mot_de_passe"];

    $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if($row['mot_de_passe'] == $mot_de_passe){
            $_SESSION["id_utilisateur"] = $row['id_utilisateur'];
            $_SESSION["nom_utilisateur"] = $row['nom_utilisateur'];
            $_SESSION["role"] = $row['role'];

            header("location: ../accueil/accueil.php");
            exit();
        }
    }
}