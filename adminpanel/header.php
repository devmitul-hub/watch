<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    p{
      font-size: 25px !important;
    }
  </style>
  <?php
  include("header-link.php");
  ?>
</head>



<body class="hold-transition sidebar-mini layout-fixed">
  <!-- <div class="wrapper"> -->
  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../img/main_logo_2.png" style="height: 60px; width:auto;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/banner-1.png" class="img-circle elevation-2" alt="User Image" style="height: 80px; width:auto">
        </div>
        <div class="info">
          <h1 class="mt-3">Admin</h1>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="manage_category.php" class="nav-link">
              <i class="fa-sharp-duotone fa-solid fa-layer-group"></i>
              <p>Manage category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="manage_product.php" class="nav-link">
              <i class="fa-duotone fa-solid fa-box-open"></i>
              <p>Manage Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">
              <i class="fa-regular fa-headset"></i>
              <p>contact</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="order.php" class="nav-link">
            <i class="fa-solid fa-cart-shopping-fast"></i>
            <p>order</p>
            </a>
          </li>
          <li class="nav-item">
            <form action="" method="POST">
              <i class="fa fa-sign-out" aria-hidden="true" style="color:#c2c7d0;margin-left:25px;
    background-color: transparent !important"></i>
              <button type="submit" name="logout"
                style="background-color: transparent !important;color:#c2c7d0;border:none; font-size:25px !important;"
                class="logout">Logout</button>
            </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php
  if (isset($_POST['logout'])) {
    // Clear all session data
    session_unset();
    session_destroy();

    // Output the SweetAlert script after destroying the session
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>"; // Ensure SweetAlert2 is included
    echo "<script>
              Swal.fire({
                  title: 'Logout Successfully',
                  icon: 'success',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'adm_login.php'; // Redirect after confirmation
                  }
              });
          </script>";
  }
  ?>