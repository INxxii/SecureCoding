<?php
session_start();
if(!isset($_SESSION['LOGGED'])){
    header("location:signin.html");
}
else if($_SESSION['LOGGED']=='invalid'){
    header("location:invalid.html");
}
else if ($_SESSION['LOGGED']=='teacher'){
    header("location:invalid_privilege.html");
}
?>
<!doctype html>
<html>
<head>
    <title>Student Portal</title>
    <link rel="stylesheet" href="manageS_exam.css">
</head>
<body>

<ul class="navBar">
    <li class="title">Student</li>
    <li class="elm"><a href="index_Student.php">HUB</a></li>
    <li class="elm" ><a href="signout.php">Sign Out</a></li>
</ul>

<?php
require 'connection.php';
$show="SELECT number,exam FROM exams";
$statement=$pdo->prepare($show);
$statement->execute();
$row=$statement->fetchAll();
echo "<table class='showtable'>
 <caption style=color:#081c15;>Exams</caption>
 <tr>
 <td> Number </td>
 <td> Exam </td>
 </tr>";

foreach($row as $data){
    echo "<tr>
     <td style='padding:10px'>". $data['number'] ."</td>
    <td>". $data['exam'] ."</td>
    </tr>";
}
echo "</table>";
?>
<footer style="color:#fdf0d5;">Copyright	&#169; AhmadAli-HTU</footer>
</body>

</html>

