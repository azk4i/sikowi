<?php
session_start();
$konstruktor = "gallery_waifuku";
$folder = 'assets/gallery';

// Membaca semua file dalam folder
$files = array_diff(scandir($folder), array('.', '..'));

// Filter hanya file gambar dengan ekstensi .jpg, .jpeg, .png, .gif
$images = array_filter($files, function($file) use ($folder) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
});
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIFO SLB | Dashboard 3</title>

  <?php
  include '../listlink.php';
  ?>
  <style>
        .header {
            text-align: center;
            margin-bottom: 0px;
        }
        h1 {
            font-size: 2.5em;
            color: blue;
        }
        .gallery-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .gallery-wrapper {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px;
        }
        .gallery-item {
            flex: 0 0 auto;
            width: 700px;
            margin-right: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 24px;
        }
        .arrow.left {
            left: 10px;
        }
        .arrow.right {
            right: 10px;
        }
    </style>
</head>
<!--
`body` tag options:

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
        <div class="header">
        <h1><strong>Gallery Waifu-ku</strong></h1>
    </div>
    <div class="gallery-container">
        <div class="gallery-wrapper" id="galleryWrapper">
            <?php foreach ($images as $image): ?>
                <div class="gallery-item">
                    <img src="<?php echo htmlspecialchars($folder . '/' . $image); ?>" alt="<?php echo htmlspecialchars($image); ?>">
                </div>
            <?php endforeach; ?>
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
<script>
        function scrollLeft() {
            const galleryWrapper = document.getElementById('galleryWrapper');
            galleryWrapper.scrollBy({ left: -200, behavior: 'smooth' });
        }

        function scrollRight() {
            const galleryWrapper = document.getElementById('galleryWrapper');
            galleryWrapper.scrollBy({ left: 200, behavior: 'smooth' });
        }
    </script>
</body>
</html>
