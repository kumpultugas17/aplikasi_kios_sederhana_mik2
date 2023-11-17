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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
        <div class="alert alert-primary py-2">
          DATA BARANG
        </div>
        <a href="index.php" class="btn btn-secondary btn-sm float-end mb-2">Kembali</a>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="insert.php" method="post">
              <div class="mb-3 row">
                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan kode barang">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan kategori barang">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan satuan barang">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan stok barang">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga barang">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Import JS Bootstrap -->
  <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>