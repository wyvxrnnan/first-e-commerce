<?php
@include 'C:\xampp\htdocs\pwpb\proyek\assets\sql\koneksi.php';

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `tb_kontak` WHERE id = $delete_id ") or die('query failed');
};
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../../../assets/styles/penjualan.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script src="../../../assets/scripts/sidebar.js" type="text/javascript" defer></script>

        <title>Dashboard</title>
    </head>
    <style>
        
    </style>
    <body>
        <div class="dashboard">
            <!--sidebar-->
        
            <sidebar-component></sidebar-component>

            <div class="right-side">
                <div class="right-header">
                    <div class="top-bar">
                        <div class="top-bar-justify">
                            <div class="big-inbox">
                                Selamat Datang di Data Penjualan!
                            </div>
                        </div>
                    </div>
                    <hr class="new-hr">
                </div>
                <div class="right-body">
                    <div class="box-container">
                        <div class="heading">
                            <h1>Log</h1>
                            <p >Sejarah pesanan dari konsumen anda masuk ke sini.</p>
                        </div>
                        <section class="display-product-table">

                            <table>

                            <thead>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>No Telp</th>
                                <th>Email</th>
                                <th>Metode</th>
                                <th>Rumah</th>
                                <th>Jalan</th>
                                <th>Desa/Kelurahan</th>
                                <th>Kota/Kabupaten</th>
                                <th>Provinsi</th>  
                                <th>Kode Pos</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </thead>

                            <tbody>
                                <?php
                                
                                    $select_products = mysqli_query($conn, "SELECT * FROM `tb_pembelian`");
                                    if(mysqli_num_rows($select_products) > 0){
                                        while($row = mysqli_fetch_assoc($select_products)){
                                ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['nomer']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['metode']; ?></td>
                                    <td><?php echo $row['rata']; ?></td>
                                    <td><?php echo $row['jalan']; ?></td>
                                    <td><?php echo $row['kota']; ?></td>
                                    <td><?php echo $row['provinsi']; ?></td>
                                    <td><?php echo $row['negara']; ?></td>
                                    <td><?php echo $row['kode_pin']; ?></td>
                                    <td><?php echo $row['total_produk']; ?></td>
                                    <td><?php echo number_format($row['total_harga'], 2,',','.'); ?></td>
                                    <td>
                                        <a href="dashboard.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
                                    </td>
                                </tr>

                                <?php
                                    };    
                                    }else{
                                        echo "<div class='empty'>tidak ada pesan</div>";
                                    };
                                ?>
                            </tbody>
                            </table>

                            </section>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>