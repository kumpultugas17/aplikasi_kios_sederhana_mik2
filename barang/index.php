<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Kios Sederhana - Data Barang</title>
   <!-- Import CSS Bootstrap -->
   <link rel="stylesheet" href="../assets_bootstrap/css/bootstrap.min.css">
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
                  <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Data Master
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="index.php">Barang</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../transaksi/index.php">Transaksi</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../laporan/index.php">Laporan Penjualan</a>
               </li>
            </ul>
            <div class="d-flex">
            <a href="../logout.php" class="btn btn-outline-light btn-sm" type="submit">Logout</a>
            </div>
         </div>
      </div>
   </nav>

   <div class="container">
      <div class="row mt-3">
         <div class="col-12">
            <?php if (isset($_GET['alert']) &&  isset($_GET['alert']) == 1) { ?>
               <div class="alert alert-success py-2">
                  Data Berhasil diproses!
               </div>
            <?php } else { ?>
               <div class="alert alert-primary py-2">
                  DATA BARANG
               </div>
            <?php } ?>
            <a href="create.php" class="btn btn-primary btn-sm float-end mb-2">Tambah Data</a>
            <table class="table table-stripe table-hover">
               <thead class="table-primary">
                  <tr>
                     <th>No</th>
                     <th>Kode Barang</th>
                     <th>Nama Barang</th>
                     <th>Kategori</th>
                     <th>Satuan</th>
                     <th>Stok</th>
                     <th>Harga</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  require_once('../config.php');
                  $no = 1;
                  $query = $conn->query("SELECT * FROM barang ORDER BY id_barang DESC");
                  foreach ($query as $data) :
                  ?>
                     <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['kode_barang']; ?></td>
                        <td><?= $data['nama_barang']; ?></td>
                        <td><?= $data['kategori']; ?></td>
                        <td><?= $data['satuan']; ?></td>
                        <td><?= $data['stok']; ?></td>
                        <td><?= $data['harga']; ?></td>
                        <td>
                           <a href="edit.php?id=<?= $data['id_barang'] ?>" class="btn btn-sm btn-warning">Edit</a>
                           <a href="delete.php?id=<?= $data['id_barang'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                     </tr>
                  <?php
                  endforeach
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>



   <!-- Import JS Bootstrap -->
   <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>