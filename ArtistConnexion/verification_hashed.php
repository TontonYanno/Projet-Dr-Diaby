<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST["email"];
        $password=$_POST["password"];
        require_once"../ArtistConnexion/connexion.php";
        $sql= "SELECT * FROM `artiste` WHERE `email`= '$email'  "; 

        $resulat= $conn->query($sql);
        $row=$resulat->fetch_assoc();
        if($row>0){
            $emailbyrow=$row["email"];
            $passwordhashed=$row['password'];  
            if(crypt($password,$passwordhashed)){
                session_start();
                $_SESSION['nom']=$row['nom'];
                $_SESSION['label']=$row['label'];
                $_SESSION['id']=$row['id'];
                $_SESSION['label']=$row['label'];
                header("Location:profile.php?id=".$_SESSION['id']);
            } 
        } 
        else{
            echo "erreur de connexion";
        }
        
    }