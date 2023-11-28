<?php
require_once('../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Export PDF</title>
   <!-- Import CSS Bootstrap -->
   <link rel="stylesheet" href="../assets_bootstrap/css/bootstrap.min.css">
</head>

<body onload="print()">
   <div class="text-center mb-3">
      <h4>LAPORA PENJUALAN</h4>
      <h6 class="fw-bold">KIOS BERKAT</h6>
      <span>Jl. Cilik Riwut Km 1,5 Kota Palangka Raya</span>
   </div>
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

   <!-- Import JS Bootstrap -->
   <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>