<?php

@include '../../assets/sql/koneksi.php';

if(isset($_POST['kirim'])){
   $nama_dep = $_POST['nama_dep'];
   $nama_bel = $_POST['nama_bel'];
   $email = $_POST['email'];
   $pesan = $_POST['pesan'];

   $insert_query = mysqli_query($conn, "INSERT INTO `tb_kontak`(nama, email, pesan) VALUES('$nama_dep $nama_bel', '$email', '$pesan')") or die('query failed');

   if($insert_query){
      $message[] = 'pesan berhasil dikirim!';
   }else{
      $message[] = 'gagal mengirim pesan';
   }
};

?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../../assets/styles/kontak.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        <script src="../../assets/scripts/header-login.js" type="text/javascript" defer></script>
        <script src="../../assets/scripts/footer-login.js" type="text/javascript" defer></script>

        <title>Kontak</title>
    </head>
    <body>

        <div class="container">

            <!--navigation-->

            <header-component></header-component>

            <!--content-->

            <div class="description">
                <div class="vl"></div>
                <div class="text">
                    <h1>Hubungi Kami</h1>
                    <p>Isi formulirnya dan kami akan kembali dengan jawaban paling lama selama 24jam.</p>
                </div>
            </div>
            <div class="content">
                <h1 class="header">Kritik? Saran?<br/>Isi Formulirnya. Mudah!</h1>

                <form action="" method="POST">
                    <div class="content-input">
                        <div class="group">      
                            <input type="text" name="nama_dep" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nama Depan</label>
                        </div>
                            
                        <div class="group">      
                            <input type="text" name="nama_bel" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nama Belakang</label>
                        </div>
                    </div>
                    
                    <div class="email">      
                        <input type="text" name="email" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Email</label>
                    </div>

                    <div class="message">      
                        <input type="text" name="pesan" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Pesanmu</label>
                    </div>

                    
                    <input type="submit" class="btn" name="kirim">
                </form>
            </div>

            <!--footer-->

            <footer-component></footer-component>
        </div>
    </body>
</html>