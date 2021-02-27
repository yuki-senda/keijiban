<?php
mb_internal_encoding("utf8");

session_start();
try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバが混み合っており一時的にアクセス出来ません。<br>しばらくしてから再度ログインしてください</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}

$stmt = $pdo->prepare("UPDATE login_mypage SET name=?,mail=?,password=?,comments=? WHERE id=?");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

$stmt->execute();

$stmt = $pdo->prepare("SELECT * FROM login_mypage where mail=? && password=?");
$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);


$stmt->execute();

$pdo = NULL;

while($row = $stmt->fetch())
{
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

header('Location:mypage.php');

?>