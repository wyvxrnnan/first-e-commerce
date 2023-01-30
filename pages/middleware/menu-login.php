<?php

@include '../../assets/sql/koneksi.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `tb_keranjang` WHERE nama = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'produk sudah ada di keranjang';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `tb_keranjang`(nama, harga, gambar, jumlah) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'produk ditambah!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Menu</title>

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../../assets/styles/menu.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
   <script src="../../assets/scripts/header-login.js" type="text/javascript" defer></script>
   <script src="../../assets/scripts/footer-login.js" type="text/javascript" defer></script>
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<header-component></header-component>

<div class="container">

<section class="products">

   <h1 class="heading">produk</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `tb_barang`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="admin-only/uploads/<?php echo $fetch_product['gambar']; ?>" alt="">
            <h3><?php echo $fetch_product['nama']; ?></h3>
            <div class="price">Rp<?php $harga = $fetch_product['harga']; echo number_format($harga, 2,',','.'); ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['nama']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['harga']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['gambar']; ?>">
            <input type="submit" class="btn" value="Beli" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<footer-component></footer-component>

<script src="../../assets/scripts/menu.js" type="text/javascript" defer></script>

</body>
</html>

