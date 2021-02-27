<?php
mb_internal_encoding("utf8");
$name=$_POST['name'];
$mail=$_POST['mail'];
$password=$_POST['password'];
$picture=$_FILES['picture'];
$comments=$_POST['comments'];

move_uploaded_file($picture['tmp_name'],'./image/'.$picture['name']);

$path_filename = './image/'.$picture['name'];

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="register_confirm.css">
    </head>
    
    <body>
        <header>
            <img src = "4eachblog_logo.jpg">
        </header>
        
        <main>
          <div class="confirm">
              <div class="confirm_contents">
                <h1>会員登録　確認</h1>
                <h2>こちらの内容で登録しても宜しいですか？</h2>
                
                <p>氏名：
                    <?php echo $name;?>
                </p>
                
                <p>メール：
                    <?php echo $mail;?>
                </p>
                
                <p>パスワード：
                    <?php echo $password;?>
                </p>
                
                <p>プロフィール写真：
                    <?php echo $picture['name']; ?>
                </p>
                
                <p>コメント：
                    <?php echo $comments;?>
                </p>
                
                <form action="register.php" method="post">
                    <input type="submit" class="button1" value="戻って修正する">
                </form>
                    
                <form action="register_insert.php" method="post">
                    <input type="submit" class="button2" value="登録する">
                    <input type="hidden" value="<?php echo $name;?>" name="name">
                    <input type="hidden" value="<?php echo $mail;?>" name="mail">
                    <input type="hidden" value="<?php echo $password;?>" name="password">
                    <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
                    <input type="hidden" value="<?php echo $comments;?>" name="comments">
                </form>
               </div>
            </div>
        </main>
        
        <footer>
            ©︎2018 InterNous.inc. ALL rights reserved
        </footer>
        
    </body>
</html>