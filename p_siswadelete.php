<?php
	include 'koneksi.php';
	$nis = $_REQUEST['nis'];
	$sql = mysqli_query($koneksi,"DELETE FROM siswa WHERE nis='$nis'");
	header('Location: ./admin.php?hlm=master&sub=siswa');
?>