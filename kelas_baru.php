<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//variabel session ditransfer ke variabel lokal yg lebih mudah diingat penamaannya
		$submit = $_REQUEST['submit'];
		$kelas = $_REQUEST['kelas'];
		$tapel = $_REQUEST['tapel'];
		$idjurusan = $_REQUEST['idjurusan'];
		
		//proses simpan siswa ke dalam kelas
		if(($submit=='simpan') AND isset($_REQUEST['nis'])){
			$nis = $_REQUEST['nis'];
			$sql = mysqli_query($koneksi,"INSERT INTO kelas VALUES('$kelas','$tapel','$nis')");
		}
		
		//proses hapus siswa dari kelas
		if(($submit=='hapus') AND isset($_REQUEST['nis'])){
			$nis = $_REQUEST['nis'];
			$qsiswa = mysqli_query($koneksi,"DELETE FROM kelas WHERE kelas='$kelas' AND th_pelajaran='$tapel' AND nis='$nis'");
		}
		
?>		
		<h2 class="mt-3 mb-3 ml-3 text-dark">Daftar Siswa</h2>
		<!-- form untuk menambahkan siswa ke dalam kelas -->
		<form method="post" action="admin.php?hlm=master&sub=kelas&aksi=view" class="form-inline" role="form">
			<div class="row ml-2">
				<div class="col-lg-12">
					<div class="form-group row mb-3">
						<div class="col-sm-4">
							<input type="hidden" name="kelas" value="<?php echo $kelas ?>">
							<input type="hidden" name="tapel" value="<?php echo $tapel ?>">
							<input type="hidden" name="idjurusan" value="<?php echo $idjurusan ?>">
							<select name="nis" class="col form-control">
					<?php			
						$qsiswa = mysqli_query($koneksi,"SELECT nis,nama FROM siswa WHERE idjurusan='$idjurusan' AND nis NOT IN (SELECT nis FROM kelas ) ORDER BY nis");
						if (mysqli_num_rows($qsiswa) > 0 ) {
							while(list($nis,$nama)=mysqli_fetch_array($qsiswa)){
								echo '<option value="'.$nis.'">'.$nis.' '.$nama.'</option>';
							}
						} else {
								echo '<option class="col-sm-6">--No Data--</option>';
						}
					?>	
							</select>
						</div>	
						<div class="col-sm-2" style="margin-left: -5px;">
						      <button type="submit" name="submit" value="simpan" class="btn btn-info">
						      	<i class="fas fa-folder-plus"></i>
						      </button>
						</div>
				  		<div class="col-sm-5" style="margin-left: -5px;">
				      		<a href="admin.php?hlm=master&sub=kelas" class="btn btn-md btn-warning">Daftar Kelas</a>
				  		</div>
				  	</div>
					<div class="form-group row mb-3">
						<label for="nis" class="col-sm-2 col-form-label">Kelas</label>
						<div class="col-sm-7">
						      <input type="text" class="form-control" id="nis" value="<?php echo $kelas ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-2 col-form-label">Tapel</label>
						<div class="col-sm-7">
						      <input type="text" class="form-control" id="nama" value="<?php echo $tapel ?>" readonly>
						</div>
					</div>
				</div>
			</div>

			<?php
		echo '<div class="container-fluid mt-4">';
			echo '<div class="row">';
				echo '<div class="col-lg-10 data">';
		    		echo '<table class="table table-hover table-striped" id="table1">';
					  echo '<thead class="thead-dark">';
					    echo '<tr>';
					      echo '<th scope="col">No</th>';
					      echo '<th scope="col">NIS</th>';
					      echo '<th scope="col">Nama Siswa</th>';
					      echo '<th scope="col">Aksi</th>';
					    echo '</tr>';
					  echo '</thead>';

		$qkelas = mysqli_query($koneksi,"SELECT nis FROM kelas WHERE kelas='$kelas' AND th_pelajaran='$tapel'");
		if(mysqli_num_rows($qkelas) > 0){
			$no=1;
			while(list($nis)=mysqli_fetch_array($qkelas)){
				echo '<tr scope="row"><td>'.$no.'</td>';
				echo '<td>'.$nis.'</td>';
				$qsiswa = mysqli_query($koneksi,"SELECT nama FROM siswa WHERE nis='$nis'");
				list($siswa) = mysqli_fetch_array($qsiswa);
					echo '<td>'.$siswa.'</td><td>';
			      		echo '<a href="admin.php?hlm=master&sub=kelas&aksi=view&nis='.$nis.'&kelas='.$kelas.'&tapel='.$tapel.'&idjurusan='.$idjurusan.'&submit=hapus" class="badge badge-danger">Hapus </a>';
			      	echo '</td>';
			      	echo '</tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="4"><em>Belum ada data.</em></td></tr>';
		}
					echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	} else {
?>
<!--
form pertama untuk tahapan menambahkan kelas baru, yaitu:
1. ketikkan nama kelas
2. ketikkan tahun pelajaran, misalnya: 2014/2015 atau 2014-2015
3. pilih jurusan yg bersangkutan dg kelas
4. klik tombol [LANJUT]
//-->
<h2>Tambah Kelas</h2><hr>
<form method="post" action="admin.php?hlm=master&sub=kelas&aksi=view" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kelas" class="col-sm-2 control-label">Kelas</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<!-- <input type="text" class="form-control" id="tapel" name="tapel" placeholder="mmmm/nnnn" required> //-->
			<select name="tapel" class="form-control">
			<?php
				$qtapel = mysqli_query($koneksi,"SELECT tapel FROM tapel ORDER BY tapel DESC");
				while(list($tapel)=mysqli_fetch_array($qtapel)){
					echo '<option value="'.$tapel.'">'.$tapel.'</option>';
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jurusan" class="col-sm-2 control-label">Jurusan</label>
		<div class="col-sm-3">
			<select class="form-control" id="jurusan" name="idjurusan">
			<?php
			//menampilkan daftar jurusan ke dalam combo-box atau pulldown
			$qprodi = mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY idjurusan");
			while(list($idjurusan,$jurusan)=mysqli_fetch_array($qprodi)){
				echo '<option value="'.$idjurusan.'">'.$jurusan.'</option>';
			}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" value="baru" class="btn btn-md mr-3 btn-info">Lanjut</button>
			<a href="./admin.php?hlm=master&sub=kelas" class="btn btn-md btn-warning">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>