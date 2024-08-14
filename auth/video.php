<?php
session_start();
$konstruktor = "video_waifuku";
$folder = 'assets/video';

// Membaca semua file dalam folder
$files = array_diff(scandir($folder), array('.', '..'));

// Filter hanya file video dengan ekstensi .mp4, .avi, .mov, .webm
$videos = array_filter($files, function($file) use ($folder) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, ['mp4', 'avi', 'mov', 'webm']);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIFO SLB | Dashboard 3</title>

  <?php include '../listlink.php'; ?>

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
        width: 270px;
        margin-right: 10px;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
    }
    .gallery-item video {
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#7552cd">
    <?php include '../navbar.php'; ?> 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-warning elevation-4" style="background-color:#ffffff;">
    <a href="index3.html" class="brand-link">
      <img src="../auth/assets/img/wibu2.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light"><font color="#000000"><b>adm. Sikowi</b></font></span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php include '../sidebar.php'; ?>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="header">
            <h1><strong>Gallery Waifu-ku</strong></h1>
          </div>
          <div class="gallery-container">
            <div class="gallery-wrapper" id="galleryWrapper">
              <?php foreach ($videos as $video): ?>
                <div class="gallery-item">
                  <video controls>
                    <source src="<?php echo htmlspecialchars($folder . '/' . $video); ?>" type="video/mp4">
                    Browser Anda tidak mendukung elemen video.
                  </video>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

  <?php include '../footer.php'; ?>
</div>

<?php include '../script.php'; ?>
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
