<?php
// Koneksi ke database SQLite
$db = new SQLite3('produk.db');

// Tambah produk baru
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO produk (nama, harga, deskripsi) VALUES ('$nama', '$harga', '$deskripsi')";
    $db->exec($query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>

    <form action="tambah.php" method="post">
        <label for="nama">Nama Produk:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" step="0.01" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

        <input type="submit" name="submit" value="Tambah Produk">
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Produk</a>
</body>
</html>
