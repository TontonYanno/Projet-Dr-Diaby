<?php
    $id=$_GET['id'];
    
    require_once "../ArtistConnexion/connexionPDO.php";
    $sql= " DELETE FROM disque WHERE `disque`.`id` = $id ";
    $req= $connexion->query($sql);
    $connexion=null;
    if ($_GET['type']=="artiste") {
        header("Location:profileartiste.php");
    }else{
        header("Location:profilegroupe.php");
    }
?>