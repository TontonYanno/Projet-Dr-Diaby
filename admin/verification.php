<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST["email"];
        $password=$_POST["password"];
        
            require_once"../connexion/connexion.php";
            $sql= "SELECT * FROM `admin` WHERE `email`= '$email'  "; 
            
            $resulat= $conn->query($sql);
            $row=$resulat->fetch_assoc();
            if($row>0){
                $emailbyrow=$row["email"];
                $passwordhashed=$row['password'];  
                if(crypt($password,$passwordhashed)){
                    session_start();
                    echo $_SESSION['nom']=$row['nom'];
                    echo $_SESSION['id']=$row['id'];
                    header("Location:index.php?nom=".$_SESSION['nom']."&id=".$_SESSION['id']);
                } 
            } 
            else{
                header("Location:../404/index.php");
            }
            $conn=null;
    }