<?php

@include '../../assets/sql/koneksi.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `tb_keranjang` SET jumlah = '$update_value' WHERE kode = '$update_id'");
   if($update_quantity_query){
      header('location:keranjang.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `tb_keranjang` WHERE kode = '$remove_id'");
   header('location:keranjang.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `tb_keranjang`");
   header('location:keranjang.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Keranjang</title>

   <script src="../../assets/scripts/header-login.js" type="text/javascript" defer></script>

   <link rel="stylesheet" href="../../assets/styles/keranjang.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header-component></header-component>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">keranjangmu</h1>

   <table>

      <thead>
         <th>gambar</th>
         <th>nama</th>
         <th>harga</th>
         <th>jumlah</th>
         <th>total</th>
         <th>aksi</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `tb_keranjang`");
         $grand_total = 0;
         $grand_total2 = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="admin-only/uploads/<?php echo $fetch_cart['gambar']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['nama']; ?></td>
            <td>Rp<?php $harga =  $fetch_cart['harga']; echo number_format($harga, 2,',','.'); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['kode']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['jumlah']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>Rp<?php $sub_total = $fetch_cart['harga'] * $fetch_cart['jumlah']; echo number_format($sub_total, 2,',','.'); ?></td>
            <td><a href="keranjang.php?remove=<?php echo $fetch_cart['kode']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> hapus</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;
           $grand_total2 = number_format($grand_total, 2,',','.');
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="menu-login.php" class="option-btn" style="margin-top: 0;">lanjut belanja</a></td>
            <td colspan="3">total harga</td>
            <td>Rp<?php echo $grand_total2; ?></td>
            <td><a href="keranjang.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> hapus semua </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total2 > 1)?'':'disabled'; ?>" style="padding-left: 100px; padding-right: 100px;" >checkout</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="../../assets/scripts/menu.js" type="text/javascript" defer></script>

</body>
</html>