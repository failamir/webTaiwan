<div class="container">
	<div class="page-header">
		<h1><?php 
			if (isset($user)) {
				//echo print_r($user);
				$user = json_decode(json_encode($user), True);
				$fromDBuuidandbirthday=str_replace(array('#','-','0'), '', $user['birthdate'])."n".$user['uuid'];
				//echo $fromDBuuidandbirthday." hasilnya adalah ".$this->uri->segment(3);

				if (isset($_SESSION['user_logged'])==false){
					if($fromDBuuidandbirthday==$this->uri->segment(3)){
						echo "Ubah data pemilih</h1>";
					}else{
						echo "Akses ditolak</h1>";
						echo "Maaf anda salah memberikan informasi terhadap kami, coba ulangi pencarian dari awal, atau kalau masih belum bisa, bisa hubungi kami lewat <a href='mailto:admin@pplntaipei2019.org'>admin@pplntaipei2019.org</a>";
						redirect(base_url()."voterManagement/search","refresh");
					}
				}


			}else{
				echo "Registrasi Pemilih</h1><br>";
				
			}
			if(isset($referral))echo "(Referral: ".$referral.")";
		?> 
		
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
	<?php }; ?>
		<form action="<?php echo base_url().'index.php/voterManagement/register'?>" class="registerForm" method="post" enctype="multipart/form-data">
