<?php
session_start();

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// funcs.phpで作成したdb_conn関数を＄PDOに格納
require_once('funcs.php');
$pdo = db_conn();

// DB上から値を引っ張ってくる。
$stmt = $pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

//4. 抽出データ数を取得
$val = $stmt->fetch();
// echo $val['username'];

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <?php include('head_parts/link.php') ?>
</head>
<body>
    <header>
        <?php include('header.php'); ?>
    </header>
    <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
        <div class="rounded-lg h-64 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1200x500">
        </div>
        <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
            <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-1 h-1" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            </div>
            <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg"><?php echo h($val['username']); ?></h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <!-- <p class="text-base">Raclette knausgaard hella meggs normcore williamsburg enamel pin sartorial venmo tbh hot chicken gentrify portland.</p> -->
            </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
            <div <?php include('parts/p_basic.php'); ?> >
                <ul>
                    <li <?php include('parts/border_b.php'); ?> >
                        <h2 class="mb-4" >メールアドレス</h2>
                        <h3 class="mb-4" ><?php echo $val['email']; ?></h3>
                        <p class="mb-4" >メールアドレスを変更</p><!-- javascriptでクリックしたら表示される形にしたい -->
                        <form action="update/mail_update.php" method="POST">
                            <div class="mb-4 text-sm">
                                <label><input type="email" name="email" placeholder="新しいアドレスを入力"></label>
                            </div>
                            <!-- <label><input type="email" name="email" placeholder="確認のため再度入力"></label> -->
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button <?php include('parts/btn_cls.php'); ?> >変更</button>
                        </form>
                    </li>
                    <li>
                        <h2 class="mb-4">パスワード</h2>
                        <h3 class="mb-4">***********</h3>
                        <p class="mb-4">パスワードを変更</p><!-- javascriptでクリックしたら表示される形にしたい -->
                        <form action="update/pw_update.php" method="POST">
                            <div class="mb-4 text-sm">
                                <label><input type="password" name="password" placeholder="新しいパスワードを入力"></label>
                            </div>
                            <div">
                                <button <?php include('parts/btn_cls.php'); ?> >変更</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
        </div>
    </div>
    </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>