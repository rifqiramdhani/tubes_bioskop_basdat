<?php
$query = mysqli_query($koneksi, "SELECT customer.*FROM `customer`");
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
        <div class="card-header"><strong>Data Customer</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datacustomer">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_customer'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nama'] ?></td>
                                <td><?= $getdata['email'] ?></td>
                                <td><?= $getdata['no_telepon'] ?></td>
                                <td><?= ucfirst($getdata['status']) ?></td>
                                <!-- <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=karyawan&action=editdata&id=' . $getdata['id_customer'] ?>" class="btn btn-sm btn-primary mt-1"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="<?= $getdata['id_customer'] ?>" data-nama="<?= $getdata['nama'] ?>" class="btn btn-sm btn-danger remove mt-1"><i class="fas fa-trash"></i></button>
                                </td> -->
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>