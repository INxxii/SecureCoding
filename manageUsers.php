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
?>
<!doctype html>
<html>
<head>
    <title>Admin Portal</title>
    <link rel="stylesheet" href="manageUsers.css">
</head>
<body>

<ul class="navBar">
    <li class="title">Admin</li>
    <li class="elm"><a href="addUser.php">Add user</a></li>
    <li class="elm"><a href="index_Admin.php">HUB</a></li>
    <li class="elm"><a href="index_Teacher.php">Teacher privileges</a></li>
    <li class="elm" ><a href="index_Student.php">Student privileges</a></li>
    <li class="elm" ><a href="signout.php">Sign Out</a></li>
    
</ul>

<?php
require 'connection.php';
$show="SELECT * FROM users";
$statement=$pdo->prepare($show);
$statement->execute();
$row=$statement->fetchAll();
echo "<table class='showtable'>
<caption style=color:#003049;>Users</caption>
<tr>
<td> ID </td>
<td> Username </td>
<td> Password </td>
<td> Privilege </td>
<td> delete </td>
<td> edit </td>
</tr>";

$key = '123456789009876543212345678998765432';
$iv = '1234567890098765';

foreach($row as $data){
    $dec_id = openssl_decrypt($data['ID'],'AES-256-CBC',$key,0,$iv);
    $dec_username = openssl_decrypt($data['username'],'AES-256-CBC',$key,0,$iv); 
    $dec_password = openssl_decrypt($data['password'],'AES-256-CBC',$key,0,$iv);
    $dec_privilege = openssl_decrypt($data['privilege'], 'AES-256-CBC', $key,0, $iv);    
    echo "<tr>
    <td style='padding:10px'>". $dec_id ."</td>
    <td>". $dec_username ."</td>
    <td>". $dec_password ."</td>
    <td>". $dec_privilege ."</td>
    <td> <a class='buttons' href=deleteUser.php?ID=".$data['ID'].">delete</a></td>
    <td> <a class='buttons' href=editUsers.php?ID=".$data['ID'].">edit</a></td> 
    </tr>";
}
echo "</table>";
?>
<footer style="color:#fdf0d5;">Copyright	&#169; AhmadAli-HTU</footer>
</body>

</html>

