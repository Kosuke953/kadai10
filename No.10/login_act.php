<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$username = $_POST['username'];
$password = $_POST['password'];

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
if( $val['id'] != ''){
    //Login成功時 該当レコードがあればSESSIONに値を代入
    //成功したら＝つまりDBにlogin.phpで入力されたらパスワード、IDがあった場合この部分が実行される
    //サーバー側にデータを保持します＝session_id();
    // $val = DBから取得した値が入っているものになります😀
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['id'] = $val['id'];
    $_SESSION['username'] = $val['username'];
    $_SESSION['password'] = $val['password'];
    $flag = $_SESSION['kanri_flg'];
    if($flag == 1){
        header('Location: select.php');
    } else {
        header('Location: profile.php');
    }

}else{
    //Login失敗時(Logout経由)
    header('Location: index.php');
}
exit();