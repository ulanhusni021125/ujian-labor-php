<?php
include 'koneksi.php';

// Mengecek apakah ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    
    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    
    $data = mysqli_fetch_assoc($result);

    // Jika data tidak ditemukan
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
    }
} else {
    // Jika tidak ada ID di URL, kembalikan ke index
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <style>
        .base { width: 400px; padding: 20px; margin: auto; background: #ededed; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        button { background: salmon; color: white; padding: 10px; margin-top: 20px; border: none; width: 100%; cursor: pointer; }
    </style>
</head>
<body>
    <center><h1>Edit Produk <?php echo $data['nama_produk']; ?></h1></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
        <section class="base">
            <!-- ID dikirim secara sembunyi (hidden) -->
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
            
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required />
            
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
            
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required />
            
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required />
            
            <label>Gambar Produk</label>
            <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px; float: left; margin-bottom: 5px;">
            <input type="file" name="gambar_produk" />
            <small style="color: red">Abaikan jika tidak ingin merubah gambar</small>
            
            <button type="submit">Simpan Perubahan</button>
        </section>
    </form>
</body>
</html>