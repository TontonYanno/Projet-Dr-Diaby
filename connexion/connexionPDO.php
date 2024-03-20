<?php
$connexion = new PDO('mysql:host=localhost;dbname=discotheque2', "root", "");
try {
    $connexion = new PDO("mysql:host=localhost;dbname=discotheque2", "root", "");
    // Configuration pour afficher les erreurs PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à MySQL : " . $e->getMessage());
}
    
?>