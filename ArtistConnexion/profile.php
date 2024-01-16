<?php
session_start();
$_SESSION['label'];
$_SESSION['nom'];
$_SESSION['id'];

//disk creation
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title=$_POST['title'];
    $id=$_SESSION['id'];
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
    <section class="fonctionalite">
        <input class="button"  type="button" value="add disque">
    </section>
    
    <section>
        <form  method="post" class="container">
            <div class="form">
                <h2>Add disque</h2>
                <div class="inputBox">
                    <input type="text" name="title" placeholder="Titre du disque">
                </div>
                <div class="inputBox">
                    <input type="submit" name="create" value="Add">
                </div>
            </div>
        </form>
    </section>
    
    
</body>
</html>