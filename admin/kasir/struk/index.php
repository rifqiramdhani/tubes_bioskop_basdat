<?php
$query = mysqli_query($koneksi, "SELECT struk.*, nama_paket_makanan, harga FROM `struk` JOIN paket_makanan USING(id_paket_makanan) ORDER BY id_struk ASC");
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
        <div class="card-header"><strong>Data Struk</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datamakanan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Struk</th>
                            <th>Nama</th>
                            <th>Nama Paket Makanan</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_struk'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['id_struk'] ?></td>
                                <td><?= $getdata['nama'] ?></td>
                                <td><?= $getdata['nama_paket_makanan'] ?></td>
                                <td><?= rupiah($getdata['harga']) ?></td>
                                <td><?= $getdata['total_harga'] ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal'])) ?></td>
                                <td><?= $getdata['metode_pembayaran'] ?></td>
                                <td>
                                    <?= $getdata['status'] == 0 ? '<button class="btn btn-default col-red">Belum Dicek</button>' : '<button class="btn btn-default col-green">Sudah Dicek</button>' ?>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=struk&action=terima&id=' . $getdata['id_struk'] ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>