<?php
    function nbrows($table){
        
        // $table=["disque","artiste];

        require_once"../connexion/connexion.php";
        $sql="SELECT COUNT(*) AS nombre_de_lignes FROM $table";
        $req= $conn->query($sql);
        $row = $req->fetch_assoc();
        echo $nombreDeLignes = $row['nombre_de_lignes']; 
        $conn=null;
    }
    
    
    