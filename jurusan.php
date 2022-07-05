<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		//proses INSERT, UPDATE, dan DELETE
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'jurusan_baru.php';
				break;
			case 'edit':
				include 'jurusan_edit.php';
				break;
			case 'hapus':
				include 'jurusan_hapus.php';
				break;
		}
	} else {
		//menampilkan isi data dalam tabel
		$sql = mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY idjurusan");
		echo '<div class="row ml-2">
				<div class="col-lg-8">
					<div class="form-group row">
						<div class="col-sm-4"  style="margin-left: -7px;">
							<label for="nis" class="col col-form-label"><h2>Daftar Jurusan</h2></label>
						</div>';
						// <div class="col-sm-2">
						// 	<a href="./admin.php?hlm=master&sub=jurusan&aksi=baru" class="btn btn-info btn-lg ml-1">
						// 	<i class="fas fa-plus-circle"></i></a>
						// </div>
				echo'</div>
				</div>
		  	</div>';
		echo '<div class="row ml-2">
				<div class="col-sm-3">
				  	<a href="./admin.php?hlm=master&sub=jurusan&aksi=baru" class="btn btn-info btn-md ml-1">Tambah Data</a>
				</div>
				<div class="col-sm-6">';
					if(isset($_SESSION['add'])){
                        $add = $_SESSION['add'];
                        echo '<div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  '.$add.'
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            </div>
                            </div>';
                    }
			echo'</div>';
	  	echo '</div>';
		// echo '<h2>Daftar Jurusan</h2><hr>';
		echo '<div class="container-fluid" style="margin-left: -15px;">';
			echo '<div class="row">';
				echo '<div class="col-lg-12 data">';
		    		echo '<table class="table table-hover table-striped mt-4 ml-3" id="table1">';
					  echo '<thead class="thead-dark">';
					    echo '<tr>';
					      echo '<th scope="col">#</th>';
					      echo '<th scope="col">Kode Jurusan</th>';
					      echo '<th scope="col">Nama Jurusan</th>';
					      echo '<th scope="col">Aksi</th>';
					    echo '</tr>';
					  echo '</thead>';
					  echo '<tbody>';

		if( mysqli_num_rows($sql) > 0 ){
			$no = 1;
			while(list($idjurusan,$jurusan) = mysqli_fetch_array($sql)){
				echo '<tr scope="row"><td>'.$no.'</td>';
					echo '<td>'.$idjurusan.'</td>';
					echo '<td>'.$jurusan.'</td><td>';
					echo '<a href="./admin.php?hlm=master&sub=jurusan&aksi=edit&idjurusan='.$idjurusan.'" class="badge badge-warning">Edit</a>';
					echo '<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&idjurusan='.$idjurusan.'" class="badge badge-danger ml-2">Hapus</a></td></tr>';
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