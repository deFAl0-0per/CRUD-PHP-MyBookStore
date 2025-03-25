<?php 
require 'functions.php';

if(isset($_POST["login"])){
    
$username = $_POST["username"];
$password = $_POST["password"];

$result = mysqli_query(mysql:$center, query:"SELECT * FROM data_user WHERE username = '$username'");

if(mysqli_num_rows(result:$result)===1){
    $row = mysqli_fetch_assoc(result:$result);
    if(password_verify(password:$password, hash:$row["password"])){
        header(header:"Location: kategoribukuread.php");
        exit;
    }
}
$error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Login Admin</h1>
    <?php if(isset($error)): ?>
        <p>Password/Username salah!!</p>
        <?php endif; ?>
    <form action="" method="post" class="form_login" >
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" >
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" >
            </li>
            <li>
                <button type="submit" name="login">Submit</button>
        </ul>
    </form>
</body>
<style>
        body{
            background-color: #31363F;
        }
        label{
            display: flex;
            padding: 10px;
        }
        .form_login{
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
        .form_login ul{
            display: block;
            justify-content: center;
            align-items: center;
            margin-right: 50px;
        }
        .form_login ul li{
            display: block;
            padding: 10px;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .form_login ul li input{
            margin-right: 10px;
            width: 100%;
            height: 20px;
        }
        .form_login ul li label{
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
</html>