<div class="form-group row">
<!-- 			<div class="col-sm-5"><label for="editor_phone">Referral (Abaikan kalau tidak tahu):</label></div>  -->
			

			 <?php if (isset($_SESSION['user_logged'])) { ?>
				<div class="col-sm-5"><label for="editor_phone">Nomor KPPSLN: (Kosongi kalau tidak tahu) </label></div>
				<input value="<?php echo $_SESSION['username']; ?>" class="form-control" name="validator" id="validator" type="hidden">

				<div class="col-sm-7"><input value="<?php if(isset($referral))echo $referral ?>" class="form-control" name="editor_phone" id="editor_phone" type="text"></div>
				</div>
				<div class="form-group row">
				<div class="col-sm-5"><label for="status_pemilih">Jenis Pemilih </label></div>
				<div class="col-sm-7"><select mutiple="multiple" id="status_pemilih" name="status_pemilih" class="form-control" required>
					<option selected="" value=""> -- Pilih salah satu -- </option>
					<option value="DPKLN">Daftar Pemilih Khusus</option>
					<option value="DPTBLN">Daftar Pemilih Tambahan/Pindah</option>
					<option value="DPTHPLN">Daftar Pemilih Tetap</option>
									</select>
				</div>

			 <?php }else{ ?>
			 	<div class="col-sm-7"><input value="<?php if(isset($referral))echo $referral ?>" class="form-control" name="editor_phone" id="editor_phone" type="hidden"></div>
			 	<div class="col-sm-7"><input value="DPKLN" class="form-control" name="status_pemilih" id="status_pemilih" type="hidden"></div>
			 <?php } ?>
		</div>

		<div class="form-group row">
			<div class="col-sm-5"><label for="nik">NIK/Nomor Induk Kependudukan Indonesia (Tidak harus):</label></div>
			<div class="col-sm-7"><input class="form-control" name="nik" id="nik" type="text"></div>
		</div>

		<input type="hidden" name="status_verifikasi" id="status_verifikasi">
			<input type="hidden" name="uuid" id="uuid">

		<div class="form-group row">
			<div class="col-sm-5"><label for="passport_no">Nomor Paspor:</label></div>
			<div class="col-sm-7">
				<input type="hidden" name="passport_no" id="passport_no2">
				<input class="form-control" name="passport_no" id="passport_no" type="text" placeholder="contoh: B1234567" required>
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
					Mohon diisi dengan benar.
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-5"><label for="phone_number">Nomor Telepon:</label></div>
			<div class="col-sm-7"><input class="form-control" name="phone_number" id="phone_number" type="text" required>
				<div class="invalid-feedback">
					Mohon diisi dengan benar.
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-5"><label for="line_id">Line messenger ID (Tidak harus):</label></div>
			<div class="col-sm-7"><input class="form-control" name="line_id" id="line_id" type="text"></div>
		</div>

		<div class="form-group row">
			<div class="col-sm-5"><label for="email">Email (Tidak harus):</label></div>
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
			<div class="col-sm-7">
				<div class="row">
					<div class="col-sm">
						<select class="form-control" id="birthday" name="birthday" required>
						<option selected="" value=""> Tanggal </option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
					</div>
					<div class="col-sm">
						<select class="form-control" id="birthmonth" name="birthmonth" required>
						<option selected="" value=""> Bulan </option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						</select>
					</div>
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
				</div>
				
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-5"><label for="gender">Jenis Kelamin:</label></div>
			<div class="col-sm-7"><select class="form-control" id="gender" name="gender" required>
					<option selected="" value=""> -- Pilih salah satu -- </option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
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
					<option value="Chiayi County">	Chiayi County</option>
					<option value="Hsinchu City"> Hsinchu City </option>
					<option value="Hsinchu County"> Hsinchu County </option>
					<option value="Hualien County"> Hualien County </option>
					<option value="Kaohsiung City"> Kaohsiung City </option>
					<option value="Keelung City"> Keelung City </option>
					<option value="Kinmen County"> Kinmen County </option>
					<option value="Lienchiang County"> Lienchiang County </option>
					<option value="Miaoli County"> Miaoli County </option>
					<option value="Nantou County"> Nantou County </option>
					<option value="New Taipei City"> New Taipei City </option>
					<option value="Penghu County"> Penghu County </option>
					<option value="Pingtung County"> Pingtung County </option>
					<option value="Taichung City"> Taichung City </option>
					<option value="Tainan City"> Tainan City </option>
					<option value="Taipei City"> Taipei City </option>
					<option value="Taitung County"> Taitung County </option>
					<option value="Taoyuan City"> Taoyuan City </option>
					<option value="Yilan County"> Yilan County </option>
					<option value="Yunlin County"> Yunlin County </option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-5"><label for="kpps_type">Cara Pemilihan (DPKLN dan DPTBLN hanya dengan datang ke TPS):</label></div>
			<div class="col-sm-7"><select mutiple="multiple" id="kpps_type" name="kpps_type" class="form-control" required>
					<?php if (isset($user)) { 
							if($user['status_pemilih']=='DPKLN' || $user['status_pemilih']=='DPTBLN'){
						?>
					<option selected="" value="TPS"> -- Pilih salah satu -- </option>
					<option value="TPS">Datang ke TPSLN</option>
					<?php }else{ ?>
					<option selected="" value=""> -- Pilih salah satu -- </option>
					<option value="TPS">Datang ke TPSLN</option>
					<option value="POS">Kirim via POS</option>
					<option value="KSK">Kotak Suara Keliling (Khusus ABK)</option>
					<?php } }else{ ?>
					<option selected="" value=""> -- Pilih salah satu -- </option>
					<option value="TPS">Datang ke TPSLN</option>
					<?php } ?>
				</select>
			</div>
		</div>


		<div class="form-group row">
			<div class="col-sm-5"><label for="address">Alamat domisili di Taiwan:</label></div>
			<div class="col-sm-7"><textarea class="form-control" name="address" id="address" type="text" value="<?= isset($user) ? $user['address'] : '' ?>" required></textarea>
				<div class="invalid-feedback">
					Mohon masukkan alamat domisili dengan benar.
				</div>
			</div>
		</div>
		
		
		<div class="form-group row">
			<div class="col-sm-5"><label for="phone_number">Kode Pos (Wajib diisi untuk POS):</label></div>
			<div class="col-sm-7"><input class="form-control" name="kode_pos" id="kode_pos" type="number">
				<div class="invalid-feedback">
					Mohon diisi dengan benar.
				</div>
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
			<div class="col-sm-7"><input type="file" name="photo" id="photo" style="vertical-align: top;" 	
			<?php
				if(isset($user)){
					if(	 $user['is_verified']=='0'){
						echo 'required';
					}
				}else{
					echo 'required';
				}
			?> >
			<?php
				if(isset($user)){
					if(	 $user['is_verified']=='0'){
						echo 'required atas';
					}
				}else{
					echo 'required bawah';
				}
			?> 
			<img src="" name="photo" id="photo2" style="width:100%;max-width:1000px" align="right"></div>px
		</div>

		<!--<div class="form-group" id="munculNotif" align="center">-->
		<!--	<label for="title" class="col-md-10 text-center">Cek mesin atau bukan</label>-->
		<!--	<div class="col-md-10">-->
		<!--		<?php echo $widget;?>-->
		<!--		<?php echo $script;?>-->
		<!--	</div>-->
		<!--</div>-->
		<div align="center">
			<!--
            <button class="btn btn-primary" name="register" id="btnSubmit" onclick="return recaptchaCallback();" type="submit request">Registrasi</button>
        -->
			<button class="btn btn-primary" name="register" id="btnSubmit" type="submit">Daftar Pemilih</button>
		</div>
	</form>
