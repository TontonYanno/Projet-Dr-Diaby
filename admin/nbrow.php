<?php
    function nbrows($table){
        require_once"../connexion/connexion.php";
        $sql="SELECT COUNT(*) AS nombre_de_lignes FROM $table";
        $req= $conn->query($sql);
        $row = $req->fetch_assoc();
        echo $nombreDeLignes = $row['nombre_de_lignes']; 
        // $row->close();
        // $conn->close();
    }

?>