<?php 
require 'functions.php';

$ub = $_GET["id"];

$ubh = query("SELECT * FROM data_peminjaman_buku WHERE id = $ub")[0];

if(isset($_POST["submit"])){
    if(ubah($_POST)>0){
        echo "<script> alert ('Data Berhasil Diubah!')
        document.location.href = 'data.php'</script>";
    } else{
        echo "<script> alert ('Data Gagal Diubah!')
        document.location.href = 'data.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+HR+Lijeva:wght@100..400&display=swap" rel="stylesheet">
    <title>Ubah Daftar Buku</title>
</head>
<body>
    <h1 class="judul_ubah" >Ubah Data Buku</h1>
    <form action="" method="post" class="form_ubah">
        <input type="hidden" name="id" value="<?= $ubh["id"]; ?>" >

        <ul>
            <li>
                <label for="nama">Nama:</label>
                <br>
                <input type="text" name="nama" id="nama" 
                required value="<?= $ubh["nama"] ?>">
            </li>
            <li>
                <label for="email">Email:</label>
                <br>
                <input type="text" name="email" id="email"
                required value="<?= $ubh["email"] ?>">
            </li>
            <li>
                <label for="kategori_buku">Kategori Buku:</label>
                <br>
                <input type="text" name="kategori_buku" id="kategori_buku"
                required value="<?= $ubh["kategori_buku"] ?>" >
            </li>
            <li>
                <label for="data_buku">Data Buku:</label>
                <br>
                <input type="text" name="data_buku" id="data_buku"
                required value="<?= $ubh["data_buku"] ?>" >
            </li>
            <li>
                <button type="submit" name="submit" class="tombol_submit" >Ubah Data</button>
            </li>
        </ul>
    </form>
    <style>
        body{
            background-color: #31363F;
        }
        .judul_ubah{
            text-align: center;
            font-family: "Playwrite HR Lijeva", cursive;
            color: white;
            text-shadow: 5px 5px 10px black;
            font-size: 50px;
        }
        .form_ubah{
            background-color: #BED7DC;
            width: 500px;
            height: 500px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 10px 10px 15px;
            padding: 10px;
            box-sizing: border-box;
        }
        .form_ubah ul{
            display: block;
            justify-content: center;
            align-items: center;
            margin-right: 50px;
        }
        .form_ubah ul li{
            display: block;
            padding: 10px;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .form_ubah ul li input{
            margin-right: 10px;
            width: 100%;
            height: 20px;
        }
        .form_ubah ul li label{
            text-align: center;
            margin-right: 150px;
            width: 100%;
        }
        .tombol_submit{
            background-color: green;
            color: white;
            width: 100%;
            height: 30px;
        }
        .tombol_submit:hover{
            background-color: transparent;
            color: black;
            width: 100%;
            height: 30px;
        }
    </style>
</body>
</html>