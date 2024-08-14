<?php
session_start();
$konstruktor ="data_administrator";
require_once '../database/config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Data Admin 4D</title>

  <?php
  include '../listlink.php';
  ?>
</head>
<!--
body tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#7552cd">
    <!-- Left navbar links -->
   <?php
   include '../navbar.php';
   ?> 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-warning elevation-4" style="background-color:#ffffff;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../auth/assets/img/wibu2.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light"><font color="#000000"><b>adm. Sikowi</b></font></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

    <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <?php
    include '../sidebar.php';
    ?>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
        <div class="card">
              <div class="card-header" style="background-color:#7552cd">
                <h3 class="card-title"><font color="#ffffff"><i class="fa-solid fa-user-plus"></i> Data Admin 4D</font></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%"><center>No</center></th>
                    <th><center>Username</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    $sqlpanggilpengguna = mysqli_query($koneksi, "SELECT * FROM tbl_pengguna") or die (mysqli_error($koneksi));
                    
                    if (mysqli_num_rows($sqlpanggilpengguna) > 0) {
                        //jika ada data pada database
                    

                        // lakukan perulangan pemanggilan data
                        while ($data = mysqli_fetch_array($sqlpanggilpengguna)) {
                    
                    ?>

                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$data['user'];?></td>
                    <td><?=$data['nama'];?></td>
                    <td></td>
                    </tr>
                  <?php

                        }
                    }
                    else
                    {
                        //jika tidak ada data pada database
                        echo "<tr><td colspan=\"4\" align=\"center\"><h5> Datane kosong son! </h5></td></tr>";
                    }
                    ?>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

 <?php
 include '../footer.php';
 ?>
</div>
<?php
include '../script.php';
?>
</body>
</html>