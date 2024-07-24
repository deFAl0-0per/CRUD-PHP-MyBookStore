<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+HR+Lijeva:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div class="header">
        <h1 class="judul1" >WELCOME TO</h1>
        <h1 class="judul2" >MY BOOK</h1>
        <h3 class="judul3" >Book Store</h3>
    </div>
    <div class="container">
        <a href="registrasi.php"><div class="user">USER</div></a>
        <a href="loginadmin.php"><div class="admin">ADMIN</div></a>
    </div>
</body>
<style>
    body{
        margin: 0%;
        background-color: #31363F;
    }
    .header{
        margin-top: 0px;
        background-color: #76ABAE;
        height: 200px;
    }
    .judul1, .judul2, .judul3{
        font-family: "Playwrite HR Lijeva", cursive;
        font-weight: 10px;
        margin-bottom: 0%;
        text-align: center;
    }
    .container{
        width: 100%;
        margin: 100px auto;
        display: flex;
    }
    .container a{
        margin: 12px auto;
        display: flex;
        text-decoration: none;
        font-family: "Roboto", sans-serif;
        color: black;
        font-size: 50px;
    }
    .user{
        background-color: #76ABAE;
        width: 400px;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 30px;
        border: 5px solid black;
        box-sizing: border-box;
        box-shadow: 10px 10px 10px;
    }
    .admin{
        background-color: #76ABAE;
        width: 400px;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 30px;
        border: 5px solid black;
        box-sizing: border-box;
        box-shadow: 10px 10px 10px;
    }
    .admin:hover,.user:hover{
        background-color: transparent;
        border: 1px solid white;
        box-shadow: 10px 10px 10px black;
        color: white;
    }
</style>
</html>