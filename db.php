<?php
// Buat database sqlite dan tabel produk
$db = new SQLite3('produk.db');
$query = "CREATE TABLE IF NOT EXISTS produk (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nama TEXT NOT NULL,
    harga REAL NOT NULL,
    deskripsi TEXT
)";
$db->exec($query);
