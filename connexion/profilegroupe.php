<?php
    session_start();
    $_SESSION['label'];
    $_SESSION['nom'];
    $id = $_SESSION['id'];
    if (!$_SESSION) {
        header("Location:index.html"); 
    }
// list of disk
    require "../connexion/connexionPDO.php";
    $list="SELECT `disque`.id , titre , `groupe`.label , `date` FROM `disque` ,`groupe`  WHERE `id_groupe`= $id AND `groupe`.id=$id ORDER BY `date` desc ";
    $req=$connexion->query($list);
    $rows = $req->fetchAll();
    $connexion=null; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section>
        <nav class="navbar">
        <div class="info d-grid">
                <div class="info1 d-flex ">
                    <div class="tilte w-75">
                        <h6 class="info">Groupe:</h6>
                    </div>
                    <div class="">
                        <h6>
                            <?php echo strtoupper($_SESSION['nom']); ?>
                        </h6>
                    </div>
                </div>
                <div class="info1 d-flex">
                    <div class="title w-75">
                        <h6>Label:</h6>
                    </div>
                    <div class="">
                        <h6>
                            <?php echo strtoupper($_SESSION['label']); ?>
                        </h6>
                    </div>
                </div>
            </div>

            <div>
                <a href="logout.php" >log out</a>
            </div>
        </nav>
    </section>
    <br>
    <section>
        <form action="createdisk.php" method="post" class='w-25 border rounded mx-auto '>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label d-flex mx-auto" style="width:max-content;">Nouveau disque</label>
                <input type="text" name="title" class="form-control w-75 m-auto" placeholder="example:Circles" >
            </div>
           <div>
           </div>
            <button type="submit" required name="groupe" class="btn btn-primary d-flex mx-auto">Ajouter</button>
            <br>
        </form>
    </section>
    <br>
    <section>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Label</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($rows as $row): ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['titre']?></td>
                        <td><?=$row['date']?></td>
                        <td><?= strtoupper($_SESSION['label'])?></td>  
                        <td>
                            <a href="updatedisk.php?id=<?=$row['id']?>&type=groupe">update</a>
                            <a href="deletedisk.php?id=<?=$row['id']?>&type=groupe">delete</a>
                        </td>              
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </section>
    
</body>
</html>