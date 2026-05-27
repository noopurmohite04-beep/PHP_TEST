<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $conn -> prepare('select password from users where email=?');
    $sql->bind_param('s', $email);
    $sql->execute();
    $sql->bind_result($pass);

    if($sql->fetch() && password_verify($password, $pass)){
        $_SESSION['email']=$email;
        header('location:dashboard.php');

    }else {
        echo "<script>alert('invalid credentials')</script>";
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="" method="post">
        EMAIL: <input type="email" name="email" id=""><br>
        PASSWORD: <input type="password" name="password" id=""><br>
        <button type="submit">SUBMIT</button> 
    </form>
</body>
</html>