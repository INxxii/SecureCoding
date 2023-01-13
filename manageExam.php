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
    <link rel="stylesheet" href="manageQuestion.css">
</head>
<body>

<ul class="navBar">
    <li class="title">Teacher</li>
    <li class="elm"><a href="addExam.php">Add exam</a></li>
    <li class="elm"><a href="index_Teacher.php">HUB</a></li>
    <li class="elm"><a href="manageQuestion.php">Create question</a></li>
    <li class="elm" ><a href="signout.php">Sign Out</a></li>
</ul>

<?php
require 'connection.php';
$show="SELECT * FROM exams";
$statement=$pdo->prepare($show);
$statement->execute();
$row=$statement->fetchAll();
echo "<table class='showtable'>
<caption style=color:#c1121f;>Exams</caption>
<tr>
<td> Number </td>
<td> Exam </td>
<td> Q1 </td>
<td> Q2 </td>
<td> Q3 </td>
<td> Q4 </td>
<td> Q5 </td>
<td> delete </td>
<td> edit </td>
</tr>";

foreach($row as $data){
    echo "<tr>
    <td style='padding:10px'>". $data['number'] ."</td>
    <td>". $data['exam'] ."</td>
    <td>". $data['question1'] ."</td>
    <td>". $data['question2'] ."</td>
    <td>". $data['question3'] ."</td>
    <td>". $data['question4'] ."</td>
    <td>". $data['question5'] ."</td>
    <td> <a class='buttons' href=deleteExam.php?number=".$data['number'].">delete</a></td>
    <td> <a class='buttons' href=editExam.php?number=".$data['number'].">edit</a></td>
    </tr>";
}
echo "</table>";
?>
<footer style="color:#fdf0d5;">Copyright	&#169; AhmadAli-HTU</footer>
</body>

</html>

