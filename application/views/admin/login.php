<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <title>Login</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PPLN Taiwan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
               <!-- disembunyikan supaya orang fokus untuk ngisi, kalau mau login langsung ke http://localhost/ppln2018_tw/auth/login-->
            <?php if (isset($_SESSION['user_logged'])) { ?>
                   <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>user/profile">Home</a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>voterManagement/search">Cari Pemilih</a>
            </li>
     
        </ul>
        <?php if (isset($_SESSION['user_logged'])) { ?>
        <div class="my-2 my-lg-0">
            <a href="<?php echo base_url(); ?>auth/logout"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Logout</button></a>
        </div>

        <?php } ?>
    </div>
</nav>
<br>
<div class="container">
    <div class="page-header">
        <h1>Login</h1>
    </div>
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['success']; ?>
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['error']; ?>
        </div>
    <?php } ?>
    <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show"','</div>'); ?>
    <form action="" class="loginForm" method="post" novalidate>
        <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" name="username" id="username" type="text" required>
            <div class="invalid-feedback">
                Mohon masukkan username dengan benar.
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" name="password" id="password" type="password" required>
            <div class="invalid-feedback">
                Mohon masukkan password dengan benar.
            </div>
        </div>

        <div>
            <button class="btn btn-primary" name="login">Login</button><br><br>
            <p>Silahkan menghubungi administrator untuk melakukan registrasi.</p>
<!--            <a href="--><?php //echo base_url(); ?><!--auth/register">Registrasi</a>-->
        </div>
    </form>
</div>
<br>
<br>
<div class="jumbotron">
    <h5 align="center">Panitia Pemilihan Luar Negeri (PPLN)</h5>
    <p align="center">6F, No. 550, Rui Guang Road, Neihu District, Taipei, 114, Taiwan, ROC<br>
        Phone : (02) 87526170<br>
        Fax : (02) 87523706</p>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('loginForm');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>