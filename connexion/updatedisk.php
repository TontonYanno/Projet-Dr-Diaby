<?php
    echo $_POST['title'];
    $id=$_GET['id'];
    // echo $_GET['type'];
    require_once "../connexion/connexionPDO.php";
    $sql="SELECT titre FROM disque WHERE id = :id";
    $req=$connexion->prepare($sql);
    $req->bindValue(":id", $id , PDO::PARAM_INT);
    $req->execute();
    $title=$req->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
        <form  method="post" class='w-25 border rounded mx-auto '>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label d-flex mx-auto" style="width:max-content;">Nouveau disque</label>
            </div>
            <input type="text" name="title" class="form-control w-75 m-auto" value="<?php echo $title["titre"];?>" placeholder="example:Circles" >
            <div>
            <br>
            <button type="submit" required name="create" class="btn btn-warning d-flex mx-auto">update</button>
            <!-- <a type="submit" class="btn btn-warning d-flex mx-auto w-25" href="setdisk.php?id=<?=$id?>">update</a> -->
            <br>
        </form>
    
</body>
</html>



