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
		
		echo '<div class="row ml-1">
			    <div class="col-sm-8">
			        <div class="form-group row">
			            <div class="col-sm-6">
			                 <label for="nis" class="col col-form-label"><h2>Jenis Bayar</h2></label>
			            </div>
			        </div>
			    </div>
			</div>';
			echo '<div class="row ml-1">
			    <div class="col-sm-8">
			        <div class="form-group row">
			            <div class="col-sm-6">
			                <label for="nis" class="col col-form-label">
			                	<a href="admin.php?hlm=master&sub=jenis&aksi=baru" class="btn btn-md btn-info">Tambah Data</a>
			                </label>
			            </div>
			        </div>
			    </div>
			</div>';

		// echo '<h2>Jenis Bayar</h2><hr>';
  //     echo '<div class="row">';
		// echo '<div class="col-md-7"><table class="table table-bordered">';
		// echo '<tr class="info"><th>#</th><th width="200">Tahun Pelajaran</th><th>Kelas</th><th>Jumlah Nominal</th>';
		// echo '<th width="200"><a  class="btn btn-default btn-xs">Tambah Data</a></th></tr>';
		
			echo '<div class="container-fluid" style="margin-left: -15px;">';
				echo '<div class="row">';
					echo '<div class="col-lg-7 data">';
			    		echo '<table class="table table-hover table-striped mt-4 ml-3" id="table1">';
						  echo '<thead class="thead-dark">';
						    echo '<tr>';
						      echo '<th scope="col">#</th>';
						      echo '<th scope="col">Tahun Pelajaran</th>';
						      echo '<th scope="col">Kelas</th>';
						      echo '<th scope="col">Jumlah Nominal</th>';
						      echo '<th scope="col">Aksi</th>';
						    echo '</tr>';
						  echo '</thead>';
						  echo '<tbody>';

		if(mysqli_num_rows($sql) > 0){
			$no = 1;
			while(list($tapel,$tingkat,$jumlah) = mysqli_fetch_array($sql)){
				echo '<tr scope="row"><td>'.$no.'</td>';
					echo '<td>'.$tapel.'</td>';
					echo '<td>'.$tingkat.'</td>';
					echo '<td>Rp '.$jumlah.'</td><td>';
					echo '<a href="admin.php?hlm=master&sub=jenis&aksi=edit&tapel='.$tapel.'&tingkat='.$tingkat.'" class="badge badge-warning">Edit</a>';
					echo '<a href="admin.php?hlm=master&sub=jenis&aksi=hapus&tapel='.$tapel.'&tingkat='.$tingkat.'" class="badge badge-danger ml-2">Hapus</a></td></tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="5"><em>Belum ada data!</em></td></tr>';
		}
		
					echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
}
?>