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
?>
<!doctype html>
<html>
<head>
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="index_TeacherStyle.css">
</head>
<body>

<ul class="navBar">
    <li class="title">Teacher</li>
    <?php
    if($_SESSION['LOGGED']=='admin'){
        echo "<li class='elm'><a href='index_Admin.php'>Admin HUB</a></li>";
    }
    ?>
    <li class="elm"><a href="manageQuestion.php">Create questions</a></li>
    <li class="elm"><a href="manageExam.php">Create an exam</a></li>
    <li class="elm" ><a href="signout.php">Sign Out</a></li>
    
</ul>
<footer style="color:#fdf0d5;">Copyright	&#169; AhmadAli-HTU</footer>
</body>

</html>