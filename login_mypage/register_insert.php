<?php
mb_internal_encoding("utf8");
session_start();

//DB接続
try {
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "root");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度実行してください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}

$stmt = $pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");

$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $_POST['path_filename']);
$stmt->bindValue(5, $_POST['comments']);

$stmt->execute();
$pdo = NULL;

header('Location:after_register.html');

?>