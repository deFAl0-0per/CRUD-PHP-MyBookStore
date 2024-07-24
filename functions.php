<?php 
use LDAP\Result;
$center = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $center;
    $manage = mysqli_query($center, $query);
    $mng = [];
    while ($mg = mysqli_fetch_assoc($manage)){
        $mng[]=$mg;
    } return $mng;
}
function masukan($data){
    global $center;

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $kategori_buku = htmlspecialchars($data["kategori_buku"]);
    $data_buku = htmlspecialchars($data["data_buku"]);

    $query = "INSERT INTO data_peminjaman_buku VALUES
    ('', '$nama', '$email', '$kategori_buku', '$data_buku')";

    mysqli_query($center, $query);
    return mysqli_affected_rows($center);

}
function bukutambah($data){
    global $center;

    $nama_buku = htmlspecialchars($data["nama_buku"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    // $gambar = htmlspecialchars($data["gambar"]);

    $gambar = upload();
    if(!$gambar){
        return false;
    }

    
    $query = "INSERT INTO kategori_buku VALUES
    ('', '$nama_buku', '$deskripsi', '$gambar')";

mysqli_query($center, $query);
return mysqli_affected_rows($center);

}
function upload(){
    $file = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script> Masukan file foto! </script>";
        return false;
    }
    $ekstensi_gambar_valid = ['jpg', 'jpeg','png'];
    $ekstensi_gambar = explode('.', $file);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if(!in_array($ekstensi_gambar, $ekstensi_gambar_valid)){
        echo "<script>alert('Yang ada upload bukan gambar')</script>";
        return false;
    }
    if($size>1000000){
        echo "<script>alert('Ukuran gambar terlalu besar')</script>";
        return false;
    }

    $file= uniqid();
    $file.= '.';
    $file.= $ekstensi_gambar;

    move_uploaded_file($tmp_name, 'poto/'. $file);
    return $file;
}
function hapus($dl){
    global $center;
    mysqli_query($center, "DELETE FROM data_peminjaman_buku WHERE id = $dl");
    return mysqli_affected_rows($center);
    
}
function ubah($ub){
    global $center;

    $id = $ub["id"];
    $nama = htmlspecialchars($ub["nama"]);
    $email = htmlspecialchars($ub["email"]);
    $kategori_buku = htmlspecialchars($ub["kategori_buku"]);
    $data_buku = htmlspecialchars($ub["data_buku"]);

    $query = "UPDATE data_peminjaman_buku SET
             nama = '$nama',
             email = '$email', 
             kategori_buku = '$kategori_buku',
             data_buku = '$data_buku'
             WHERE id = $id
             ";

    mysqli_query($center, $query);
    return mysqli_affected_rows($center);
}
function cari($ky){
    $query = "SELECT * FROM data_peminjaman_buku WHERE
              nama LIKE '%$ky%' OR
              email LIKE '%$ky%'
              ";
              return query($query);
}
function caribuku($ky){
    $query = "SELECT * FROM kategori_buku WHERE
              nama_buku LIKE '%$ky%'
              ";
              return query($query);
}
function registrasi($data){
    global $center;

    $username = strtolower(stripcslashes($data["username"]));
    $email = strtolower(stripcslashes($data["email"]));
    $password = mysqli_real_escape_string($center, $data["password"]);
    $password2 = mysqli_real_escape_string($center, $data["password2"]);

    $result = mysqli_query($center, "SELECT username FROM data_user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script> 
        alert ('Username sudah terdaftar')
        </script>";
        return false;
    }

    if ($password !== $password2){
        echo "<script> 
        alert ('Konfirmasi password tidak sesuai')
        </script>";
        return false;   
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($center, "INSERT INTO data_user VALUES ('', '$username', '$email',  '$password')");

    return mysqli_affected_rows($center);
    
}
?>
