<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);

// session_destroy();
$SESSION['logout'] = "Anda Telah Berhasil Logout";
header("Location: ./");
die();
?>