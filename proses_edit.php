<?php
include 'koneksi.php';

$id          = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$deskripsi   = $_POST['deskripsi'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];
$gambar      = $_FILES['gambar_produk']['name'];

// Jika ada gambar baru yang diupload
if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        
        $query = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga_beli='$harga_beli', harga_jual='$harga_jual', gambar_produk='$nama_gambar_baru' WHERE id='$id'";
        $result = mysqli_query($koneksi, $query);
    }
} else {
    // Jika tidak ada upload gambar baru
    $query = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
}

if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
}
?>