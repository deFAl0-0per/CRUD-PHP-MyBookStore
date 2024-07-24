<?php 
require 'functions.php';
if(isset($_POST["submit"])){
    if(bukutambah($_POST)>0){
        echo "<script> alert ('Data Berhasil Ditambahkan!')
        document.location.href = 'kategoribukuread.php'</script>";
    } else{
        echo "<script> alert ('Data Gagal Ditambahkan!')
        document.location.href = 'kategoribukuread.php'</script>";
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+HR+Lijeva:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Tambah Daftar Buku</title>
</head>
<body>
    <h1 class="judul_tambah" >Tambah Data Buku</h1>
    <form action="" method="post" class="form_tambah" enctype="multipart/form-data" >

        <ul>
            <li>
                <label for="nama">Nama Buku:</label>
                <br>
                <input type="text" name="nama_buku" id="nama_buku" required placeholder="Masukan namamu!!" >
            </li>
            <li>
                <label for="deskripsi">Deskripsi:</label>
                <br>
                <input type="text" name="deskripsi" id="deskripsi"
                required placeholder="Masukan kategori bukumu!!" >
            </li>
            <li>
                <label for="data_buku">Gambar:</label>
                <br>
                <input type="file" name="gambar" id="gambar"
                 placeholder="Masukan data bukumu!!" > 
            </li>
            <li>
                <button type="submit" name="submit" class="tombol_submit" >Tambah Data</button>
            </li>
        </ul>
    </form>
    <style>
        body{
            background-color: #31363F;
        }
        .judul_tambah{
            text-align: center;
            font-family: "Playwrite HR Lijeva", cursive;
            color: white;
            text-shadow: 5px 5px 10px black;
            font-size: 50px;
        }
        .form_tambah{
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
        .form_tambah ul{
            display: block;
            justify-content: center;
            align-items: center;
            margin-right: 50px;
        }
        .form_tambah ul li{
            display: block;
            padding: 10px;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .form_tambah ul li input{
            margin-right: 10px;
            width: 100%;
            height: 20px;
        }
        .form_tambah ul li label{
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