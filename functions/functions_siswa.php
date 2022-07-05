<?php
    include '../koneksi.php';

    if($_GET['act']== 'tambahsiswa'){   
       if( isset( $_REQUEST['submit'] )){
            $nis = $_REQUEST['nis'];
            $nama = $_REQUEST['nama'];
            $idjurusan = $_REQUEST['idjurusan'];
            
            $sql = mysqli_query($koneksi,"INSERT INTO siswa VALUES('$nis','$nama','$idjurusan')");
            
            if($sql > 0){
                $_SESSION['sukses'] = '';
                header('Location: ../admin.php?hlm=master&sub=siswa');
                die();
            } else {
                echo 'ERROR! Perikawsa penulisan querynya.';
            }
        }
    } 
?>