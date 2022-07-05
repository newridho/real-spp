<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
   echo '<div class="row ml-2">
            <div class="col-sm-8">
               <div class="form-group row">
                  <div class="col-sm-6">
                     <label for="nis" class="col col-form-label"><h2>Tagihan Pembayaran</h2></label>
                  </div>
            </div>
            </div>
         </div>';

   echo '<div class="row ml-2">
            <div class="col-lg-6">
               <div class="form-group row">
                  <div class="col-sm-3">
                     <label for="nis" class="col col-form-label">
                        <a class="noprint pull-right btn btn-info" onclick="fnCetak()"> Cetak</a>
                     </label>
                  </div>
            </div>
            </div>
         </div>';      

   // echo '<h2>Tagihan Pembayaran</h2><hr>';
   // echo '<a class="noprint pull-right btn btn-info" onclick="fnCetak()"> Cetak</a>';
   $sql = mysqli_query($koneksi,"SELECT s.nis,s.nama,k.kelas,p.bulan,p.jumlah FROM (siswa s INNER JOIN kelas k ON s.nis = k.nis) LEFT JOIN pembayaran p ON s.nis = p.nis ORDER BY k.kelas, s.nis");
   
   // echo '<div class="row">';
   // echo '<div class="col-md-7">';
   // echo '<table class="table table-bordered">';
   // echo '<tr class="info"><th width="50">#</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Bulan</th><th>Jumlah</th></tr>';

   echo '<div class="container-fluid" style="margin-left: -5px;">';
         echo '<div class="row">';
            echo '<div class="col-lg-12 data">';
               echo '<table class="table table-hover table-striped mt-4 ml-3" id="table1">';
                 echo '<thead class="thead-dark">';
                   echo '<tr>';
                     echo '<th scope="col">#</th>';
                     echo '<th scope="col">NIS</th>';
                     echo '<th scope="col">Nama</th>';
                     echo '<th scope="col">Kelas</th>';
                     echo '<th scope="col">Bulan</th>';
                     echo '<th scope="col">Jumlah</th>';
                   echo '</tr>';
                 echo '</thead>';
                 echo '<tbody>';

   $no=1;
   while(list($nis,$nama,$kls,$bln,$jml)=mysqli_fetch_array($sql)){
      echo '<tr scope="row"><td>'.$no.'</td>';
               echo '<td>'.$nis.'</td>';
               echo '<td>'.$nama.'</td>';
               echo '<td>'.$kls.'</td>';
      // echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$kls.'</td>';
      if(empty($bln) AND empty($jml)){
         echo '<td>--</td><td>BL</td></tr>';
      } else {
               echo '<td>'.$bln.'</td><td>LUNAS</td></tr>';
      }
      $no++;
   }
               echo '</tbody>';
               echo '</table>';
            echo '</div>';
         echo '</div>';
      echo '</div>';
}
?>