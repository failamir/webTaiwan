<br>
<div class="container">
    <div class="page-header">
        <h1>Selamat Datang <?php echo $_SESSION['username']; ?>!</h1>
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
	
   <div>Statistik aktivitas admin</div>
	<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>No</th>
    <th>Name</th>
    <th>Memvalidasi data</th>
  </tr>
<?php
  $i=1;
  foreach($data as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->validator."</td>";
  echo "<td>".$row->jumlah."</td>";
  echo "</tr>";
  $i++;
  }
   ?>
   </table>
   <hr>
      <div>Statistik pendaftar melalui metode pemilihan</div>
	<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>No</th>
    <th>Metode</th>
    <th>Jumlah</th>
  </tr>
<?php
  $i=1;
  foreach($a3 as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->kpps_type."</td>";
  echo "<td>".$row->jumlah."</td>";
  echo "</tr>";
  $i++;
  }
   ?>
   </table>
   
      <hr>
      <div>Statistik pendaftar melalui metode pemilihan</div>
	<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>No</th>
	 <th>Daerah</th>
    <th>Jumlah</th>
  </tr>
<?php
  $i=1;
  foreach($perkotadanmetode as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
   echo "<td>".$row->city."</td>";
  echo "<td>".$row->jumlah."</td>";
  echo "</tr>";
  $i++;
  }
   ?>
   </table>
   <br><br>
   
   
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>