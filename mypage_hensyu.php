<?php
mb_internal_encoding("utf8");

session_start();

if(empty($_POST['form_mypage'])){
    header('Location:login_error.php');
}

?>

<!DOCJTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
     <title>マイページ登録</title>
     <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
  </head>
    <body>
        <header>
            <img src = "4eachblog_logo.jpg">
            <div class="logout">
            <a href="log_out.php">ログアウト</a>
            </div>
        </header> 
    <main>
        <div class="box">
            <div class="contents">
                <h1>会員情報</h1>
                <div class="hello">
                    <?php echo 'こんにちは！'.$_SESSION['name'].'さん'?>
                </div>
                  
                <form method="post" action="mypage_update.php">
                <div class="basic_info">   
                    <p>氏名：<input type="text" name="name" size="30"value="<?php echo $_SESSION['name'];?>"></p>
                    <p>メール：<input type="text" name="mail" size="30" value="<?php echo $_SESSION['mail'];?>"></p>
                    <p>パスワード：<input type="text" name="password" size="30" value="<?php echo $_SESSION['password'];?>"></p>
                </div>
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture']; ?>">
                </div>
                <div class="comments">
                    コメント：<input type="text" name="comments" value="<?php echo $_SESSION['comments'];?>">
                </div>
                <div class="button">
                    <input type="submit" class="submit_button" size="35" value="この内容に変更する">
                </div>
                </form>
              </div>
          </div>
        <footer>
            ©︎2018 InterNous.inc. ALL rights reserved
        </footer>
        </main>
    </body>
</html>
