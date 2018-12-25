<div class="container">
	<!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Daftar
                    <small>Pemilih Tetap</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Pemilih</a></div>
                </h1>
            </div>
            
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>UUID</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>

	<!-- MODAL ADD -->
            <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah pemilih baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">UUID (auto generate)</label>
                            <div class="col-md-10">
                              <input type="text" name="voter_uuid" id="voter_uuid" class="form-control" placeholder="UUID Pemilih" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Lengkap </label>
                            <div class="col-md-10">
                              <input type="text" name="voter_fullname" id="voter_fullname" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                              <input type="text" name="address" id="address" class="form-control" placeholder="Alamat">
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
		
		   <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pemilih</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
						<div class="form-group row">
                            <center><div id="m_photo" ></div></center>
                        </div>
						<div class="form-group row">
						 <label class="col-md-2 col-form-label">Telepon</label>
						 <div class="col-md-10">
                           <div id="m_telefon" ></div>
						</div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">UUID pemilih</label>
                            <div class="col-md-10">
                              <input type="text" name="voter_uuid_edit" id="voter_uuid_edit" class="form-control" placeholder="Voter uuid" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Lengkap</label>
                            <div class="col-md-10">
                              <input type="text" name="voter_fullname_edit" id="voter_fullname_edit" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
					
						 <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nomor KTP</label>
                            <div class="col-md-10">
                              <input type="number" name="voter_nik_edit" id="voter_nik_edit" class="form-control" placeholder="Nomor KTP">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-md-2 col-form-label">Nomor Paspor</label>
                            <div class="col-md-10">
                              <input type="text" name="voter_paspor_edit" id="voter_paspor_edit" class="form-control" placeholder="Nomor Paspor">
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat Sebelumnya</label>
							<div class="col-md-10">
							<div id="address_edit_read" ></div>
							</div>
                        </div>
						
						<div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat Revisi</label>
                            <div class="col-md-10">
                              <input type="text" name="address_edit" id="address_edit" class="form-control" placeholder="Alamat">
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label class="col-md-2 col-form-label">Kode Pos</label>
                            <div class="col-md-10">
                              <input type="number" name="voter_kodepos_edit" id="voter_kodepos_edit" class="form-control" placeholder="Kode Pos 5 digit">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
		
		
        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Apakah anda yakin ingin menghapus?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="voter_uuid_delete" id="voter_uuid_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		show_product();	//call function show all product
		
		$('#mydata').dataTable();
		 
		//function show all product
		function show_product(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('voterAdmin/voter_data')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].uuid+'</td>'+
		                        '<td>'+data[i].fullname+'</td>'+
		                        '<td>'+data[i].address+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-phone_number="'+data[i].phone_number+'" data-nik="'+data[i].nik+'" data-passport_no="'+data[i].passport_no+'" data-kode_pos="'+data[i].kode_pos+'"  data-photo="'+data[i].photo+'"  data-voter_uuid="'+data[i].uuid+'" data-voter_fullname="'+data[i].fullname+'" data-address="'+data[i].address+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-voter_uuid="'+data[i].uuid+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

        //Save product
        $('#btn_save').on('click',function(){
            var voter_uuid = $('#voter_uuid').val();
            var voter_fullname = $('#voter_fullname').val();
            var address        = $('#address').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('voterAdmin/save')?>",
                dataType : "JSON",
                data : {voter_uuid:voter_uuid , voter_fullname:voter_fullname, address:address},
                success: function(data){
                    $('[name="voter_uuid"]').val("");
                    $('[name="voter_fullname"]').val("");
                    $('[name="address"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_product();
                }
            });
            return false;
        });
		
		
		  //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var voter_uuid = $(this).data('voter_uuid');
            var voter_fullname = $(this).data('voter_fullname');
            var address        = $(this).data('address');
			var photox		   = $(this).data('photo');
			var nik 		   = $(this).data('nik');
			var passport_no	   = $(this).data('passport_no');
			var kode_pos		   = $(this).data('kode_pos');
            document.getElementById("m_photo").innerHTML =  '<img style=\'width:600px;max-height:1000px;display:block;margin-left:auto;margin-right:auto;\' src='+'\'http://daftar.pplntaipei2019.org/assets/idimages/'+photox+'\'/>';
			document.getElementById("m_telefon").innerHTML = $(this).data('phone_number');
			document.getElementById("address_edit_read").innerHTML = address;
            $('#Modal_Edit').modal('show');
            $('[name="voter_uuid_edit"]').val(voter_uuid);
            $('[name="voter_fullname_edit"]').val(voter_fullname);
            $('[name="address_edit"]').val(address);
			$('[name="voter_nik_edit"]').val(nik);
			$('[name="voter_paspor_edit"]').val(passport_no);
			$('[name="voter_kodepos_edit"]').val(kode_pos);
        });
		
		  //update record to database
         $('#btn_update').on('click',function(){
            var voter_uuid = $('#voter_uuid_edit').val();
            var voter_fullname = $('#voter_fullname_edit').val();
            var address        = $('#address_edit').val();
			var nik 		   = $('#voter_nik_edit').val();
			var passport_no	   = $('#voter_paspor_edit').val();
			var kode_pos	   = $('#voter_kodepos_edit').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('voterAdmin/update')?>",
                dataType : "JSON",
                data : {voter_uuid:voter_uuid , voter_fullname:voter_fullname, address:address, nik:nik, passport_no:passport_no, kode_pos:kode_pos},
                success: function(data){
                    $('[name="voter_uuid_edit"]').val("");
                    $('[name="voter_fullname_edit"]').val("");
                    $('[name="address_edit"]').val("");
					$('[name="voter_nik_edit"]').val("");
					$('[name="voter_paspor_edit"]').val("");
					$('[name="voter_kodepos_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });
		
		 //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var voter_uuid = $(this).data('voter_uuid');
             
            $('#Modal_Delete').modal('show');
            $('[name="voter_uuid_delete"]').val(voter_uuid);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var voter_uuid = $('#voter_uuid_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('voterAdmin/delete')?>",
                dataType : "JSON",
                data : {voter_uuid:voter_uuid},
                success: function(data){
                    $('[name="voter_uuid_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });


	});

</script>
