<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		
		if($aksi == 'view'){
			//menampilkan daftar siswa dalam kelas
			include 'kelas_baru.php';
		}
		if($aksi == 'hapus'){
			//menghapus kelas beserta siswa yg ada di dalamnya
			include 'kelas_hapus.php';
		}
		
	} else {
		//query untuk menampilkan daftar kelas sesuai dengan tahun pelajaran yg ditentukan, dalam hal ini 2014/2015.
		//tahun pelajaran mestinya bersifat dinamis, temukan cara agar th_pelajaran dapat ditentukan saat menampilkan kelas
		$sql = mysqli_query($koneksi,"SELECT kelas.kelas, kelas.th_pelajaran, count(kelas.nis) as jml, siswa.idjurusan FROM kelas,siswa WHERE kelas.nis=siswa.nis GROUP BY kelas.kelas");
	?>	

			<div class="row ml-1">
			    <div class="col-sm-8">
			        <div class="form-group row">
			            <div class="col-sm-6">
			                 <label for="nis" class="col col-form-label"><h2>Daftar Kelas</h2></label>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="row ml-1">
			    <div class="col-sm-8">
			        <div class="form-group row">
			            <div class="col-sm-6">
			                <label for="nis" class="col col-form-label">
			                	<a href="./admin.php?hlm=master&sub=kelas&aksi=view" class="btn btn-md btn-info">Tambah Data</a>
			                </label>
			            </div>
			        </div>
			    </div>
			</div>
		
		<div class="container-fluid" style="margin-left: -15px;">
			<div class="row">
				<div class="col-lg-10 data p-4">
					<table class="table table-hover table-striped table-borderless py-3"width="100%" cellspacing="0" id="table-siswa">
                      	<thead>
                            <tr>
						      <th>No</th>
						      <th>Kelas</th>
						      <th>Aksi</th>
						    </tr>
                      	</thead>
                      	<tbody>	
              			<?php				  	
							if( mysqli_num_rows($sql) > 0 ){
								$no = 1;
								while(list($kelas,$tapel,$jumlah,$idjurusan) = mysqli_fetch_array($sql)){
						?>	
							<tr>
								<td><?= $no ?></td>
								<td><?= $kelas ?> <span class="badge badge-info ml-2"><?= $jumlah ?> siswa</span></td><td>
									<a href="./admin.php?hlm=master&sub=kelas&aksi=view&kelas=<?= urlencode($kelas) ?>&tapel=<?= $tapel ?>&idjurusan=<?= $idjurusan ?>&submit=y" class="badge badge-warning">Edit</a>
									<a href="./admin.php?hlm=master&sub=kelas&aksi=hapus&kelas=<?= $kelas ?>&tapel=<?= $tapel ?>" class="badge badge-danger ml-2">Hapus</a>
								</td>
							</tr>
						<?php	
									$no++;
								}
							} else {
								echo '<tr>
										<td colspan="5"><em>Belum ada data</em></td>
									</tr>';
							}    
						?>
                    	</tbody>
                    	<tfoot>
                    		<tr></tr>
                    	</tfoot>
                    </table>
                </div>    
            </div>    
        </div>  

<?php			
    }
    }
?>