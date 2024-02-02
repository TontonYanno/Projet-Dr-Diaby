<?php
require_once"../compilation/connexionPDO.php";

$sql="SELECT `disque`.id ,`disque`.titre ,`date` , `groupe`.nom FROM `groupe`,`disque` where `disque`.id_groupe=`groupe`.id and`groupe`.label='Soni' ";
$req=$connexion->query($sql);
$rows=$req->fetchAll();

