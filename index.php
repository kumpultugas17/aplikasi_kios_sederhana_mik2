<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <!-- Import CSS Bootstrap -->
   <link rel="stylesheet" href="assets_bootstrap/css/bootstrap.min.css">
</head>

<body>
   <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Data Master
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="barang/index.php">Barang</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="transaksi/index.php">Transaksi</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="laporan/index.php">Laporan Penjualan</a>
               </li>
            </ul>
            <div class="d-flex">
               <a href="logout.php" class="btn btn-outline-light btn-sm" type="submit">Logout</a>
            </div>
         </div>
      </div>
   </nav>

   <div class="container">
      <div class="row mt-3">
         <div class="col-12">
            <div class="alert alert-primary fw-bold py-2">
               SELAMAT DATANG DI APLIKASI KIOS SEDERHANA MANAJEMEN 2
            </div>
         </div>
      </div>
   </div>

   <!-- Import JS Bootstrap -->
   <script src="assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>