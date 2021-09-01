<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dbdatasiswa";
	 
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan di klik
	if(isset($_POST['bsimpan']))
	{
		//data di edit atau disimpan baru
		if ($_GET['hal'] == "edit") {
			//data akan di edit
			$edit = mysqli_query($koneksi, 	"UPDATE tdts set
												nis = '$_POST[tnis]',
												nama = '$_POST[tnama]',
												ttl = '$_POST[tttl]'
											 WHERE id_s = '$_GET[id]'
			                    		  	");
			if($edit){//jika edit sukses
				echo "<script>
						alert('Berhasil Mengubah Data!');
						document.location = 'index.php';
					</script>";
			}
			else{
				echo "<script>
						alert('Gagal Mengubah Data!');
						document.location = 'index.php';
					</script>";
			}
		}	
		else{
			//data akan disimpan baru
			$simpan = mysqli_query($koneksi, 	"INSERT INTO tdts (nis, nama, ttl)
			                    		  	 	 VALUES ('$_POST[tnis]',
			                    		  		  	 	 '$_POST[tnama]',
			                    		  		     	 '$_POST[tttl]')
			                    		  		");
			if($simpan){//jika simpan sukses
				echo "<script>
						alert('Berhasil Menyimpan Data!');
						document.location = 'index.php';
					</script>";
			}
			else{
				echo "<script>
						alert('Gagal Menyimpan Data!');
						document.location = 'index.php';
					</script>";
			}
		}	
	}
	//Jika tombol edit di klik
	if(isset($_GET['hal'])) 
	{
		//Uji jika edit data
		if($_GET['hal'] == "edit"){
			//tampilkan data yg akan di edit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tdts WHERE id_s = $_GET[id]" );
			$data = mysqli_fetch_array($tampil);
				if ($data) {
					//jika data di temukan, akan di tampung kedalam variable
					$vnis = $data['nis'];
					$vnama = $data['nama'];
					$vttl = $data['ttl'];
			}
		}
		elseif ($_GET['hal'] == "hapus") {
			//persiapan menghapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tdts WHERE id_s = $_GET[id]");
			if ($hapus) {
				echo "<script>
						alert('Berhasil Menghapus Data!');
						document.location = 'index.php';
					</script>";
			}
			else{
				echo "<script>
						alert('Gagal Menghapus Data!');
						document.location = 'index.php';
					</script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ananda Firly Hako</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Image and text -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">WEB DATA SISWA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Help?</a>
      <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">log-IN/OUT</a>
    </div>
  </div>
</nav>
</head>
<body>
<div class="container">

	<h1 class="text-center"> PENCARIAN DATA SISWA </h1>

				<!-- Awal Card Form -->
				<div class="card mt-5">
				  <h4 class="text-center card-header bg-primary mb-3 text-white">FORM PENGISIAN DATA</h4>
				  <div class="card-body">
				   <form method="post" action="">
				   		<div class="form-group">
				   			<label>NIS</label>
				   			<input type="text" name="tnis" value="<?=@$vnis?>" class="form-control" placeholder="Input NIS Anda disini!" required>
				   		</div>
				   		<div class="form-group">
				   			<label>NAMA</label>
				   			<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama Anda disini!" required>
				   		</div>
				   		<div class="form-group">
				   			<label>TTL</label>
				   			<input type="text" name="tttl" value="<?=@$vttl?>" class="form-control" placeholder="Input TTL Anda disini!" required>
				   		</div>
				   		<button type="submit" class="btn btn-success" name="bsimpan">SIMPAN</button>
				   		<button type="reset" class="btn btn-danger" name="breset">RESET</button>
				   </form>
				  </div>
				</div>
				<!-- Akhir Card Form -->

				<!-- Awal Card Tabel -->
				<div class="card mt-5">
					<h4 class="text-center card-header bg-success mb-3 text-white">DAFTAR SISWA</h4>
					<div class="card-body">

						<!--Pencarian -->
						<nav class="navbar mt-1 navbar-light" style="background-color: #defeca;">
						  <a class="navbar-brand">-Pencarian-</a>
						  	<form class="form-inline" method="get" action="">
						    <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Ketik NIS/Nama. . .">
						    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Find!</button>
						  </form>
						</nav>
						<!--Pencarian -->

					   <table class="table table-bordered table-striped">
					   		<tr>
					   			<td>NO.</td>
					   			<td>NIS</td>
					   			<td>NAMA</td>
					   			<td>TTL</td>
					   			<td>re-Edit</td>
					   		</tr>
					   	<?php
					   			$no = 1;
									$tampil = mysqli_query($koneksi, "SELECT * FROM tdts order by id_s desc");

									//pencarian
									if (isset($_GET['cari'])) {
										$tampil = mysqli_query($koneksi, "SELECT * FROM tdts WHERE nis LIKE '%".$_GET['cari']."%' OR
											nama LIKE '%".$_GET['cari']."%'");
										}

										while ($data = mysqli_fetch_array($tampil)) :
							?>
					   		<tr>
								<td><?=$no++;?></td>
								<td><?=$data['nis']?></td>
								<td><?=$data['nama']?></td>
								<td><?=$data['ttl']?></td>
								<td>
									<a href = "index.php?hal=edit&id=<?=$data['id_s']?>" class="btn btn-warning">Ubah</a>
									<a href = "index.php?hal=hapus&id=<?=$data['id_s']?>" 
											   onclick="return confirm('yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
			        	<?php endwhile;  ?>
						</table>
					 </div>
				</div>
				<!-- Akhir Card Tabel -->

				<div class="footer">
					<center><p style="color:#03254c;font-family: SF UI Display;
					font-size:40px;text-align: center;">By. Ananda Firly</p></center>
				</div>

			</div>
		<script type="js/bootstrap.min.js"></script>
	</body>
</html>