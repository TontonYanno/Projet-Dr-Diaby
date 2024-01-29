<?php
    echo $_GET['id'];
    $id=$_GET['id'];
    // echo $_GET['type'];
    require_once "../connexion/connexionPDO.php";
    $sql="SELECT titre FROM disque WHERE id = $id";
    $req=$connexion->query($sql);
    
    $resulat=$req->fetchObject();

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
        <form method="post" class='w-25 border rounded mx-auto '>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label d-flex mx-auto" style="width:max-content;">Nouveau disque</label>
                <input type="text" name="title" class="form-control w-75 m-auto" placeholder="example:Circles" >
            </div>
           <div>
           </div>
            <button type="submit" required name="create" class="btn btn-primary d-flex mx-auto">Ajouter</button>
            <br>
        </form>
    
</body>
</html>



