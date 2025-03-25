<?php 
use LDAP\Result;
$center = mysqli_connect(hostname:"localhost", username:"root", password:"", database:"phpdasar");

function query($query): array{
    global $center;
    $manage = mysqli_query(mysql:$center, query:$query);
    $mng = [];
    while ($mg = mysqli_fetch_assoc(result:$manage)){
        $mng[]=$mg;
    } return $mng;
}
function masukan($data): int|string{
    global $center;

    $nama = htmlspecialchars(string:$data["nama"]);
    $email = htmlspecialchars(string:$data["email"]);
    $kategori_buku = htmlspecialchars(string:$data["kategori_buku"]);
    $data_buku = htmlspecialchars(string:$data["data_buku"]);

    $query = "INSERT INTO data_peminjaman_buku VALUES
    ('', '$nama', '$email', '$kategori_buku', '$data_buku')";

    mysqli_query(mysql:$center, query:$query);
    return mysqli_affected_rows(mysql:$center);

}
function bukutambah($data):bool|int|string{
    global $center;

    $nama_buku = htmlspecialchars(string:$data["nama_buku"]);
    $deskripsi = htmlspecialchars(string:$data["deskripsi"]);
    // $gambar = htmlspecialchars($data["gambar"]);

    $gambar = upload();
    if(!$gambar){
        return false;
    }

    
    $query = "INSERT INTO kategori_buku VALUES
    ('', '$nama_buku', '$deskripsi', '$gambar')";

mysqli_query(mysql:$center, query:$query);
return mysqli_affected_rows(mysql:$center);

}
function upload():bool|string{
    $file = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script> Masukan file foto! </script>";
        return false;
    }
    $ekstensi_gambar_valid = ['jpg', 'jpeg','png'];
    $ekstensi_gambar = explode(separator:'.', string:$file);
    $ekstensi_gambar = strtolower(string:end(array:$ekstensi_gambar));
    if(!in_array(needle:$ekstensi_gambar, haystack:$ekstensi_gambar_valid)){
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

    move_uploaded_file(from:$tmp_name, to:'poto/'. $file);
    return $file;
}
function hapus($dl):int|string{
    global $center;
    mysqli_query(mysql:$center, query:"DELETE FROM data_peminjaman_buku WHERE id = $dl");
    return mysqli_affected_rows(mysql:$center);
    
}
function ubah($ub):int|string{
    global $center;

    $id = $ub["id"];
    $nama = htmlspecialchars(string:$ub["nama"]);
    $email = htmlspecialchars(string:$ub["email"]);
    $kategori_buku = htmlspecialchars(string:$ub["kategori_buku"]);
    $data_buku = htmlspecialchars(string:$ub["data_buku"]);

    $query = "UPDATE data_peminjaman_buku SET
             nama = '$nama',
             email = '$email', 
             kategori_buku = '$kategori_buku',
             data_buku = '$data_buku'
             WHERE id = $id
             ";

    mysqli_query(mysql:$center,query: $query);
    return mysqli_affected_rows(mysql:$center);
}
function cari($ky): array{
    $query = "SELECT * FROM data_peminjaman_buku WHERE
              nama LIKE '%$ky%' OR
              email LIKE '%$ky%'
              ";
              return query(query:$query);
}
function caribuku($ky): array{
    $query = "SELECT * FROM kategori_buku WHERE
              nama_buku LIKE '%$ky%'
              ";
              return query(query:$query);
}
function registrasi($data):bool|int|string{
    global $center;

    $username = strtolower(string:stripcslashes(string:$data["username"]));
    $email = strtolower(string:stripcslashes(string:$data["email"]));
    $password = mysqli_real_escape_string(mysql:$center, string:$data["password"]);
    $password2 = mysqli_real_escape_string(mysql:$center, string:$data["password2"]);

    $result = mysqli_query(mysql:$center, query: "SELECT username FROM data_user WHERE username = '$username'");
    if(mysqli_fetch_assoc(result:$result)){
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
    $password = password_hash(password:$password, algo:PASSWORD_DEFAULT);

    mysqli_query(mysql:$center, query:"INSERT INTO data_user VALUES ('', '$username', '$email',  '$password')");

    return mysqli_affected_rows(mysql:$center);
    
}
?>
