<?php
require_once '../config.php';
if (isset($_POST['submit'])) {
  $kode_barang = $_POST['kode_barang'];
  $nama_barang = $_POST['nama_barang'];
  $kategori = $_POST['kategori'];
  $satuan = $_POST['satuan'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];

  $query = $conn->query("INSERT INTO barang (kode_barang, nama_barang, kategori, satuan, stok, harga) VALUES ('$kode_barang', '$nama_barang', '$kategori', '$satuan', '$stok', '$harga')");

  if ($query) {
    header('location:index.php?alert=1');
  } else {
    header('location:index.php?alert=0');
  }
} else {
  echo "Silahkan isi data terlebih dahulu ! <a href='create.php'>Form</a>";
}
