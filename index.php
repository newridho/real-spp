<?php
session_start();
ob_start();
?>

<?php include "templates/headerLog.php"; ?>

<body class="">
    
    <?php unset($_SESSION['username']); ?>
    <div class="container">
        <?php
            include "koneksi.php";
            
            if( isset( $_REQUEST['submit'] ) ){
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                
                $sql = mysqli_query($koneksi,"SELECT iduser,username,admin,fullname FROM user WHERE username='$username' AND password=md5('$password')");
                
                if( mysqli_num_rows($sql) > 0 ){
                    list($iduser,$username,$admin,$fullname) = mysqli_fetch_array($sql);
                    
                    //session_start();
                    $_SESSION['iduser'] = $iduser;
                    $_SESSION['username'] = $username;
                    $_SESSION['admin'] = $admin;
                    $_SESSION['fullname'] = $fullname;
                    
                    header("Location: ./admin.php");
                    die();
                } else {
                    //$err = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
                    //header('Location: ./?err='.urlencode($err));
                    
                    $_SESSION['err'] = ' Username dan Password tidak ditemukan! ';
                    header('Location: ./');
                    die();
                }
                
            } else {
                ?>


    
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-5 mt-5">
                <div class="box">
                    <span class="animated"></span>
                    <span class="animated"></span>
                    <span class="animated"></span>
                    <span class="animated"></span>
                    <div class="card o-hidden border-5 border-dark shadow-lg" style="background-color: #363636 !important; border-radius: 25px; margin-top: 45px !important; ">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5" style="border-radius: 25px;">

                                    <!-- Cek apakah pesan / alert yang perlu ditampilkan -->
                                    <?php 
                                    // include "templates/sweet-alertLog.php"; 
                                    ?>

                                        <?php
                                            if(isset($_SESSION['err'])){
                                                $err = $_SESSION['err'];
                                                echo " <script type='text/javascript'>
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            showConfirmButton: false,
                                                            timer: 3000
                                                        });

                                                        Toast.fire({
                                                            type: 'error',
                                                            title: '$err'
                                                        });  
                                                    </script> ";
                                                unset($_SESSION['err']);    
                                            } else {
                                                if(isset($_SESSION['logout'])){
                                                    $logout = $_SESSION['logout'];
                                                    echo " <script type='text/javascript'>
                                                            const Toast = Swal.mixin({
                                                                toast: true,
                                                                position: 'top-end',
                                                                showConfirmButton: false,
                                                                timer: 3000
                                                            });

                                                            Toast.fire({
                                                                type: 'success',
                                                                title: '$logout'
                                                            });  
                                                        </script> ";
                                                    unset($_SESSION['logout']);    
                                                }
                                            }
                                        ?>
                                        <div class="text-center">
                                            <h1 class="h3 text-white-900 mb-4" style="font-family: Viga !important;">APLIKASI SPP RIDHO</h1>
                                        </div>
                                        <form class="user" method="post" action="" role="form" id="email">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                                            </div>
                                            <button class="btn btn-user btn-1 hover-filled-slide-right btn-block animatedButton" type="submit" name="submit">
                                                <span>Masuk</span>
                                            </button>
                                        </form>
                                        <?php
                                            }
                                        ?>
                                        <br>
                                        <!-- <div class="text-center">
                                            <a class="small" href="#">Forgot Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="#">Create an Account!</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Box -->


            </div>

        </div>
    
    </div> <!-- End Container -->    

    
    <?php include "templates/footerLog.php"; ?>
  