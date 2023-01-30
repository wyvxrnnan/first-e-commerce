<?php

@include 'C:\xampp\htdocs\pwpb\proyek\assets\sql\koneksi.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploads/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `tb_barang`(nama, harga, gambar) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Produk Berhasil Ditambahkan';
   }else{
      $message[] = 'Gagal Menambah Produk';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `tb_barang` WHERE kode = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:input.php');
      $message[] = 'Produk Berhasil Dihapus';
   }else{
      header('location:input.php');
      $message[] = 'Produk Gagal Dihapus';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploads/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `tb_barang` SET nama = '$update_p_name', harga = '$update_p_price', gambar = '$update_p_image' WHERE kode = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:input.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:input.php');
   }

}

?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../../../assets/styles/input.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="../../../assets/scripts/sidebar.js" type="text/javascript" defer></script>

        <title>Input</title>
    </head>
    <body>
        <div class="dashboard">
            <!--sidebar-->
            <sidebar-component></sidebar-component>

            <div class="right-side">
                <div class="right-header">
                    <div class="top-bar">
                        <div class="top-bar-justify">
                            <div class="big-inbox">
                                Selamat Datang di Data Produk!
                            </div>
                        </div>
                    </div>
                    <hr class="new-hr">
                </div>
                <div class="yes">
                    <div class="right-body">
                    <?php

                     if(isset($message)){
                        foreach($message as $message){
                           echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
                        };
                     };

                     ?>

                     <div class="container">

                     <section>

                     <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                        <h3>Tambah Produk Baru</h3>
                        <input type="text" name="p_name" placeholder="ketik nama produk" class="box" required>
                        <input type="number" name="p_price" min="0" placeholder="ketik harga produk" class="box" required>
                        <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                        <input type="submit" value="Tambah Produk" name="add_product" class="btn">
                     </form>

                     </section>

                     <section class="display-product-table">

                        <table>

                           <thead>
                              <th>Gambar Produk</th>
                              <th>Nama Produk</th>
                              <th>Harga Produk</th>
                              <th>Aksi</th>
                           </thead>

                           <tbody>
                              <?php
                              
                                 $select_products = mysqli_query($conn, "SELECT * FROM `tb_barang`");
                                 if(mysqli_num_rows($select_products) > 0){
                                    while($row = mysqli_fetch_assoc($select_products)){
                              ?>

                              <tr>
                                 <td><img src="uploads/<?php echo $row['gambar']; ?>" height="100" alt=""></td>
                                 <td><?php echo $row['nama']; ?></td>
                                 <td>Rp<?php echo number_format($row['harga'], 2,',','.'); ?></td>
                                 <td>
                                    <a href="input.php?delete=<?php echo $row['kode']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
                                    <a href="input.php?edit=<?php echo $row['kode']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
                                 </td>
                              </tr>

                              <?php
                                 };    
                                 }else{
                                    echo "<div class='empty'>no product added</div>";
                                 };
                              ?>
                           </tbody>
                        </table>

                     </section>

                     <section class="edit-form-container">

                        <?php
                        
                        if(isset($_GET['edit'])){
                           $edit_id = $_GET['edit'];
                           $edit_query = mysqli_query($conn, "SELECT * FROM `tb_barang` WHERE kode = $edit_id");
                           if(mysqli_num_rows($edit_query) > 0){
                              while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                        ?>

                        <form action="" method="post" enctype="multipart/form-data">
                           <img src="uploads/<?php echo $fetch_edit['gambar']; ?>" height="200" alt="">
                           <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['kode']; ?>">
                           <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['nama']; ?>">
                           <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['harga']; ?>">
                           <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                           <input type="submit" value="update the prodcut" name="update_product" class="btn">
                           <input type="reset" value="cancel" id="close-edit" class="option-btn">
                        </form>

                        <?php
                                 };
                              };
                              echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
                           };
                        ?>

                     </section>

                     </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>