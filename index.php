<?php
session_start();

if(!isset($_SESSION['user']) && !isset($_POST['username'])){
    include('modules/loginform.php');
}elseif(isset($_POST['username'])){
    include('modules/login.php');
}

if(isset($_SESSION['user'])){
    print_r($_SESSION);
}
?>