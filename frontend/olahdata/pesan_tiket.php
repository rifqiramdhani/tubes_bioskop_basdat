<?php
// Include PHPMailer library files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../function/vendor/phpmailer/phpmailer/src/Exception.php');
require_once('../../function/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../../function/vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

// Load Composer's autoloader
require('../../function/vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// SMTP configuration
configsmtp($mail);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_dt_jadwal = htmlspecialchars($_POST['id_jadwal']);
    $id_film = htmlspecialchars($_POST['id_film']);
    $pembayaran = htmlspecialchars($_POST['pembayaran']);
    $kursi = ($_POST['kursi']);
    $jumlah = ($_POST['jumlah']);
    $harga_tiket = 35000;
    
    $tanggal = date('Y-m-d H:i:s');

    $no_kursi = "";
    $count = 0;
    foreach ($kursi as $key => $value) {
        if($count == 0){
            $no_kursi .= $value;
        }else{
            $no_kursi .=  ', ' . $value;
        }
        $count++;
    }

    header("location: ../../index.php?page=film");

    if($_SESSION['status'] == 'nonmember'){
        $email = $_SESSION['email_customer'];
        $total_harga_tiket = $harga_tiket * $jumlah;

        $queryCek = mysqli_query($koneksi, "SELECT * FROM customer WHERE email = '$email'");

        $getCustomer = mysqli_fetch_assoc($queryCek);
        $id_customer = $getCustomer['id_customer'];
        $nama = $getCustomer['nama'];

        $sql = mysqli_query($koneksi, "INSERT INTO `tiket`(`id_customer`, `id_dt_jadwal`, `no_kursi`, `jumlah`, `harga_tiket`, `total_harga_tiket`, `tanggal`, `metode_pembayaran`) VALUES ('$id_customer', '$id_dt_jadwal', '$no_kursi', '$jumlah', '$harga_tiket', '$total_harga_tiket', '$tanggal', '$pembayaran')");


        if ($sql) {
            $queryTiket = mysqli_query($koneksi, "SELECT * FROM tiket ORDER BY id_customer DESC LIMIT 1");
            $getTiket = mysqli_fetch_assoc($queryTiket);

            $queryJadwal = mysqli_query($koneksi, "SELECT judul, nama_studio, jam_tayang FROM `detail_jadwal` JOIN film USING(id_film) JOIN studio USING(id_studio) JOIN jadwal USING(id_jadwal) WHERE id_dt_jadwal = '$id_dt_jadwal'");
            $getJadwal = mysqli_fetch_assoc($queryJadwal);

            $mail->addAddress($email);
            $mail->Subject = 'Tiket Bioskop Riyoruki';
            $mailContent = '
            <h2>Serahkan bukti tiket ini kekasir.</h2>
            <p>ID Tiket    : ' . $getTiket['id_tiket'] . '</p>
            <p>Nama        : ' . $nama . '</p>
            <p>Judul       : ' . $getJadwal['judul'] . '</p>
            <p>Studio      : ' . $getJadwal['nama_studio'] . '</p>
            <p>No Kursi      : ' . $no_kursi . '</p>
            <p>Jam Tayang  : ' . $getJadwal['jam_tayang'] . ' WIB</p>
            <p>Harga Tiket : '. rupiah($harga_tiket).'</p>
            <p>Total Bayar : '. rupiah($total_harga_tiket) .'</p>
            ';
            $mail->Body = $mailContent;

            if (!$mail->send()) {
                $mail->ErrorInfo;
                die;
            }else{
                $_SESSION['message'] = 'Transaksi berhasil dilakukan, silahkan buka email anda untuk melihat tiket.';
                $_SESSION['title'] = 'Data Transaksi';
                $_SESSION['type'] = 'success';
            }

        } else {
            $_SESSION['message'] = 'Transaksi gagal dilakukan.';
            $_SESSION['title'] = 'Data Transaksi';
            $_SESSION['type'] = 'error';
        }

    }else{
        $id_customer = $_SESSION['id_customer'];

        if($jumlah == 5){
            $total_harga_tiket = $harga_tiket * $jumlah;
            $diskon = $total_harga_tiket * 0.2;
            $final_total_harga = $total_harga_tiket - $diskon;
        }else{
            $final_total_harga = $harga_tiket * $jumlah;
        }

        $sql = mysqli_query($koneksi, "INSERT INTO `tiket`(`id_customer`, `id_dt_jadwal`, `no_kursi`, `jumlah`, `harga_tiket`, `total_harga_tiket`, `tanggal`, `metode_pembayaran`) VALUES ('$id_customer', '$id_dt_jadwal', '$no_kursi', '$jumlah', '$harga_tiket', '$final_total_harga', '$tanggal', '$pembayaran')");

        if ($sql) {
            $_SESSION['message'] = 'Transaksi berhasil dilakukan, perlihatkan tiket pada menu tiket ke kasir';
            $_SESSION['title'] = 'Data Transaksi';
            $_SESSION['type'] = 'success';
            echo 'berhasil';
        } else {
            $_SESSION['message'] = 'Transaksi gagal dilakukan.';
            $_SESSION['title'] = 'Data Transaksi';
            $_SESSION['type'] = 'error';
            echo 'gagal';
        }
    }

    
}
