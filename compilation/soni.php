<?php
require_once"../compilation/connexionPDO.php";

$sql="SELECT `disque`.id ,`disque`.titre ,`date` , `artiste`.nom FROM `artiste`,`disque` where `disque`.id_artiste=`artiste`.id and`artiste`.label='Soni' ";
$req=$connexion->query($sql);
$rows=$req->fetchAll();

