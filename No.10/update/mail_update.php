<?php
session_start();

$email = $_POST['email'];
$id = $_SESSION['id'];

// funcs.phpで作成したdb_conn関数を＄PDOに格納
require_once('../funcs.php');
$pdo = db_conn();

// DB上から値を引っ張ってくる。
$stmt = $pdo->prepare('UPDATE user SET email=:email WHERE id=:id;');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':id',    $id,    PDO::PARAM_STR);
$status = $stmt->execute();

//4. 抽出データ数を取得
$val = $stmt->fetch();
// echo $val['username'];

if ($status === false) {
    sql_error($stmt);
} else {
    redirect('update_thanks.php');
}   
?>