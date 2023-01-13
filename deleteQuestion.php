<?php
session_start();
if(!isset($_SESSION['LOGGED'])){
    header("location:signin.html");
}
else if($_SESSION['LOGGED']=='invalid'){
    header("location:invalid.html");
}
else if ($_SESSION['LOGGED']=='student'){
    header("location:invalid_privilege.html");
}
require 'connection.php';
$delete= "DELETE FROM questions WHERE number=:number";
$statement=$pdo->prepare($delete);
$statement->bindParam(':number',$_GET['number'],PDO::PARAM_INT);
$statement->execute();
header("location:manageQuestion.php");
$pdo=null;
?>