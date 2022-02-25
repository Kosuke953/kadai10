<?php
session_start();
require('../library.php');

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
            if(!move_uploaded_file($image['tmp_name'], '../img/user_thumbnail/' . $filename)){
                die('ファイルのアップロードに失敗しました');
            }
            $_SESSION['form']['image'] = $filename;    
        } else {
            $_SESSION['form']['image'] = '';
        }

        header('Location: check.php');
        exit();
    }
}
?>