<?php

require('classes\User.class.php');


$user = new User();
$user = $user->login('gkavalakis@gmail.com','m5duic');
print_r($user);

?>