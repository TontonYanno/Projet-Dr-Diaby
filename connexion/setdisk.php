
<?php
echo $newtitle=$_POST['title'];
$id=  $_GET['id'];

require_once "../connexion/connexionPDO.php";

$up="UPDATE `disque` SET `titre` = :newtitle WHERE `disque`.`id` = :id ";
$req=$connexion->prepare($up);
$req->bindValue(":id", $id , PDO::PARAM_INT);
$req->bindValue(":newtitle", $newtitle , PDO::PARAM_STR);
$req->execute();

// $sql = "SELECT `disque`.id_artiste , `disque`.id_groupe FROM `disque` WHERE disque.id=80;";
// $request=$connexion->query($sql);
// $request->execute();
// $results=$request->fetch();

// $id_artiste=$results["id_artiste"];
// $id_groupe=$results["id_groupe"];

// if($id_artiste=!null && $id_groupe==null){
//     header("Location:profileartiste.php?type=artiste"."&id=".$results["id_artiste"]);
// }


