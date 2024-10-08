<?php
// Koneksi ke database SQLite
$db = new SQLite3('produk.db');

// Ambil data produk berdasarkan id
$id = $_GET['id'];
$result = $db->query("SELECT * FROM produk WHERE id = $id");
$produk = $result->fetchArray(SQLITE3_ASSOC);

// Edit produk jika form disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE produk SET nama = '$nama', harga = '$harga', deskripsi = '$deskripsi' WHERE id = $id";
    $db->exec($query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>

    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="nama">Nama Produk:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $produk['nama']; ?>" required><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" step="0.01" value="<?php echo $produk['harga']; ?>" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" required><?php echo $produk['deskripsi']; ?></textarea><br><br>

        <input type="submit" name="submit" value="Edit Produk">
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Produk</a>
</body>
</html>


