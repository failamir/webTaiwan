<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <title>Hasil Pencarian Pemilih</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PPLN Taiwan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>user/profile">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>voterManagement/search">Cari Pemilih <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>voterManagement/register">Daftarkan Pemilih</a>
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
        <h1>Hasil Pencarian Pemilih</h1>
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
    <p>Masukkan nama atau nomer paspor/SPLP pemilih :</p>
    <form action="" class="searchForm" method="post" novalidate>
        <div class="form-group">
            <select class="form-control" id="searchBy" name="searchBy">
                <?php if($searchBy == 'name') { ?>
                    <option value="name" selected>Nama</option>
                    <option value="passport">Nomor Paspor</option>
                    <?php
                } else { ?>
                    <option value="name">Nama</option>
                    <option value="passport" selected>Nomor Paspor</option>
                    <?php
                };?>
            </select>
        </div>

        <div class="form-group">
            <input class="form-control" value="<?=$searchVal?>" name="searchVal" id="searchVal" type="searchVal" placeholder="contoh: Dyah atau B1234567" required>
            <div class="invalid-feedback">
                Mohon masukkan pencarian dengan benar.
            </div>
        </div>

        <div>
            <button class="btn btn-primary" name="search">Search</button>
        </div>
    </form>
    <br>
    <div align="right">
        Jumlah data: <?php echo $totalRows;
            if($totalRows!=0)
                {
        ?>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr align="center">
            <th>No</th>
            <th>NIK</th>
            <th>Nomor Paspor</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo is_null($voters);
        $a = 1;
        foreach ($voters as $voter) { ?>
        <tr align="center">
            <td><?=$a ?></td>
            <td><?=$voter->nik ?></td>
            <td><?php
                $str_end = substr($voter->passport_no,-3);
                ?><?="****".$str_end?>
            </td>
            <td><?=$voter->fullname ?></td>
            <td><?=$voter->gender == "Female" ? "Perempuan" : "Laki-laki"?></td>
            <td><?= $voter->is_verified == 1 ? 'Terverifikasi' : 'Belum Terverifikasi' ?></td>
            <td><a href="#" data-toggle="modal" data-target="#myModal">Edit</a></td>
        </tr>
        <?php
        $a = $a+1;
        } ?>
        </tbody>
        <thead>
        <tr align="center">
            <th>No</th>
            <th>NIK</th>
            <th>Nomor Paspor</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Verifikasi</th>
        </tr>
        </thead>
    </table>
    <div id="pagination">
        <ul class="pagination">

<!--            Show pagination links -->
            <?php foreach ($links as $link) {
                echo "<li><a id='pageLink'>". $link."</a></li>";
            } ?>
        </ul>
    </div>
</div>
<br>
<div class="jumbotron">
    <h5 align="center">Panitia Pemilihan Luar Negeri (PPLN)</h5>
    <p align="center">6F, No. 550, Rui Guang Road, Neihu District, Taipei, 114, Taiwan, ROC<br>
        Phone : (02) 87526170<br>
        Fax : (02) 87523706</p>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="col-sm-10"><label for="passport_no">Silahkan masukkan nomor paspor Anda: </label></div>
                <div class="col-sm-10"><input class="form-control" name="passport_no" id="passport_no" type="text" placeholder="contoh: B1234567" required></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
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
            var forms = document.getElementsByClassName('searchForm');
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
            $("#pageLink").click(function () {
                forms.submit();
            });
        }, false);
    })();
</script>

<?php }else{ ?>

     <p>Jika nama yang Anda cari tidak ada, silahkan daftarkan <a href="<?php echo base_url(); ?>voterManagement/register">disini</a>.</p>
     </body>
     <div class="jumbotron">
    <h5 align="center">Panitia Pemilihan Luar Negeri (PPLN)</h5>
    <p align="center">6F, No. 550, Rui Guang Road, Neihu District, Taipei, 114, Taiwan, ROC<br>
        Phone : (02) 87526170<br>
        Fax : (02) 87523706</p>
</div>
<?php } ?>

</html>