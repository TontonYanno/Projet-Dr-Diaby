<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
    <title>compilation page</title>
    <link rel="stylesheet" href="../compilation/style.css">
</head>
<body style="bac">
    <div class="container text-center">
        <div class="col   mx-auto">
            <div class="col sony border rounded">
                <h2>Compilation de Soni</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Date</td>
                            <td>Auteur</td>
                        </tr>
                    </thead>
                    <?php require_once"../compilation/soni.php"; ?>
                            <tbody>
                                <?php foreach($rows as $row):?>
                                    <tr>
                                        <td><?=$row['titre']?></td>
                                        <td><?=$row['date']?></td>
                                        <td><?=$row['nom']?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                </table>
            </div>
            <br>
            <div class="col border rounded Coast 2 Coast">
            <h2>Compilation de CDN</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Date</td>
                            <td>Auteur</td>
                        </tr>
                    </thead>
                    <?php require_once"../compilation/cdn.php"; ?>
                            <tbody>
                                <?php foreach($rows as $row):?>
                                    <tr>
                                        <td><?=$row['titre']?></td>
                                        <td><?=$row['date']?></td>
                                        <td><?=$row['nom']?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                </table>
            </div>
            <br>
            <div class="col border rounded Coast 2 Coast">
                <h2>Compilation de C2C</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Date</td>
                            <td>Auteur</td>
                        </tr>
                    </thead>
                    <?php require_once"../compilation/coast2coat.php"; ?>
                            <tbody>
                                <?php foreach($rows as $row):?>
                                    <tr>
                                        <td><?=$row['titre']?></td>
                                        <td><?=$row['date']?></td>
                                        <td><?=$row['nom']?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="col  mx-auto">
            <div class="col sony border rounded">
                <h2>Compilation de Soni</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Date</td>
                            <td>Groupe</td>
                        </tr>
                    </thead>
                    <?php require_once"../compilation/soni2.php"; ?>
                            <tbody>
                                <?php foreach($rows as $row):?>
                                    <tr>
                                        <td><?=$row['titre']?></td>
                                        <td><?=$row['date']?></td>
                                        <td><?=$row['nom']?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                </table>
            </div>
            <br>
            <div class="col border rounded Coast 2 Coast">
            <h2>Compilation de CDN</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Date</td>
                            <td>Auteur</td>
                        </tr>
                    </thead>
                    <?php require_once"../compilation/cdn.php"; ?>
                            <tbody>
                                <?php foreach($rows as $row):?>
                                    <tr>
                                        <td><?=$row['titre']?></td>
                                        <td><?=$row['date']?></td>
                                        <td><?=$row['nom']?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                </table>
            </div>
            <br>
            <div class="col border rounded Coast 2 Coast">
                <h2>Compilation de C2C </h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Date</td>
                            <td>Auteur</td>
                        </tr>
                    </thead>
                    <?php require_once"../compilation/coast2coat.php"; ?>
                            <tbody>
                                <?php foreach($rows as $row):?>
                                    <tr>
                                        <td><?=$row['titre']?></td>
                                        <td><?=$row['date']?></td>
                                        <td><?=$row['nom']?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <a href="http://localhost/Disco/project/html.html" class="btn btn-danger d-flex m-auto" style="width: max-content;">accueil</a>

</body>
</html>