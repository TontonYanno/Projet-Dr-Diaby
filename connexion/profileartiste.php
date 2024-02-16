<?php
    session_start();
    $id=$_SESSION['id'];
    $_SESSION['label'];
    $_SESSION['nom'];
    // echo $_SESSION['id_titre']=$row['id'];
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Disco| Projects</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../inscription/asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../inscription/asset/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <section class="content row-6">

    <div class="  row-6 d-flex  ">        
        <!-- Profile Image -->
        <div class="card card card-outline col mr-4 ">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                    src="../inscription/asset/dist/img/user4-128x128.jpg"
                    alt="User profile picture">
                </div>
                
                <h3 class="profile-username text-center"><?php echo strtoupper($_SESSION['nom']); ?></h3>
                
                <p class="text-muted text-center">Artiste Solo</p>
                
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                </ul>

                <a href="logout.php" class="btn btn-primary w-25 mx-auto btn-block">
                    <!-- <i class="fas fa-arrow-rigth-from-bracket   "></i> -->
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Log out
                </a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
        <!-- j'envoie le form avec type artite pour faire la difference quand je vais creer les disque   -->
        <div class="card card-outline border rounded d-flex mx-auto  col-3 ">
            <form action="createdisk.php" method="post" class='content row-6'>
                <div class=" mt-4 col-6">
                    <label for="exampleInputEmail1" class="form-label d-flex mx-auto" style="width:max-content;">Nouveau disque</label>
                </div>

                <div class="mt-4 col-6 ">
                    <input type="text" name="title" class="form-control  m-auto" placeholder="example:Circles" >
                </div>
                <div class="mt-4 col-6">
                    <button type="submit" required name="artiste" class="btn btn-primary d-flex mx-auto">Ajouter</button>
                </div>
                <br>
            </form>
        </div>
    </div>
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>
                
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Project 
                    </th>
    
                    <th>
                        Project Progress
                    </th>
                    <th style="width: 8%" class="text-center">
                        Label
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row):?>
              <tr>
                <td>
                    <?=$row['id']?>
                </td>
                <td>
                    <a>
                        <?=$row['titre']?>
                    </a>
                    <br/>
                    <small>
                        Created <?=$row['date'] ?>
                    </small>
                </td>
                
                <td class="project_progress">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                        </div>
                    </div>
                    <small>
                        77% Complete
                    </small>
                </td>
                <td class="project-state">
                    <span class="badge badge-success"><?=$row['label']?></span>
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="updatedisk.php?id=<?=$row['id']?>&type=artiste">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="deletedisk.php?id=<?=$row['id']?>&type=artiste">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </td>
              </tr>  
              <?php  endforeach;?>
            </tbody>
        </table>
      </div>
    </div>
  </section>
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="#">Disco</a>.</strong> All rights reserved.
  </footer>

<!-- jQuery -->
<script src="../inscription/asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../inscription/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../inscription/asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../inscription/asset/dist/js/demo.js"></script>
</body>
</html>