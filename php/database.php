<?php

$servername = "localhost";
$username = "root";
$password = "mysqlpassword";
$dbname = "mamanJob";

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error){
    die("connection Echouée : " . $conn-> connect_error);
}