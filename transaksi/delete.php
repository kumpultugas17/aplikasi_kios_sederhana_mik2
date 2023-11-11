<?php
require_once '../config.php';
if (isset($_GET['id'])) {
   $id_transaksi = $_GET['id'];

   $query = $conn->query("DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

   if ($query) {
      header('location:index.php?alert=1');
   } else {
      header('location:index.php?alert=0');
   }
} else {
   echo "Silahkan klik delete pada tombol hapus di <a href='index.php'>Data Barang</a>!";
}
