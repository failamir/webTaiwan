<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">


    <title>Cari Pemilih</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://pplntaipei2019.org">PPLN Taiwan</a>
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

            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url(); ?>voterManagement/search">Cari Pemilih </a>
            </li>
          <?php if (isset($_SESSION['user_logged'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>voterAdmin">Verifikasi Pemilih</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>voterManagement/register">Daftarkan Pemilih</a>
            </li>
             <?php } ?>
        </ul>
        <?php if (isset($_SESSION['user_logged'])) { ?>
            <div class="my-2 my-lg-0">
                <a href="<?php echo base_url(); ?>auth/logout"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Logout</button></a>
            </div>
        <?php } ?>
    </div>
</nav>