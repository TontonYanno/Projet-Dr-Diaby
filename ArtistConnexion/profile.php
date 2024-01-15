<?php
session_start();
$_SESSION['label'];
$_SESSION['nom'];
$_SESSION['id'];

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
        <form action="../ArtistConnexion/permission/createdisk.php" method="post" class="container">
            <div class="form">
                <h2>Add disque</h2>
                <div class="inputBox">
                    <input type="text" placeholder="Titre du disque">
                </div>
                <div class="inputBox">
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    
    </section>
    
    
</body>
</html>