<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'phpdasar';

$koneksi = new mysqli(hostname:$host, username:$user, password:$password, database:$database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
