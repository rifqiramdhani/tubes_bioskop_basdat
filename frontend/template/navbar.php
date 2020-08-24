<div class="side-bar">
    <ul>
        <li>
            <a class="<?= $_GET['page'] == '' ? 'active' : '' ?>" href="index.php" title="Beranda">
                <i class="home"></i>
            </a>
            <a class="<?= $_GET['page'] == 'makanan' ? 'active' : '' ?>" href="?page=makanan" title="Makanan">
                <i class="food"></i>
            </a>

            <?php if ($_SESSION['status'] == 'nonmember') : ?>
                <a href="frontend/olahdata/logout.php" title="Keluar">
                    <i class="logout"></i>
                </a>
            <?php else : ?>
                <a class="<?= $_GET['page'] == 'tiket' ? 'active' : '' ?>" href="?page=tiket" title="Tiket">
                    <i class="tiket"></i>
                </a>
                <a href="frontend/olahdata/logout.php" title="Keluar">
                    <i class="logout"></i>
                </a>
            <?php endif ?>
        </li>
    </ul>
</div>