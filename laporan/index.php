<?php
require_once('../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Kios Sederhana - Laporan Penjualan</title>
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
                     <li><a class="dropdown-item" href="../barang/index.php">Barang</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../transaksi/index.php">Transaksi</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Laporan Penjualan</a>
               </li>
            </ul>
            <div class="d-flex" role="search">
               <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
         </div>
      </div>
   </nav>

   <div class="container">
      <div class="row mt-3">
         <div class="col-12">
            <div class="alert alert-primary fw-bold py-2">
               LAPORAN PENJUALAN
            </div>

            <div class="card">
               <div class="card-body">
                  <form method="get" class="row g-3 align-items-center mb-4">
                     <div class="col">
                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                           <div class="input-group-text">Tanggal Penjualan </div>
                           <select class="form-select" name="cari_tgl" id="inlineFormSelectPref">
                              <option selected disabled>Pilih</option>
                              <?php
                              $tanggal = $conn->query("SELECT DISTINCT tgl_transaksi FROM transaksi");
                              foreach ($tanggal as $tgl) :
                              ?>
                                 <option value="<?= date('Y-m-d', strtotime($tgl['tgl_transaksi'])) ?>" <?= date('Y-m-d', strtotime($tgl['tgl_transaksi'])) == @$_GET['cari_tgl'] ? 'selected' : '' ?>><?= date('d-m-Y', strtotime($tgl['tgl_transaksi'])) ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-8">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <?php if (isset($_GET['cari_tgl'])) { ?>
                           <a href="export_pdf.php?cari_tgl=<?= $_GET['cari_tgl'] ?>" target="_blank" class="btn btn-danger float-end">Print PDF</a>
                           <a href="export_excel.php?cari_tgl=<?= $_GET['cari_tgl'] ?>" target="_blank" class="btn btn-success float-end me-3">Export Excel</a>
                        <?php } ?>
                     </div>
                  </form>
                  <?php if (isset($_GET['cari_tgl'])) { ?>
                     <table class="table table-bordered table-hover">
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
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $tgl = $_GET['cari_tgl'];
                           $query = $conn->query("SELECT * FROM transaksi t INNER JOIN barang b ON t.barang_id = b.id_barang WHERE date(t.tgl_transaksi) = '$tgl' ORDER BY tgl_transaksi DESC");
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
                  <?php } ?>
               </div>
            </div>

         </div>
      </div>
   </div>

   <!-- Import JS Bootstrap -->
   <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>