<?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$db_name = 'php_test';

$conn = new mysqli($localhost, $username, $password, $db_name);
if($conn){
    echo 'db connected';
}else{
    echo 'db not connected';
}
?>