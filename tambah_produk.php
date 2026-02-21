<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        .base { width: 400px; padding: 20px; margin: auto; background: #ededed; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        button { background: salmon; color: white; padding: 10px; margin-top: 20px; border: none; width: 100%; cursor: pointer; }
    </style>
</head>
<body>
    <center><h1>Tambah Produk</h1></center>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        <section class="base">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" required />
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" />
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" required />
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" required />
            <label>Gambar Produk</label>
            <input type="file" name="gambar_produk" required />
            <button type="submit">Simpan Produk</button>
        </section>
    </form>
</body>
</html>