<?php
session_start();
require('connection.php');
$key = '123456789009876543212345678998765432';
$iv = '1234567890098765';
if(isset($_POST['signin'])){
$signin = "SELECT * FROM users WHERE ID=:ID AND password=:password";

$statement=$pdo->prepare($signin);
$ID=openssl_encrypt($_POST['ID'],'AES-256-CBC',$key,0,$iv);
$password=openssl_encrypt($_POST['password'],'AES-256-CBC',$key,0,$iv);
$statement->bindParam(':ID',$ID,PDO::PARAM_STR);
$statement->bindParam(':password',$password,PDO::PARAM_STR);
$statement->execute();

    $check = $statement->fetchAll();
    $inv = $statement->rowCount();

    if($inv!=1){
        $_SESSION['LOGGED'] = 'invalid';
        header("location:invalid.html");
}

foreach($check as $data){
        $dec_priv = openssl_decrypt($data['privilege'], 'AES-256-CBC', $key, 0, $iv);
    
    if($dec_priv=='admin'){
        $_SESSION['LOGGED']=$dec_priv;
            header("location:index_Admin.php");
    }
    else if ($dec_priv=='teacher'){
        $_SESSION['LOGGED'] = $dec_priv;
        header("location:index_Teacher.php");
    }
    else if($dec_priv=='student'){
            $_SESSION['LOGGED'] = $dec_priv;
            header("location:index_Student.php");
    }    
    $pdo=null; 
}
}
?>