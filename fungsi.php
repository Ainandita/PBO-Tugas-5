<?php
	include 'koneksi.php';

	function tambah_data($data, $files){	
		$nim = $data['nim'];
		$nama_mhs = $data['nama_mhs'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat = $data['alamat'];
		$prodi = $data['prodi'];
		$foto = $files['foto']['name'];
		$email = $data['email'];

		$dir = "img/";
		$tmpFile = $files['foto']['tmp_name'];

		move_uploaded_file($tmpFile, $dir.$foto);

		$query = "INSERT INTO tbl_mhs VALUES(null, '$nim', '$nama_mhs', '$jenis_kelamin', '$alamat', '$prodi', '$foto', '$email')";
		$sql = mysqli_query($GLOBALS['conn'], $query);	

		return true;
	}

	function ubah_data($data, $files){
		$id_mhs = $data['id_mhs'];
		$nim = $data['nim'];
		$nama_mhs = $data['nama_mhs'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat = $data['alamat'];
		$prodi = $data['prodi'];
		$email = $data['email'];

		$queryShow = "SELECT * FROM tbl_mhs WHERE id_mhs = '$id_mhs'";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		if($files['foto'] != ""){
			$foto = $files['foto']['name'];
			unlink("img/".$result['foto_mhs']);
			move_uploaded_file($files['foto']['tmp_name'], 'img/'.$files['foto']['name']);
		} else {
			$foto = $result['foto_mhs'];

		}

		$query = "UPDATE tbl_mhs SET nim_mhs='$nim', nama_mhs='$nama_mhs', jenis_kelamin='$jenis_kelamin', alamat_mhs='$alamat', prodi='$prodi', foto_mhs='$foto', email_mhs='$email' WHERE id_mhs='$id_mhs'";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function hapus_data($data){
		$id_mhs = $data['hapus'];

		$queryShow = "SELECT * FROM tbl_mhs WHERE id_mhs = '$id_mhs'";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		//var_dump($result);

		unlink("img/".$result['foto']);

		$query = "DELETE FROM tbl_mhs WHERE id_mhs = '$id_mhs'";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
?>
