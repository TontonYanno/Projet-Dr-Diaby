<?php
    session_start();
    $_SESSION['nom'];
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST["email"];
        $password=$_POST["password"];
        $_POST['type'];
        if ($_POST['type']=="artiste") {
            require_once"../connexion/connexion.php";
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
                    header("Location:profileartiste.php");
                } 
            } 
            else{
                header("Location:../404/index.php");
                // echo "erreur de connexion";
            }
            $conn=null;
        }else {
            require_once"../connexion/connexion.php";
            $sql= "SELECT * FROM `groupe` WHERE `email`= '$email'  "; 
            
            $resulat= $conn->query($sql);
            $row=$resulat->fetch_assoc();
            if($row>0){
                $emailbyrow=$row["email"];
                $passwordhashed=$row['password'];  
                if(crypt($password,$passwordhashed)){
                    // session_start();
                    $_SESSION['nom']=$row['nom'];
                    $_SESSION['label']=$row['label'];
                    $_SESSION['id']=$row['id'];
                    $_SESSION['label']=$row['label'];
                    header("Location:profilegroupe.php");
                } 
            } 
            else{
                header("Location:../404/index.php");
            }
            $conn=null;  
        }
    }