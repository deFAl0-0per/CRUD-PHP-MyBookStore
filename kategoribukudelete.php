<?php
include 'functions2.php';

if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    $sql = "DELETE FROM kategori_buku WHERE id=$id";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "Kategori berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Kategori</title>
</head>
<body>
    <a href="read.php">Kembali ke Daftar Kategori</a>
</body>
</html>
