<?php
$query = mysqli_query($koneksi, "SELECT id_tiket,no_kursi,metode_pembayaran, jumlah, harga_tiket, total_harga_tiket, tanggal,  customer.*, jam_tayang, judul, durasi, genre, kategori, direktori, nama_studio, tiket.status as status_tiket FROM `tiket` JOIN customer USING(id_customer) JOIN detail_jadwal USING(id_dt_jadwal) JOIN jadwal USING(id_jadwal) JOIN film using(id_film) JOIN studio USING(id_studio) ORDER BY id_tiket ASC");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">

    <!-- show sweet alert -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['title']);
        unset($_SESSION['type']);
    endif;
    ?>

    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Tiket</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datamakanan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Tiket</th>
                            <th>Nama Customer</th>
                            <th>No Kursi</th>
                            <th>Jumlah Tiket</th>
                            <th>Judul Film</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_tiket'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['id_tiket'] ?></td>
                                <td><?= $getdata['nama'] ?></td>
                                <td><?= $getdata['no_kursi'] ?></td>
                                <td><?= $getdata['jumlah'] ?></td>
                                <td><?= $getdata['judul'] ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal'])) ?></td>
                                <td><?= $getdata['metode_pembayaran'] ?></td>
                                <td>
                                    <?= $getdata['status_tiket'] == 0 ? '<button class="btn btn-default col-red">Belum Dicek</button>' : '<button class="btn btn-default col-green">Sudah Dicek</button>' ?>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=tiket&action=terima&id=' . $getdata['id_tiket'] ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>