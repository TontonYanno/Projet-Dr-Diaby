<?php
    session_start();
    $id=$_GET['id'];
    $type=$_GET['type'];
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Disco |Update page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../inscription/asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../inscription/asset/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <form action="../connexion/setdisk.php?id=<?=$id?>&type=<?=$type?>" method="post" class="d-f">
        
        <div class="col-md-3 mx-auto " >
          <div class="card card-warning j ">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Modifier le disque</label>
                <input type="text" name="title" value="<?php echo $title["titre"];?>" id="inputEstimatedBudget" class="form-control" placeholder="Circles" >
              </div>

               <div class="form-group"> 
                   <div class="row-6">
                      <a href="#" class="btn btn-danger">Retour</a>
                    <input type="submit" value="Modifier" class="btn btn-warning float-right">
                  </div>
                </div>
            </div>
          </div>
        </div>
     </form>
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery -->
<script src="../inscription/asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../inscription/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE../inscription/asset-->
<script src="../inscription/asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../inscription/asset/dist/js/demo.js"></script>
</body>
</html>




