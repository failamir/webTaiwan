<div class="container">
    <div class="page-header">
        <h1>Hasil Pencarian Pemilih</h1>
        <h3>Pendaftaran pemilih akan ditutup tanggal 14 Oktober 2018</h3>
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
    <p><?php if($referral)echo "(referral kode: ".$referral.")" ?> Masukkan nama atau nomer paspor/SPLP pemilih :</p>
    <form action="" class="searchForm" method="post" novalidate>
         <div class="form-group">
            <input class="form-control" value="<?=$searchVal?>" name="searchVal" id="searchVal" type="searchVal" placeholder="Contoh: Jefferson atau B1234567, minimal 4 huruf" minlength="4" required>
            <div class="invalid-feedback">
                Mohon masukkan pencarian dengan benar.
            </div>
        </div>

        <div>
            <button class="btn btn-primary" name="search">Cari</button>
            <a href="<?php echo base_url(); ?>voterManagement/register/<?php if($referral)echo "0/".$referral ?>"><button class="btn btn-success my-2 my-sm-0" type="button">Daftar Baru</button></a>
        </div>
    </form>
    <br>
    <div align="right">
       <?php 
            if($totalRows!=0)
                {
        ?>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr align="center">
            <th>No</th>
            <th><?php if (isset($_SESSION['user_logged'])) {?>Verifikasi<?php } else { ?>Edit<?php } ?></th>
            <th>NIK</th>
            <th>Nomor Paspor</th>
            <th>Nama Lengkap</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Cara Pilih</th>
            
        </tr>
        </thead>
        <tbody>
        <?php
        echo is_null($voters);
        $a = 1;
        foreach ($voters as $voter) { ?>
        <tr align="center">
            <td><?=$a ?></td>
             <td><?php if (isset($_SESSION['user_logged'])) {?>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#confirmModal" 
                    data-status="admin" 
                    data-passport_no="<?= $voter->passport_no; ?>"
                    data-fullname="<?= $voter->fullname; ?>"
                    data-is_Verified="<?= $voter->is_verified; ?>"
                    data-nik="<?= $voter->nik; ?>"
                    data-birthdate="<?= $voter->birthdate; ?>"
                    data-phone_number="<?= $voter->phone_number; ?>"
                    data-line_id="<?= $voter->line_id; ?>"
                    data-email="<?= $voter->email; ?>"
                    data-gender="<?= $voter->gender; ?>"
                    data-marital_status="<?= $voter->marital_status; ?>"
                    data-city="<?= $voter->city; ?>"
                    data-address="<?= $voter->address; ?>"
                    data-address_chinese="<?= $voter->address_chinese; ?>"
                    data-disability_type="<?= $voter->disability_type; ?>"
                    data-kpps_type="<?= $voter->kpps_type; ?>"
                    data-is_verified="<?= $voter->is_verified; ?>"
                    data-date_created="<?= $voter->date_created; ?>"
                    >Verifikasi</a>
                   
                <?php } else { if(preg_match('/\d{4}/', $voter->birthdate, $matches)){$year=$matches[0]; }else{ $year="";}  ?>
                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#confirmModal" data-birth_year="<?= md5($year); ?>" data-uuid="<?=$voter->uuid; ?>" data-passport_no="<?= md5($voter->passport_no); ?>">Edit</a>
                <?php } ?>
            </td>
            <td><?php if (!isset($_SESSION['user_logged'])) {
                if(strlen($voter->nik)<3){
                    echo "-";
                }else{
                $str_end_nik = substr($voter->nik,-3);
                ?><?="***".$str_end_nik?>
                <?php }} else { echo $voter->nik; }?>
            </td>
            <td><?php if (!isset($_SESSION['user_logged'])) {
                $str_end = substr($voter->passport_no,-3);
                ?><?="*****".$str_end?>
                <?php } else { echo $voter->passport_no; }?>
            </td>
            <td><?=$voter->fullname ?></td>
            <td><?php
            
            if($voter->birthplace == ''){
                echo '<p><font color="red">(tolong di update)</font>,</p>';
            }else{
                echo $voter->birthplace.',';
            }
            
            if(preg_match("/\d{4}/", $voter->birthdate, $year_matches)){
                 $year_found = $year_matches[0];
                 echo str_replace($year_found,"XXXX", $voter->birthdate);
            }else{
                echo '<p><font color="red">(tolong di update)</font></p>';
            }
            
            
            //=(($voter->birthplace == '') ? '<p><font color="red">(tolong di update)</font></p>' : $voter->birthplace).", ".(($voter->birthdate == '') ? '<p><font color="red">(tolong di update)</font></p>' : $voter->birthdate) 
            
            ?></td>
            <td><?=($voter->gender == "Female")||($voter->gender == "P") ? "Perempuan" : "Laki-laki"?></td>
            <td><?= ((strlen($voter->address) <= 12) ? '<p><font color="red">(tolong di update)</font></p>' : $voter->address) ?></td>
            <td><?=$voter->kpps_type ?></td>
            <!--<td><?= (($voter->is_verified == 0) ? 'Belum Terverifikasi' : 'Terverifikasi') ?></td>-->
           
        </tr>
        <?php
        $a = $a+1;
        } ?>
        </tbody>
        <thead>
        <tr align="center">
            <th>No</th>
            <th><?php if (isset($_SESSION['user_logged'])) {?>Verifikasi<?php } else { ?>Edit<?php } ?></th>
            <th>NIK</th>
            <th>Nomor Paspor</th>
            <th>Nama Lengkap</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            
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

<!-- The Modal -->
<div class="modal fade" id="confirmModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <?php if (isset($_SESSION['user_logged'])) {?>
                <!-- ini kalau sudah login jadi admin -->
                <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Verifikasi Pemilih</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" role="alert" id="errorModal">
                    Nomor paspor yang Anda masukkan tidak sesuai.
                </div>
                <div class="col-sm-10"><label for="passport_no" id="alert"><a>Information</a></label> </div>
                <div class="row">
                  <div class="table-responsive col-md-6">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th id="m_fullname">Nama</th>
                          <th id="m_is_verified">Verified</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>NIK</td>
                          <td id="m_nik"></td>
                        </tr>
                        <tr>
                          <td>Paspor</td>
                          <td id="m_pasport_no"></td>
                        </tr>
                        <tr>
                          <td>Lahir</td>
                          <td id="m_birthdate"></td>
                        </tr>
                        <tr>
                          <td>Telepon</td>
                          <td id="m_phone_number"></td>
                        </tr>
                        <tr>
                          <td>Line_id</td>
                          <td id="m_line_id"></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td id="m_email"></td>
                        </tr>
                      </tbody>
                     </table>
                    </div>
                    
                    <div class="table-responsive col-md-6">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th id="m_city"></th>
                          <th id="m_kpps_type"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Alamat(en)</td>
                          <td id="m_address"></td>
                        </tr>
                        <tr>
                          <td>Alamat(zhongwen)</td>
                          <td id="m_address_chinese"> </td>
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td id="m_gender"></td>
                        </tr>
                        <tr>
                          <td>Status Nikah</td>
                          <td id="m_marital_status"></td>
                        </tr>
                        <tr>
                          <td>Disabilitas</td>
                          <td id="m_disability_type"></td>
                        </tr>
                        <tr>
                          <td>Input data</td>
                          <td id="m_date_created"></td>
                        </tr>
                      </tbody>
                     </table>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button class="btn btn-danger" id="HapusDataModal">Hapus</button>
                 <button class="btn btn-success" id="VerifikasiDataModal">Verifikasi</button>
                <button class="btn btn-primary" id="UbahDataModal">Ubah data</button>

            </div>

            <?php } else { ?>
                <!-- kalau tidak login admin -->
                 <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" role="alert" id="errorModal">
                    Tahun kelahiran yang Anda masukkan tidak sesuai dengan data ini.
                </div>
                <div class="col-sm-10"><label for="passport_no">Silahkan masukkan Tahun kelahiran Anda: </label></div>
                <div class="col-sm-10"><input class="form-control" name="passport_no" id="passport_no" type="text" placeholder="contoh: 1999" required></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" id="submitModal">Verifikasi data</button>
            </div>
                <?php } ?>
           

        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.md5.js"></script>
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

        $('#confirmModal').on('show.bs.modal', function(e) {
            $('#errorModal').css('display','none');
            var passport_no = $(e.relatedTarget).data('passport_no');
            var birth_year= $(e.relatedTarget).data('birth_year');
            var uuid = $(e.relatedTarget).data('uuid');
            var status = $(e.relatedTarget).data('status');
            if(status=='admin'){
                document.getElementById("m_pasport_no").innerHTML = $(e.relatedTarget).data('passport_no');
                document.getElementById("m_fullname").innerHTML = $(e.relatedTarget).data('fullname');
                document.getElementById("m_is_verified").innerHTML = $(e.relatedTarget).data('is_verified');
                if($(e.relatedTarget).data('is_verified')=='0'){
                    document.getElementById("m_is_verified").innerHTML = '<a style="background:red; color:white;">Belum Terverifikasi</a>';
                }else if ($(e.relatedTarget).data('is_verified')=='1') {
                    document.getElementById("m_is_verified").innerHTML = '<a style="background:green; color:white;">Terverifikasi User</a>';
                }else if ($(e.relatedTarget).data('is_verified')=='2'){
                    document.getElementById("m_is_verified").innerHTML = '<a style="background:green; color:white;">Terverifikasi Admin</a>';
                }
                document.getElementById("m_nik").innerHTML = $(e.relatedTarget).data('nik');
                document.getElementById("m_birthdate").innerHTML = $(e.relatedTarget).data('birthdate');
                document.getElementById("m_phone_number").innerHTML = $(e.relatedTarget).data('phone_number');
                document.getElementById("m_line_id").innerHTML = $(e.relatedTarget).data('line_id');
                document.getElementById("m_email").innerHTML = $(e.relatedTarget).data('email');
                document.getElementById("m_gender").innerHTML = $(e.relatedTarget).data('gender');
                if($(e.relatedTarget).data('gender')=='Male'){
                    document.getElementById("m_gender").innerHTML = 'Laki-laki';
                }else{
                    document.getElementById("m_gender").innerHTML = 'Perempuan';
                }

                document.getElementById("m_marital_status").innerHTML = $(e.relatedTarget).data('marital_status');
                if($(e.relatedTarget).data('marital_status')=='B' || $(e.relatedTarget).data('marital_status')=='b' ){
                    document.getElementById("m_marital_status").innerHTML ='Belum Menikah';
                }else if($(e.relatedTarget).data('marital_status')=='S' || $(e.relatedTarget).data('marital_status')=='s'){
                    document.getElementById("m_marital_status").innerHTML ='Sudah Menikah';
                }else{
                    document.getElementById("m_marital_status").innerHTML ='Pernah Menikah';
                }
                document.getElementById("m_city").innerHTML = $(e.relatedTarget).data('city');
                document.getElementById("m_address").innerHTML = $(e.relatedTarget).data('address');
                document.getElementById("m_address_chinese").innerHTML = $(e.relatedTarget).data('address_chinese');
                
                document.getElementById("m_disability_type").innerHTML = $(e.relatedTarget).data('disability_type');
                if($(e.relatedTarget).data('disability_type')=='NONE'){
                    document.getElementById("m_disability_type").innerHTML = 'Tidak Ada';
                }else if ($(e.relatedTarget).data('disability_type')=='TD'){
                    document.getElementById("m_disability_type").innerHTML = 'Tuna Daksa';
                }else if ($(e.relatedTarget).data('disability_type')=='TN'){
                    document.getElementById("m_disability_type").innerHTML = 'Tuna Rungu';
                }else if ($(e.relatedTarget).data('disability_type')=='TRTW'){
                    document.getElementById("m_disability_type").innerHTML = 'Tuna Rungu dan Tuna Wicara';
                }else if ($(e.relatedTarget).data('disability_type')=='TG'){
                    document.getElementById("m_disability_type").innerHTML = 'Tuna Grahita';
                }else if ($(e.relatedTarget).data('disability_type')=='OTHER'){
                    document.getElementById("m_disability_type").innerHTML = 'Disabilitas lainnya';
                }

                document.getElementById("m_kpps_type").innerHTML = $(e.relatedTarget).data('kpps_type');
                if($(e.relatedTarget).data('kpps_type')=='TPS'){
                    document.getElementById("m_kpps_type").innerHTML = 'Datang Ke TPSLN';
                }else if ($(e.relatedTarget).data('kpps_type')=='POS'){
                    document.getElementById("m_kpps_type").innerHTML = 'Dikirim Pos';
                }else if ($(e.relatedTarget).data('kpps_type')=='KSK'){
                    document.getElementById("m_kpps_type").innerHTML = 'Kotak Suara Keliling';
                }


                document.getElementById("m_date_created").innerHTML = $(e.relatedTarget).data('date_created');
            }
            

            $("#submitModal").click(function () {
                if (birth_year == $.md5($("#passport_no").val())) {
                window.location.href = "<?php echo base_url(); ?>voterManagement/register/" + uuid+"/<?php if($referral)echo $referral ?>"; 
                } else {
                    $('#errorModal').css('display','block');
                }
            });

            $("#UbahDataModal").click(function () {
                window.location.href = "<?php echo base_url(); ?>voterManagement/register/" + uuid; 
            });

             $("#HapusDataModal").click(function () {
                var result = confirm("Yakin ingin menghapus?");
                if (result) {
                    //Logic to delete the item
                    window.location.href = "<?php echo base_url(); ?>voterManagement/delete/" + uuid; 
                }
            });

            $("#VerifikasiDataModal").click(function () {
                if($(e.relatedTarget).data('is_verified')=='2'){
                    alert("Pemilih Sudah Verified");
                }else{reg
                    window.location.href = "<?php echo base_url(); ?>voterManagement/verifyVoter/" + uuid; 
                }
                
            });
             

        });
    })();

</script>

<?php } else { ?>

    <p>Nama/Nomor paspor anda belum terdaftar, silahkan daftar  <a href="<?php echo base_url(); ?>voterManagement/register/<?php if($referral)echo "0/".$referral ?>">disini</a>.</p>
</div>
    </body>
<?php } ?>

</html>
