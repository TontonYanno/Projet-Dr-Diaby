<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    session_start();
    $_SESSION['label'];
    $_SESSION['nom'];
    $_SESSION['id'];
    $id = $_SESSION['id'];

// list of disk
    require "../ArtistConnexion/connexionPDO.php";
    $list="SELECT * FROM `disque` WHERE `id_artiste`= $id";
    $req=$connexion->query($list);
    $rows = $req->fetchAll();


//disk creation
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title=$_POST['title'];
        function createdisk($title, int $id){
            require_once "../ArtistConnexion/connexionPDO.php";
            $sql = "INSERT INTO `disque` ( `titre`, `date`, `id_artiste`, `id_groupe`) VALUES (:a, current_timestamp(),:b, NULL);";
            $req=$connexion->prepare($sql);
            $req->bindValue(':a',$title);
            $req->bindValue(':b',$id);
            $req->execute();
        }
        if (isset($_POST['create'])) {
            createdisk($title,$id);
        }
    }

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
            <div class="info">
                <div class="info1">
                    <?php echo $_SESSION['nom']; ?>
                </div>
                <div class="info1">
                    <?php echo $_SESSION['label']; ?>
                </div>
            </div>
        </nav>
    </section>
    <br>
    <section>
        <form method="post" class='w-25 border  rounded '>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label w-75">titre du disque </label>
                <input type="text" name="title" class="form-control w-75"  aria-describedby="emailHelp">
            </div>
           
            <button type="submit" name="create" class="btn btn-primary">Ajouter</button>
        </form>
    </section>
    <br>
    <section>
        <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Année</th>
                <th>classe</th>
            </tr>
        </thead>

        <tbody>
            <?php 
             
            foreach($rows as $row): ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['titre']?></td>
                    <td><?=$row['date']?></td>                
                </tr>
            <?php endforeach; ?>
        </tbody>

        </table>
    </section>
   
    
</body>
</html>