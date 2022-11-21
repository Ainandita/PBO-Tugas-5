<!DOCTYPE html>
<?php
	include 'koneksi.php';

	$id_mhs = '';
	$nim = '';
	$nama_mhs = '';
	$jenis_kelamin = '';
	$alamat = '';
	$prodi = '';
	$email = '';

	if(isset($_GET['ubah'])){
		$id_mhs = $_GET['ubah'];

		$query = "SELECT * FROM tbl_mhs WHERE id_mhs = '$id_mhs';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);

		$nim = $result['nim_mhs'];
		$nama_mhs = $result['nama_mhs'];
		$jenis_kelamin = $result['jenis_kelamin'];
		$alamat = $result['alamat_mhs'];
		$prodi = $result['prodi'];
		$email = $result['email_mhs'];

		//var_dump($result);

		//die();

	}
?>
 
<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js" ></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	
	<title>belajar_crud</title>
</head>
<body>
	<nav class="navbar navbar-light bg-light mb-3">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      CRUD - BS5
	    </a>
	  </div>
	</nav>
	<div class="container">
		<form method="POST" action="proses.php" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $id_mhs; ?>" name="id_mhs">

				<div class="mb-3 row mt-4">
			    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
			    <div class ="col-sm-10">
			      <input required type="text" name = "nim" class="form-control" id="nim" placeholder="ex: 112233" value="<?php echo $nim; ?>">
			</div>
			<div class="mb-3 row mt-4">
			    <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
			    <div class ="col-sm-10">
			      <input required type="text" name = "nama_mhs"class="form-control" id="nama" placeholder="ex: Ainandita" value="<?php echo $nama_mhs; ?>">
			</div>
			<div class="mb-3 row mt-4">
			    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
			    <div class ="col-sm-10">
			    	<select required id="jk" name="jenis_kelamin" class="form-select">
					  <option <?php if($jenis_kelamin == 'Laki-laki'){ echo "selected";} ?> value="Laki-laki">Laki-laki</option>
					  <option <?php if($jenis_kelamin == 'Perempuan'){ echo "selected";} ?> value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row mt-4">
			    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
			    <div class ="col-sm-10">
			      <textarea required class="form-control" name="alamat" id="alamat" rows="3"><?php echo $alamat; ?></textarea>
			</div>
			<div class="mb-3 row mt-4">
			    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
			    <div class ="col-sm-10">
			      <input required type="text" name = "prodi"class="form-control" id="prodi" placeholder="ex: Sistem Informasi" value="<?php echo $prodi; ?>">
			</div>
			<div class="mb-3 row mt-4">
			    <label for="foto" name="foto" class="col-sm-2 col-form-label">Foto</label>
			    <div class ="col-sm-10">
			      <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
			</div>
			<div class="mb-3 row mt-4">
			    <label for="email" class="col-sm-2 col-form-label">Email</label>
			    <div class ="col-sm-10">
			      <input required type="text" name = "email"class="form-control" id="email" placeholder="ex: belajarcrud@gmail.com" value="<?php echo $email; ?>">
			</div>

			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
						if(isset($_GET['ubah'])){
					?>
						<button type="submit" name="aksi" value="edit" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
					<?php
						} else {
					?>
						<button type="submit" name="aksi" value="add" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
					<?php
						}
					?>
					<a href="index.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html> 
