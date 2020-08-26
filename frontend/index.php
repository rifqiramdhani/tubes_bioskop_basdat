<?php
require_once("function/helper.php");
isset($_SESSION['login_customer']) ? redirect('?page=film') : false;
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Portal Login - RIYORUKI Bioskop</title>

    <!-- favicon -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL . 'assets/img/brand/bioskop.png' ?>">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- style core ui -->
    <link href="<?= BASE_URL . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?= BASE_URL . 'assets/vendors/pace-progress/css/pace.min.css' ?>" rel="stylesheet">
    <link href="<?= BASE_URL . 'assets/css/custom.css' ?>" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <!-- login -->
            <div class="col-md-5" id="form-login">
                <div class="card-group">
                    <div class="container-fluid">
                        <!-- show sweet alert -->
                        <?php if (isset($_SESSION['message'])) : ?>
                            <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
                        <?php
                            unset($_SESSION['message']);
                            unset($_SESSION['title']);
                            unset($_SESSION['type']);
                        endif;
                        ?>
                    </div>

                    <div class="card">
                        <form action="frontend/olahdata/login.php" method="POST" data-toggle="validator" role="form">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-muted">Masuk ke akun anda</p>
                                <div class="form-group has-feedback">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control" data-type-error="Email tidak valid" placeholder="Email" data-data-required-error="Data tidak boleh kosong" required-error="Email Tidak Boleh Kosong" data-required-error="Data tidak boleh kosong" required>
                                    </div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" placeholder="Kata sandi" class="form-control" data-data-required-error="Data tidak boleh kosong" required-error="Kata sandi tidak boleh kosong" data-required-error="Data tidak boleh kosong" required>
                                    </div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-7 mt-3">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    </div>
                                    <div class="col-6 col-lg-4 text-right mt-3">
                                        <button class="btn btn-sm btn-link btn-register" type="button">Register</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- register -->
            <div class="col-md-7 col-lg-6" id="form-register" style="display: none">
                <div class="container-fluid">
                </div>
                <div class="card mx-4">
                    <form action="frontend/olahdata/register.php" method="POST" data-toggle="validator" role="form">
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>
                            <div class="form-group has-feedback">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-user"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" name="nama" placeholder="Nama" data-required-error="Nama tidak boleh kosong" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" name="no_telepon" placeholder="No Telepon" data-required-error="No Telepon tidak boleh kosong" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="email" name="email" placeholder="Email" data-required-error="Email tidak boleh kosong" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" name="password" type="password" placeholder="Password" id="register-password" data-required-error="Password tidak boleh kosong" data-minlength="6" data-minlength-error="Password minimal 6 karakter" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="member"> Ingin Menjadi Member? </label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cek_member" id="member" value="member" required>
                                    <label class="form-check-label" for="member">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cek_member" id="nonmember" value="nonmember" required>
                                    <label class="form-check-label" for="nonmember">Tidak</label>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div id="metodepembayaran">

                            </div>
                            <button class="float-right mb-2 btn btn-link btn-login" type="button">Have account?</button>
                            <button class="btn btn-block btn-primary" type="submit">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="<?= BASE_URL . 'assets/vendors/jquery/js/jquery.min.js' ?>"></script>
    <script src="<?= BASE_URL . 'assets/vendors/bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL . 'assets/vendors/pace-progress/js/pace.min.js' ?>"></script>
    <!-- form validation -->
    <script src="<?php echo BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
    <!-- fontawesome -->
    <script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
    <!-- sweetaler 2 -->
    <script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
    <script>
        $(document).ready(function() {

            $('.btn-forgot-password').click(function() {
                $("#form-forgot-password").show()
                $("#form-login").hide()
            })

            $('.btn-login').click(function() {
                $('#form-register').hide()
                $("#form-forgot-password").hide()
                $("#form-login").show()
            })

            $('.btn-register').click(function() {
                $('#form-forgot-password').hide()
                $('#form-login').hide()
                $('#form-register').show()
            })
            // sweetalert
            const flashdata = $('.flash-data').data('flashdata');
            const title = $('.flash-data').data('title');
            const type = $('.flash-data').data('type');

            if (flashdata) {
                Swal.fire({
                    title: title,
                    text: flashdata,
                    icon: type
                })
            }

            $("input[name='cek_member']").on('change', function() {
                var value = $(this).val()
                if (value == 'member') {
                    $("#metodepembayaran").append('<div class="form-group"><label>Metode Pembayaran</label><div class="text-center"><label class="mt-2"><img src="frontend/assets/img/ovo.png" alt="OVO" width="80px"><input style="display:block; margin: auto;" type="radio" name="pembayaran" value="OVO" required /></label><label class="mt-2 ml-5"><img src="frontend/assets/img/gopay.png" alt="GOPAY" width="100px"><input style="display:block; margin: auto;margin-top: 7px" type="radio" name="pembayaran" value="GOPAY" required /></label></div></div>')
                } else {
                    $("#metodepembayaran .form-group").remove()
                }
            })

            // setTimeout(function() {
            //     $(".btn-register").click();
            // }, 1000);
        })
    </script>

    <!-- script menampilkan form regist -->


</body>

</html>