<?php
require('classes\User.class.php');

$user = new User();
if($user->login($_POST['username'], $_POST['password'])){
    $_SESSION['user'] = $user->id;
    $_SESSION['username'] = $user->username;
}else{
    echo 'Wrong username or password';
}
?>