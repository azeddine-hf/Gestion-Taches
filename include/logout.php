<?php 
include('connect.php');
session_start();
if(isset($_POST['logout_btn'])){
    $query74 = "UPDATE login SET active='offline' WHERE email='".$_SESSION['user']."'";
    $result_qury74 = $connection->query($query74);
    session_destroy();
    unset($_SESSION['user']);
    header('Location:../auth-login.php ');
}
?>