<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Daftar
                    <small>Subscriber</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                </h1>
            </div>
             
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>Subscriber Code</th>
                        <th>Nama Subscriber</th>
                        <th>Kontak</th>
                        <th style="text-align: right;">Aksi</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Subscriber</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kode Subscriber</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_code" id="subscriber_code" class="form-control" placeholder="Subscriber Code" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Subscriber</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_name" id="subscriber_name" class="form-control" placeholder="Subscriber Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kontak</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_contact" id="subscriber_contact" class="form-control" placeholder="Kontak">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Subscriber</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kode Subscriber</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_code_edit" id="subscriber_code_edit" class="form-control" placeholder="Subscriber Code" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Subscriber</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_name_edit" id="subscriber_name_edit" class="form-control" placeholder="Subscriber Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kontak</label>
                            <div class="col-md-10">
                              <input type="text" name="subscriber_contact_edit" id="subscriber_contact_edit" class="form-control" placeholder="Kontak">
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Subscriber</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>apakah kamu yankin menghapus data ini?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="subscriber_code_delete" id="subscriber_code_delete" class="form-control">
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
        show_subscriber(); //call function show all subscriber
         
        $('#mydata').dataTable();
          
        //function show all subscriber
        function show_subscriber(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('subscribe/subscriber_data')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].subsid+'</td>'+
                                '<td>'+data[i].subsname+'</td>'+
                                '<td>'+data[i].subscontact+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-subscriber_code="'+data[i].subsid+'" data-subscriber_name="'+data[i].subsname+'" data-subscriber_contact="'+data[i].subscontact+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-subscriber_code="'+data[i].subsid+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
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
                    show_subscriber();
                }
            });
            return false;
        });
		
		 //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var subscriber_code = $(this).data('subscriber_code');
            var subscriber_name = $(this).data('subscriber_name');
            var subscriber_contact = $(this).data('subscriber_contact');
             
            $('#Modal_Edit').modal('show');
            $('[name="subscriber_code_edit"]').val(subscriber_code);
            $('[name="subscriber_name_edit"]').val(subscriber_name);
            $('[name="subscriber_contact_edit"]').val(subscriber_contact);
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var subscriber_code = $('#subscriber_code_edit').val();
            var subscriber_name = $('#subscriber_name_edit').val();
            var subscriber_contact        = $('#subscriber_contact_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('subscribe/update')?>",
                dataType : "JSON",
                data : {subscriber_code:subscriber_code , subscriber_name:subscriber_name, subscriber_contact:subscriber_contact},
                success: function(data){
                    $('[name="subscriber_code_edit"]').val("");
                    $('[name="subscriber_name_edit"]').val("");
                    $('[name="subscriber_contact_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_subscriber();
                }
            });
            return false;
        });
 
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var subscriber_code = $(this).data('subscriber_code');
             
            $('#Modal_Delete').modal('show');
            $('[name="subscriber_code_delete"]').val(subscriber_code);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var subscriber_code = $('#subscriber_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('subscribe/delete')?>",
                dataType : "JSON",
                data : {subscriber_code:subscriber_code},
                success: function(data){
                    $('[name="subscriber_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_subscriber();
                }
            });
            return false;
        });
 
       
    });
 
</script>