</div>
<br>

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

		<?php if (isset($user)) { 

			if($user['birthdate']!==''){					
					if (strpos($user['birthdate'], '-') !== false) {
						$splitTTLuser=explode("-",$user['birthdate']);
					}else{
						$splitTTLuser=explode("#",$user['birthdate']);
					}
				?>
		$("#birthday").val("<?= $splitTTLuser[0] ?>");
		$("#birthmonth").val("<?= $splitTTLuser[1] ?>");
		$("#birthyear").val("<?= $splitTTLuser[2] ?>");		
				<?php
			}

		?>
		$("#uuid").val("<?= $user['uuid'] ?>");
		$("#nik").val("<?= $user['nik'] ?>");
		$("#editor_phone").val("<?php if($user['editor_phone']=='')echo($referral);echo($user['editor_phone']) ?>");
		$("#status_verifikasi").val("<?= $user['is_verified'] ?>");
		$("[name='passport_no']").val("<?= $user['passport_no'] ?>");
		$("#fullname").val("<?= $user['fullname'] ?>");
		$("#phone_number").val("<?= $user['phone_number'] ?>");
		$("#line_id").val("<?= $user['line_id'] ?>");
		$("#email").val("<?= $user['email'] ?>");
		$("#birthplace").val("<?= $user['birthplace'] ?>");
		$("#birthdate").val("<?= $user['birthdate'] ?>");
		$("#gender").val("<?= $user['gender'] ?>");
		$("#marital_status").val("<?= $user['marital_status'] ?>");
		$("#city").val("<?= $user['city'] ?>");
		$("#address").val("<?= $user['address'] ?>");
		$("#kode_pos").val("<?= $user['kode_pos'] ?>");
		$("#status_pemilih").val("<?= $user['status_pemilih'] ?>");
		$("#disability_type").val("Tidak Ada");
		$("#kpps_type").val("<?= $user['kpps_type'] ?>");
		$("#photo2").attr("src","<?= base_url()?>assets/idimages/<?= $user['photo'] ?>");
		$("#btnSubmit").attr("name","update")
		<?php } else { ?>
		$("#photo2").hide();
		<?php
	}?>
	})();
</script>
<script>
	// function recaptchaCallback() {var googleResponse = jQuery('#g-recaptcha-response').val();
	// 	if (!googleResponse) {
	// 		$('<p style="color:red !important" class=error-captcha"><span class="glyphicon glyphicon-remove " ></span> Silahkan verifikasi bukan robot / Captcha dulu, centang diatas.</p>" ').insertAfter("#munculNotif");
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}
	// }
</script>

</body>
</html>
