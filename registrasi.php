<?php 
require 'functions.php';

if(isset($_POST["register"])){
    if(registrasi($_POST)>0){
        echo "<script> alert ('Data User Berhasil Ditambahkan')
        document.location.href = '' </script>";
    } else {
        echo mysqli_error($center);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
</head>
<body>
    <h1 class="judul1" >Halaman Registrasi</h1>
    <form action="" method="post" class="form_regis" >
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" >
            </li>
            <li>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" >
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" >
            </li>
            <li>
                <label for="password2">Konfirmasi Password:</label>
                <input type="password" name="password2" id="password2" >
            </li>
            <li>
                <button type="submit" name="register">Submit</button>
            </li>
            <a href="login.php">Login</a>
        </ul>
    </form>
    <style>
        body{
            background-color: #31363F;
        }
        label{
            display: flex;
            padding: 10px;
        }
        .form_regis{
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
        .form_regis ul{
            display: block;
            justify-content: center;
            align-items: center;
            margin-right: 50px;
        }
        .form_regis ul li{
            display: block;
            padding: 10px;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .form_regis ul li input{
            margin-right: 10px;
            width: 100%;
            height: 20px;
        }
        .form_regis ul li label{
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
    </style>
</body>
</html>