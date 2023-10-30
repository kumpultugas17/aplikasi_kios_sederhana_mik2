<?php
require_once '../config.php';
if (isset($_POST['submit'])) {
  $id_barang = $_POST['id_barang'];
  $kode_barang = $_POST['kode_barang'];
  $nama_barang = $_POST['nama_barang'];
  $kategori = $_POST['kategori'];
  $satuan = $_POST['satuan'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];

  $query = $conn->query("UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', kategori='$kategori', satuan='$satuan', stok='$stok', harga='$harga' WHERE id_barang='$id_barang'");

  if ($query) {
    header('location:index.php?alert=1');
  } else {
    header('location:index.php?alert=0');
  }
} else {
  echo "Silahkan klik edit pada bagian data! <a href='index.php'>Data Barang</a>";
}
