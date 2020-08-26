<?php

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "UPDATE `struk` SET `status`=1 WHERE `id_struk` = '$id'");
    // mysqli_query($koneksi, "UPDATE `karyawan` SET `status_karyawan`= 0 WHERE id_karyawan = '$id'");
    if ($sql) {
        $_SESSION['message'] = 'Data berhasil dicek';
        $_SESSION['title'] = 'Data Struk';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal dicek';
        $_SESSION['title'] = 'Data Struk';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=struk';</script>";

}
