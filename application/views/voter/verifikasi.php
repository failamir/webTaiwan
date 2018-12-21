<html>

<body>
 
<div class="container">
    <h1>Data <strong>Pemilih</strong></h1>
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>Nomor Telepon</th>
            </tr>
        </thead>
        <tbody>
            <!--Fetch data dari database-->
            <?php foreach ($data->result() as $row) :?>
                <tr>
                    <td><?php echo $row->fullname; ?></td>
                    <td><?php echo $row->address; ?></td>
                    <td><?php echo $row->phone_number; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
      
 
</div>
<!--Load file bootstrap.js-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>