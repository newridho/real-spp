<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	/* tahapan pembayaran SPP
		1. masukkan nis
		2. tampilkan histori pembayaran (jika ada) dan form pembayaran
		3. proses pembayaran, kembali ke nomor 2
	*/
	echo '<h2 class="mt-3 mb-3 ml-3">Pembayaran SPP</h2>';
	
	if(isset($_REQUEST['submit'])){
		//proses pembayaran secara bertahap
		$submit = $_REQUEST['submit'];
		$nis = $_REQUEST['nis'];
		
		//proses simpan pembayaran
		if($submit=='bayar'){
			$kls = $_REQUEST['kls'];
			$bln = $_REQUEST['bln'];
			$tgl = $_REQUEST['tgl'];
			$jml = $_REQUEST['jml'];
			
			$qbayar = mysqli_query($koneksi,"INSERT INTO pembayaran VALUES('$kls','$nis','$bln','$tgl','$jml')");
			
			if($qbayar > 0){
				header('Location: ./admin.php?hlm=bayar&submit=v&nis='.$nis);
				die();
			} else {
				// echo 'ada ERROR dg query';
				echo '<div class="row ml-2	">
						<div class="col-sm-6">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  ada ERROR dengan query
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
						</div>
						</div>';
			}

		}
		
		//proses hapus pembayaran, hanya ADMIN
		if($submit=='hapus'){
			$kls = $_REQUEST['kls'];
			$bln = $_REQUEST['bln'];
			$tgl = $_REQUEST['tgl'];
			$jml = $_REQUEST['jml'];
			
			$qbayar = mysqli_query($koneksi,"DELETE FROM pembayaran WHERE kelas='$kls' AND nis='$nis' AND bulan='$bln'");
			
			if($qbayar > 0){
				header('Location: ./admin.php?hlm=bayar&submit=v&nis='.$nis);
				die();
			} else {
				echo '<div class="row">
						<div class="col-sm-7">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  ada ERROR dengan query
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
						</div>
						</div>';
			}
		}
		
		//tampilkan data siswa
		$qsiswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$idprodi) = mysqli_fetch_array($qsiswa);
		?>
      	<div class="row ml-2">
			<div class="col-lg-8">
				<div class="form-group row">
					<label for="nis" class="col-sm-2 col-form-label">Nomor Induk</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="nis" value="<?= $nis ?>" readonly>
					</div>
					<div class="col-sm-3 mt-1">
						<span class="d-inline-block" data-toggle="tooltip" data-placement="bottom" title="Print">
							<a href="./cetak.php?nis=<?= $nis ?>" target="_blank" class="btn btn-warning btn-sm">
								<i class="fas fa-print"></i>
							</a>
						</span>	
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
					<div class="col-sm-7">
						      <input type="text" class="form-control" id="nama" value="<?= $nama ?>" readonly>
						  </div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2 mt-2">Pembayaran</div>
					<div class="col-sm-3">
						<form class="form-inline" role="form" method="post" action="./admin.php?hlm=bayar">
						  <input type="hidden" name="nis" value="<?= $nis; ?>">
						  <input type="hidden" name="tgl" value="<?= date("Y-m-d"); ?>">
						  	<div class="form-group">
							    <label class="sr-only" for="kls">Kelas</label>
								<select name="kls" class="form-control" id="kls">
								<?php
									$qkelas = mysqli_query($koneksi,"SELECT kelas,th_pelajaran FROM kelas WHERE nis='$nis'");
									while(list($kelas,$thn)=mysqli_fetch_array($qkelas)){
										echo '<option value="'.$kelas.'">'.$kelas.' ('.$thn.')</option>';
									}
								?>
								</select>
							</div>
					</div>
					<div class="col-sm-2" style="margin-left: -2px !important;">
						<div class="form-group">
						    <label class="sr-only" for="bln">Bulan</label>
							<select name="bln" id="bln" class="form-control">
							<?php
								for($i=1;$i<=12;$i++){
									$b = date('F',mktime(0,0,0,$i,10));
									echo '<option value="'.$b.'">'.$b.'</option>';
								}
							?>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
					  	<div class="form-group">
						  	<!-- <div class="input-group-addon">Rp.</div> -->
							<label class="sr-only" for="jml">Jumlah</label>
							<div class="input-group">
								<!-- <div class="input-group-addon">Rp.</div> -->
								<input type="text" class="form-control" id="jml" name="jml" placeholder="Jumlah">
							</div>
					 	</div>
				 	</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-info" name="submit" value="bayar">Bayar</button>
   					</div>
		 		</div>
	 		</div>
		</div></form>

		<div class="container-fluid" style="margin-left: -12px;">
			<div class="row">
				<div class="col-lg-12 data">
		    		<table class="table table-hover table-striped" id="table1">
						<thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Kelas</th>
						      <th scope="col">Bulan</th>
						      <th scope="col">Tanggal Bayar</th>
						      <th scope="col">Jumlah</th>
						      <th scope="col">Aksi</th>
						    </tr>
						 </thead> 
					  

					  	<!-- tampilkan histori pembayaran, jika ada -->
						<tbody>
					<?php
						$qbayar = mysqli_query($koneksi,"SELECT kelas,bulan,tgl_bayar,jumlah FROM pembayaran WHERE nis='$nis' ORDER BY bulan ASC");
						if(mysqli_num_rows($qbayar) > 0){
						$no = 1;
						while(list($kelas,$bulan,$tgl,$jumlah) = mysqli_fetch_array($qbayar)){
					?>		
							<tr scope="row">
								<td><?= $no ?></td>
								<td><?= $kelas ?></td>
								<td><?= $bulan ?></td>
								<td><?= $tgl ?></td>
								<td><?= $jumlah ?></td>
								<td>
									<?php 
							      		if( $_SESSION['admin'] == 1 ){
							      	?>	
							      		<a href="./admin.php?hlm=bayar&submit=hapus&kls=<?= $kelas ?>&nis=<?= $nis ?>&bln=<?= $bulan ?>" class="badge badge-danger">Hapus </a>
									<?php 
						      		}
							      	?>	
						      		<a href="./cetak.php?submit=nota&kls=<?= $kelas ?>&nis=<?= $nis ?>&bulan=<?= $bulan ?>" target="blank" class="badge badge-success ml-2">Cetak</a>
					      		</td>
					      	</tr>
					    <?php  	
					      	$no++;
					
			}

		} else {
			echo '<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';
		}
					echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		
	} else {
?>
<!-- form input nomor induk siswa -->
<form class="form-horizontal ml-2 mt-4" role="form" method="post" action="./admin.php?hlm=bayar">
  <div class="form-group">
    <label for="nis" class="col-sm-2 control-label">Nomor Induk Siswa</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" name="submit" class="btn btn-info">Lanjut</button>
    </div>
  </div>
</form>
<?php
	}
}
?>