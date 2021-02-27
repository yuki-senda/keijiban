<?php
mb_internal_encoding("utf8");

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");

$stmt = $pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)value(?,?,?,?,?)");

$name=$_POST['name'];
$mail=$_POST['mail'];
$password=$_POST['password'];
$path_filename=$_POST['path_filename'];
$comments=$_POST['comments'];


$stmt->bindValue(1,$name);
$stmt->bindValue(2,$mail);
$stmt->bindValue(3,$password);
$stmt->bindValue(4,$path_filename);
$stmt->bindValue(5,$comments);

$stmt->execute();
$pdo = NULL;

header('Location:after_register.html');
?>