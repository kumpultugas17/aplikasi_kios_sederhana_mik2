<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Kios Sederhana - Transaksi</title>
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
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Transaksi</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Data Master
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="../barang/index.php">Barang</a></li>
                  </ul>
               </li>
            </ul>
            <div class="d-flex" role="search">
               <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
            </div>
         </div>
      </div>
   </nav>

   <div class="container">
      <div class="row mt-3">
         <div class="col-12">
            <?php if (isset($_GET['alert']) &&  isset($_GET['alert']) == 1) { ?>
               <div class="alert alert-success fw-bold py-2">
                  Data Berhasil diproses!
               </div>
            <?php } elseif (isset($_GET['alert']) &&  isset($_GET['alert']) == 0) { ?>
               <div class="alert alert-danger fw-bold py-2">
                  Data Gagal diproses!
               </div>
            <?php } else { ?>
               <div class="alert alert-primary fw-bold py-2">
                  DATA TRANSAKSI
               </div>
            <?php } ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-end mb-2" data-bs-toggle="modal" data-bs-target="#tambah">
               Tambah Data
            </button>

            <table class="table table-stripe table-hover">
               <thead class="table-primary">
                  <tr>
                     <th>No</th>
                     <th>Tgl. Transaksi</th>
                     <th>Nama Barang</th>
                     <th>Kategori</th>
                     <th>Satuan</th>
                     <th>Harga</th>
                     <th>Jumlah</th>
                     <th>Total</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  require_once('../config.php');
                  $no = 1;
                  $query = $conn->query("SELECT * FROM transaksi t INNER JOIN barang b ON t.barang_id = b.id_barang ORDER BY tgl_transaksi DESC");
                  foreach ($query as $data) :
                     $total = $data['harga'] * $data['jumlah'];
                     $gt[] = $total;
                     $grand_total = array_sum($gt);
                  ?>
                     <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date("d-m-Y", strtotime($data['tgl_transaksi'])); ?></td>
                        <td><?= $data['nama_barang']; ?></td>
                        <td><?= $data['kategori']; ?></td>
                        <td><?= $data['satuan']; ?></td>
                        <td><?= $data['harga']; ?></td>
                        <td><?= $data['jumlah']; ?></td>
                        <td><?= "Rp. " . number_format($total, 0, ',', '.'); ?></td>
                        <td>
                           <a href="delete.php?id=<?= $data['id_transaksi'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah data akan dihapus?')">Hapus</a>
                        </td>
                     </tr>
                  <?php
                  endforeach
                  ?>
                  <tr>
                     <td colspan="7" class="text-end">Grand Total </td>
                     <td colspan="2">Rp. <?= number_format($grand_total, 0, ',', '.') ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>



   <!-- Import JS Bootstrap -->
   <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Transaksi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="insert.php" method="post">
            <div class="modal-body">
               <div class="mb-2">
                  <label for="nama_barang" class="form-label">Nama Barang</label>
                  <select name="nama_barang" id="nama_barang" class="form-select">
                     <option selected disabled>Pilih Barang</option>
                     <?php
                     $query = $conn->query("SELECT * FROM barang");
                     foreach ($query as $data) :
                     ?>
                        <option value="<?= $data['id_barang'] ?>"><?= $data['nama_barang'] ?></option>
                     <?php
                     endforeach
                     ?>
                  </select>
               </div>
               <div class="mb-2">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="masukkan jumlah barang">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>