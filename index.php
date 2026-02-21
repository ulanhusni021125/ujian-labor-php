<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        body { font-family: "Trebuchet MS"; }
        table { border: 1px solid #DDEEEE; border-collapse: collapse; width: 70%; margin: 20px auto; }
        th, td { border: 1px solid #DDEEEE; padding: 10px; text-align: left; }
        th { background-color: #DDEFEF; color: #336B6B; }
        .tambah { display: block; width: 120px; padding: 8px; background: salmon; color: white; text-decoration: none; text-align: center; margin: 0 auto; }
    </style>
</head>
<body>
    <center><h1>Data Produk</h1></center>
    <a href="tambah_produk.php" class="tambah">+ Tambah Produk</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM produk ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
                <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
                <td>Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?></td>
                <td><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 100px;"></td>
                <td>
                    <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>