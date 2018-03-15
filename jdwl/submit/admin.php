<!--<?php
// session_start();

//if (!isset($_SESSION['mysesi']) || $_SESSION['mytype']!='admin')
{
//	header('Location: ../login/index.php');
//	exit;
  // echo "<script>window.location.assign('../login/index.php')</script>";
} 
?>-->

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Home - Super Admin</title>
<!--Scripts-->

<script src="../assets/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<script src="../assets/bootbox.min.js"></script>

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="action.js"></script>

<!--<script type="process.js"></script>
<!--End scripts-->
</head>
<body>

<div class="container">
	<div class="page-header">
		<h3>Employee Profile</h3>
	</div>

	<form action="tambah.php">
	<button type="submit" class="btn btn-default">Tambah Data</button>
	</form><br/>

	<div class="row">
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="text" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-md-4">
       <input type="text" name="end_date" id="end_date" class="form-control" />
      </div>      
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
     </div>
    </div><br><br> 
   
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-striped table-bordered" id="order_data">
				<thead>
					<tr>
						<th>Nomor Pekerjaan</th>
						<th>Tanggal</th>
						<th>Store</th>
						<th>Alamat Store</th>
						<th>Kategori</th>
						<th>Keterangan</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					include "dbconfig.php";

					$sql = "SELECT * FROM jobs";
					$data = $conn->query($sql);
					while($row = $data->fetch_array()){
            
					 ?>
					 <tr>
					 	<td>
					 		<?php echo $row['nomor']."&nbsp;";?>
					 	</td>

					 	<td>
					 		<?php echo $row['tanggal']."&nbsp;";?>
					 	</td>

					 	<td>
					 		<?php echo $row['store']."&nbsp;";?>
					 	</td>

					 	<td>
					 		<?php echo $row['alamat']."&nbsp;";?>
					 	</td>

					 	<td>
					 		<?php echo $row['kategori']."&nbsp;";?>
					 	</td>

					 	<td>
					 		<?php echo $row['keterangan']."&nbsp;";?>
					 	</td>

					 	<td>

                            <button data-id="<?php echo $row['id_job'];?>" class="btn btn-sm delete_product"><i class="glyphicon glyphicon-trash"></i>Delete</button>&nbsp;

					 		<a role="button" href="#" class='open_modal btn btn-sm btn-primary' id='<?php echo  $row['id_job']; ?>'> <i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;
        			 	</td>
						</tr>
					 <?php
					}
					?>
					
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal Popup untuk Edit--> 
	<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>


<!--Search Tanggal javascript-->

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"fetch2.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 }); 
 
});
</script>

</body>
</html>