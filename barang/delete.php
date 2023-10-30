<?php
require_once '../config.php';
if (isset($_GET['id'])) {
  $id_barang = $_GET['id'];

  $query = $conn->query("DELETE FROM barang WHERE id_barang='$id_barang'");

  if ($query) {
    header('location:index.php?alert=1');
  } else {
    header('location:index.php?alert=0');
  }
} else {
  echo "Silahkan klik delete pada tombol hapus di <a href='index.php'>Data Barang</a>!";
}
