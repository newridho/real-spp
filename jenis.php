<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		//load sub-halaman yang sesuai
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'jenis_baru.php';
				break;
			case 'edit':
				include 'jenis_edit.php';
				break;
			case 'hapus':
				include 'jenis_hapus.php';
				break;
		}
	} else {
		//tampilkan daftar jenis_pembayaran
		$sql = mysqli_query($koneksi,"SELECT * FROM jenis_bayar ORDER BY th_pelajaran DESC, tingkat ASC");
	?>

		<div class="row ml-1">
			<div class="col-sm-8">
				<div class="form-group row">
					<div class="col-sm-6">
							<label for="nis" class="col col-form-label"><h2>Jenis Bayar</h2></label>
					</div>
				</div>
			</div>
		</div>
		<div class="row ml-1">
			<div class="col-sm-8">
				<div class="form-group row">
					<div class="col-sm-6">
						<label for="nis" class="col col-form-label">
							<a href="admin.php?hlm=master&sub=jenis&aksi=baru" class="btn btn-md btn-info">Tambah Data</a>
						</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container-fluid" style="margin-left: -15px;">
			<div class="row">
				<div class="col-lg-7 data">
					<table class="table table-hover table-striped mt-4 ml-3" id="table1">
						<thead class="thead-dark">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Tahun Pelajaran</th>
							<th scope="col">Kelas</th>
							<th scope="col">Jumlah Nominal</th>
							<th scope="col">Aksi</th>
						</tr>
						</thead>
						<tbody>
							<?php 
							if(mysqli_num_rows($sql) > 0){
								$no = 1;
								while(list($tapel,$tingkat,$jumlah) = mysqli_fetch_array($sql)){
							?>		
						<tr scope="row">
							<td><?= $no++ ?></td>
							<td><?= $tapel ?></td>
							<td><?= $tingkat ?></td>
							<td>Rp <?= $jumlah ?></td>
							<td>
								<a href="admin.php?hlm=master&sub=jenis&aksi=edit&tapel=<?= $tapel ?>&tingkat=<?= $tingkat ?>" class="badge badge-warning">Edit</a>
								<a href="admin.php?hlm=master&sub=jenis&aksi=hapus&tapel=<?= $tapel ?>&tingkat=<?= $tingkat ?>" class="badge badge-danger ml-2">Hapus</a>
							</td>
						</tr>
							<?php
								} //End of while
							} else {
							
							?>
						<tr>
							<td colspan="5"><em>Belum ada data!</em></td>
						</tr>
		
							<?php
								} // End of Else
							?>	
		
						</tbody>
					</table>
				</div>
			</div>
		</div>

<?php 		
	}
} // End of Else 1st
?>