<?php

@include '../../assets/sql/koneksi.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `tb_keranjang`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['nama'] .' ('. $product_item['jumlah'] .') ';
         $product_price = $product_item['harga'] * $product_item['jumlah'];
         $price_total2 = $price_total += $product_price;
         $price_total3 = number_format($price_total2, 2,',','.');
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `tb_pembelian`(nama, nomer, email, metode, rata, jalan, kota, provinsi, negara, kode_pin, total_produk, total_harga) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>terima kasih! :D</h3>
         <div class='order-detail'>
            <span> item : ".$total_product."</span>
            <span class='total'> total : Rp".$price_total3."  </span>
         </div>
         <div class='customer-details'>
            <p> nama anda : <span>".$name."</span> </p>
            <p> no telpon anda : <span>".$number."</span> </p>
            <p> email anda : <span>".$email."</span> </p>
            <p> alamat anda : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> metode pembayaran anda : <span>".$method."</span> </p>
            <p>(*screenshot struk ini lalu tunjukan ke penjual melalui whatsapp untuk diproses*)</p>
         </div>
            <a href='keranjang.php' class='btn'>lanjut belanja</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>checkout</title>

   <script src="../../assets/scripts/header-login.js" type="text/javascript" defer></script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../../assets/styles/checkout.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<header-component></header-component>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">selesaikan pesananmu</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `tb_keranjang`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['harga'] * $fetch_cart['jumlah'];
            $grand_total = $total += $total_price;
            $grand_total2 = number_format($grand_total, 2,',','.');
      ?>
      <span><?= $fetch_cart['nama']; ?>(<?= $fetch_cart['jumlah']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> total pembayaran : Rp<?= $grand_total2; ?></span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>nama lengkap</span>
            <input type="text" placeholder="nama lengkap anda" name="name" required>
         </div>
         <div class="inputBox">
            <span>no telpon</span>
            <input type="number" placeholder="no telpon anda" name="number" required>
         </div>
         <div class="inputBox">
            <span>email</span>
            <input type="email" placeholder="email anda" name="email" required>
         </div>
         <div class="inputBox">
            <span>metode pembayaran</span>
            <select name="method">
               <option value="Cash On Delivery" selected>cash on delivery</option>
               <option value="credit card">kartu kredit</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>alamat rumah 1</span>
            <input type="text" placeholder="contoh: blok rt rw" name="flat" required>
         </div>
         <div class="inputBox">
            <span>alamat rumah 2</span>
            <input type="text" placeholder="contoh: nama jalan" name="street" required>
         </div>
         <div class="inputBox">
            <span>desa/kelurahan</span>
            <input type="text" placeholder="contoh: Rawa Panjang" name="city" required>
         </div>
         <div class="inputBox">
            <span>kota/kabupaten</span>
            <input type="text" placeholder="contoh: Bogor" name="state" required>
         </div>
         <div class="inputBox">
            <span>provinsi</span>
            <input type="text" placeholder="contoh: Jawa Barat" name="country" required>
         </div>
         <div class="inputBox">
            <span>kode pos</span>
            <input type="text" placeholder="contoh: 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="Pesan Sekarang" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>