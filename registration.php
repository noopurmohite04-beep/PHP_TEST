<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = $conn -> prepare('insert into users(name,email,password) values (?,?,?)');
    $sql -> bind_param('sss',$name, $email, $password);
    if($sql -> execute()){
        header('location:login.php');
    }else {
        echo 'invalid credentials';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>REGISTRATION</h1>
    <form action="" method="post">
        NAME: <input type="text" name="name" id=""><br>
        EMAIL: <input type="email" name="email" id=""><br>
        PASSWORD: <input type="password" name="password" id=""><br>
        <button type="submit">SUBMIT</button> 
    </form>
</body>
</html>