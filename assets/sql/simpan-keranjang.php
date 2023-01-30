<?php
include "koneksi.php";

$kode=$_POST['kode'];
$nama=mysqli_query($conn, "SELECT * FROM tb_barang WHERE kode='$kode'");
$harga=mysqli_query($conn, "SELECT * FROM tb_barang WHERE kode='B001'");
$jumlah=$_POST['jumlah'];
$total=$_POST['total'];

$simpan=mysqli_query($conn, "INSERT INTO tb_keranjang (nama, harga, jumlah, total) VALUES('$nama', '$harga', '$jumlah', '$total')");
if($simpan)
{
    echo "data berhasil disipan";
}
else
{
    echo "Data Gagal Disimpan :(";
}
?>