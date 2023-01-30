<?php
session_start();
if(!isset($_SESSION['stat_login']) and !isset($_SESSION['email']) and !isset($_SESSION['password']))
{   
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="../../assets/styles/index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <script src="../../assets/scripts/header-login.js" type="text/javascript" defer></script>
        <script src="../../assets/scripts/footer-login.js" type="text/javascript" defer></script>

        <title>Beranda</title>
    </head>
    <body>
        <div class="container">

            <!--navigation-->

            <header-component></header-component>

            <!--about-->

            <div class="content">
                <div class="about">
                    <h1>
                        Apa Itu TheCrunchy?
                    </h1>
                        <br>
                    <p>
                        The Crunchy adalah sebuah toko makanan yang didirikan oleh Bu Marnis sejak tahun 2014.
                        Toko ini memproduksi dan menjual makanan homemade dengan harga yang terjangkau.
                    </p>
                    <br>
                    <a href="../middleware/menu-login.php" class="pesan"><button>Pesan Sekarang</button></a>
                </div>
                <img src="../../assets/images/produk/baso.png" alt="baso">
            </div>

            <!--promo-->

            <div class="content-2">
                <div class="promo">
                    <h1>Langkah - Langkah Pembelian</h1>
                </div>
                <div class="cards">
                    <div class="card">
                        <div class="face face1">
                            <div class="card-content">
                                <div class="icon">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="card-content">
                                <h3>
                                    Belanja
                                </h3>
                                <p>Pilih barang yang ingin anda beli.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="face face1">
                            <div class="card-content">
                                <div class="icon">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="card-content">
                                <h3>
                                    Screenshot
                                </h3>
                                <p>Tangkap layar tampilan struk pembelian anda setelah proses checkout.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="face face1">
                            <div class="card-content">
                                <div class="icon">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="card-content">
                                <h3>
                                    Whatsapp
                                </h3>
                                <p>Tunjukkan bukti pembelian anda kepada penjual melalui Whatsapp</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--footer-->
            
            <footer-component></footer-component>
        </div>
    </body>
</html>