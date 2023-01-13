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
    <li class="elm"><a href="addQuestion.php">Add question</a></li>
    <li class="elm"><a href="index_Teacher.php">HUB</a></li>
    <li class="elm"><a href="manageExam.php">Create exam</a></li>
    <li class="elm" ><a href="signout.php">Sign Out</a></li>
</ul>

<?php
require 'connection.php';
$show="SELECT * FROM questions";
$statement=$pdo->prepare($show);
$statement->execute();
$row=$statement->fetchAll();
echo "<table class='showtable'>
<caption style=color:#c1121f;>Questions</caption>
<tr>
<td> Number </td>
<td> Question </td>
<td> Option1 </td>
<td> Option2 </td>
<td> Option3 </td>
<td> Option4 </td>
<td> delete </td>
<td> edit </td>
</tr>";

foreach($row as $data){
    echo "<tr>
    <td style='padding:10px'>". $data['number'] ."</td>
    <td>". $data['question'] ."</td>
    <td>". $data['option1'] ."</td>
    <td>". $data['option2'] ."</td>
    <td>". $data['option3'] ."</td>
    <td>". $data['option4'] ."</td>
    <td> <a class='buttons' href=deleteQuestion.php?number=".$data['number'].">delete</a></td>
    <td> <a class='buttons' href=editQuestion.php?number=".$data['number'].">edit</a></td> 
    </tr>";
}
echo "</table>";
?>
<footer style="color:#fdf0d5;">Copyright	&#169; AhmadAli-HTU</footer>
</body>

</html>

