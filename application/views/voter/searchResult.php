<div class="container">
             <?php 
            
            function mask ( $str, $start = 0, $length = null ) {
            $mask = preg_replace ( "/\S/", "*", $str );
            if( is_null ( $length )) {
                $mask = substr ( $mask, $start );
                $str = substr_replace ( $str, $mask, $start );
                //$str=preg_replace('/\d/', '*', $str );
            }else{
                $mask = substr ( $mask, $start, $length );
                $str = substr_replace ( $str, $mask, $start, $length );
                $str=preg_replace('/\d/', '*', $str );
            }
            return $str;
            }
 
            
            ?>
    <div class="page-header">
        <h3>Hasil Pencarian Pemilih</h3>
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
   
    <form action="" class="searchForm" method="post" novalidate>
         <div class="form-group">
            <input class="form-control" value="<?=$searchVal?>" name="searchVal" id="searchVal" type="searchVal" placeholder="Contoh: Jefferson, minimal 4 huruf" minlength="4" required>
            <div class="invalid-feedback">
                Mohon masukkan pencarian dengan benar.
            </div>
        </div>
        


        <?php 
            if($totalRows>=15)
                {
        ?>
 <p><?php if($referral)echo "(referral kode: ".$referral.")" ?> Apabila hasil pencarian terlalu banyak, silahkan masukkan juga kota kelahiran dan atau tahun kelahiran anda.</p>
        <div class="form-group">
             <input class="form-control" name="kotaLahirVal" id="kotaLahirVal" type="text" placeholder="Masukkan kota lahir" minlength="4">
            <div class="invalid-feedback">
                Mohon masukkan kota kelahiran anda.
            </div>
        </div>
        <div class="form-group">
             <input class="form-control" name="tahunLahirVal" id="tahunLahirVal" type="number" placeholder="Masukkan tahun lahir" minlength="4">
            <div class="invalid-feedback">
                Mohon masukkan tahun kelahiran anda
            </div>
        </div>
        <?php 
          } else{
          //penutup if jumlah lebih dari 15
        ?>

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

        <?php 
          }//penutup else if jumlah lebih dari 15
        ?>

        <div>
            <button class="btn btn-primary" name="search">Cari</button>
    <!--penutupan dpt-->
            <!--<a href="<?php echo base_url(); ?>voterManagement/register/<?php if($referral)echo "0/".$referral ?>"><button class="btn btn-success my-2 my-sm-0" type="button">Daftar Baru</button></a>-->
        </div>
    </form>
    <br>
    <div align="right">
       <?php 
            if($totalRows!=0)
                {
        ?>
    </div>
      Jika status anda <font style="background:yellow" color="green">"Mohon dicek"</font> atau <font color="red">"Kurang Lengkap"</font> silahkan klik tombol "Ubah" untuk mengecek atau melengkapi data.
     <hr>
     ----> Geser ke kanan untuk melihat lebih detil
    
    <div class="table-responsive-sm" >    
    <table class="table table-sm table-striped  w-auto">
        <thead>
        <tr align="center">
            <th>No</th>
            <th>Status</th>
            <th><?php if (isset($_SESSION['user_logged'])) {?>Verifikasi<?php } else { ?>Aksi<?php } ?></th>
            <th>Nama Lengkap</th>
            <th>Nomor Paspor</th>
            <th>Tempat Lahir</th>
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
            <td>
            <?php   if (!isset($_SESSION['user_logged'])) {
                        // if(strlen($voter->nik)<3){
                        //     echo "-";
                        // }else{
                        // $str_end_nik = substr($voter->nik,-3);
                        // echo "***".$str_end_nik;
                        // }
                        if($voter->birthdate=='' || $voter->birthplace=='' || $voter->address==''){
                            echo'<p><font color="red">Kurang Lengkap</font></p>';
                        }else{
                            if($voter->date_created==='' && $voter->date_modified===''){
                                echo'<p style="background:yellow"><font color="green">Mohon dicek</font></p>';
                            }else{
                                echo'<p><font color="green">Data Lengkap</font></p>';    
                            }
                            
                        }
                    } 
                    //penutupan dpt
                    // else { 
                    //     //echo $voter->nik; 
                    //       if($voter->birthdate=='' || $voter->birthplace=='' || $voter->address==''){
                    //         echo'<p><font color="red">Kurang Lengkap</font></p>';
                    //     }else{
                    //         if($voter->date_created==='' && $voter->date_modified===''){
                    //             echo'<p style="background:yellow"><font color="green">Mohon dicek</font></p>';
                    //         }else{
                    //             echo'<p><font color="green">Data Lengkap</font></p>';    
                    //         }
                            
                    //     }
                    // }
            ?>
            </td>
             <td><?php if (isset($_SESSION['user_logged'])) {?>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#confirmModal" 
                    data-status="admin" 
                    data-uuid="<?=$voter->uuid; ?>"
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
                    data-status_pemilih="<?= $voter->status_pemilih; ?>"
                    data-disability_type="<?= $voter->disability_type; ?>"
                    data-kpps_type="<?= $voter->kpps_type; ?>"
                    data-photo="<?= $voter->photo; ?>"
                    data-date_created="<?= $voter->date_created; ?>"
                    >Verifikasi</a>
                   
                <?php } else { 

                    if($voter->birthdate==''){
                         $year="";
                    }else{
                         $year=str_replace(array('#','-','0'), '', $voter->birthdate);
                    }  

                    ?>
                    <!--penutupan DPT-->
                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#confirmModal" data-birth_year="<?= $year; ?>" data-uuid="<?=$voter->uuid; ?>" data-passport_no="<?= $voter->passport_no; ?>">Ubah</a>
                <?php } ?>
            </td>
            
            
            <td><?=$voter->fullname ?></td>
            <td><?php if (!isset($_SESSION['user_logged'])) {
                $str_end = substr($voter->passport_no,-3);
                ?><?="*****".$str_end?>
                <?php } else { echo $voter->passport_no; }?>
            </td>
            <td><?php
            
            if($voter->birthplace == ''){
                echo '<p><font color="red">(tolong di update)</font>,</p>';
            }else{
                echo $voter->birthplace.' ';
            }
            
            

            // if(preg_match("/\d{4}/", $voter->birthdate, $year_matches)){
            //      $year_found = $year_matches[0];
            //      echo str_replace($year_found,"XXXX", $voter->birthdate);
            // }else{
            //     echo '<p><font color="red">(tolong di update)</font></p>';
            // }
            if (isset($_SESSION['user_logged'])) {
                echo " ".$voter->birthdate;
            }
            
            //=(($voter->birthplace == '') ? '<p><font color="red">(tolong di update)</font></p>' : $voter->birthplace).", ".(($voter->birthdate == '') ? '<p><font color="red">(tolong di update)</font></p>' : $voter->birthdate) 
            
            ?></td>
            <td><?=($voter->gender == "Female")||($voter->gender == "P") ? "Perempuan" : "Laki-laki"?></td>
           <?php  if (isset($_SESSION['user_logged'])) {
                   $alamatnya=$voter->address;
                    }else{
                    
                     $alamatnya=mask($voter->address,null,strlen($voter->address)/3);
                    }
            ?>
            <td><?= ((strlen($voter->address) <= 12) ? '<p><font color="red">(tolong di update)</font></p>' : $alamatnya
            ) ?></td>
            
            <?php if($voter->status_pemilih=='DPTHPLN'){ ?>
            <td><?php echo $voter->kpps_type." ".$voter->editor_phone ?></td>
            <?php }else{ ?>
            <td><?php echo $voter->status_pemilih ?></td>
            <?php } ?>
            <!--<td><?= (($voter->is_verified == 0) ? 'Belum Terverifikasi' : 'Terverifikasi') ?></td>-->
           
        </tr>
        <?php
        $a = $a+1;
        } ?>
        </tbody>
        <thead>
        <tr align="center">
            <th>No</th>
            <th>Status</th>
            <th><?php if (isset($_SESSION['user_logged'])) {?>Verifikasi<?php } else { ?>Aksi<?php } ?></th>
            <th>Nama Lengkap</th>
            <th>Nomor Paspor</th>
            <th>Tempat lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Cara Pilih</th>
            
        </tr>
        </thead>
    </table>
    </div>
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
                          <td>Status</td>
                          <td id="m_status_pemilih"> </td>
                        </tr>
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
                          <td id="m_photo"></td>
                        </tr>
                      </tbody>
                     </table>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="PindahKeIndoModal">Coblos di Indo</button>
                <button class="btn btn-danger" id="HapusDataModal">Data Ganda</button>
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
                    Tahun kelahiran yang Anda masukkan tidak sesuai dengan data ini.<br>
                    Jika benar ini adalah data anda, silahkan email kami dengan melampirkan foto kartu identitas ke <a href="mailto:admin@pplntaipei2019.org?=Kesalahan%20Tanggal%20Lahir%20" target="_top">admin@pplntaipei2019.org</a>
                </div>
                <div class="col-sm-10"><label for="passport_no">Silahkan masukkan Tahun kelahiran Anda: </label></div>
                <div class="col-sm-10">
                    <div class="col-sm">
                        <select class="form-control" id="birthday" name="birthday" required>
                        <option selected="" value=""> Tanggal </option>
                        <?php 
                            for ($tanggal_val = 1; $tanggal_val <= 31; $tanggal_val++) {
                                echo '<option value="'.$tanggal_val.'">'.$tanggal_val.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm"><br></div>
                    <div class="col-sm">
                        <select class="form-control" id="birthmonth" name="birthmonth" required>
                        <option selected="" value=""> Bulan </option>
                        <?php 
                            for ($bulan_val = 1; $bulan_val <= 12; $bulan_val++) {
                                echo '<option value="'.$bulan_val.'">'.$bulan_val.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm"><br></div>
                    <div class="col-sm">
                        <select class="form-control" id="birthyear" name="birthyear" required>
                        <option selected="" value=""> Tahun </option>
                        <?php 
                            for ($tahun_val = 2003; $tahun_val >= 1900; $tahun_val--) {
                                echo '<option value="'.$tahun_val.'">'.$tahun_val.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <!-- <input class="form-control" name="passport_no" id="passport_no" type="text" placeholder="contoh: 1999" required> -->
                </div>
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
<script src="<?php echo base_url(); ?>jscr/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>jscr/jquery.md5.js"></script>
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
            // var birth_year= $(e.relatedTarget).data('birthday').concat($(e.relatedTarget).data('birthmonth'),$(e.relatedTarget).data('birthyear'));
            //     birth_year=birth_year.replace(/0/gi, "");

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
                document.getElementById("m_status_pemilih").innerHTML = $(e.relatedTarget).data('status_pemilih');
                
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
                
                


              document.getElementById("m_photo").innerHTML =  '<img style=\'width:100%;max-width:500px\' src='+'\'http://daftar.pplntaipei2019.org/assets/idimages/'+$(e.relatedTarget).data('photo')+'\'/>';
            }
            
  // var birth_year= $(e.relatedTarget).data('birthday').concat($(e.relatedTarget).data('birthmonth'),$(e.relatedTarget).data('birthyear'));
            //     birth_year=birth_year.replace(/0/gi, "");
            $("#submitModal").click(function () {
                var hasilInputan=$("#birthday").val().concat($("#birthmonth").val(),$("#birthyear").val());
                hasilInputan=hasilInputan.replace(/0/gi, "");
                //alert (hasilInputan+' ternyata aslinya '+birth_year);
                if (birth_year == hasilInputan || birth_year=='') {
                    window.location.href = "<?php echo base_url(); ?>voterManagement/register/" + birth_year+"n"+uuid+"/<?php if($referral)echo $referral ?>"; 
                } else {
                    $('#errorModal').css('display','block');
                }
            });

            $("#UbahDataModal").click(function () {
                window.location.href = "<?php echo base_url(); ?>voterManagement/register/" + uuid; 
            });

             $("#HapusDataModal").click(function () {
                var result = confirm("Yakin ingin memindah ke data ganda?"+ uuid);
                if (result) {
                    //Logic to delete the item
                    window.location.href = "<?php echo base_url(); ?>voterManagement/delete/" + uuid; 
                }
            });

            $("#VerifikasiDataModal").click(function () {
                
                // if($(e.relatedTarget).data('is_verified')=='2'){
                   
                // }else{
                    
                    window.location.href = "<?php echo base_url(); ?>voterManagement/verifyVoter/" + uuid; 
                // }
                
            });
            
            $("#PindahKeIndoModal").click(function () {
              var result = confirm("Yakin ingin memindah ke dalam negeri?"+ uuid);
                if (result) {
                    window.location.href = "<?php echo base_url(); ?>voterManagement/pulangKeIndo/" + uuid; 
                }
                //alert("Masih On Develop");
            });
            
             

        });
    })();

