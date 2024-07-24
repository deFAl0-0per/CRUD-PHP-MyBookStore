<?php 
require 'functions.php';
$siswa = query("SELECT * FROM kategori_buku ");

if(isset($_POST["cari"])){
    $siswa = caribuku($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+HR+Lijeva:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="data.css">
    <title>Data Toko Buku</title>
</head>
<body>
    <div class="header">
        <h1 class="judul_home" >My Book</h1>
        <h3 class="judul_home1">Book Store</h3>
        <div class="tambah_data">
            <a href="kategoribukutambah.php">Tambah Data Buku</a>
        </div>
        <a href=""><div class="about_us">ABOUT US</div></a>
        <form action="" method="post" class="form_search" >
            <input type="text" name="keyword" class="inp_search" autofocus placeholder="Cari data bukumu di sini!!" >
            <button type="submit" name="cari" class="search" >SEARCH</button>
        </form>
    </div>
    <table class="table_home" border="1" cellpadding="10" cellspacing="0">
            <tr class="table_judul">
                <th>Id.</th>
                <th>Nama Buku</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
            </tr>
            <?php $id= 1;?>
            <?php foreach ($siswa as $swa): ?>
            <tr class="table_cell">
                <td><?php echo $id ?></td>
                <td><?php echo $swa["nama_buku"] ?></td>
                <td><?php echo $swa["deskripsi"] ?></td>
                <td><?php echo $swa["gambar"] ?></td>
            </tr>
        <?php $id++; ?>
        <?php endforeach; ?>
    </table>
    <style>
        body{
            background-color: #31363F;
            margin: 0%;
            padding-top: 0%;
        }
        .header{
            background-color: #76ABAE;
            margin-left: 0%;
            margin-right: 0%;
            margin-bottom: 30px;
            height: 230px;
            display: block;
            
        }
        .tambah_data{
            width: 20%;
            padding: 5px;
            text-align: center;
            margin: auto;
            margin-bottom: 50px;
            font-family: "Roboto", sans-serif;
        }
        .tambah_data a{
            text-decoration: none;
            background-color: green;
            padding: 10px;
            color: white;
            border-radius: 10px;
            border: 1px black solid;
            box-shadow: 7px 5px 10px black;
        }
        .tambah_data a:hover{
            text-decoration: none;
            background-color: transparent;
            padding: 10px;
            color: black;
            border-radius: 10px;
            border: 1px black solid;
        }
        .judul_home{
            font-family: "Playwrite HR Lijeva", cursive;
            font-size: 50px;
            text-align: center;
            color: white;
            text-shadow: 10px 10px 10px black;
        }
        .judul_home1{
            font-family: "Playwrite HR Lijeva", cursive;
            font-size: 20px;
            margin-top: -20px;
            text-align: center;
            color: white;
            text-shadow: 5px 5px 10px black;
        }
        .table_home{
            margin: auto;
            box-shadow: 10px 10px 15px;
            width: 80%;
            margin-top: 200px;
            margin-bottom: 50px;
        }
        .table_judul{
            background-color: #B3C8CF;
            font-family: "Roboto", sans-serif;
        }
        .table_cell{
            background-color: #E5DDC5;
            font-family: "Roboto", sans-serif;
        }
        .tombol_ubah{
            border-radius: 5px;
            background-color: green;
            margin: 10px auto;
        }
        .tombol_hapus{
            border-radius: 5px;
            background-color: red;
            margin: 10px auto;
        }
        .tombol_ubah:hover,.tombol_hapus:hover{
            border-radius: 5px;
            background-color: transparent;
            border: 1px solid black;
            margin: 10px auto;
            color: black;
        }
        td a {
            display: flex;
            justify-content: center;
            color: white;
            align-items: center;
            text-decoration: none;
            font-size: 13px;
            width: 50px;
            height: 30px;
            margin: 10px;
            box-sizing: border-box;
        }
        .form_search{
            width: 100%;
            margin: auto;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }
        .inp_search{
            width: 70%;
            height: 20px;
        }
        .search{
            background-color: green;
            margin-left: 20px;
            height: 30px;
            color: white;
        }
        .about_us{
            background-color: skyblue;
            color: black;
            border: 1px solid black;
            width: 100px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 10px 10px 10px black;
            margin: 15px auto;
        }
        a{
            text-decoration: none;
        }
    </style>
</body>
</html>