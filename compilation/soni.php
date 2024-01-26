<?php
require_once"../compilation/connexionPDO.php";

$sql="SELECT `disque`.id , `disque`.titre ,`date`  FROM `artiste`,`disque` ";
$req=$connexion->query($sql);
$req->fetchAll();
$rows=$req->fetchAll();
// echo $rows['date'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <section>
        <table classe="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['titre']?></td>
                        <td><?=$row['date']?></td>
                        <td><?=$_SESSION['label']?></td>  
                                     
                    </tr>
                <?php endforeach;?>
            </tbody>    
        </table>
    </section>
    
</body>
</html>