<?php
    session_start();
    
    
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
                    echo $_SESSION['nom']=$row['nom'];
                    echo $_SESSION['id']=$row['id'];
                    header("Location:index.php");
                } 
            } 
            else{
                header("Location:../404/index.php");
            }
            $conn=null;
    }