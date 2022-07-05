<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'tapel_baru.php';
				break;
			case 'edit':
				include 'tapel_edit.php';
				break;
			case 'hapus':
				include 'tapel_hapus.php';
				break;
		}
	} else {
		$sql = mysqli_query($koneksi,"SELECT * FROM tapel ORDER BY tapel DESC");
		echo '<div class="row ml-2">
	            <div class="col-sm-8">
	               <div class="form-group row">
	                  <div class="col-sm-6">
	                     <label for="nis" class="col col-form-label"><h2>Tahun Pelajaran</h2></label>
	                  </div>
	            </div>
	            </div>
	         </div>';

	        echo '<div class="row ml-1">
			    <div class="col-sm-8">
			        <div class="form-group row">
			            <div class="col-sm-6">
			                <label for="nis" class="col col-form-label">
			                	<a href="./admin.php?hlm=master&sub=siswa&aksi=baru" class="btn btn-md btn-info">Tambah Data</a>
			                </label>
			            </div>
			        </div>
			    </div>
			</div>';

			echo '<div class="container-fluid" style="margin-left: -15px;">
				<div class="row">
					<div class="col-lg-7 data">
			    		<table class="table table-hover table-striped mt-4 ml-3" id="table1">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Tahun Pelajaran</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <tbody>';

						if( mysqli_num_rows($sql) > 0 ){
						$no = 1;
						while(list($id,$tapel) = mysqli_fetch_array($sql)){
						echo'<tr scope="row"><td>'.$no.'</td>
								<td>'.$tapel.'</td>
								<td>
								<a href="./admin.php?hlm=master&sub=tapel&aksi=edit&id='.$id.'" class="badge badge-warning">Edit</a>
								<a href="./admin.php?hlm=master&sub=tapel&aksi=hapus&id='.$id.'" class="badge badge-danger ml-2">Hapus</a></td></tr>';  
		
						$no++;
			}
		} else {
			echo '<tr><td colspan="4"><em>Belum ada data</em></td></tr>';
		}
		
					echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
}
?>