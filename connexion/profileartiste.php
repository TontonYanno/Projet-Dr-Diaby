<?php
    session_start();
    $id=$_SESSION['id'];
    $_SESSION['label'];
    $_SESSION['nom'];
    if (!$_SESSION) {
        header("Location:index.html"); 
    }

// list of disk
    require "../connexion/connexionPDO.php";
    $list="SELECT `disque`.id , titre , `artiste`.label  ,`artiste`.nom , `date` FROM `disque` ,`artiste`  WHERE `id_artiste`= $id AND `artiste`.id=$id ORDER BY `date` desc ";
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
                        <h4 class="info">Ariste Solo:</h4>
                    </div>
                    <div class="">
                        <h4>
                            <?php echo strtoupper($_SESSION['nom']); ?>
                        </h4>
                    </div>
                </div>
                <div class="info1 d-flex">
                    <div class="title w-75">
                        <h4>Label :</h4>
                    </div>
                    <div class="">
                        <h4>
                            <?php echo strtoupper($_SESSION['label']); ?>
                        </h4>
                    </div>
                </div>
            </div>

            <div>
                <a class="btn btn-danger" href="logout.php" >
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </nav>
    </section>
    <br>
    <section>
        <!-- j'envoie le form avec type artite pour faire la difference quand je vais creer les disque   -->
        <form action="createdisk.php" method="post" class='w-25 border rounded mx-auto '>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label d-flex mx-auto" style="width:max-content;">Nouveau disque</label>
                <input type="text" name="title" class="form-control w-75 m-auto" placeholder="example:Circles" >
            </div>
           <div>
               <button type="submit" required name="artiste" class="btn btn-primary d-flex mx-auto">Ajouter</button>
           </div>
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
                        <td><?=$_SESSION['label']?></td>  
                        <td>
                            <a class="btn btn-success" href="updatedisk.php?id=<?=$row['id']?>&type=artiste">update</a>
                            <a class="btn btn-danger" href="deletedisk.php?id=<?=$row['id']?>&type=artiste">delete</a>
                        </td>              
                    </tr>
                <?php  endforeach;?>
            </tbody>
        </table>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>