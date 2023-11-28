<?php
if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   if ($username === 'admin' && $password === 'rahasia') {
      header('location:index.php');
   } else {
      echo "<script>
         alert('Gagal login, silahkan coba lagi'); window.location='login.php';
      </script>";
   }
}
