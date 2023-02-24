<?php
mb_internal_encoding("utf8");
session_start();


if(!empty($_POST['from_mypage'])){
    $_SESSION['from_mypage'] = $_POST['from_mypage'];
}else {
        header("Location:mypage.php");
}

try {
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "root");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}


?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>

<body>
    <header>
        <img src="4eachblog_logo.jpg ">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
        <form action="mypage_update.php" method="post" enctype="multipart/form-data">
        <div class="form_contents">
                <h2>会員情報</h2>
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture']; ?>">
                </div>

                <div class="basic_info">
                    <p>氏名 : </p><input type="text" size="30" value="<?php echo $_SESSION['name']; ?>" name="name" required></p>
                
                    <p>メールアドレス : </p><input type="text" size="30"  value="<?php echo $_SESSION['mail']; ?>" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></p>

                    <p>パスワード : </p><input type="text" size="30"  value="<?php echo $_SESSION['password']; ?>"  name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required></p>

                    <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage_hensyu">
                </div>

                <div class="comments">
                    <p>コメント<br></p>
                    <textarea rows="7" cols="70" name="comments"><?php echo $_SESSION['comments']; ?> </textarea>
                </div>

                <div class="hensyubutton">
                    <input type="submit" class="submit_button" size="35" value="この内容に編集する">
                    <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage_hensyu">
                </div>
            </div>
        </form>
    </main>

    <footer>
        ©︎ 2018 InterNous.inc. All rights reserved 
    </footer>

</body>
</html>


