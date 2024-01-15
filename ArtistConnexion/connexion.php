
<?php
$host = "localhost";
$user = "root";
$password = "1111";
$database = "discotheque2";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

