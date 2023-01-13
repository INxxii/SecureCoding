<?php
session_start();
require('connection.php');

if(isset($_POST['signin'])){
$signin = "SELECT * FROM users WHERE username=:username AND password=:password";

$statement=$pdo->prepare($signin);
$username=$_POST['username'];
$password=$_POST['password'];
$statement->bindParam('username',$username,PDO::PARAM_STR);
$statement->bindParam('password',$password,PDO::PARAM_STR);
$statement->execute();

    $check = $statement->fetchAll();

foreach($check as $data){
    if($data['privilege']=='admin'){
        $_SESSION['LOGGED']=$data['privilege'];
            header("location:index_Admin.php");
    }
    else if ($data['privilege']=='teacher'){
        $_SESSION['LOGGED'] = $data['privilege'];
        header("location:index_Teacher.php");
    }
    else if($data['privilege']=='student'){
            $_SESSION['LOGGED'] = $data['privilege'];
            header("location:index_Student.php");
    }
    else{
            $_SESSION['LOGGED'] = 'invalid';
            header("location:invalid.html");
    }
    
    $pdo=null; 
}
}
?>