<?php
include 'functions2.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kategori_buku WHERE id=$id";
    $result = $koneksi->query(query:$sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE kategori_buku SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id";
    
    if ($koneksi->query(query:$sql) === TRUE) {
        echo "Kategori berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>
    <h2>Edit Kategori</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Deskripsi: <textarea name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
