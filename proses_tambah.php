<?php
include 'koneksi.php';

// Ambil data dari form
$nama_produk = $_POST['nama_produk'];
$deskripsi   = $_POST['deskripsi'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];
$gambar      = $_FILES['gambar_produk']['name'];

// Cek apakah ada gambar yang diupload
if($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); 
  $x = explode('.', $gambar);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar; 

  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 
    $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";
    $result = mysqli_query($koneksi, $query);
    
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
    }
  } else {     
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
  }
} else {
   // Jika tidak ada gambar, simpan tanpa gambar atau beri pesan error
   echo "<script>alert('Gambar harus diisi!');window.location='tambah_produk.php';</script>";
}
?>