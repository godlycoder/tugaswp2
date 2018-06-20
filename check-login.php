<?php
session_start();
require 'config.php';
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    
    $sql_check = "SELECT 
                         id_user 
                  FROM admin 
                  WHERE 
                       username=? 
                       AND 
                       password=? 
                  LIMIT 1";
    $check_log = $koneksi->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_log->execute();
    $check_log->store_result();
    if ( $check_log->num_rows == 1 ) {
        header('location:on-login');
        exit();
    } else {
        header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
        exit();
    }
   
} else {
    header('location:login.php');
    exit();
}
