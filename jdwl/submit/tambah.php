<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html">
	<title>Menambah Data Jadwal</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<style>
		.wrapper{
			padding-top: 50px;
		}
	
		#alert{
			width: 500px;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Tambah Data</a>
		</div>
		<!--Nav Menu Here-->
		<div class="navbar-collapse collapse" id="navbar">
			<ul class="nav navbar-nav">
				
			</ul>
		</div>
	</div>
</nav>

<div class="wrapper">
	<div class="container">
		<div class="page-header">
			<h1>
				AJAX Form Submit
			</h1>
		</div>
		

		<div class="col-lg-5">
			<div class="row">
				<div id="alert">
			
				</div>
				<div id="form-content">
					<form method="post" id="reg-form" autocomplete="off">
						<div class="form-group">
							<input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor Pekerjaan" required/>
						</div>

						<div class="form-group">
							<input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" required/>
						</div>

						<div class="form-group">
							<label for="sel1"> Store : </label>
							<select class="form-control" id="store" name="store" id="sel1">
								<option>store 1</option>
								<option>store 2</option>
								<option>store 3</option>
								<option>store 4</option>
							</select>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Store" required/>
						</div>
				
						<div class="form-group">
							<label for="kategori"> Kategori : </label><select class="form-control" id="kategori" name="kategori">
								<option>Maintenance</option>
								<option>Standby</option>
								<option>Problem</option>
							</select>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required/>
						</div>

						<hr/>

						<div class="form-group">
							<button class="btn btn-primary">
								Submit
							</button>

							&nbsp; &nbsp;
							<a href="admin.php">View all Data</a>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../assets/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){// script akan dijalankan setelah page selesai di load

	//submit form dengan $.ajax() method
	$('#reg-form').submit(function(e){//submit form dengan id reg-form
		e.preventDefault(); //Prevent Default Submission

		$.ajax({

			url:'submit.php',//url target
			type:'POST',//tipe
			data:$(this).serialize()//mengambil semua data dari form
		}).done(function(data){
			$('#alert').html(data);
			$(':input').val(''); //clean form
		})
		.fail(function(){
			alert('Ajax Failed');
		});
	});

	//submit form using ajax short hand $.post() method

/*	$('#reg-form').submit(function(e){
		e.preventDefault();//prevent default submission

		$.post('submit.php', $(this).serialize())
		.done(function(data){
			$('#form-content').fadeOut('slow', function(){
				$('#form-content').fadeIn('slow').html(data);
			});
		})
		.fail(function(){
			alert('Ajax Submit Failed');
		});
	});*/

	});
</script>

<script type="text/javascript">\
function upload(url, field, loading, msg, view){
	var data = new FormData();
	// ambil atribut file yg akan diupload, lalu masukkan ke variabel inputfile
	data.append('inputfile', $(field)[0].files[0]); 
	
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function(){
			msg.hide();
			loading.show();
		},
        success: function(response){
			// Pisahkan hasil (output) proses dengan tanda pemisah <|>
			var result = response.split("<|>");
			
			if(result[0] == "SUCCESS"){ // Jika sukses
				loading.hide(); // sembunyikan loadingnya
				msg.css({"color":"green"}).html(result[1]).show(); // tampilkan pesan sukses
				view.html(result[2]); // Load ulang tabel view nya
			}else{ // Jika gagal
				loading.hide(); // sembunyikan loadingnya
				msg.css({"color":"red"}).html(result[1]).show(); // tampilkan pesan error
			}
		},
        error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.responseText);
        }
    });
}
</script>

site still under development

</body>
</html>