<?php
session_start();
if(!isset($_SESSION['LOGGED'])){
    header("location:signin.html");
}
else if($_SESSION['LOGGED']=='invalid'){
    header("location:invalid.html");
}
else if ($_SESSION['LOGGED']!='admin'){
    header("location:invalid_privilege.html");
}

require 'connection.php';
$delete= "DELETE FROM users WHERE ID=:ID";
$statement=$pdo->prepare($delete);
$statement->bindParam(':ID',$_GET['ID'],PDO::PARAM_STR);
$statement->execute();
header("location:manageUsers.php");
$pdo=null;
?>