<?php
// Koneksi ke database SQLite
$db = new SQLite3('produk.db');

// Hapus produk jika tombol hapus ditekan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Cek apakah ID valid
    if (is_numeric($id)) {
        // Lakukan query penghapusan
        $deleteQuery = $db->exec("DELETE FROM produk WHERE id = $id");

        // Periksa apakah query berhasil
        if ($deleteQuery) {
            echo "Produk berhasil dihapus!";
        } else {
            echo "Gagal menghapus produk!";
        }
    } else {
        echo "ID tidak valid!";
    }
}

// Ambil semua produk dari database
$result = $db->query("SELECT * FROM produk");

if (!$result) {
    die("Error: Tidak bisa mengambil data produk.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>

    <a href="tambah.php">Tambah Produk</a><br><br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='index.php?hapus=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus produk ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
