<?php
session_start();
$key = '123456789009876543212345678998765432';
$iv = '1234567890098765';

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
    $dec_question = openssl_decrypt($data['question'],'AES-256-CBC',$key,0,$iv);
    $dec_option1 = openssl_decrypt($data['option1'],'AES-256-CBC',$key,0,$iv);
    $dec_option2 = openssl_decrypt($data['option2'],'AES-256-CBC',$key,0,$iv);
    $dec_option3 = openssl_decrypt($data['option3'],'AES-256-CBC',$key,0,$iv);
    $dec_option4 = openssl_decrypt($data['option4'],'AES-256-CBC',$key,0,$iv);
    echo "<tr>
    <td style='padding:10px'>". $data['number'] ."</td>
    <td>". $dec_question ."</td>
    <td>". $dec_option1."</td>
    <td>". $dec_option2 ."</td>
    <td>". $dec_option3 ."</td>
    <td>". $dec_option4 ."</td>
    <td> <a class='buttons' href=deleteQuestion.php?number=".$data['number'].">delete</a></td>
    <td> <a class='buttons' href=editQuestion.php?number=".$data['number'].">edit</a></td> 
    </tr>";
}
echo "</table>";
?>
<footer style="color:#fdf0d5;">Copyright	&#169; AhmadAli-HTU</footer>
</body>

</html>

