
<br>
<?php
                if($this->session->flashdata('success_msg')){
            ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success_msg'); ?>
                </div>
            <?php
                }
            ?>
            
            <?php
                if($this->session->flashdata('error_msg')){
            ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
            <?php
                }
            ?>
<div class="container">
    <div class="page-header">
        <h1>Cari Pemilih</h1>
        <h3>Pendaftaran pemilih di Taiwan setelah pengumuman DPTLN/DPTHPLN dan DPTbLN Nasional (Periode setelah 10 Februari 2019) </h3>
<p>Untuk teman-teman WNI yang akan datang ke Taiwan yang belum terdaftar menjadi DPTLN/DPTHPLN atau DPTbLN, dan hendak menggunakan hak pilih nya di Taiwan pada tgl 14 April 2019 bisa melakukan memilih 1 opsi dari 2 opsi:</p>
<ol style="list-style-type: lower-alpha;">
<li><strong>Opsi pertama:</strong> mengikuti prosesi pendaftaran melampirkan formulir A5 (dari TPS daerah asal) akan masuk menjadi DPTbLN. Formulir A5 tersebut dikirim ke email ppln taipei di admin@pplntaipei2019.org</li>
<li><strong>Opsi kedua:</strong> langsung mendaftar di bawah ini dan pilih mendaftar DPKLN (setelah melakukan search nama dulu), akan mendaftar sebagai DPKLN</li>
</ol>
<p>Info lengkap silahkan terus update website kami di <a href="http://pplntaipei2019.org/category/pengumuman/">http://pplntaipei2019.org/category/pengumuman/</a></p>
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
    <p><?php if($referral)echo "(referral kode: ".$referral.")" ?> Keputusan ini sudah sesuai dengan arahan KPU RI:</p>
    <form action="" class="searchForm" method="post" novalidate>
        <div class="form-group">
             <input class="form-control" name="searchVal" id="searchVal" type="text" placeholder="Contoh: Yayat, minimal 4 huruf" minlength="4" required>
            <div class="invalid-feedback">
                Mohon masukkan pencarian dengan benar. Minimal 4 digit kata kunci.
            </div>
        </div>
        <div class="form-group">
             <input class="form-control" name="kotaLahirVal" id="kotaLahirVal" type="hidden" placeholder="Masukkan kota lahir (boleh dikosongkan)" minlength="4">
            <div class="invalid-feedback">
                Mohon masukkan kota kelahiran anda.
            </div>
        </div>
        <div class="form-group">
             <input class="form-control" name="tahunLahirVal" id="tahunLahirVal" type="hidden" placeholder="Masukkan tahun lahir (boleh dikosongkan)" minlength="4">
            <div class="invalid-feedback">
                Mohon masukkan tahun kelahiran anda
            </div>
        </div>

        <div>
            <div class="my-2 my-lg-0">
            <button class="btn btn-primary" name="search">Cari</button>
            <!--<a href="<?php echo base_url(); ?>voterManagement/register/<?php if($referral)echo "0/".$referral ?>"><button class="btn btn-success my-2 my-sm-0" type="button">Daftar Baru</button></a>-->
        </div>
        </div>
    </form>
    <br>
    <p> Klik cari untuk memulai pencarian. Jika nantinya nama anda belum muncul, silahkan Daftar Baru.
    <!--<a href="<?php echo base_url(); ?>voterManagement/register/<?php if($referral)echo "0/".$referral ?>">disini</a>.-->
    </p>
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
        }, false);
    })();
</script>

