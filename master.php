<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['sub'] )){
		
		$sub = $_REQUEST['sub'];
		
		switch($sub){
			case 'jurusan':
				include 'jurusan.php';
				break;
			case 'siswa':
				include 'siswa.php';
				break;
			case 'kelas':
				include 'kelas.php';
				break;
			case 'jenis':
				include 'jenis.php';
				break;
			case 'tapel':
				include 'tapel.php';
				break;
		}
	} else {
		//tampilkan daftar user		
		if(isset($_REQUEST['aksi'])){
			$aksi = $_REQUEST['aksi'];
			
			switch($aksi){
				case 'baru':
					include 'user_baru.php';
					break;
				case 'edit':
					include 'user_edit.php';
					break;
				case 'hapus':
					include 'user_hapus.php';
					break;
			}
		} else {
			echo '<div class="row ml-2">
	            <div class="col-sm-8">
	               <div class="form-group row">
	                  <div class="col-sm-6">
	                     <label for="nis" class="col col-form-label"><h2>Daftar User</h2></label>
	                  </div>
	            </div>
	            </div>
	         </div>';

	        echo '<div class="row ml-1">
			    <div class="col-sm-8">
			        <div class="form-group row">
			            <div class="col-sm-6">
			                <label for="nis" class="col col-form-label">
			                	<a href="admin.php?hlm=master&aksi=baru" class="btn btn-md btn-info">Tambah Data</a>
			                </label>
			            </div>
			        </div>
			    </div>
			</div>'; 
			
			$sql = mysqli_query($koneksi,"SELECT iduser,username,admin,fullname FROM user ORDER BY iduser");
			
			//diasumsikan bahwa selalu ada user, minimal user awal yaitu: admin dan kasir
			$no = 1;
			echo '<div class="container-fluid" style="margin-left: -15px;">
				<div class="row">
					<div class="col-lg-7 data">
			    		<table class="table table-hover table-striped mt-4 ml-3" id="table1">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Username</th>
						      <th scope="col">Nama Lengkap</th>
						      <th scope="col">Admin</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <tbody>';
						while(list($id,$username,$admin,$fullname) = mysqli_fetch_array($sql)){

						echo'<tr scope="row"><td>'.$no.'</td>
								<td>'.$username.'</td>
								<td>'.$fullname.'</td>
								<td>';
							echo ($admin == 1) ? '<i class="fas fa-check"><i>' : '';
							echo'</td>';
							echo'<td><a href="admin.php?hlm=master&aksi=edit&id='.$id.'" class="badge badge-warning">Edit</a>
								<a href="admin.php?hlm=master&aksi=hapus&id='.$id.'" class="badge badge-danger ml-2">Hapus</a></td></tr>';	
   //       echo '<div class="row">';
   //       echo '<div class="col-md-6">';
			// echo '<table class="table table-bordered">';
			// echo '<tr class="info"><th width="30">No.</th><th>Username</th><th>Nama Lengkap</th><th width="50">Admin</th>';
			// echo '<th><a  class="btn btn-default btn-xs">Tambah</a></th></tr>';
			// 	echo '<tr><td>'.$no.'</td>';
			// 	echo '<td>'.$username.'</td>';
			// 	echo '<td>'.$fullname.'</td>';
			// 	echo '<td>';
			// 	echo '</td>';
			// 	echo '<td><a  class="btn btn-success btn-xs">Edit</a> ';
			// 	echo '<a  class="btn btn-danger btn-xs">Hapus</a></td></tr>';
							$no++;
						}
					echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		}
	}
}
?>