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
    <link rel="stylesheet" href="index_AdminStyle.css">
</head>
<body>

<ul class="navBar">
    <li class="title">Admin</li>
    <li class="elm"><a href="ManageUsers.php">Manage Users</a></li>
    <li class="elm"><a href="index_Teacher.php">Teacher privileges</a></li>
    <li class="elm" ><a href="index_Student.php">Student privileges</a></li>
    <li class="elm" ><a href="signout.php">Sign Out</a></li>
    
</ul>
<footer style="color:#fdf0d5;">Copyright	&#169; AhmadAli-HTU</footer>
</body>

</html>

