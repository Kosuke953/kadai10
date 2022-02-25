<?php
session_start();
require('../library.php');

if(isset($_SESSION['form'])){
    $form = $_SESSION['form'];
} else {
    header('Location: index.php');
    exit();
}

// 1.postデータの取得
// $username = $_POST['username'];
// $password = $_POST['password'];
// $email = $_POST['email'];
// $image = $_POST['image'];

// 2.DBへの接続
try{
    $pdo = new PDO('mysql:dbname=unit4_db;charset=utf8;host=localhost','root','root');
}catch(PDOException $e){
    exit('DBConnectError'.$e->getMessage());
}

// 3.データ登録SQL作成
// (1)sql文を用意
$stmt = $pdo->prepare("INSERT INTO user(id, username, password, email, thumbnail, indate)VALUES(NULL, :username, :password, :email, :image, sysdate())");

// (2)バインド変数を用意
$stmt->bindValue(':username', $form['username'], PDO::PARAM_STR);
$stmt->bindValue(':password', $form['password'], PDO::PARAM_STR);
$stmt->bindValue(':email', $form['email'], PDO::PARAM_STR);
$stmt->bindValue(':image', $form['image'], PDO::PARAM_STR);

// (3)実行
$status = $stmt->execute();

// (4)データ登録処理後
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
}else{
    unset($_SESSION['form']);
    header('Location: thanks.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="head">
        <h1>ユーザー登録</h1>
    </div>
    <div id="content">
        <p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
        <form action="" method="post">
            <dl>
                <dt>ユーザーネーム</dt>
                <dd><?php echo h($form['username']); ?></dd>
                <dt>メールアドレス</dt>
                <dd><?php echo h($form['email']); ?></dd>
                <dt>パスワード</dt>
                <dd>
                    【表示されません】
                </dd>
                <dt>写真など</dt>
                <dd>
                        <img src="../member_picture/<?php echo h($form['image'])?>" width="100" alt="" />
                </dd>
            </dl>
            <div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
        </form>
    </div>
</body>
</html>