<?php
require_once "../config.php";
if (isset($_POST['submit'])) {
   $tgl_transaksi = date('Y-m-d');
   $nama_barang = $_POST['nama_barang'];
   $jumlah = $_POST['jumlah'];

   $query = $conn->query("INSERT INTO transaksi (tgl_transaksi, barang_id, jumlah) VALUES ('$tgl_transaksi', '$nama_barang', '$jumlah')");

   if ($query) {
      header('location:index.php?alert=1');
   } else {
      header('location:index.php?alert=2');
   }
}
