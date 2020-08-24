<?php
require('../../function/helper.php');
require('../../function/koneksi.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $cek_member = htmlspecialchars($_POST['cek_member']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $query = mysqli_query($koneksi, "SELECT * FROM `customer` WHERE email = '$email'");

    //redirect/header halaman
    header('location: ../../index.php');
 
    if (mysqli_num_rows($query) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO `customer`(`email`, `password`, `nama`, `no_telepon`, `status`) VALUES ('$email', '$password', '$nama', '$no_telepon', '$cek_member')");

        if ($sql) {
            echo 'masuk';
            $_SESSION['message'] = 'Selamat anda berhasil registrasi. Silahkan gunakan akun anda untuk login';
            $_SESSION['title'] = 'Data Customer';
            $_SESSION['type'] = 'success';
        } else {
            echo 'gagal';
            $_SESSION['message'] = 'Data gagal diregistrasi, silahkan reload page dan coba register kembali!';
            $_SESSION['title'] = 'Data Customer';
            $_SESSION['type'] = 'error';
        }

    } else {
        $_SESSION['message'] = 'Maaf email telah terdaftar';
        $_SESSION['title'] = 'Data Customer';
        $_SESSION['type'] = 'error';
    }
}
