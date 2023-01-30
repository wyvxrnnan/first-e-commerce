<?php
include "koneksi.php";
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$simpan=mysqli_query($conn, "INSERT INTO tb_akun(username, email, password, posisi) VALUES('$username', '$email', '$password', '00')");
if($simpan)
{
    header('location:../../../proyek/pages/middleware/login.php');
}
else
{
    echo "Data Gagal Disimpan :(";
}
?>