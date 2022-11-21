<?php
	include 'koneksi.php';

	$query = "SELECT * FROM tbl_mhs;";
	$sql = mysqli_query($conn, $query);
	$no = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js" ></script>

	<! -- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	
	<title>belajar_crud</title>
</head>
<body>
	<nav class="navbar navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      CRUD - BS5
	    </a>
	  </div>
	</nav>

	<! -- JUDUL -->
	<div class="container-fluid">
		<h1 class="mt-3">Data Mahasiswa</h1>
		<figure>	
			<blockquote class="blockquote">
				<p>Data yang tersimpan di database</p>
	  		</blockquote>
	  		<figcaption class="blockquote-footer">
	    		CRUD <cite title="Source Title">Create Read Update Delete</cite>
	  		</figcaption>
		</figure>
		<a href="kelola.php" type="button" class="btn btn-primary mb-3">
			<i class= "fa fa-plus"></i>
			Tambah Data
		</a>
		<div class="table-responsive">
			<table class="table align-middle table-bordered table-hover">
			    <thead> 
			      <tr>
			        <th><center>No.</center></th>
			        <th>NIM</th>
			        <th>Nama Mahasiswa</th>
			        <th>Jenis Kelamin</th>
			        <th>Alamat</th>
			        <th>Prodi</th>
			        <th>Foto</th>
			        <th>Email</th>
			        <th>Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php
			    	while($result = mysqli_fetch_assoc($sql)){
			    ?>

				      <tr>
				        <td><center>
				        	<?php echo ++$no ?>.
				        </center></td>
				        <td>
				        	<?php echo $result['nim_mhs']; ?>
				        </td>
				        <td>
				        	<?php echo $result['nama_mhs']; ?>
				        </td>
				        <td>
				        	<?php echo $result['jenis_kelamin']; ?>
				        </td>
				        <td>
				        	<?php echo $result['alamat_mhs']; ?>
				        </td>
				        <td>
				        	<?php echo $result['prodi']; ?>
				        </td>
				        <td>
				        	<img src="img/<?php echo $result['foto_mhs']; ?>"style="width: 100px;">
				        </td>
				        <td>
				        	<?php echo $result['email_mhs']; ?>
				        </td>
				        <td>
				        	<a href="kelola.php?ubah=<?php echo $result['id_mhs']; ?>" type="button" class="btn btn-success btn-sm">
				        		<i class="fa fa-pencil"></i>
				        	</a>
				        	<a href="proses.php?hapus=<?php echo $result['id_mhs']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data?')">
				        		<i class="fa fa-trash-o"></i>
				        	</a>
				        </td>
				      </tr>
			    <?php
			    	}
			    ?>
			    </tbody>
			  </table>
		</div>
	</div>
</body>
</html> 

