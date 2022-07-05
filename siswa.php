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
			case 'edit':
				include 'siswa_edit.php';
				break;
			case 'hapus':
				include 'siswa_hapus.php';
				break;
		}
	} else {
		$sql = mysqli_query($koneksi,"SELECT * FROM siswa ORDER BY nis");
?>

	<div class="container-fluid">
		<p></p>
	    <div class="card border-empty mt-5">
	        <div class="card-header py-0 px-0 border-empty bg-transparent">
	        	<div class="row">
	        		<div class="col-sm-6 mt-1 pl-3">
			            <label for="nis" class="col col-form-label">
			            	<h3 class="viga m-0 font-weight-bold text-primary">Daftar Siswa</h3>
			        	</label>
	        		</div>
	        		<div class="col-sm-6 text-right mt-2 pr-4">
			    		<a href="" class="btn btn-info btn-md mb-3" data-toggle="modal" data-target="#newSiswaModal">Tambahkan</a>
	        		</div>
	        	</div>
	        </div>
	        <div class="card-body py-2">
	            <!-- <div class="table-responsive">  -->
	           	<div class="row">
	                <div class="col-lg-12 data">
	                    <table class="table table-hover table-borderless table-striped py-3"  width="100%" cellspacing="0" id="table-siswa">
	                      	<thead>
	                            <tr class="text-dark">
							      <th>No</th>
							      <th>NIS</th>
							      <th>Nama Lengkap</th>
							      <th>Jurusan</th>
							      <th>Aksi</th>
							    </tr>
	                      	</thead>
	                      	<tbody>
	                      	<?php 
								$sql = "SELECT * FROM siswa ORDER BY nis";
							    $query = mysqli_query($koneksi, $sql);
							    $no=1;
								if( mysqli_num_rows($query) > 0 ){
								    while ($row = mysqli_fetch_assoc($query)){		
							?>		
								<tr>
									<td><?= $no; ?></td>
									<td><?= $row['nis']; ?></td>
									<td><?= $row['nama']; ?></td>
									<?php 
										$qjurusan = mysqli_query($koneksi,"SELECT jurusan FROM jurusan WHERE idjurusan='{$row['idjurusan']}'");
										list($jurusan) = mysqli_fetch_array($qjurusan);
									?>		
									<td><?= $jurusan; ?></td>
										<td>
										<!-- <button type="button" class="badge badge-warning edit" data-toggle="modal" data-target="#updateSiswaModal">Ubah</button> -->
										<a href="./admin.php?hlm=master&sub=siswa&aksi=edit&nis=<?= $row['nis']; ?>" class="badge badge-warning ml-2">Edit</a>									
										<!-- <a href="./p_siswadelete.php?nis=" class="badge badge-danger ml-2 delete-link"> -->
										Hapus</a>
										<a href="" class="badge badge-danger ml-2 delete-link">
										Hapus</a>
										 <!-- var_dump($row['nis']);
										 die();  -->
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
	            <!-- </div> -->
	    	</div>
	    </div>        
	</div> <!-- End of container-fluid -->
	
	<?php } ?>
<?php } ?>



<!-- Modal Tambah -->
<div class="modal fade" id="newSiswaModal" tabindex="-1" aria-labelledby="newSiswaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="newSubMenuModalLabel">Tambah Siswa Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="frm_edit" action="./functions/functions_siswa.php?act=tambahsiswa" method="post" role="form">	
	    <div class="modal-body">
    		<div class="form-group">
			    <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required autofocus autocomplete="off">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa" required  autocomplete="off">
			</div>
			<div class="form-group">    
				<select name="idjurusan" class="form-control">
			    	<?php
						$qprodi = mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY idjurusan");
						while( list($idjurusan,$jurusan)=mysqli_fetch_array($qprodi) ) {
							echo '<option value="'.$idjurusan.'">'.$jurusan.'</option>';
						}
					?>
			    </select>
			</div>
	    </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" name="submit">Add </button>
	    </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal Edit -->
<!-- <div class="modal fade" id="updateSiswaModal" tabindex="-1" aria-labelledby="updateSiswaModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header">
        	<h5 class="modal-title" id="newSubMenuModalLabel">Ubah Data Siswa</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
      </div>
      <form action="./functions/functions_siswa.php?act=editsiswa'" method="post" role="form">	
	    <div class="modal-body">
    		<div class="form-group">
    			<input type="text" class="form-control" id="nis" name="nis" readonly>
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="nama" name="nama" autofocus>
			</div>
			<div class="form-group">    
				<select name="idjurusan" class="form-control"></select>
			</div>
	    </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" name="submit" class="btn btn-primary">Add </button>
	    </div>
      </form>
    </div>
</div> -->
