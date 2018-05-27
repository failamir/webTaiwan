<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <title>Registrasi</title>
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
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>voterManagement/search">Cari Pemilih</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>voterManagement/register">Daftarkan Pemilih <span class="sr-only">(current)</span></a>
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
        <h1>Registrasi Pemilih</h1>
    </div>
    <p>Masukkan data untuk melakukan registrasi pemilih!</p>
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
    <form action="" class="registerForm" method="post" novalidate>
        <div class="form-group row">
            <div class="col-sm-5"><label for="nik">NIK/Nomor Induk Kependudukan Indonesia (opsional):</label></div>
            <div class="col-sm-7"><input class="form-control" name="nik" id="nik" type="text"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="passport_no">Nomor Paspor:</label></div>
            <div class="col-sm-7"><input class="form-control" name="passport_no" id="passport_no" type="text" placeholder="contoh: B1234567" required>
                <div class="invalid-feedback">
                    Mohon masukkan nomor paspor dengan benar.
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="fullname">Nama Lengkap:</label></div>
            <div class="col-sm-7">
                <input class="form-control" name="fullname" id="fullname" type="text" required>
                <div class="invalid-feedback">
                    Mohon masukkan password dengan benar.
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="phone_number">Nomor Telepon:</label></div>
            <div class="col-sm-7"><input class="form-control" name="phone_number" id="phone_number" type="number" required>
            <div class="invalid-feedback">
                Mohon masukkan ulang password dengan benar.
            </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="line_id">Line messenger ID (opsional):</label></div>
            <div class="col-sm-7"><input class="form-control" name="line_id" id="line_id" type="text"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="email">Email (opsional):</label></div>
            <div class="col-sm-7"><input class="form-control" name="email" id="email" type="email">
            <div class="invalid-feedback">
                Mohon masukkan email dengan benar.
            </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="birthplace">Kota Lahir:</label></div>
            <div class="col-sm-7"><input class="form-control" name="birthplace" id="birthplace" type="text" required>
            <div class="invalid-feedback">
                Mohon masukkan kota lahir dengan benar.
            </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="birthdate">Tanggal Lahir:</label></div>
            <div class="col-sm-7"><input class="form-control" name="birthdate" id="birthdate" type="date" required>
            <div class="invalid-feedback">
                Mohon masukkan tanggal lahir dengan benar.
            </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="gender">Jenis Kelamin:</label></div>
            <div class="col-sm-7"><select class="form-control" id="gender" name="gender" required>
                <option selected="" value=""> -- Pilih salah satu -- </option>
                <option value="Male">Laki-laki</option>
                <option value="Female">Perempuan</option>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="marital_status">Status Perkawinan:</label></div>
            <div class="col-sm-7"><select mutiple="multiple" id="marital_status" name="marital_status" class="form-control" required>
                <option disabled="" selected="" value=""> -- Pilih salah satu -- </option>
                <option value="B">Belum Menikah</option>
                <option value="S">Sudah Menikah</option>
                <option value="P">Pernah Menikah</option>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="city">Kota Domisili di Taiwan:</label></div>
            <div class="col-sm-7"><select mutiple="multiple" id="city" name="city" class="form-control" required>
                <option selected="" value=""> -- Pilih salah satu -- </option>
                <option value="Changhua County"> Changhua County </option>
                <option value="Chiayi City"> Chiayi City </option>
                <option value="	Chiayi County">	Chiayi County</option>
                <option value="	Hsinchu City"> Hsinchu City </option>
                <option value=" Hsinchu County"> Hsinchu County </option>
                <option value="	Hualien County"> Hualien County </option>
                <option value="	Kaohsiung City"> Kaohsiung City </option>
                <option value="	Keelung City"> Keelung City </option>
                <option value="	Kinmen County"> Kinmen County </option>
                <option value="	Lienchiang County"> Lienchiang County </option>
                <option value="	Miaoli County"> Miaoli County </option>
                <option value="	Nantou County"> Nantou County </option>
                <option value="	New Taipei City"> New Taipei City </option>
                <option value="	Penghu County"> Penghu County </option>
                <option value="	Pingtung County"> Pingtung County </option>
                <option value="	Taichung City"> Taichung City </option>
                <option value="	Tainan City"> Tainan City </option>
                <option value="	Taipei City"> Taipei City </option>
                <option value="	Taitung County"> Taitung County </option>
                <option value="	Taoyuan City"> Taoyuan City </option>
                <option value="	Yilan County"> Yilan County </option>
                <option value="	Yunlin County"> Yunlin County </option>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="address">Alamat domisili di Taiwan:</label></div>
            <div class="col-sm-7"><textarea class="form-control" name="address" id="address" type="text" required></textarea>
            <div class="invalid-feedback">
                Mohon masukkan alamat domisili dengan benar.
            </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="kpps_type">Jenis KPPS (cara pemilihan):</label></div>
            <div class="col-sm-7"><select mutiple="multiple" id="kpps_type" name="kpps_type" class="form-control" required>
                <option selected="" value=""> -- Pilih salah satu -- </option>
                <option value="KPPS">Datang ke KPPSLN</option>
                <option value="POS">Kirim via POS</option>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="disability_type">Jenis Disabilitas:</label></div>
            <div class="col-sm-7"><select mutiple="multiple" id="disability_type" name="disability_type" class="form-control" required>
                <option selected="" value=""> -- Pilih salah satu -- </option>
                <option value="NONE">Tidak Ada</option>
                <option value="TD">Tuna Daksa</option>
                <option value="TN">Tuna Netra</option>
                <option value="TRTW">Tuna Rungu / Tuna Wicara</option>
                <option value="TG">Tuna Grahita</option>
                <option value="OTHER">Disabilitas Lainnya</option>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5"><label for="photo">Upload foto paspor atau KTP atau ARC untuk verifikasi <br>(tipe file: jpg, png & gif, ukuran: maks 2MB):</label></div>
            <div class="col-sm-7"><input type="file" name="photo" required></div>
        </div>

        <div align="right">
            <button class="btn btn-primary" name="register">Registrasi</button>
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
            var forms = document.getElementsByClassName('registerForm');
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