<?php
session_start();
//  $_GET['type'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title=$_POST['title'];
    $id = $_SESSION['id'];
    function artistdisk($title, $id){
        require_once "../connexion/connexionPDO.php";
        $sql = "INSERT INTO `disque` ( `titre`, `date`, `id_artiste`, `id_groupe`) VALUES (:a, current_timestamp(),:b, NULL);";
        $req=$connexion->prepare($sql);
        $req->bindValue(':a',$title);
        $req->bindValue(':b',$id);
        $req->execute();
        $connexion=null;
    }

    function groupedisk($title, $id){
        require_once "../connexion/connexionPDO.php";
        $sql = "INSERT INTO `disque` ( `titre`, `date`, `id_artiste`, `id_groupe`) VALUES (:a, current_timestamp(), null,:b);";
        $req=$connexion->prepare($sql);
        $req->bindValue(':a',$title);
        $req->bindValue(':b',$id);
        $req->execute();
        $connexion=null;
    }

    if (isset($_POST['artiste'])) {
        artistdisk($title,$id);
        header("Location:profileartiste.php");
    }
    if(isset($_POST['groupe'])) {

        groupedisk($title,$id);
        header("Location:profilegroupe.php");

    }
}