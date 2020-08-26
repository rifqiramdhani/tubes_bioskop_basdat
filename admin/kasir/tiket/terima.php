<?php

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tiket` SET `status`=1 WHERE `id_tiket` = '$id'");
    // mysqli_query($koneksi, "UPDATE `karyawan` SET `status_karyawan`= 0 WHERE id_karyawan = '$id'");
    if ($sql) {
        $_SESSION['message'] = 'Data berhasil dicek';
        $_SESSION['title'] = 'Data Tiket';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal dicek';
        $_SESSION['title'] = 'Data Tiket';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=tiket';</script>";

}
