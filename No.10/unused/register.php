<?php
session_start();
require('library.php');

$form=[
    'username'=>'',
    'password'=>'',
    'email'=>''
];
$error=[];
// フォームの内容をチェック
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $form['username']=filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    if($form['username'] === ""){
        $error['username'] = 'blank';
    }

    $form['password']=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if($form['password'] === ""){
        $error['password'] = 'blank';
    }

    $form['email']=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if($form['email'] === ""){
        $error['email'] = 'blank';
    }

    //画像をチェック
    $image = $_FILES['image'];
    if($image['name'] !== '' && $image['error'] === 0){
        $type = mime_content_type($image['tmp_name']);
        if($type !== 'image/png' && $type !== 'image/jpeg'){
            $error['image'] = 'type';
        }
    }
    if(empty($error)){
        $_SESSION['form'] = $form;

        //画像のアップロード
        if($image['name'] !== ''){
            $filename = date('YmdHis'). '_' . $image['name'];
            if(!move_uploaded_file($image['tmp_name'], 'img/user_thumbnail/' . $filename)){
                die('ファイルのアップロードに失敗しました');
            }
            $_SESSION['form']['image'] = $filename;    
        } else {
            $_SESSION['form']['image'] = '';
        }

        header('Location: insert.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
</head>
<body>
    <main>
    <div class="wrapper2">
        <div class="container">
            <div class="title-container">
                <h1>Register</h1>
            </div>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data">
                    <dl>
                        <dt>USER NAME</dt>
                        <dd>
                            <input type="text" name="username" class="input">
                            <?php if(isset($error['username']) && $error['username'] === 'blank'): ?>
                            <p class="error">ユーザーネームを入力してください</p>
                            <?php endif; ?>
                        </dd>
                        <dt>PASSWORD</dt>
                        <dd>
                            <input type="password" name="password" class="input">
                            <?php if(isset($error['password']) && $error['password'] === 'blank'): ?>
                            <p class="error">パスワードを入力してください</p>
                            <?php endif; ?>
                        </dd>
                        <dt>E-MAIL</dt>
                        <dd>
                            <input type="text" name="email" class="input">
                            <?php if(isset($error['email']) && $error['email'] === 'blank'): ?>
                            <p class="error">メールアドレスを入力してください</p>
                            <?php endif; ?>
                        </dd>
                        <dt>サムネイル</dt>
                        <dd>
                            <input type="file" name="image" size="35" value=""/>
                            <?php if(isset($error['image']) && $error['image'] === 'type'): ?>
                            <p class="error">* 「.png」または「.jpg」の画像を指定してください</p>
                            <?php endif; ?>
                        </dd>
                        <div class="btn-container">
                            <input type="submit" value="確認画面へ" class="btn">
                        </div>
                    </dl>
                </form>
            </div>
        </div>
    </div>
    </main>
</body>
</html>