<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
   if( isset( $_REQUEST['sub'] )){
      $sub = $_REQUEST['sub'];
      
      include "laporan_tagihan.php";
   } else {
   
      if(isset($_REQUEST['submit'])){
         $submit = $_REQUEST['submit'];
         $tgl1 = $_REQUEST['tgl1'];
         $tgl2 = $_REQUEST['tgl2'];
         
         //echo $tgl1.'-'.$tgl2;
         $q = "SELECT kelas,sum(jumlah) FROM pembayaran WHERE tgl_bayar BETWEEN '$tgl1' AND '$tgl2' GROUP BY kelas";
        
            echo '<div class="row ml-2">';
              echo '<div class="col-lg-9">';
              echo '<div class="form-group row">';
                echo '<label for="nama" class="col-sm-4 col-form-label"><h2>Rekap Pembayaran</h2></label>';
                echo '<div class="col-sm-2 mt-1">
                        <input type="text" class="form-control" id="nama" value="'.$tgl1.'" readonly>
                      </div><h5 class="mt-2">sampai</h5>';
                echo '<div class="col-sm-2 mt-1 ml-1">
                    <input type="text" class="form-control" id="nama" value="'.$tgl2.'" readonly>
                      </div>';
              echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row ml-2">';
              echo '<div class="col-lg-9">';
                echo '<div class="form-group row">';
                echo '<div class="col-sm-1 mt-1 mr-2">';
                 echo '<a class="noprint pull-right btn btn-md btn-warning" onclick="fnCetak()">Cetak</a>
                </div>';
            echo '<div class="well well-sm noprint">';    
            echo '<form class="form-inline" role="form" method="post" action="">';
              // <div class="form-group">
              echo'<div class="col mt-1">
                  <label class="sr-only" for="tgl1">Mulai</label>
                  <input type="date" class="form-control" id="tgl1" name="tgl1">
              </div>';
              // <div class="form-group">
              echo'<div class="col mt-1">
                <label class="sr-only" for="tgl2">Hingga</label>
                <input type="date" class="form-control" id="tgl2" name="tgl2">
              </div>';
              echo '<div class="col mt-1">
                <button type="submit" name="submit" class="btn btn-info">Tampilkan</button>
              </div>';
            echo'</form>
            </div>';
            echo '</div>';
            echo '</div>'; 

                      echo '</div>';   
                    echo '</div>';
            $sql = mysqli_query($koneksi,$q);

      
            // echo '<div class="col-md-5">';
            // echo '<div class="col-sm-2 mt-1">';

            echo '<div class="row mt-5" style="margin-left: 33px;">';
              echo '<div class="col-lg-8 data">';
                  echo '<table class="table table-hover table-striped" id="table1">';
                  echo '<thead class="thead-dark">';
                    echo '<tr>';
                      echo '<th scope="col">#</th>';
                      echo '<th scope="col">Kelas</th>';
                      echo '<th scope="col">Jumlah</th>';
                    echo '</tr>';
                  echo '</thead>';
            // echo '<tr class="info"><th width="50">#</th><th>Kelas</th><th>Jumlah</th></tr>';
                  echo '<tbody>';
                    $total = 0;
                    $no=1;
                    while(list($kls,$jml) = mysqli_fetch_array($sql)){
                    echo '<tr scope="row"><td class="text-white">'.$no.'</td>';
                    echo '<td class="text-white">'.$kls.'</td>';
                    echo '<td class="text-white">'.$jml.'</td></tr>';
                       // echo '<tr><td>'.$no.'</td><td>'.$kls.'</td><td><span class="pull-right">'.$jml.'</span></td></tr>';
                    $total += $jml;
                    $no++;
                    }
                    echo '<tr scope="row"><td colspan="2" class="text-white">T O T A L</td>';
                    echo '<td class="text-white">'.$total.'</td></tr>';
                    // echo '<tr><td colspan="2"><span class="pull-right">T O T A L</span></td><td><span class="pull-right">'.$total.'</span></td></tr>';
                    echo '</tbody>';
          echo '</table>';
          echo '</div>';
        echo '</div>';
      echo '</div>';        
 
         
      } else {
         $tgl = date("Y/m/d");
         $q = "SELECT kelas,sum(jumlah) FROM pembayaran WHERE tgl_bayar='$tgl' GROUP BY kelas";

          echo '<div class="row ml-2">';
              echo '<div class="col-lg-9">';
              echo '<div class="form-group row" style="margin-left: -8px !important;">';
                echo '<label for="nama" class="col-sm-4 col-form-label"><h2>Rekap Pembayaran</h2></label>';
                echo '<div class="col-sm-2 mt-2">
                        <input type="text" class="form-control" id="nama" value="'.$tgl.'" readonly>
                      </div>';
              echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row ml-2">';
              echo '<div class="col-lg-9">';
                echo '<div class="form-group row">';
                  echo '<div class="well well-sm noprint">';    
                  echo '<form class="form-inline" role="form" method="post" action="">';
                    // <div class="form-group">
                    echo'<div class="col-sm- mt-1 ml-3">
                        <label class="sr-only" for="tgl1">Mulai</label>
                        <input type="date" class="form-control" id="tgl1" name="tgl1">
                    </div>';
                    // <div class="form-group">
                    echo'<div class="col ml-3 mt-1">
                      <label class="sr-only" for="tgl2">Hingga</label>
                      <input type="date" class="form-control" id="tgl2" name="tgl2">
                    </div>';
                    echo '<div class="col ml-3 mt-1">
                      <button type="submit" name="submit" class="btn btn-info">Tampilkan</button>
                    </div>';
                  echo'</form>
                  </div>'; 
            echo '</div>';
            echo '</div>';
            echo '</div>';         

         // echo '<h3>Rekap Pembayaran <small>'.$tgl.'</small></h3><hr>';
      }
      
      
   }
}
?>