</script>

<?php } else { ?>

 <!-- MODAL ADD -->
            <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tinggalkan kontak anda agar kami bisa memberitahu pengumuman penting terutama pendaftaran PEMILU</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      
                              <input type="text" name="subscriber_code" id="subscriber_code" class="form-control" placeholder="Subscriber Code" hidden>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Lengkap</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_name" id="subscriber_name" class="form-control" placeholder="Subscriber Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kontak</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_contact" id="subscriber_contact" class="form-control" placeholder="Nomor Handphone atau Email ">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

    <p>Nama/Nomor paspor anda belum terdaftar dalam DPTLN. Saat ini pendaftaran DPT ditutup, namun pendaftaran sebagai peserta pemilu sebagai DPTbLN masih dibuka dengan cara sesuai dengan gambar di bawah ini. Silahkan di ZOOM IN untuk melihat lebih detail.</p>
	<img class="img-fluid"src="<?php echo base_url(); ?>assets/idimages/setelahdpt.jpg" alt="Prosedur pendaftaran setelah DPT">
	<hr>
	<p>Kami akan membuka pendaftaran DPTLN Online apabila ada arahan lebih lanjut dari KPU RI. Supaya tidak ketinggalan berita dari kami, silahkan BERLANGGANAN ke kami dengan cara klik <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Disini </a></div>

	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>

	<script type="text/javascript">
	 //Save subscriber
        $('#btn_save').on('click',function(){
            var subscriber_code = $('#subscriber_code').val();
            var subscriber_name = $('#subscriber_name').val();
            var subscriber_contact = $('#subscriber_contact').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('subscribe/save')?>",
                dataType : "JSON",
                data : {subscriber_code:subscriber_code , subscriber_name:subscriber_name, subscriber_contact:subscriber_contact},
                success: function(data){
                    $('[name="subscriber_code"]').val("");
                    $('[name="subscriber_name"]').val("");
                    $('[name="subscriber_contact"]').val("");
                    $('#Modal_Add').modal('hide');
					alert("Terima Kasih sudah berlangganan informasi ke kami");
                }
            });
            return false;
        });
	</script>

    <!--<p>Nama/Nomor paspor anda belum terdaftar, silahkan daftar  <a href="<?php echo base_url(); ?>voterManagement/register/<?php if($referral)echo "0/".$referral ?>">disini</a>.</p>-->
	
</div>
    </body>
<?php } ?>

</html>
