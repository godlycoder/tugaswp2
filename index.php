<?php
if ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != '' ) {
    $halaman = $_SESSION['user_login'];
    header('location:on-login');
    exit();
} else {
    header('location:login.php');
    exit();
}